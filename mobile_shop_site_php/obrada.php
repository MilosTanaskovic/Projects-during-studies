<?php 
  
  
  @$proizvodjac=$_GET['id'];
  include('konekcija.php');
  $upit='SELECT *
         FROM model
		 WHERE id_proizvodjac='.$proizvodjac;
 $rezultat=mysql_query($upit,$konekcija) or die(
 "Greska-upit".mysql_error());
 
 echo "<select name='ddlmodel'>";
 echo "<option value='Izaberite' selected>Izaberite</option>";
 
 while($red=mysql_fetch_array($rezultat)){
	 
	 echo "<option value=".$red['id_model'].">".$red['naziv_modela']."</option>";
 }
  echo "</select>";
?>