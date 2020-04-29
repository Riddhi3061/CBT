
<?php
include_once 'dbConnection.php';
ob_start();
$qid=@$_GET['qid'];
$class=$_POST['class'];
$subject=$_POST['subject'];
$level=$_POST['level'];


$qns = $_POST['qns'];
$ch=@$_GET['ch'];
$q13=mysqli_query($con,"INSERT INTO questions VALUES  ('$qid','$class','$subject','$level','$qns','$ch')");
  $oaid=uniqid();
  $obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST['1'];
$b=$_POST['2'];
$c=$_POST['3'];
$d=$_POST['4'];
$qa=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
$qb=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
$qc=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
$qd=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
$e=$_POST['ans'];
switch($e)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}
$qans=mysqli_query($con,"INSERT INTO answer VALUES  ('$qid','$ansid')");

header("location:dash.php?q=11");

//ob_end_flush();
?>