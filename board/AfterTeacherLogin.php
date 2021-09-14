<?php

session_start();
if ($_SESSION['user_type'] != "teacherid") {
    session_destroy();
    header("location:TeacherLogin.php");
}
include('TeacherHeader.php');

 ?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Notice Board</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <scrip src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></scrip>

</head>
<body>
<div class="container">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 mt-5">
                <h3 class="text-center" style="color:#ADD8E6;background-color:#4169E1;padding: 5px;">Teacher Details</h3>
                <hr>
            </div>

        <table class="table mt-5 bg-white">

            <thead>

            <tr>
                <th>User ID</th>
                <th> Name</th>
                <th> Department</th>
                <th>Contact</th>
             </tr>

            </thead>

        <?php
            $userdata=$_SESSION['auth_user']['userid'];

            $link = mysqli_connect('localhost', 'root', '', 'Notice');
            $sql= "SELECT * from teacher where userid='$userdata'";
            $query=mysqli_query($link,$sql);
            $data=mysqli_fetch_all($query,MYSQLI_ASSOC);

            foreach ($data as $row) {
        ?>
                <tr>
                    <td><?= $row['userid'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['deptid'] ?></td>
                    <td><?= $row['contact'] ?></td>
                </tr>
        <?php } ?>
        </table>
            <a href="ShowNotice.php"style="margin-top: 10px;"><button type="button" class="btn btn-primary btn-lg">Notice</button>
            </a>

           <!--  <a href="logout.php" style="margin-left: 900px;margin-top: 0px;"><button type="button" class="btn btn-danger btn-lg">Log Out</button>
            </a> -->

        </div>
    </div>
</body>
</html>