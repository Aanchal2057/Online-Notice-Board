
<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != "studentid") {
    session_destroy();
    header("location:StudentLogin.php");
}

$link = mysqli_connect('localhost', 'root', '', 'Notice');
$student = $_SESSION['auth_user'];
$studentid = $student['studentid'];
if (isset($_POST['submit'])) {
    if (empty($_POST['selectedtCat'])){
        $data=mysqli_query($link, "DELETE FROM `preferences` WHERE useerid = '$studentid'");
    }
    else{
        $data=mysqli_query($link, "DELETE FROM `preferences` WHERE useerid = '$studentid'");
        foreach ($_POST['selectedtCat'] as $cat) {
                
            $sql = "INSERT INTO `preferences`(`useerId`, `categoryId`) VALUES ('$studentid','$cat')";
            $data=mysqli_query($link,$sql);
        }
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
                <h1>Select Category</h1>
                <div class="form-group">
                        <?php
                        $dept = $_SESSION['auth_user']['deptid'];
                        $res=mysqli_query($link,"SELECT * from category where fixedstatus = '0' and deptid = '$dept' and userType in ('2','0')");
                        $pref = mysqli_query($link,"SELECT * FROM `preferences` WHERE useerid = '$studentid'");
                        
                        while($row=mysqli_fetch_array($res)){
                            $temp = 0;
                            foreach ($pref as $value) {
                                if ($value['categoryId'] == $row['id']) {
                                    $temp = 1;
                                }
                            }
                            if ($temp == 1) {
                                ?>
                            <input type="checkbox"  name="selectedtCat[]" value="<?php echo $row['id'];?>" checked>
                            <label><?php echo $row['category'];?></label> <br>
                            <?php
                            }
                            else{
                            ?>
                            <input type="checkbox"  name="selectedtCat[]" value="<?php echo $row['id'];?>">
                            <label><?php echo $row['category'];?></label> <br>
                        <?php
                            }
                        }
                        ?>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">Save</button>
                <a href="showuserStudent.php" style="color: #fff;margin-left: -200px;background: red;padding:5px;margin-top: 5px;">Back</a>
                
            </form>
        </div>
    </div>
</div>
</body>
</html>