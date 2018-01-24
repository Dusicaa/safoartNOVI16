 <?php
 @session_start();
  include('konn.php');
$upit="SELECT * FROM menu WHERE roditelj=0 ORDER BY idMenu ASC";
$rezultat=mysqli_query($conn,$upit);

 echo '<ul id="menu" class="menu">';
 while($red=mysqli_fetch_array($rezultat)){
	 echo"<li><a href='".$red['link']."' >".$red['ime']."</a>";
     Podmeni($red['idMenu'],$conn);
	 echo"</li>";
 }

 
 if(isset($_SESSION['idUloge']))
			{
			?>
			<a href="logout.php">Logout</a>
			<?php }
			

 echo "</ul>";
 mysqli_close($conn);
  function Podmeni($roditelj,$conn)
		{
			$upit1="SELECT * FROM menu WHERE roditelj=$roditelj ORDER BY idMenu ASC";
			$rezultat=mysqli_query($conn,$upit1);
			$vratila_podmeni=mysqli_num_rows($rezultat);
			if($vratila_podmeni>0)
			{
				
				echo ("<ul >");
				while($red=mysqli_fetch_array($rezultat))
				{
					echo("<li><a href='".$red['link']."'>".$red['ime']."</a>");
					Podmeni($red['idMenu'],$conn);
					echo("</li>");
				}
				echo "</ul>";				
			}
		}
   
	
	?>