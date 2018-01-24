<?php   
  @session_start();  
   ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>
	     <title>Komentari</title>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		  <meta name="description" content="Umetničke slike">
	      <meta name="keywords" content="slike,umetnost,ikone,priroda,morski motivi,prodaja slika,komentari">
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
		   <?php
include('konn.php');

$poruka = $_POST['poruka'];
if ($poruka!="")
{
	$ubaci = " INSERT INTO komentari (id_korisnika, poruka)
     				VALUES ('".$_SESSION['id']."', '".$_POST['poruka']."')";
    $upit = mysqli_query($conn,$ubaci);
	
    // promenite DESC u ASC ako zelite da izlaz bude sortiran od najstarije poruke ka najnovijoj
    $rezultat = mysqli_query($conn,"SELECT * FROM komentari ORDER BY id_komentara DESC");  
	
    while( $red = mysqli_fetch_array($rezultat))
    {
    	echo "<span  style=\"color:#F00\">$_SESSION[username]</span>";
        echo " <br>";
        echo $red['poruka'];
        echo " <br>";  
        echo " <br>";
	}
}
else
{
	$rezultat = mysqli_query($conn,"SELECT * FROM komentari ORDER BY id_komentara DESC");
    while($red = mysqli_fetch_array($rezultat))
    {
     	//ovde smo izabrali boju kojom ce biti prikazano ime komentatora
        echo "<span  style=\"color:#F00\">$red[korisnik]</span>";
        echo " <br>";
        echo $red['poruka'];
        echo " <br>";  
        echo " <br>";
     }
}
/* if (!$check1_res) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
} */
?>
			
		   </div>
		   <div id="footer"><?php include('footer.php');?></div>
			  
	 </div>
	
	</body>
</html>
