<?php
$link = mysqli_connect('localhost', 'root', '', 'Notice');


 if (!empty($_POST)) {
    $dept = htmlentities($_POST['dept'], ENT_QUOTES);

    $name = htmlentities($_POST['name'], ENT_QUOTES);
    $id = htmlentities($_POST['id'], ENT_QUOTES);
    $password = htmlentities($_POST['pass'], ENT_QUOTES);
    $mobile = htmlentities($_POST['mobile'], ENT_QUOTES);
    $gender = htmlentities($_POST['gender'], ENT_QUOTES);
    $jonmodin =  htmlentities($_POST['jonmodin'], ENT_QUOTES);

    $photo = $_FILES['photo'];

    $fileName = time()
        ."_".rand(10000,99999)
        ."_".rand(10000,99999)
        ."_".rand(10000,99999)
        ."_".rand(10000,99999)
        .".".pathinfo($photo['name'],PATHINFO_EXTENSION);

    move_uploaded_file($photo['tmp_name'],"upload/".$fileName);

    //echo "$name, $username, $email, $password, $cPassword";

    if (!empty($dept) && !empty($name) && !empty($id) && !empty($password) && !empty($mobile) &&  !empty($gender)) {
        $password = md5($password);
        $query= "INSERT INTO student (deptid,name,studentid,password,contact,gender,birthdate,photo) VALUES ('$dept','$name','$id','$password','$mobile','$gender','$jonmodin','$fileName')";
        mysqli_query($link, $query);
        header("location:StudentLogin.php");
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
    <scrip src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></scrip>
<style type="text/css">
   label {
  color: blue;
  padding: 8px;
}
</style>

</head>
<body style="background-size:98%;background-color: #ADD8E6;color: #fff;">
<div class="container">
    <div class="row home_prg regis_form">
        <div class="col-sm-12" style="margin-top: 20px;">
            <form method="post" enctype="multipart/form-data" style="width: 70%;margin: 0px auto;">

                <h3 class="form_title text-center" style="color:#00008B;">Registration Form</h3>
                <div class="form-group">
                    <label>Select Deptcode</label>
                    <select  class="form-control"   name="dept">
                        <option>Select Deptcode</option>
                        <?php
                        $res=mysqli_query($link,"select * from department");
                        while($row=mysqli_fetch_array($res)){
                            ?>
                            <option value="<?php echo $row['deptcode'];?>"><?php echo $row['deptcode'];?> </option  >
                        <?php     }  ?>
                    </select>
                </div>
                <div class="form-group" >
                    <label  for="">Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Enter your Name">
                </div>

                <div class="form-group">
                    <label  for="">ID</label>
                    <input class="form-control" type="text" name="id" placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label  for="">Password</label>
                    <input class="form-control" type="password" name="pass" placeholder="Enter your password">
                </div>

                <div class="form-group">
                    <label  for="">Mobile Number</label>
                    <input class="form-control" type="text" name="mobile" placeholder="Enter your Mobile number">
                </div>


                <div class="form-group">
                    <label for="">Gender</label><br>
                    <div class="form-control">
                        <input type="radio" name="gender" value="male" > Male
                        <input type="radio" name="gender" value="female"> Female
                        <input type="radio" name="gender" value="other"> other<br>
                    </div>
                </div>


                <div class="form-group">
                    <label  for="">Date & Birth</label>
                    <input class="form-control" type="date" name="jonmodin">
                </div>


                <div class="form-group">
                    <label  for="">Upload Image</label>
                    <input class="form-control" type="file" accept="image/*" name="photo">
                </div>



                    <div class="form-group">
                        <input class="form-control btn btn-success" type="submit" value="Register"><br><br>
                        <input class="form-control btn btn-secondary" type="reset" value="Reset">
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>