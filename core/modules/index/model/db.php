 <?php
$db="yibun";
$host="localhost";
$user="root";
$pw="teku";

$cn=mysqli_connect($host,$user,$pw,$db) or die("Error en Conexion");
$db=mysqli_select_db($cn,$db) or die("Error en Db");

return($cn);
return($db);
?>