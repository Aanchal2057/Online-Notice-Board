<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Notice Board</title>
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">


    <style>


        [class*='col-']{
            float: left;
        }


        .row:after{
            content: '';
            clear: both;
            display: block;



        }
        *{

            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body style="background:url(notice2.png);">


<nav class="navbar navbar-expand-lg navbar-white bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav"style="margin-left: 32%">


            <li class="nav-item">
                <a class="nav-link" href="http://localhost/board/superlogin.php/">Super Admin Login</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/board/DeptAdminLogin.php">Department Admin Login <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/board/TeacherLogin.php">Teacher Login</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="signin.php"><i class="fas fa-user"style="margin-right: 3px"></i>Student Sign Up</a></li>
            <li class="nav-item"><a class="nav-link" href="StudentLogin.php"><i class="fas fa-user"style="margin-right: 3px"></i>Student login</a></li>







        </ul>


     </div>
</nav>


<h1 style="text-align: center;margin-top: 20%;color: #182bb6">Welcome To Our Notice Board</h1>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>