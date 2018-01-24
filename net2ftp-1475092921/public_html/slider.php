  
	 <script src="js/jquery-1.9.1.min.js"></script>
	<script>
	$(document).ready(function()
{
	
	slideShow();
	
	
});

function slideShow() 
{
  var current = $('#slider .show');
  var next = current.next().length ? current.next() : current.parent().children(':first');
  
  current.hide().removeClass('show');
  next.fadeIn().addClass('show');
  
  setTimeout(slideShow, 5000);
}
	</script>

			<div id='slider1_container'>
			<?php 
			include("konn.php");
			
			$upit="SELECT * FROM slider WHERE 1";
			$rezultat=mysqli_query($conn,$upit) or die ("Nije dobar upit slider".mysql_error()); 
			

			
			while($red=mysqli_fetch_array($rezultat))
			{	
				echo "<img src='".$red['putanjaSlike']."' class='show' alt='".$red['opisSlike']."' style='display:none;'/>";
			}
			
			?>
               
            </div>
            
	
  


