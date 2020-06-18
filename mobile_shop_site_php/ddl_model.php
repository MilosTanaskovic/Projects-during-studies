	<?php 

 include('konekcija.php');
 
 $upit="SELECT *
         FROM model
		 ORDER BY naziv_modela";
 $rezultat=mysql_query($upit,$konekcija) or die ("Greska-upit".mysql_error());
 
 while($red=mysql_fetch_array($rezultat)){
	 
	 echo "<option value=".$red['id_model'].">".$red['naziv_modela']."</option>";
 }
?>