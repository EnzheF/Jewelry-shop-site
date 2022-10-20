<?php
//$start=session_start();
//include("header.php");

$success=false;
if(($log = $_POST["login"] ?? "") === "");
if(($passs = $_POST["pass"] ?? "") === "");
$conn = mysqli_connect('localhost', 'root', 'root','jewelry');

$login=mysqli_real_escape_string($conn,$log); 
$pass = mysqli_real_escape_string($conn,$passs);

//$pass=$_POST["pass"]; 
//$login=$_POST["login"];

$strSQL1="SELECT * FROM customers WHERE login='".$login."' AND pass='".$pass."'";
$result1=mysqli_query($conn, $strSQL1) or die("Can't execute query!"); 
if ($row=mysqli_fetch_array($result1))
{
    $start=session_start(); 
    //session_register("log"); 
    $_SESSION["log"]=$row["surname"]." ".$row["name_cust"]; 
    //session_register("id"); 
    $_SESSION["id"]=$row["id_cust"]; 
    $message="<tr><td bgcolor='#66cc66' align='center'> <b>You are successfully logged in</b></td></tr>"; 
    $success=true;
}
else
{
    $message="<tr><td bgcolor='#ff9999' align='center'> <b>Such login/password does not exist!!!</b></td></tr>"; 
}
mysqli_close($conn); 
if ($success)
{
    include("cabinet.php");
}
else
{
    include("header.php");
    ?>
    <div class="auto_content">
    <form action="auto.php" method="post">
    <table border="0" width="100%">
        <tr>
            <td width="280"></td>
            <td align="right">Логин: </td>
            <td align="left"><input type=text style="width:60; height:20;" name=login></td>
        </tr>
        <tr>
            <td></td>
            <td align="right">Пароль: </td>
            <td align="left"><input type=password style="width:60; height:20;" name=pass></td>
        </tr>
        <tr height="20"></tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input class="button" type=submit value=ok style="height:20">
            </td>
        </tr>
        <tr height="20"></tr>
    </table>
    <?php 
    if(isset($_SESSION["log"]))
    {
        print $_SESSION["log"];
        print "<a href='cabinet.php' class='nav_link'>Личный кабинет</a>";
    }
    ?>
    </form>
    <center><a class="nav_link" href="reg.php">Зарегистрироваться</a></center>
    </div>
    <?php
    //print $message;
    include("footer.php");
}
?>