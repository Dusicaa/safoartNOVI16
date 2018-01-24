<?php
include('konn.php');
setcookie('anketa','hvala',time()+60*60*24*30*3);
if(isset($_COOKIE['anketa']))
{
echo "Već ste glasali.";
include('anketa.php');
}
else
{
echo "Hvala što ste glasali.";

$id=$_GET['id'];//
$s_anketa="SELECT * FROM anketa
WHERE id_anketa=$id";
$rs_anketa=mysqli_query($conn,$s_anketa);

$r_anketa=mysqli_fetch_assoc($rs_anketa);
$vrednost=$r_anketa['vrednost'];
$vrednost++;
$u_anketa="UPDATE anketa SET vrednost=$vrednost WHERE id_anketa=$id";
$ru_anketa=mysqli_query($conn,$u_anketa);
include('anketa.php');
unset($conn);
}

/* mysqli_close($conn); */
?>

