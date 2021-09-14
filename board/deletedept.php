<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['id'], ENT_QUOTES);
//var_dump($id);
$link = mysqli_connect('localhost', 'root', '', 'Notice');
$query=mysqli_query($link,"delete from department where id='$id'");
header("location:showdepartment.php");






?>