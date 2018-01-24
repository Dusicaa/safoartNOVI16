	<?php 
  
  @session_start();
  include('konn.php');
   if($_SESSION['nazivUloge']=='admin'){
   ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html>
    <head>
	     <title>Admin-izmena slika</title>
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
	<script type="text/javascript" src="js/adminKor.js"></script>

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
		  
		   <div id="sredina" style="margin:20px auto;text-align:center;">
	
           <h1>Admin panel</h1>
				  <a href="view_meni.php"> Meni </a>  |
		         <a href="korisnici.php"> Korisnici </a>  |
		   <a href="adminSlike.php">Uredi galeriju slika</a>      |
		  <a href="adminPost.php">Uredi postove</a> 
    
		
		<?php 
		include('konn.php');
		  if(isset($_REQUEST['btnBrisi']))
	{
		$za_brisanje = $_REQUEST['brisanje'];
		
		foreach($za_brisanje as $id)
		{
			$upit_br = "DELETE FROM korisnici WHERE id_korisnika=".$id;
			mysqli_query($conn,$upit_br)or die("greska u upitu".mysqli_error());
		}
	}
	$upit = "SELECT *
	FROM galerija ORDER BY idGal";
	
	$rez = mysqli_query($conn,$upit);
	
	if(mysqli_num_rows($rez) == 0)
	{
		echo "Trenutno nema zapisa u bazi !";
	}
	else
	{
		?>
		<form method="post" action="<?php echo $_SERVER['php_self'];?>">
		
			<table border='1'style="margin:auto;margin:30px auto;" class="brisKor">
				<tr>
				     <th>Ime galerije</th>
					<th>Opis galerije</th>
					<th>Slika</th>					
					<th>Brisanje</th>
				</tr>
		<?php
		
		while($r = mysqli_fetch_array($rez))
		{
echo "<tr>
          <td>".$r['imeGal']."</td>
		<td>".$r['opisGal']."</td>
		
		<td><img src=".$r['putanjaGal']." width=30px height=30px/></td>
		
		<td><input type='checkbox' name='brisanje[]' value='".$r['idGal']."'></td>
		
		
	  </tr>";
		}
echo "<tr>
		<td colspan='4' align ='center'>
		
			<input type='submit' name='btnBrisi' value='Izbrisi'class='dugme'/>
			
		</td>
	  </tr>
	 </table>
	</form>";		
	}
	mysqli_close($conn);
?>

		

				 
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
   
	
