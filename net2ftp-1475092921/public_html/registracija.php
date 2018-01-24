<?php 
@session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>
	     <title>Registracija</title>
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
		   <?php include("funkcije.php");include('konn.php');
if($conn)
{
if(isset($_REQUEST["signIn"]))
{
$imePrezime = $_REQUEST['imePrezime'];
$korisnicko_ime = $_REQUEST['korisnicko_ime'];
$mail = $_REQUEST['mail'];
$dan = isset($_REQUEST['dan']) ? $_REQUEST['dan'] : "";
$mesec = isset($_REQUEST['mesec']) ? $_REQUEST['mesec'] : "";
$godina = isset($_REQUEST['godina']) ? $_REQUEST['godina'] : "";
$pass = $_REQUEST['pass'];
$conPass = $_REQUEST['conPass'];
$pol = isset($_REQUEST['pol']) ? $_REQUEST['pol'] : "";
$regImePrezime = "/^[A-Z]{1}[a-z]{2,9}(\s[A-Z]{1}[a-z]{2,14})+$/";
$regKorIme="/^[A-z0-9]{3,}$/";
$regMail= "/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";


if(!preg_match($regImePrezime,$imePrezime))
{
echo "<div style='color:red'>Ime i prezime nisu u dobrom formatu</div>";
}
else if(!preg_match($regKorIme,$korisnicko_ime))
{
echo "<div style='color:red'>Korisničko ime nije u dobrom formatu</div>";
}
else if(!preg_match($regMail,$mail))
{
echo "<div style='color:red'>Mail nije u dobrom formatu</div>";
}
else if($dan == "0")
{
echo "<div style='color:red'>Izaberite dan</div>";
}
else if($mesec == "0")
{
echo "<div style='color:red'>Izaberite mesec</div>";
}
else if($godina == "0")
{
echo "<div style='color:red'>Izaberite godinu</div>";
}
else if($pass != $conPass)
{
echo "<div style='color:red'>Lozinke moraju biti istovetne</div>";
}
else if (empty($pol))
{
echo "<div style='color:red'>Izaberite pol</div>";
}
else
{
$upit_mail = "SELECT * FROM korisnici WHERE mail='".$mail."'";
$rez_mail = mysqli_query($conn,$upit_mail)or die("Greska ".mysqli_error());
if(mysqli_num_rows($rez_mail) != 0)
echo("User vec postoji");
else
{
$god = @mktime(0,0,0,$mesec, $dan, $godina);
$upit_dodaj = "INSERT INTO korisnici(id_korisnika,ime_prezime, korisnicko_ime, mail, god, lozinka, pol,id_uloge) 
VALUES('','$imePrezime', '$korisnicko_ime','$mail', $god, '$pass', '$pol',2)  ";
$rez_dodaj = mysqli_query($conn,$upit_dodaj)or die("Greska ".mysqli_error());
if($rez_dodaj)
{
echo("Uspešno ste napravili nalog!");
}
}
}
}
unset($conn);

}
?>
<form method="POST" action="<?php print $_SERVER['PHP_SELF'];?>" class="forma">
<div class="naslov_forme"><b>Registracija korisnika</b></div>
<table>
<tr>
<td class="naziv">Ime i prezime: </td>
<td> <input type="text" id="imePrezime" name="imePrezime" class="text-box"/>
</td>
</tr>
<tr>
<td class="naziv">Korisničko ime: </td>
<td> <input type="text" id="korisnicko_ime" name="korisnicko_ime" class="text-box"/>
</td>
</tr>
<tr>
<td class="naziv"> E-mail: </td>
<td> <input type="text" id="mail" name="mail" class="text-box"/></td>
</tr>
<tr>
<td class="naziv"> Datum: </td>
<td class="text-box">
<select id="dan" name="dan">
<option value='0'>D</option>
<?php echo(lista_dan(0)); ?>
</select>
-
<select id="mesec" name="mesec">
<option value='0'>M</option>
<?php echo(lista_mesec(0)); ?>
</select>
-
<select id="godina" name="godina">
<option value='0'>G</option>
<?php echo(lista_godina(0)); ?>
</select>
</td>
</tr>
<tr>
<td class="naziv"> Lozinka: </td>
<td> <input type="password" id="pass" name="pass" class="text-box"/></td>
</tr>
<tr>
<td class="naziv"> Lozinka ponovo: </td>
<td> <input type="password" id="conPass" name="conPass" class="text-box"/></td>
</tr>
<tr>
<td class="naziv"> Pol: </td>
<td class="text-box">
<span>Muški:<input type="radio" name="pol" value="M" /></span>
<span>Ženski:<input type="radio" name="pol" value="F" /></span>
</td>
</tr>
<tr>
<td colspan="2" >
<input type="submit" name="signIn" value="Prijava" id="submit" class="dugme"/>
<input type="reset" name="reset" value="Poništi" id="reset" class="dugme"/>
</td>
</tr>
</table>
</form>
		   
		   </div>
		   <div id="footer"><?php include('footer.php');?></div>
			  
	 </div>
	
	</body>
</html>

