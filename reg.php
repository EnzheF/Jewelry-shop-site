<?php 
include("header.php");
//$message="";
$success=false;
if(($login = $_POST["login"] ?? "") === "");
if(($pass = $_POST["pass"] ?? "") === "");
if(($pass2 = $_POST["pass2"] ?? "") === "");
if(($name_cust = $_POST["name_cust"] ?? "") === "");
if(($surname = $_POST["surname"] ?? "") === "");
if(($adress = $_POST["adress"] ?? "") === "");
if(($phone_num = $_POST["phone_num"] ?? "") === "");
if(($email = $_POST["email"] ?? "") === "");
if(($type = $_POST["type"] ?? "") === "");

$conn = mysqli_connect('localhost', 'root', 'root','jewelry');

if ($type==1) 
{
    if ($surname!="" && $name_cust!="" && $adress!="" && $email!="" && $login!="" 
    && $pass!="" && $pass2!="")
    {
        if($pass!=$pass2)
        {
            $message="<tr><td bgcolor='#ff9999' align='center'><b> Поля пароля и повтора пароля не совпадают!!!
            </b></td></tr>"; 
        }
        else
        {
            $strSQL1= "SELECT id_cust FROM customers 
            WHERE login='".$login."'"; 
            $result1 = mysqli_query($conn, $strSQL1) 
            or die("Не могу выполнить запрос!"); 
            if ($row = mysqli_fetch_array($result1))
            {
                $message="<tr><td bgcolor='#ff9999' align='center'><b> Такой логин уже существует!!! 
                Выберите другой логин </b></td></tr>";
            }
            else
            {
                $strSQL1="INSERT INTO customers (login, pass, name_cust, surname, adress, phone_num, email) 
                VALUES ('".$login."','".$pass."','".$name_cust."','".$surname."','".$adress."','".$phone_num."','".$email."')"; 
                $result1=mysqli_query($conn, $strSQL1) or die("Не могу выполнить запрос!"); 
                $message="<tr><td bgcolor='#66cc66' align='center'> 
                <b>Вы успешно зарегистрированы</b></td></tr>"; 
                $success=true;
            }
        }
    }
    else
    $message="<table width='100%'><tr height='100'></tr><tr><td></td><td align='center'>Не все поля заполнены</td></tr><tr height='100'></table>";
}

//include("header.php");
//print $message;
if(!$success)
{
    ?>
    <form action=reg.php method=post> 
    <tr><td align="center"><br><br><br>
    <small>звездочками отмечены обязательные поля</small>
    <table border="0" width="100%" align="right">
        <br><br> 
        <tr><td align="right" width="50%">Фамилия: </td>
        <td><input type=text name=surname value="<?php print $surname?>">*</td></tr> 
        <tr><td align="right">Имя: </td><td> 
        <input type=text name=name_cust value="<?php print $name_cust?>">*</td></tr> 
        <tr><td align="right">Адрес: </td><td> 
        <input type=text name=adress value="<?php print $adress?>">*</td></tr> 
        <tr><td align="right">Телефон: </td><td> 
        <input type=text name=phone_num value="<?php print $phone_num?>">*</td></tr> 
        <tr><td align="right">Email: </td><td> 
        <input type=text name=email value="<?php print $email?>">*</td></tr> 
        <tr><td align="right">login: </td><td> 
        <input type=text name=login value="<?php print $login?>">*</td></tr> 
        <tr><td align="right">password: </td><td> 
        <input type=password name=pass value="">*</td></tr> 
        <tr><td align="right">repeat password: </td><td>
        <input type=password name=pass2 value="">*</td></tr>
        <tr height="20"></tr>
        <tr><td></td><td>
        <input class="button" type=submit value="отправить"></td></tr>
        <tr height="20"></tr>
    </table>
    </td></tr>
</form>

<?php
mysqli_close($conn);
}
include("footer.php")
?>