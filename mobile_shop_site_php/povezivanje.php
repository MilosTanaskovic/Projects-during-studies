<?php 
 include('konekcija.php');
 
 $upit="SELECT * 
	FROM model m 
	
	WHERE naziv_modela LIKE '%'".$_GET['search']."'%'";
  $rezultat=mysql_query($upit,$konekcija) or die("Greska-upit".mysql_error());
  
  $row_cnt=$rezultat->num_rows;
  
  if($row_cnt>0){
	  
	  echo "
	    <h4 align='center'>Rezultati pretrage</h4>
		<div class='table-responsive'>
		 <table class='table table bordered'>
		 <tr>
		 <th>Naziv</th>
		 <th>Idmodela</th>
		 <th>Idproizvodjac</th>
		 <th>link</th>
		 
		 </tr>";
		 
		 while($row=$result->fetch_assoc()){
			 $ime=$row['naziv_modela'];
			 $Idmodel=$['id_model'];
			 $Idpoizvodjac=$['id_proizvodjac'];
			 $link=['link_model'];
			 
			 ?>
<tr>
<td>
 <?php echo $ime ?>
</td>
<td>
 <?php echo $Idmodel ?>
</td>

<td>
 <?php echo $Idpoizvodjac ?>
</td>
<td>
 <?php
  echo $link
 ?>
</td></tr>
		<?php }
		 
		 
  }else{
	  echo "Nema rezultata";
  }
