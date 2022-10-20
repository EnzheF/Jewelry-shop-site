<?php
include("header.php");

if(($name_cust = $_POST["name_cust"] ?? "") === "");
if(($surname = $_POST["surname"] ?? "") === "");
if(($adress = $_POST["adress"] ?? "") === "");
if(($phone_num = $_POST["phone_num"] ?? "") === "");
if(($email = $_POST["email"] ?? "") === "");
$id=$_SESSION["id"];

//$fam=$_POST["fam"];
//$im=$_POST["im"];
//$addr=$_POST["addr"];
//$mail=$_POST["mail"];
//$phone=$_POST["phone"];
//$subscribe=$_POST["subscribe"];
//$id=$_SESSION["id"];

$conn = mysqli_connect('localhost', 'root', 'root','jewelry');

if ($surname!="" && $name_cust!="" && $adress!="" && $email!="" && $phone_num!="")
{
	$strSQL1="UPDATE customers SET name_cust='".$name_cust."', surname='".$surname."', adress='".$adress."', phone_num='".$phone_num."',email='".$email."' WHERE id_cust=".$id;
	$result1=mysqli_query($conn, $strSQL1) or die("no query");
	$_SESSION["log"]=$surname." ".$name_cust;
	$message="<table width='100%'><tr height='100'></tr><tr><td></td><td align='center'>ИЗМЕНЕНИЯ ВЫПОЛНЕНЫ</td></tr><tr height='100'></table>";
}
else
{
	$message="<tr><td align='center'><b>Не все поля заполнены</b></td></tr>";
}

print $message;
include("footer.php");
?>