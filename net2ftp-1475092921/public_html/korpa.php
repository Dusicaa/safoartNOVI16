<?php 
  @session_start();
  
  	if(isset($_SESSION['id'])){
	
   ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>
	     <title>Korpa</title>
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
		  
		   <div id="sredina">
		      <div class="okvir-u-sadrzaju">
			      <div id="nazad-u-kupovinu"><<<
				  <a href="prodaja.php">Povratak u kupovinu</a></div>
			    <p class="naslov-korpe">Sadržaj korpe</p>
				
			<!--kod za korpu-->
<?php
	
	if(isset($_REQUEST['taster'])){
		
		$cekirani=$_POST['order'];
		include("konn.php");
		foreach((array)$cekirani as $cek){
			$kol==array($c);
			$datum=@date('d.m.Y');
			$upit_cekiranih='INSERT INTO korpa VALUES("",$cek,$kol,$_SESSION["id"],$datum)';
		mysqli_query($conn,$upit_cekiranih);
	
		}
		
	
         
			 	  $upit_ispis = "SELECT * FROM  artikli WHERE idArtikla='.$cekirani'";
		
		          $rez_ispis = mysqli_query($conn,$upit_ispis);
             while($red = mysqli_fetch_array($rez_ispis))
                { 
			        ?> <form action="korpa.php" method="GET">
					<?php 
                  echo '   <table id="velika-korpa" cellpadding="1" cellspacing="1">
				   <tr>
				       <th width="10%">Slika</th>
					   <th width="10%">Proizvod</th>
					   <th width="10%">MP cena</th>
					   <th width="10%">Kolicina</th>
					   <th width="10%">Ukupna cena</th>
					   <th width="10%">Izbaci iz korpe</th>
				   </tr>';
				echo' <tr>
				       <td align="center"><img src='.$red["putanjaArtikla"].' width="100" height="100"/></td>
					   <td align="center">'.$red["naslov_artikla"].'</td>
					   <td align="center">'. $red["cena_artikla"].'</td>
					   <td align="center">
					  <input type="hidden" name="sifra" value='.$red["idArtikla"].'>
						  <input type="hidden" name="korpa" value="VP">
						  <input type="text" name="kolicina" class="kolicina" value="1"> 
						  <input type="submit" value="Izmeni" class="dugme-izmeni ljubicasto-dugme oblo4">
		                 </td>
					   <td align="center">'. $red["cena_artikla"].'</td>
					   <td align="center">	
					   <input type="submit" class="dugme"value="Izbaci" name="btnIzbaci">
					   </td>
				 </tr>	  		   
	    	       <tr>
				      <td colspan="4" align="right">&nbsp;</td>
				       <td align="center" class="ukupna-cena">
				      <span>Ukupno:</span>
				       <br><b>'.$red["cena_artikla"].'</b><br><span>dinara</span></td>
				       <td colspan="1">&nbsp;</td>
				   </tr>
		</table>';} ?>
		</form>
			
				<div id="naruci-korpu">
				<form>
				<table >
				<tr>
				<td>
				 <input type="submit" value="Naruci robu iz korpe"  class="dugme" name="btnOrder" style="width:150px;"/></td></tr>		
				</table></form>
				 </div> 

	<?php
		if(isset($_REQUEST['btnOrder'])){
		$order1 = $_REQUEST['order'];
		if(count($order1) != 0){
			foreach($order1 as $id){
				$upit_ord = "SELECT imeArtikla FROM artikli WHERE idArtikla =".$id;
				$naruci = mysqli_query($conn,$upit_ord);
				
				while($r1 = mysqli_fetch_array($naruci)){	
					echo "Narucili ste:<p>".$r1['imeArtikla']."</p>";				
				}		
			}
		}	
	}
		
	}
	mysqli_close($conn);
	}
?>
	
  </div></div>
		   <div class="cisti"></div>
		   <div id="footer"><?php include('footer.php');?></div>
			  
	 </div>
	
	</body>
</html>

