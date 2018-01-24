<?php 
  
  @session_start();
 
   if($_SESSION['nazivUloge']=='admin'){
   ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html>
    <head>
	     <title>Admin-izmena korisnika</title>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		  <meta name="description" content="Umetničke slike">
	      <meta name="keywords" content="slike,umetnost,ikone,priroda,morski motivi,prodaja slika">
	      <link rel="shortcut icon" href="img/shortcuticon.gif">
		 <link href="style.css" rel="stylesheet" type="text/css" />
          <script src="js/jquery.js"></script> 
		  <script type="text/javascript" src="js/ajaxobj.js"></script>
		 <script type="text/javascript" src="js/dohvatirss.js"></script>	  
		  <script type="text/javascript" src="js/login.js"></script>
          <script type="text/javascript" src="js/tinydropdown.js"></script>
		  
		  <link rel="stylesheet" href="base.css" type="text/css" media="screen" charset="utf-8"/>
	<script src="js/jquery-1.4.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/jquery-ui-1.7.2.custom.min.js" type="text/javascript" charset="utf-8"></script>
	

<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
	</head>
    <body>
	
	 <div id="omot">
	       
	       <div id="header"><?php include('header.php');?> </div>
		   <div class="nav">
           <?php include_once('menu.php'); ?>
		   </div>
		   <script type="text/javascript">
               var dropdown=new TINY.dropdown.init("dropdown", {id:'menu', active:'menuhover'});
              </script>
		  
		   <div id="sredina" style="margin:auto;text-align:center;padding:10px;">
	              <h1>Admin panel</h1>
				  <a href="view_meni.php"> Meni </a>  |
		         <a href="korisnici.php"> Korisnici </a>  |
		   <a href="adminSlike.php">Uredi galeriju slika</a>      |
		  <a href="adminPost.php">Uredi postove</a> 
		         <div id="adminPrikaz">
				 <?php
           include('konn.php');
	if(isset($_GET['edit'])){
		$edit_id=$_GET['edit'];
		$upit="SELECT * FROM korisnici WHERE id_korisnika='$edit_id'";
		$run=mysqli_query($conn,$upit);
	while($red=mysqli_fetch_array($run)){
		$id=$red['id_korisnika'];
		$ime=$red['ime_prezime'];
		$email=$red['mail'];
		$user=$red['korisnicko_ime'];
		$lozinka=$red['lozinka'];
?>
	
<form action="izmena_korisnika.php?edit_form=<?php echo $edit_id;?>" method='post' enctype='multipart/form-data'>
		<table border='1' align="center" class="brisKor" style="margin:20px auto;">
		<tr>
		<td colspan='2'><h2>Izmeni</h2></td>
		</tr>
		<tr>
		<td>id korisnika:</td>
		<td><input type='text' name='id_korisnika' value="<?php echo $id?>"/></td>
		</tr>
		<tr>
		<td>ime i prezime:</td>
		<td><input type='text' name='ime_prezime'value="<?php echo $ime?>"/></td>
		</tr>
		<tr>
		<td>email:</td>
		<td><input type='text' name='mail'value="<?php echo $email?>"/></td>
		</tr>
		<tr>
		<td>user:</td>
		<td><input type='text' name='korisnicko_ime'value="<?php echo $user?>"/></td>
		</tr>	
		<tr>
		<td>lozinka:</td>
		<td><input type='text' name='lozinka'value="<?php echo $lozinka?>"/></td>
		</tr>
		<tr>
		<td colspan='2'><input type='submit' name='update' value='promeni'class="dugme"/></td>
		</tr>
		</table>
</form>
<?php }}



	if (isset($_POST['update'])){
		$update_id=$_GET['edit_form'];
		$id1=$_POST['id_korisnika'];
		$ime1=$_POST['ime_prezime'];
		$email1=$_POST['mail'];
		$user1=$_POST['korisnicko_ime'];
		$lozinka1=$_POST['lozinka'];
		
if($id1==''||$ime1==''||$email1==''||$user1==''||$id_grad1==''||$lozinka1=='')
{
	echo"<script>alert('nesto nije dobro');</script>";
	exit();
}
else{
$upit_update="UPDATE korisnici SET id_korisnika='$id1', ime_prezime='$ime1', mail='$email1', korisnicko_ime='$user1',lozinka='$lozinka1' where id_korisnika='$update_id'";
if(mysqli_query($conn,$upit_update)){
echo"<script>alert('Uspesno je izmenjen podatak');</script>";
echo"<script>window.open('korisnici.php','_self');</script>";
exit();
}
}

/* if($id1==''||$ime1==''||$email1==''||$user1==''||$id_grad1==''||$lozinka1==''){
	echo"<script>alert('nesto nije dobro');</script>";
	exit();
}
else{
$upit_update="UPDATE korisnici SET id_korisnika='$id1', ime_prezime='$ime1', mail='$email1', korisnicko_ime='$user1',lozinka='$lozinka1' where id_korisnika='$update_id'";
	if(mysqli_query($conn,$upit_update)){
		echo"<script>alert('Uspesno je izmenjen podatak');</script>";
		echo"<script>window.open('korisnici.php','_self');</script>";
exit();
}
} */
}
mysqli_close($conn);
?>
				</div>

		   </div>
		   <div class="cisti"></div>
		   <div id="footer"><?php include('footer.php');?></div>
	
	 </div>
	
	</body>
</html>
<?php }
   else{
	   header('Location:index.php');
	   
   } 
 ?>
   