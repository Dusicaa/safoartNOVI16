<h2>Anketa</h2>
<form name="forma" action="<?php echo $_SERVER['php_self'];?>" method="POST">
 <?php
include('konn.php');
$pitanje="SELECT id_ankete,pitanje FROM anketa WHERE aktivna=1";
$rez=mysqli_query($conn,$pitanje) or die("Upit za anketu nije izvršen!".mysqli_error());
$niz=mysqli_fetch_array($rez); 

echo '<table style="margin:auto;margin:30px auto;" class="brisKor">';
echo '<tr><td>'.$niz['pitanje'].'</td></tr>';

$upit="SELECT odgovori, id_odgovori FROM odgovori o , anketa a  WHERE a.aktivna=1 AND a.id_ankete=o.id_ankete ";
$rez1=mysqli_query($conn,$upit) or die("Upit za odgovore nije izvršen!".mysqli_error());

while($niz1=mysqli_fetch_array($rez1)){
	
	echo '<tr><td align="left"><input type="radio" name="odgovori" value="'.$niz1['id_odgovori'].'">'.$niz1["odgovori"].'</td></tr>';
		
}
echo '<tr><td><input type="submit" name="glasaj" value="Glasaj" class="dugme"></td></tr> ';
echo '<tr><td><input type="submit" name="rez" value="Rezultati" class="dugme"></td></tr> ';
echo '</table></form>';


$glasanje=$_POST['glasaj'];
$rezulati=$_POST['rez'];
if(isset($glasanje)){
	
	
	$odgovor=$_POST['odgovori'];
	$upisi_odgovor='UPDATE rezultat SET rezultat=rezultat+1 WHERE id_odgovori='.$odgovor;
	
	$izvrsi_upis_odgovora=mysqli_query($conn,$upisi_odgovor) or die("Upis odgovora nije izvršen!".mysqli_error());
	
	if($izvrsi_upis_odgovora){
		
		echo "Vaš glas je upisan!<br/>";
}else{
	echo "Greška".mysqli_error();
	
}
}


if(isset($rezulati)){
	$rezulati="SELECT * FROM anketa WHERE aktivna=1";
	$izvrsi_rezultati=mysqli_query($conn,$rezulati) or die("Upis rezulata nije izvršen!".mysqli_error());
	$row=mysqli_fetch_array($izvrsi_rezultati);
	$id=$row['id_ankete'];
	
	
	echo '<table  border="1"style="margin:auto;margin:30px auto;" class="brisKor">';
    echo '<tr><td colspan="2">'.$row['pitanje'].'</td></tr>';

    $odgovori="SELECT o.odgovori,r.rezultat FROM odgovori o,rezultat r WHERE o.id_odgovori=r.id_odgovori AND r.id_ankete=".$id;
    $uzmi_odgovore=mysqli_query($conn,$odgovori) or die("Upit za odgovore2 nije izvršen!".mysqli_error());

    while($red=mysqli_fetch_array($uzmi_odgovore)){
	echo '<tr><td>'.$red['odgovori'].'</td><td>'.$red['rezultat'].'</td></tr>';
		
     }
echo '</table>';
}

mysqli_close($conn); ?>