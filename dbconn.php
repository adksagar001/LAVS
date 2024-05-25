<?php
$servername="localhost";
$username="root";
$password="";
$databasename="lavs";

$conn=mysqli_connect($servername,$username,$password,$databasename);
// CHCEKING THE CONNECTION.

if(!$conn)
{
    die("connection failed:".mysqli_connect_error());
}
else{
  
}
//CONNECTION CHECKED SUCCESSFULLY.

/*mysqli_close($conn);
*/


?>