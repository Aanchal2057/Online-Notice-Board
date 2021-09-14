
<?php
session_start();
if (!isset($_SESSION['user_type'])) {
    session_destroy();
    header("location:Noticefrontend.php");
}
$adminid = $_SESSION['auth_user']['userid'];
if (preg_match("/^da.*$/",$adminid)) {
    include('DeptAadminAfterlogin.php');
}
elseif (preg_match("/^a.*$/",$adminid)) {
    include('afterlogin.php');
} else{
    echo "";
}
    $userid = $_SESSION['auth_user']['userid'];
    $link = mysqli_connect('localhost', 'root', '', 'Notice');

if (!empty($_POST)){
    $category=htmlentities($_POST['category'],ENT_QUOTES);
    $dept=htmlentities($_POST['dept'],ENT_QUOTES);
    if (empty($_POST['status'])) {
        $status = 0;
    }
    else{
            $status=htmlentities($_POST['status'],ENT_QUOTES);
    }
    if (empty($dept)) {
        $dept = $_SESSION['auth_user']['department'];
        if (empty($dept)) {
            $dept = 0;
        }
    }
    $usertype=htmlentities($_POST['userType'],ENT_QUOTES);
    $sql = "INSERT into category (category,deptid, `userType`, `fixedStatus`,adminId) VALUES ('$category','$dept','$usertype','$status','$userid')";
    $data=mysqli_query($link,$sql);

    header("location:showcategory.php");
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


                <h1>Add Category</h1>

                <div class="form-group">
                    <label >Category</label>
                    <input type="text"  class="form-control" name="category" required="" >
                </div>
                <?php 
                if ($_SESSION['user_type'] == "userid") {
                 ?>
                <div class="form-group">
                    <label>Select Deptcode</label>
                    <select  class="form-control"   name="dept" required>
                        <option value="0">Select Deptcode</option>

                        <option value="0">All Dept</option>
                        <?php
                        $res=mysqli_query($link,"select * from department");
                        while($row=mysqli_fetch_array($res)){
                            ?>
                            <option value="<?php echo $row['deptcode'];?>"><?php echo $row['deptcode'];?> </option  >
                        <?php     }  ?>
                    </select>
                </div>
            <?php } ?>
                <div class="form-group">
                    <label>Select User</label >
                    <select  class="form-control"   name="userType" required>
                        <option value="0">Select User</option>
                        <option value="0">All User</option>
                        <?php
                        if ($_SESSION['user_type'] == "deptUser") {
                            $usertype = "SELECT * from usertype WHERE id in ('3','2')";
                        }
                        else{
                            $usertype = "SELECT * from usertype WHERE id in ('3','2','1')";
                        }
                        $res=mysqli_query($link,$usertype);
                        while($row=mysqli_fetch_array($res)){
                            ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['type'];?> </option  >
                        <?php     }  ?>
                    </select>
                </div>

                <div class="form-group">
                    <label >Fixed </label>
                    <input type="radio"  name="status" value="1" >
                </div>


                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;margin-bottom: 15px;">ADD</button>
            </form>




        </div>





    </div>


</div>
</body>
</html>