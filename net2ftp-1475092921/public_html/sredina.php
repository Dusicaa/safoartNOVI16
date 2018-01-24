<!--<div id="levo" > -->
<?php
         
             include('konn.php');
			 $upit="SELECT * FROM post ORDER BY id_post DESC";
			 $rezultat=mysqli_query($conn,$upit) or die("Greška u upitu!".mysqli_error());
			 
			   while($red=mysqli_fetch_array($rezultat)){
		  echo  ' <div class="post">
	       <div class="postNaslov">
			   <h3>'.$red["nazivPosta"].'</h3><br/>
			  </div>';
			  echo	  '<div class="postSlika">
				<img src='. $red["slika"].' width=200 height=100/>
				</div>';
			echo	'<div class="postTekst">			
				<p>'.$red["post"].'</p>
                </div>
		
				<div class="cisti"></div>
			   </div>';}
	   mysqli_close($conn);
	  ?>



<?php
/*
 if($_SESSION['id']){
 echo '<div id="desno" style="float:right;width:400px;margin:10px;">
 <div id="komentar">

<h2>Komentari</h2>
 
  
<form action="komentari.php" method="post">
Ostavi svoj komentar:<br/>
<textarea name="poruka" cols="24" rows="5"></textarea><br />
<input type="submit" value="Posalji" name="posalji"class="dugme" />
</form>
<br />

		
<a href="komentari.php"><h3>Vidi komentare<h3></a>		

 </div></div>';
 }
*/
 ?>



