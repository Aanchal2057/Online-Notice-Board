<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: superlogin.php");


}
$id = htmlentities($_GET['id'], ENT_QUOTES);


if (!empty($_POST)) {

    $dept = htmlentities($_POST['dept'], ENT_QUOTES);
    $userid = htmlentities($_POST['user'], ENT_QUOTES);
    $type = htmlentities($_POST['type'], ENT_QUOTES);
    $password = htmlentities($_POST['password'], ENT_QUOTES);




    $query = "update user set deptid = '$dept',username = '$userid', type ='$type',password ='$password' where id='$id'";

    $link = mysqli_connect('localhost', 'root', '', 'Notice');
    //$data = mysqli_query($link, "INSERT INTO courseteacher (teacherid,courseid,year,semester) values('$addteacher','$addcourse','$addyear','$addsemester')");
    $data =mysqli_query($link, $query);

    header("location:showuser.php");
}
$sql = "select * from user where id='$id'";
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
            <a href="showuser.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>


            <form method="post">
                <div class="form-group">
                    <label>Department</label>
                    <input type="text" class="form-control" name="dept" value="<?= $data['deptid'] ?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="user" value="<?= $data['username'] ?>">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" class="form-control" name="type" value="<?= $data['type'] ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" value="<?= $data['password'] ?>">
                </div>





                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">SAVE</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>