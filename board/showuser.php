<?php

include('afterlogin.php');
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
                <h3 class="text-center">User</h3>
                <a href="addUser.php">
                    <button type="button" class="btn btn-secondary" style="background-color: #3cada0;">Add User </button>
                </a>
            </div>
        </div>



        <table class="table mt-5 bg-white">

            <thead>

            <tr>
                <th> Serial Number</th>
                <th>Dept</th>
                <th>Username</th>
                <th>Type</th>
                <th>Password</th>


                <th>Options</th>
            </tr>

            </thead>




            <?php

            $link = mysqli_connect('localhost', 'root', '', 'Notice');
            $query=mysqli_query($link,"select * from user");
            $data=mysqli_fetch_all($query,MYSQLI_ASSOC);

            $i = 1;
            foreach ($data as $row) {
                ?>

                <tr>
                    <th scope="row"> <?php echo $i++ ?> </th>
                    <td><?= $row['deptid'] ?></td>

                    <td><?= $row['username'] ?></td>
                    <td><?= $row['type'] ?></td>
                    <td><?= $row['password'] ?></td>




                    <th>
                        <a href="editUser.php?id=<?=$row['id']?>"><button>Edit</button></a>
                    </th>
                    <th>
                        <a href="deleteuser.php?id=<?=$row['id']?>"><button>Delete</button></a>

                    </th>

                </tr>

            <?php } ?>










        </table>
    </div>
</div>
</body>
</html>