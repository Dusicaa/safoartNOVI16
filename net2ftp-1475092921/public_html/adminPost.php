	<?php 
  
  @session_start();
  include('konn.php');
   if($_SESSION['nazivUloge']=='admin'){
   ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html>
    <head>
	     <title>Admin-post</title>
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
    <br/><br/>
	<!--novi  post-->
	<form action="<?php print $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <?php
		
		echo "<table  style='text-align:center'>";
		echo "<tr><td align='left'>Naziv posta</td>
		           <td align='left'><input type='text' name='tbNazivPosta'></td></tr>
		      <tr> <td align='left'>Post</td>
				   <td align='left'><textarea rows='3' cols='22' name='txtPost' ></textarea></td></tr>
			  <tr>  <td align='left'>Slika</td>
				   <td><input type='file' name='fSlika'  /></td>
			</tr>";

	echo "<tr><td colspan='2' align='center'><input type='submit' value='unesi post' class='dugme' name='unesiPost'></td></tr>";
		echo "</table>";
		
	

        ?>
		</form>
		<span id="rezultatUnosaPostova">
			<?php 
		
		if(isset($_REQUEST['unesiPost'])){
		
		$nazivPosta=$_REQUEST['tbNazivPosta'];
		$post=$_REQUEST['txtPost'];
		
		$fname = $_FILES['fSlika']['name'];
	     $ftmp = $_FILES['fSlika']['tmp_name'];
	    $fsize = $_FILES['fSlika']['size'];
	    $ftype = $_FILES['fSlika']['type'];
	    $putanjaF="galerija/";
	    $pF=$putanjaF.$fname;

		$greske=array();
		if(empty($nazivPosta)){$greske[] = "Morate uneti naziv!";}
		if(empty($post)){$greske[] = "Morate uneti post!";}
		
		if(count($greske) == 0)
	{
				include("konn.php");
	           if($ftype=="image/jpg" || $ftype=="image/jpeg")
	      {
		           if( move_uploaded_file($ftmp,$pF))
				   {
				$upit="INSERT INTO post VALUES('','$post','$pF','$nazivPosta')";
				$rez3=mysqli_query($conn,$upit);
				if($rez3){echo "uspesno ste uneli post :)";}
				else{echo "Doslo je do greske :P";}
		           }
				    else
		           {echo "Doslo je do greske :P";}    
		
	       }
		   else
		   {echo "Podrzava samo JPG ili JPEG format slike :P";}
	}
	else
	{
				foreach ($greske as $greska){
					echo $greska."<br/>";
				}
			
	}
		}?>
		</span>
	
		<!--kraj novog posta-->
		<?php 
		include('konn.php');
		  if(isset($_REQUEST['btnBrisi']))
	{
		$za_brisanje = $_REQUEST['brisanje'];
		
		foreach($za_brisanje as $id)
		{
			$upit_br = "DELETE FROM post WHERE id_post=".$id;
			mysqli_query($conn,$upit_br)or die("greska u upitu".mysqli_error());
		}
	}
	$upit = "SELECT *
	FROM post ORDER BY id_post";
	
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
				   <th>Id posta</th>
				     <th>Naziv posta</th>
					<th>Post</th>
					<th>Slika</th>					
					
				</tr>
		<?php
		
		while($r = mysqli_fetch_array($rez))
		{
echo "<tr>
          <td>".$r['id_post']."</td>
		<td>".$r['nazivPosta']."</td>
		<td>".$r['post']."</td>
		<td><img src=".$r['slika']." width=30px height=30px/></td>
		
		<td><input type='checkbox' name='brisanje[]' value='".$r['id_post']."'></td>
		
		
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
   <form method="post" action="<?php echo $_SERVER['php_self'];?>">
	<table border='1' class='brisKor' style="margin:20px auto ">
		<tr>
			
				   <th>Id posta</th>
				     <th>Naziv posta</th>
					<th>Post</th>
					<th>Slika</th>					
			
		</tr>
<?php
include('konn.php');
	$upit = "SELECT *
	FROM post ORDER BY id_post";
	
	$run=mysqli_query($conn,$upit)or die("greska".mysqli_error());
	while($red=mysqli_fetch_array($run)){
	$id=$red['id_post'];
	$ime=$red['nazivPosta'];
	$post=$red['post'];
	$slika=$red['slika'];
	
?>    
		<tr>
		<td><?php echo $id?></td>
		<td><?php echo $ime?></td>
		<td><?php echo $post?></td>
		<td><img src="<?php echo "./".$slika ?>"width=40px height=40px/></td>
		<td><a href="izmena_posta.php?edit=<?php echo $id;?>">Izmeni</a></td>
		</tr>
<?php } 
mysqli_close($conn);
?>   <!--kraj izmena-- posta-->
	</table> 	
	
		 
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
   
	
