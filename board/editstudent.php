<?php session_start();



$id = htmlentities($_GET['id'], ENT_QUOTES);


if (!empty($_POST)) {

    $dept = htmlentities($_POST['dept'], ENT_QUOTES);
    $studentid = htmlentities($_POST['user'], ENT_QUOTES);
    $name = htmlentities($_POST['name'], ENT_QUOTES);
    $mobile = htmlentities($_POST['mobile'], ENT_QUOTES);
    $jonmodin = htmlentities($_POST['jonmodin'], ENT_QUOTES);
    $linggo = htmlentities($_POST['male'], ENT_QUOTES);
    $photo = $_FILES['photo'];

    $fileName = time()
        ."_".rand(10000,99999)
        ."_".rand(10000,99999)
        ."_".rand(10000,99999)
        ."_".rand(10000,99999)
        .".".pathinfo($photo['name'],PATHINFO_EXTENSION);

    move_uploaded_file($photo['tmp_name'],"upload/".$fileName);


    $query = "update student set deptid = '$dept',studentid = '$studentid',name ='$name',contact ='$mobile',birthdate = '$jonmodin',gender ='$linggo',photo ='$fileName'  where studentid='$id'";

    $link = mysqli_connect('localhost', 'root', '', 'Notice');
    //$data = mysqli_query($link, "INSERT INTO courseteacher (teacherid,courseid,year,semester) values('$addteacher','$addcourse','$addyear','$addsemester')");
    $data =mysqli_query($link, $query);

    header("location:showuserStudent.php");
}
$sql = "select * from student where id='$id'";
$link = mysqli_connect('localhost', 'root', '', 'Notice');
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_assoc($result);


?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Notice Board</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        .admin {

            border: 2px solid #23148b;
            margin: 120px auto;

        }
    </style>
</head>
<body>
<div class="container">


    <div class="row">


        <div class="col-md-4 admin ">
            <a href="showuserStudent.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>


            <form method="post"  enctype="multipart/form-data">
                <div class="form-group">
                    <label>Department</label>
                    <input type="text" class="form-control" name="dept" value="<?= $data['deptid'] ?>">
                </div>
                <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" class="form-control" name="user" value="<?= $data['studentid'] ?>">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $data['name'] ?>">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="mobile" value="<?= $data['contact'] ?>">
                </div>
                <div class="form-group">
                    <label>birthdate</label>
                    <input type="date" class="form-control" name="jonmodin" value="<?= $data['birthdate'] ?>">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" class="form-control" name="male" value="<?= $data['gender'] ?>">
                </div>
                <div class="form-group">
                    <label>Upload photo</label>
                    <input type="file" class="form-control"   name="photo" value="<?= $data['photo']?>"?>
                    <img width="100px" src="upload/<?= $data['photo']?>">
                </div>




                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">SAVE</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>