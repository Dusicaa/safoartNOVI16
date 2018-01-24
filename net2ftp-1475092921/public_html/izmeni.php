<?php
include("konn.php");
	if(isset($_GET['edit'])){
		$edit_id=$_GET['edit'];
		$upit="SELECT * FROM menu WHERE idMenu='$edit_id'";
		$run=mysqli_query($conn,$upit);
		while($red=mysqli_fetch_array($run)){
			$id=$red['idMenu'];
			$naziv=$red['ime'];
			$putanja=$red['link'];
			$roditelj=$red['roditelj'];
?>
		
<form action="izmeni.php?edit_form=<?php echo $edit_id;?>" method='post' enctype='multipart/form-data'>
		<table border='1' align="center" class="brisKor" style="margin:auto;">
			<tr>
			<td><h2>Izmeni</h2></td>
			</tr>
			<tr>
			<td>id meni:</td>
			<td><input type='text' name='idMenu' value="<?php echo $id?>"/></td>
			</tr>
			<tr>
			<td>naziv kolona:</td>
			<td><input type='text' name='ime'value="<?php echo $naziv?>"/></td>
			</tr>
			<tr>
			<td>putanja:</td>
			<td><input type='text' name='link'value="<?php echo $putanja?>"/></td>
			</tr>
			<tr>
			<td>roditelj (ovo je za podmeni):</td>
			<td><input type='text' name='roditelj'value="<?php echo $roditelj?>"/></td>
			</tr>
			<tr>
			<td><input type='submit' name='update' value='promeni'class="dugme"/></td>
			</tr>
			</table>
</form>
<?php }}

include("konn.php");
	if (isset($_POST['update']))
{
		$update_id=$_GET['edit_form'];
		$id1=$_POST['idMenu'];
		$naziv1=$_POST['ime'];
		$putanja1=$_POST['link'];
		$roditelj1=$_POST['roditelj'];
		if($id1==''||$naziv1==''||$putanja1==''||$roditelj1==''){
		echo"<script>alert('nesto nije dobro');</script>";
		exit();
}
else
{
$upit_update="UPDATE menu SET idMenu='$id1', ime='$naziv1', link='$putanja1', roditelj='$roditelj1' where idMenu='$update_id'";
if(mysqli_query($conn,$upit_update)){
echo"<script>alert('Uspesno je izmenjen podatak');</script>";
echo"<script>window.open('view_meni.php','_self');</script>";
exit();
}
}
}
mysqli_close($conn);
?>