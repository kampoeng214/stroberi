<?php
include ('connection.php');

$sql_insert = "INSERT INTO kopi (id, rfid) VALUES ('".$_GET["id"]."', '".$_GET["rfid"]."')";
if(mysqli_query($connect,$sql_insert))
{
echo "Done";
mysqli_close($connect);
}
else
{
echo "error is ".mysqli_error($connect );
}

?>