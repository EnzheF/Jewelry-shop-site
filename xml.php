<?php
header("Content-Type: text/xml");
print "<?xml version=\"1.0\" encoding=\"windows-1251\" ?>"; 

print "<прайс-лист>";
$conn = mysqli_connect('localhost', 'root', 'root','jewelry');
//mysqli_set_charset($conn, 'cp1251');
	
$strSQL1="SELECT * FROM categories ORDER BY id_cat";
$result1=mysqli_query($conn,$strSQL1) or die("No query1!");

while($row=mysqli_fetch_array($result1))
		{
			print "<категория id='".$row["id_cat"]."'>".$row["name_cat"];
			$strSQL2 = "SELECT id_jel, name_jel, description, material, stone, size, price, name_col FROM jewelry, collections WHERE jewelry.id_col=collections.id_col AND id_cat=".$row["id_cat"];
			$result2=mysqli_query($conn,$strSQL2) or die("No query2!");
			while($row2=mysqli_fetch_array($result2))
			{
					print "<товар название='".$row2["name_jel"]."'>";
					print "<описание>".$row2["description"]."</описание>";
					print "<материал>".$row2["material"]."</материал>";
					print "<камень>".$row2["stone"]."</камень>";
					print "<размер>".$row2["size"]."</размер>";
					print "<цена>".$row2["price"]."</цена>";
					print "<коллекция>".$row2["name_col"]."</коллекция>";
					print "</товар>";
			}
			print "</категория>";
		}
print "</прайс-лист>"; 
mysqli_close($conn);
?>