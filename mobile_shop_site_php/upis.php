<html>
 <head>
    <meta charset="utf-8"/>
	 <meta name="description" content="Mobile shop">
  <meta name="keywords" content="Mobile shop">
  <meta name="author" content="Milos Tanaskovic">
	<link rel="stylesheet" href="register.css" type="text/css">
   <link href="stil.css" rel="stylesheet" type="text/css">
   <link href="meni.css" rel="stylesheet" type="text/css">
   <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
   <script type="text/javascript" src="ajax.js"></script>
   
   <!-- sa boostrapom-->
   
   
  <meta name="viewport" content="width=device-width, initial-state=1"/>
  
  <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
   
 </head>
 <body>
 
 <!-- navigacija-->
 <nav class="navbar navbar-inverse navbar-fixed-top">
   <div class="container-fluid">
    <div class="navbar-header">
	 
	 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#losmi">
	   <span class="icon-bar"></span>
	   <span class="icon-bar"></span>
	   <span class="icon-bar"></span>
	   <span class="icon-bar"></span>
	 </button>
	</div>
	<div class="collapse navbar-collapse" id="losmi">
      <?php
	   echo "<ul class='nav navbar-nav'>";
	   include('konekcija.php');
	   $upit13="SELECT * FROM meni";
	   $rez13=mysql_query($upit13,$konekcija);
	   while($red13=mysql_fetch_array($rez13)){
		   echo "<li><a href='".$red13['link']."'>".$red13['ime_linka']."</a></li>";
	   }
	   echo "</ul>	";
	   
	  ?>
	 
	 <ul class="nav navbar-nav navbar-right">
	   <li><a href="sidebar.php" class="navbar-brand btn btn-primary btn-lg active" ><span class="glyphicon glyphicon-user"></span>Korisnicki panel<span class="glyphicon glyphicon-log-out"></span></a></li>
	   
	   
		
		
	
	 </ul>
	 
	    
	 </div>
	 </div>
 </nav>
 
