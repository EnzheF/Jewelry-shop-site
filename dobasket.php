<?php
$type = $_GET["type"];
//$id_jel = $_GET["id_jel"];
if(($id_jel = $_GET["id_jel"] ?? "") === "");
$id_bask = $_COOKIE["id_bask"];

$conn = mysqli_connect('localhost', 'root', 'root','jewelry');

if($type==1)
{
    $strSQL = "SELECT * FROM basket_jewelry WHERE id_jel=".$id_jel." AND id_bask='".$id_bask."'";
    $result = mysqli_query($conn, $strSQL) or die ("No query");
    if($row = mysqli_fetch_array($result))
    {
        $strSQL = "UPDATE basket_jewelry SET kolvo=kolvo+1 WHERE id_jel=".$id_jel." AND id_bask='".$id_bask."'";
    }
    else
    {
        $strSQL = "INSERT INTO basket_jewelry (id_bask, id_jel, kolvo) VALUES ('".$id_bask."',".$id_jel.", 1)";
    }
    mysqli_query($conn, $strSQL);
}
if($type==2)
{
    $strSQL = "SELECT * FROM basket_jewelry WHERE id_jel=".$id_jel." AND id_bask='".$id_bask."'";
    $result = mysqli_query($conn, $strSQL) or die ("No query");
    if($row = mysqli_fetch_array($result))
    {
        if($row["kolvo"]>1)
        {
            $strSQL = "UPDATE basket_jewelry SET kolvo=kolvo-1 WHERE id_jel=".$id_jel." AND id_bask='".$id_bask."'";
        }
        else
        {
            $strSQL = "DELETE FROM basket_jewelry WHERE id_jel=".$id_jel." AND id_bask='".$id_bask."'";
        }
    }
    mysqli_query($conn, $strSQL);
}
if($type==3)
{
    $strSQL = "DELETE FROM basket_jewelry WHERE id_jel=".$id_jel." AND id_bask='".$id_bask."'";
    mysqli_query($conn, $strSQL);
}
if($type==4)
{
    $strSQL = "DELETE FROM basket_jewelry WHERE id_bask='".$id_bask."'";
    mysqli_query($conn, $strSQL);
}

include("basket.php")
?>