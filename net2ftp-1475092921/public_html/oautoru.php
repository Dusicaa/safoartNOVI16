<?php @session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
include('konn.php'); ?>
<html>
    <head>
	     <title>O autoru</title>
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
		   <div id="sredina" class="borderimage" style="width:960px;height:500px;">
		  
		       <div id="tekstOmeni" style="font-family:cursive;min-height:300px">
				   <p align="center" class="postNaslov"><b>Umetnik | Hobista | Tradicionalna umetnost</b></p><br/>
				   <p >Marija Sapho, je mlada i perspektivna umetnica.
 Motivi za njena dela su bazirani na različitim temama:ljubav, primorje, istorija i religija.
 Njena dela rađena po porudzbini, krase neke od bitnijih religijskih institucija u Republici Srbiji. 
Takodje, neka od njenih bitnijih dela su bila izložena u Beogradskoj Nadbiskupiji, Galeriji opštine Vračar, Domu vazduhoplovstva u Zemunu.
 Svrha ove stranice je da stvori uniformni katalog njenih dela i da omogući kontakt sa drugim umetnicima i javnošću.
SaphoArt, prihvata porudzbine umetničkih dela. Sve informacije u vezi sa porudzbinama možete dobiti putem email adrese: marijasafa@gmail.com</p>

				 </div>
		   
		<div id='slikaOmeni'style="margin-left:10px;"><img src='galerija/safo.jpg' width=200 height=150/></div>
				 <div class="cisti"></div>
		   </div>
		   <div id="footer"><?php include('footer.php');?></div>			  
	 </div>
	
	</body>
</html>
