<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: superlogin.php");
}
$id = htmlentities($_GET['id'], ENT_QUOTES);


if (!empty($_POST)) {

    $password = htmlentities($_POST['password'], ENT_QUOTES);
    $name = htmlentities($_POST['name'], ENT_QUOTES);
    $mobile = htmlentities($_POST['mobile'], ENT_QUOTES);




    $query = "update teacher set password='$password',name ='$name',contact ='$mobile'  where id='$id'";

    $link = mysqli_connect('localhost', 'root', '', 'Notice');
    //$data = mysqli_query($link, "INSERT INTO courseteacher (teacherid,courseid,year,semester) values('$addteacher','$addcourse','$addyear','$addsemester')");
    $data =mysqli_query($link, $query);

    header("location:showuserTeacher.php");
}
$sql = "select * from teacher where id='$id'";
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
            <a href="showuserTeacher.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>


            <form method="post">
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" value="<?= $data['password'] ?>">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $data['name'] ?>">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="mobile" value="<?= $data['contact'] ?>">
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">SAVE</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>