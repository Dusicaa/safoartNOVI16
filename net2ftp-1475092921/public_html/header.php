<?php
@session_start();


	if(isset($_POST['btnLogovanje']))
{
	$korisnickoIme=$_POST['tbKorIme'];
	$lozinka=$_POST['tbLozinka'];
	//promeni u ovom upitu tvoje podatke iz baze
	$upit="SELECT * FROM korisnici k JOIN uloge u
	   ON k.id_uloge=u.id_uloge WHERE k.korisnicko_ime='".$korisnickoIme."' AND k.lozinka='".$lozinka."'";
	
	include("konn.php");
	$rezultat=mysqli_query($conn,$upit) or die ("upit nije izvrsen!".mysqli_error());
	if(mysqli_num_rows($rezultat)==1)
	{	
		$red=mysqli_fetch_array($rezultat);
		
		
		$_SESSION['idUloge']=$red['id_uloge']; // i ovo je uloga moze biti 1 ili 2 ako je 1 onda je admin ako je 2 onda je korisnik
		$_SESSION['nazivUloge']=$red['uloga'];
		$_SESSION['id']=$red['id_korisnika']; 
		$_SESSION['username']=$red['korisnicko_ime']; 
		
		  if($_SESSION['nazivUloge']=='admin'){
			
			header('Location:admin.php');
		  }
			else{
			header('Location:index.php');
	}	
	}
	
	else
	{
		echo 'Ne postoji korisnik sa tim korisnickim imenom i lozinkom';
	}
}

?>
	
<div id="loginforma">

			<form method="POST" >
			
	     <table style=" margin:0 auto;">
		 
		 <tr>
			    <th colspan="2" > Logovanje</th>
				
			 </tr>

			 <tr>
			    <td>Korisničko ime:</td>
				<td>
				   <input type="text" class="styled" name="tbKorIme" />
				</td>
			 </tr>
			 <tr>
			    <td>Lozinka:</td>
				<td>
				   <input type="password" class="styled" name="tbLozinka" />
				</td>
			 </tr>
			 <tr>
			    <td colspan="2" align="center">
				    <input type="submit" value="Prijavi" class="ulogujse" name="btnLogovanje"/>
				</td>
			 </tr>
			 
		 </table>
	  </form>


</div>
<div id="logo">
<a href="index.php">
        <!--  <div id="slikaLogo">
         <img src="img/headerfoto.jpg" height=150 width=100/>
		 </div> -->
		 <div id="textLogo">
          <h1>SafoArt</h1>
		  </div>
		  </a>
</div>
<div id="search_descr">
		  <div class="descr"><?php 	
			if(isset($_SESSION['idUloge'])){
				
			print "Dobrodošli:".$_SESSION['username']."['".$_SESSION['nazivUloge']."']";
			}
			?>
			</div>
			<div class="search">
			<form>
			<p><h3>Pretraga slika</h3></p>
<input type="text" size="30" id="tbTrazi"onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form>

			
			</div>
	</div>
		  <div class="cisti"></div>

                