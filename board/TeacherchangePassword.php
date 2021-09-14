<?php session_start();


if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

    header("location: login.php");


}

if(!empty ($_POST)){
    $oldpassword = md5(htmlentities($_POST['password'],ENT_QUOTES));
    $newpassword = md5(htmlentities($_POST['newpassword'],ENT_QUOTES));
    $confirmnewpassword = md5(htmlentities($_POST['confirmpassword'],ENT_QUOTES));
    $link = mysqli_connect('localhost', 'root', '', 'Notice');
    $userdatanew = $_SESSION['auth_user'];
    $result = mysqli_query($link," select * from teacher where id='$userdatanew[id]'");//
    $data=mysqli_fetch_all($result,MYSQLI_ASSOC);

    if (!$result) {
        echo "The username you entered does not exist";
    }
    else if ($oldpassword != $data[0]['password']) {
        echo "You entered an incorrect password";
    }
    else
    {
        if ($newpassword == $confirmnewpassword) {

            $sql = mysqli_query($link,"UPDATE teacher SET password='$newpassword' where id='$userdatanew[id]'");
            header("location:Teacherlogin.php");

        }
        else {
            echo "Passwords do not match";
        }
    }
}




?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Online Notice Board</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>

        .admin {

            border: 2px solid #23148b;
            margin: 120px auto;

    </style>
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-6 admin">

            <a href=" AfterTeacherLogin.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>

            <h1>Change Password</h1>
            <form method="post">


                <div class="form-group">
                    <label for="exampleInputEmail1">Enter your old password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Enter your new password</label>
                    <input type="password" class="form-control" name="newpassword" placeholder=" Enter Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm your new password</label>
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Password">
                </div>

                <p><input type="submit" value="Update Password"></p>

            </form>

        </div>
    </div>
</div>
</body>
</html>