<?php 

 include('konekcija.php');
 
 $upit5="SELECT *
         FROM proizvodjac
		 ORDER BY naziv_proizvodjaca";
 $rezultat5=mysql_query($upit,$konekcija) or die ("Greska-upit5".mysql_error());
 
 while($red5=mysql_fetch_array($rezultat5)){
	 
	 echo "<option value=".$red5['id_proizvodjac'].">".$red5['naziv_proizvodjaca']."</option>";
 }
?>