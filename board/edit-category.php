<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: superlogin.php");

}
$id = htmlentities($_GET['id'], ENT_QUOTES);


if (!empty($_POST)) {

    $category = htmlentities($_POST['category'], ENT_QUOTES);
    $dept = htmlentities($_POST['dept'], ENT_QUOTES);
    //$fstatus = htmlentities($_POST['fstatus'], ENT_QUOTES);
    if (empty($_POST['fstatus'])) {
        $query = "UPDATE category set category = '$category',deptid= '$dept',fixedStatus = '0' where id='$id'";
    }
    else{
        $fstatus = htmlentities($_POST['fstatus'], ENT_QUOTES);
        $query = "UPDATE category set category = '$category',deptid= '$dept',fixedStatus = '$fstatus' where id='$id'";
    }
    
    $link = mysqli_connect('localhost', 'root', '', 'Notice');
    //$data = mysqli_query($link, "INSERT INTO courseteacher (teacherid,courseid,year,semester) values('$addteacher','$addcourse','$addyear','$addsemester')");
    $data =mysqli_query($link, $query);

    header("location:showcategory.php");
}
$sql = "select * from category where id='$id'";
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
            <a href="showcategory.php"> <button type="submit" class="btn btn-primary" style="margin-right:5%;margin-top: 2%;">Back</button></a>


            <form method="post">
                <div class="form-group">
                    <label>category</label>
                    <input type="text" class="form-control" name="category" value="<?= $data['category'] ?>">
                </div>
                <div class="form-group">
                    <label>Dept</label>
                    <input type="text" class="form-control" name="dept" value="<?= $data['deptid'] ?>">
                </div>

                <div class="form-group">
                    <label >Fixed </label>
                    <?php if ($data['fixedStatus'] == 1){ ?>
                        <input type="checkbox"  name="fstatus" value="1" checked>
                    <?php } 
                    else{ ?>
                    <input type="checkbox"  name="fstatus" value="1" >
                <?php } ?>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 2%;margin-left: 40%;">SAVE</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>