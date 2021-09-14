<?php
    include('afterlogin.php');
$link = mysqli_connect('localhost', 'root', '', 'Notice');




if (!empty($_POST)){

    $departmentname=htmlentities($_POST['deptname'],ENT_QUOTES);
    $dept=htmlentities($_POST['deptcode'],ENT_QUOTES);
    $sql = "INSERT into department (departmentname,deptcode) VALUES ('$departmentname','$dept')";
    $data=mysqli_query($link,$sql);
    header("location:showdepartment.php");
}
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Notice Board</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <scrip src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></scrip>
    <style>


        .admin{


            margin: 80px auto;
            background-color: #0C1717;
            color: #fff;


        }

    </style>

</head>
<body>
<div class="container">

    <div class="row">


        <div class="col-md-4 admin"style=" opacity: 0.8;filter: alpha(opacity=80);">

            <form method="post">


                <h1>Add Department</h1>

                <div class="form-group">
                    <label >Department Name</label>
                    <input type="text"  class="form-control" name="deptname" required="" >
                </div>
                <div class="form-group">
                    <label >Dept Code </label>
                    <input type="text" class="form-control" name="deptcode" required="" >
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;margin-bottom: 15px;">ADD</button>
            </form>




        </div>





    </div>


</div>
</body>
</html>