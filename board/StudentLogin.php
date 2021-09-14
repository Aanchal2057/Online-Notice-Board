<?php
if (session_start()) {
    session_destroy();
}
$link = mysqli_connect('localhost', 'root', '', 'Notice');

if (!empty($_POST)) {
    $username = htmlentities($_POST['name'], ENT_QUOTES);
    $password = htmlentities($_POST['password'], ENT_QUOTES);

    if (!empty($username) && !empty($password)) {
        $password = md5($password);

        $query = "SELECT * FROM student WHERE studentid = '$username'";

        $result = mysqli_query($link, $query);
        $data = mysqli_fetch_assoc($result);
        
        if (!empty($data)) {

            if($password == $data['password']){
            	
                session_start();
                $_SESSION['auth_user']= $data;

                $_SESSION['user_type']= "studentid";

                header("location:showuserStudent.php");
            }else{
                echo "Invalid username or password!";
            }
        }else{
            echo "No such user found!";
        }

        //header("location:login.php");
    } else {
        $error = "Something went wrong!";
    }

}

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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>

        .admin{


           background-color: #0000FF;


        }
    </style>
</head>
<body style="background-size:98%;background-color:#ADD8E6;">
<div class="container">

    <div class="row">


        <div class="col-md-4 offset-4 admin"style="margin-top: 20%">

            <?php  if(!empty($error))

                echo $error;
            ?>    <form  method="post" style="opacity: 0.8;filter: alpha(opacity=80);" >
                <div class="form-group ">
                    <label style="color: #fff;padding: 7px;font-weight: 600;" for="exampleInputEmail1" >Student ID</label>
                    <input type="text" class="form-control"  name="name" placeholder="Enter ID">
                </div>
                <div class="form-group">
                    <label style="color: #fff;padding: 7px;font-weight: 600;" for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password"  placeholder="Password">
                </div>

                <button type="submit" class="btn btn-dark " style="margin-left: 40%" >Login</button>
            </form>
        </div>


    </div>
</div>
</body>
</html>