<?php

include("connect.php");

$strSQL1 = "SELECT * FROM categories ORDER BY name_cat";
$result1 = mysqli_query($link, $strSQL1) or die ("No connection");
$strSQL2 = "SELECT * FROM collections ORDER BY name_col";
$result2 = mysqli_query($link, $strSQL2) or die ("No connection");

?>

<tr>
            <td>
                <table border="0" width="100%">
                    <tr>
                        <td width="50%"><center><h3>Категории</h3></h3></center><ul>
 
<?
while ($row = mysqli_fetch_array($result1))
{?>
<li><a href = "show.php?type=1&id_cat= <? print $row["id_cat"];?>">
<? print $row["name_cat"];?></a>
<?}?>
</ul></td>

<td width="50%"><center><h3>Коллекции</h3></h3></center><ul>

<?
while ($row = mysqli_fetch_array($result2))
{?>
<a href = "show.php?type=2&id_col=
<? print $row["id_col"];?>">
<? print $row["name_col"];?></a>
<?}?>

</ul></td>
</tr>
                </table>
            </td>
        </tr>

<?php
include("footer.php");
mysqli_close($link);
?>