<?php  
  @session_start();
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>
	     <title>Prodaja slika</title>
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
		   <!-- prodaja slika za ulogovane korisnike-->   
		 <?php 
		 include('konn.php');
		 $upit="SELECT * FROM artikli WHERE 1";
         $rezultat=mysqli_query($conn,$upit)or die("greška u upitu!!!".mysqli_error());
	 
 while($red=mysqli_fetch_array($rezultat)){
	 echo"<div class='artikl'>
		 <p class='slika_artikla'><a href=".$red['putanjaArtikla']." style='outline-style:none;text-decoration:none;'>  
		  <img src=".$red['putanjaArtikla']." title style='opacity:1'width=50% height=50%/></a></p>
		 <p class='cena_artikla'>".$red['cena_artikla']."</p>
         <p class='naslov_artikla'>".$red['naslov_artikla']."</p>";
				
				 if(isset($_SESSION['id'])){
       ?>
				
				<form class="dodaj-u-korpu clearfix" action="korpa.php" method="GET">
				      <input type="text" name="<?php  echo $red['idArtikla'] ?>" value="1" class="kolicina"> 
                      <input type="hidden" name="sifra" value='<?php  echo $red['idArtikla'] ?>'>					  
					   <input type="checkbox" class="chbKorpa" name="order[]" value="<?php  echo $red['idArtikla'] ?>" >
					   <input type="submit" class="u-korpu" value="U KORPU" name="taster" ></form>
				</form>
 <?php	}
 echo' </div>';
 }
	 mysqli_close($conn);
 ?>	  	

	   </div>
		   <div class="cisti"></div>
		   <div id="footer"><?php include('footer.php');?></div>		  
	 </div>	
	</body>
</html>
