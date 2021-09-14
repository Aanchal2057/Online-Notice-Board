<?php session_start();


if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100)) {

    header("location: login.php");


}
$id = htmlentities($_GET['id'], ENT_QUOTES);
$status = htmlentities($_GET['publishstatus'], ENT_QUOTES);
//echo $status; exit;

$link = mysqli_connect('localhost', 'root', '', 'Notice');

$query = "UPDATE `category` SET `publishstatus` = '$status' WHERE id='$id'";
$data = mysqli_query($link, $query);

header("location:showcategory.php");

?>