<!--kraj navigacije-->
 
   <div id="okvir">
     <div id="zaglavlje">
	   <img src="slike/logo.png" alt="mobile shop" width="997px" height="99px"/>
	 </div>
	 <div id="sadrzaj">
	  <div id="sadrzaj_levo">
	   <div id="sadrzaj_levo_div">
	    <h2><a href="index.php" class="btn btn-primary">Pocetna strana</a></h2>
	   </div>
	   <?php 
	    // 1 php kod
		include('konekcija.php');
		$upit="SELECT *
		       FROM proizvodjac
			   ORDER BY naziv_proizvodjaca";
			   $rezultat=mysql_query($upit,$konekcija) or die("Greska-upit".mysql_error());
			   echo "<ul id='meni' class='krug'>";
			   
			   while($red=mysql_fetch_array($rezultat)){
			     echo "<li><a href='#'".$red['naziv_proizvodjaca']."</a>";
			$upit1="SELECT *
			        FROM model
					WHERE id_proizvodjac=".$red['id_proizvodjac'];
			$rezultat1=mysql_query($upit1,$konekcija) or die ("Greska-upit1".mysql_error());
			
			while($red1=mysql_fetch_array($rezultat1)){
			  echo "<ul class='krug'><li><span class='glyphicon glyphicon-phone'></span>&nbsp;<a class='btn btn-info' href='prikaz.php?id=".$red1['id_model']."'>".$red1['naziv_modela']."</a></li></ul>";
			}
			echo "</li>";
			   }
			   echo "</ul>";
	   ?>
	   <div id="sadrzaj_levo_div">
	    <h2>Anketa</h2>
		Najbolji proizvodjac?<br/>
		<form name="ankete" method="post" action="index.php">
		 <?php 
		   // pocetak 2 php koda
		   $upit6="SELECT *
		           FROM anketa
				   ORDER BY odgovor";
		   $rezultat6=mysql_query($upit6,$konekcija) or die ("Greska-upit6".mysql_error());
		   while($red6=mysql_fetch_array($rezultat6)){
		     echo "<input type='radio' name='rbanketa' value='".$red6['id_anketa']."'>&nbsp;".$red6['odgovor']."<br/>";
		   }
		  
		 ?>
		 <input type="submit" name="btnglasaj" value="Glasaj" class="btn btn-success">&nbsp;&nbsp;<input type="submit" name="btnrezultat" value="Rezultat" class="btn btn-success">
		 </form>
		 
		 <?php 
		      @$dugme_glasaj=$_POST['btnglasaj'];
			  @$dugme_rezultat=$_POST['btnrezultat'];
			  
			  if(isset($dugme_glasaj)){
			   $odgovor=$_POST['rbanketa'];
			   $upit7="UPDATE anketa 
			           SET rezultat=rezultat+1
					   WHERE id_anketa=".$odgovor;
				$rezultat7=mysql_query($upit7,$konekcija) or die("Greska-upit7".mysql_error());
				
				if($rezultat7){
				 echo "Vas glas je upisan!";
				}
				
		$upit8="SELECT *
		        FROM anketa";
		$rezultat8=mysql_query($upit8,$konekcija) or die("Greska-upit8".mysql_error());
		echo "Rezultati ankete";
		echo "<table>";
		
		while($red8=mysql_fetch_array($rezultat8)){
		    echo "<tr><td>".$red8['odgovor']."</td><td>".$red8['rezultat']."</td></tr>";
		}
		echo "</table>";
			  }
		 ?>
		
	   </div>
	  </div>
	  
	  <div id="sadrzaj_centar">
	    
		<?php 
		
		@$dugme_proizvodjac=$_POST['upis_proizvodjac'];
		@$dugme_model=$_POST['upis_model'];
		@$dugme_telefon=$_POST['upis_telefon'];
		
		if(isset($dugme_proizvodjac)){
			
			$proizvodjac=$_POST['tbproizvodjac'];
			$upit6="INSERT INTO proizvodjac
			        VALUES ('','$proizvodjac')";
			$rezulatat6=mysql_query($upit6,$konekcija) or die ('Greska-upit6'.mysql_error());
			
			if($rezulatat6){
				
				echo "Uspesno ste izvrsili upisivanje novog proizvodjaca<br/>";
				echo "<a href='unos.php'>Povratak na unos</a>";
			}
		}
		
		if(isset($dugme_model)){
			
			@$proizvodjac=$_POST['ddlproizvodjac'];
			@$model=$_POST['tbmodel'];
			@$boja=$_POST['tbboja'];
			@$kamera=$_POST['rbkamera'];
			@$status=$_POST['rbstatus'];
			@$cena=$_POST['tbcena'];
			
			@$fileName=$_FILE['fslika']['name'];
			@$tmpName=$_FILE['fslika']['tmp_name'];
			@$error=$_FILE['fslika']['error'];
			
			if($proizvodjac=="Izaberite"){
				echo"Morate izabrati proizvodjaca";
				echo"<p><a href='javascript:history.go(-1)'>Nazad na formu</a></p>";
				exit;
			}
			else if($model=="Izaberite"){
				echo"Morate izabrati model";
				echo"<p><a href='javascript:history.go(-1)'>Nazad na formu</a></p>";
				exit;
			}
			else if($boja==""){
				echo"Morate izabrati boju";
				echo"<p><a href='javascript:history.go(-1)'>Nazad na formu</a></p>";
				exit;
			}
			else if($kamera==""){
				echo"Morate izabrati da li telefon poseduje kameru!";
				echo"<p><a href='javascript:history.go(-1)'>Nazad na formu</a></p>";
				exit;
			}
			else if($status==""){
				echo"Morate izabrati status telefona!";
				echo"<p><a href='javascript:history.go(-1)'>Nazad na formu</a></p>";
				exit;
			}
			else if($cena==""){
				echo"Morate upisati cenu!";
				echo"<p><a href='javascript:history.go(-1)'>Nazad na formu</a></p>";
				exit;
			}
			else if($greske!=0){
				echo"Greske vezane za sliku!";
				echo"<p><a href='javascript:history.go(-1)'>Nazad na formu</a></p>";
				exit;
			}
			else{
				if(move_uploaded_file($tmpName,$folderSlike.$fileName)){
					$upit8="INSERT INTO telefon 
					        VALUES('',$model,'$boja','$kamera','$status','$fileName',$cena)";
					$rezultat8=mysql_query($upit8,$konekcija) or die ("greska-upit8".mysql_error());
					
					if($rezultat8){
						echo "Podaci su upisani!</br>";
						echo "<a href='unos.php'>Nazad na unos</a>";
					}
				}
			}
		}
		?>
		
		
	  </div>
	  
	  <div id="sadrzaj_desno">
	   <div id="sadrzaj_desno_div">
	    <h2><a href="unos.php" class="btn btn-primary">UPIS</a></h2>
	   </div>
	   <div id="sadrzaj_desno_div">
	    <h2>KATEGORIJE</h2>
		
		<?php 
		 
		 $upit3="SELECT p.id_proizvodjac,p.naziv_proizvodjaca, COUNT(p.id_proizvodjac) AS broj 
		 FROM proizvodjac p, model m
		 WHERE p.id_proizvodjac=m.id_proizvodjac
		 GROUP BY p.naziv_proizvodjaca, p.id_proizvodjac";
		 $rezulatat3=mysql_query($upit3,$konekcija) or die("Greska-upit3".mysql_error());
		 
		 echo "<ul class='krug'>";
		 while($red3=mysql_fetch_array($rezulatat3)){
		     
			 echo" <li><span class='glyphicon glyphicon-phone'></span>&nbsp;<a href='podkategorije.php?id=".$red3['id_proizvodjac']."'class='btn btn info'>".$red3['naziv_proizvodjaca']."</a>&nbsp;&nbsp;<kbd>".$red3['broj']."</kbd></li>";
			 
		 }
		 echo"</ul>";
		 
		?>
	   </div>
	   
	   <div id="sadrzaj_desno_div">
	    <h2>NAJEFTINIJI</h2>
		
		<?php 
		 $upit4="SELECT *, MIN(t.cena) as min_cena
		        FROM proizvodjac p, model m, telefon t
				WHERE p.id_proizvodjac=m.id_proizvodjac
				AND m.id_model=t.id_model
				GROUP BY t.cena,p.naziv_proizvodjaca LIMIT 5";
				
		$rezulatat4=mysql_query($upit4,$konekcija) or die ("Greska-upit4".mysql_error());
		echo "<table>";
		
		while($red4=mysql_fetch_array($rezulatat4)){
		     
			 echo"<tr><td><a class='btn btn-info' href='prikaz.php?id=".$red4['id_model']."'>".$red4[1]."-".$red4['naziv_modela']."</a></br>Cena: ".$red4['min_cena']."din.</td></tr>";
		}
		echo "</table>";
		include('kraj.php');
		?>
	   </div>
	  </div>
	 </div>
	 <div id="futer">
	   <div class="container-fluid ">
      <div class="row">
	    <div class="col-sm-4" style="margin-top:40px">
	 
	  <p style="text-align:justify;" >
	   Ukoliko smatrate da je ovaj sajt koristan i kvalitetan, podelite to sa vašim prijateljima 
klikom na ikonice društvenih mreža koje koristite:<span class="glyphicon glyphicon-menu-right"></span><span class="glyphicon glyphicon-menu-right"></span><span class="glyphicon glyphicon-menu-right"></span>
	  </p>
	  </div>
	  <div class="col-sm-4">
	    <ul class="list-group"  style="margin-top:20px;" >
		  <li class="list-group-item" ><a href="#">Facebook</a></li>
		  <li class="list-group-item"><a href="#">Linkedin</a></li>
		  <li class="list-group-item"><a href="#">Gmail</a></li>
		   <li class="list-group-item"><a href="#">Dokumentacija</a></li>
		</ul>
	  </div>
	  <div class="col-sm-4" style="text-align:center">
	    <a  href="https://www.youtube.com/watch?v=XaIt5wrdDUk" ><img src="slike/milos1.jpg" class="img-circle" width="100px" style="margin-top:20px"/></a>
		
		 <a  href="https://www.youtube.com/channel/UCYIxAZZDGKGzJuez0stpv8g"> <img src="slike/g.jpg" class="img-circle" width="100px"style="margin-top:20px"/>
		</a>
	  </div>
	  </div>
   </div>
	 </div>
   </div>
 </body>
 </html>