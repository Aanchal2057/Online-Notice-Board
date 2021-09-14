<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != "studentid") {
    session_destroy();
    header("location:StudentLogin.php");
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

</head>
<body>
<div class="container">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 mt-5">
                <h3 class="text-center">Student Details</h3>
                <hr>

 

            </div>



            <table class="table mt-5 bg-white">

                <thead>

                <tr>
                    <th> Serial Number</th>
                    <th>Department</th>
                    <th>Username</th>
                    <th>Student ID</th>
                    <th>Birth & Date</th>

                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Photo</th>


                </tr>

                </thead>




                <?php
                $userdata=$_SESSION['auth_user']['id'];

                $link = mysqli_connect('localhost', 'root', '', 'Notice');
                $query=mysqli_query($link,"select * from student WHERE id ='$userdata'");

                $data=mysqli_fetch_all($query,MYSQLI_ASSOC);

                $i = 1;
                foreach ($data as $row) {
                    ?>

                    <tr>
                        <th scope="row"> <?php echo $i++ ?> </th>


                        <td><?= $row['deptid'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['studentid'] ?></td>
                        <td><?= $row['birthdate'] ?></td>
                        <td><?= $row['contact'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td> <img width="100px" src="upload/<?= $row['photo']?>"></td>
                        <th>
                            <a href="editstudent.php?id=<?=$row['id']?>"><button>Update Profile</button></a>

                        </th>


                    </tr>


                <?php } ?>

            </table>
            <a href="ShowNotice.php"style="margin-top: 10px;"><button type="button" class="btn btn-primary btn-lg">Notice</button>
            </a>
            <a href="selectcategory.php"style="margin-left: 30px;margin-top: 10px;"><button type="button" class="btn btn-primary btn-lg">Category</button>
            </a>

            <a href="logout.php" style="margin-left: 900px;margin-top: 0px;"><button type="button" class="btn btn-danger btn-lg">Log Out</button>
            </a>

        </div>
    </div>
</body>
</html>
