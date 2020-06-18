<html>
 <head>
    <meta charset="utf-8"/>
	 <meta name="description" content="Mobile shop">
  <meta name="keywords" content="Mobile shop">
  <meta name="author" content="Milos Tanaskovic">
	<link rel="stylesheet" href="register.css" type="text/css">
   <link href="stil.css" rel="stylesheet" type="text/css">
   
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
	   <li><a href="sidebar.php" class="navbar-brand btn btn-primary btn-lg active" ><span class="glyphicon glyphicon-user"></span>&nbsp;Korisnicki panel&nbsp;<span class="glyphicon glyphicon-log-out"></span></a></li>
	   
	   
		
		
	
	 </ul>
	 
	    
	 </div>
	 </div>
 </nav>
 
<!--kraj navigacije-->
 
   <div id="okvir">
     <div id="zaglavlje">
	   <img src="slike/logo.png" alt="mobile shop" width="997px" height="99px"/>
	   
	   <div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
            
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ Brand</span></h2>
                <h1 style="margin:0px;"><span class="largenav">Brand</span></h1>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                <div class="row">
                    <input class="flipkart-navbar-input col-xs-11" type="" placeholder="Search for Products, Brands and more" name="">
                    <button class="flipkart-navbar-button col-xs-1">
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="cart largenav col-sm-2">
                <a class="cart-button">
                    <svg class="cart-svg " width="16 " height="16 " viewBox="0 0 16 16 ">
                        <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
                    </svg> Link
                    <span class="item-number ">0</span>
                </a>
            </div>
        </div>
    </div>
</div>

 <div class="row" style="margin-bottom:10px;">
	 <div class="col-sm-12">
	 <div class="alert alert-danger fade in" style="margin:0px; padding:0px;">
	   <h3 style="margin-left:20px;">Poštovani admine, dobro došli na Mobilnishop.!<a href="#" data-dismiss="alert" aria-label="close">&times;</a></h3>
	 </div>
   </div>
   </div>
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
			  echo "<ul class='krug'><li><span class='glyphicon glyphicon-phone'></span>&nbsp;<a href='prikaz.php?id=".$red1['id_model']."'class='btn btn-info'>".$red1['naziv_modela']."</a></li></ul>";
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
	   
	  <h2>Unos proizvodjaca</h2>
	  
	  <form name="unos_proizvodjac" method="post" action="upis.php">
	    Unesite naziv proizvodjaca:
		<input type="text" name="tbproizvodjac" placeholder="Naziv proizvodjaca" />
		<input type="submit" value="Upis" name="upis_proizvodjac" class="btn btn-success" align="center"/> 
	  </form>
	  </hr>
	  <h2>Unos modela</h2>
	  
	  <form name="unos_model" method="post" action="upis.php">
	     
		 Izaberite proizvodjaca:
		 <select name="ddlproizvodjac">
		  <option value="Izaberite">Izaberite</option>
		  <?php 
		   include('ddl_lista.php');
		  ?>
		 </select>
		 </br></br>
		 Unesite naziv modela:
		 <input type="text" name="tbmodel" placeholder="Naziv modela"/><br/>
		 <input type="submit" name="upis_model" value="Upis" class="btn btn-success" style="text-align:center"/>
	  </form>
	  </hr>
	  <h2>Unos karakteristika telefona</h2>
	  <form name="unos_telefon" method="post" action="upis.php" enctype="multipart/form-data">
	  
	   <table>
	    <tr>
		 <td>Izaberite proizvodjaca</td>
		 <td>
		  <select name="ddlproizvodjac1" id="ddlproizvodjac1" onChange="prikaz();">
		    <option value="Izaberite">Izaberite</option>
			
			<?php 
			 include('ddl_lista.php');
			?>
		  </select>
		 </td>
		</tr>
		
		<tr>
		 <td>Izaberite model</td>
		 <td>
		  <span id="rezultat">
		   <select>
		    <option value="Izaberite">
			 Izaberite
			</option>
		<?php 
			 include('ddl_model.php');
			?>
		   </select>
		  </span>
		 </td>
		 
		 
		 <tr>
		  <td>Boja:</td>
		  <td>
		   <input type="text" name="tbboja" placeholder="Boja"/>
		  </td>
		 </tr>
		 
		 <tr>
		  <td>Kamera</td>
		  <td>
		   <input type="radio" name="rbkamera" value="Da"/>Da
		   <input type="radio" name="rbkamera" value="Ne"/>Ne
		  </td>
		 </tr>
		 
		 <tr>
		  <td>Status</td>
		  <td>
		   <input type="radio" name="rbstatus" value="Novi"/>Novi
		   <input type="radio" name="rbstatus" value="Polovni"/>Polovni
		  </td>
		 </tr>
		 
		 <tr>
		  <td>Slika:</td>
		  <td>
		   <input type="file" name="fslika" class="btn btn-info"/>
		  </td>
		 </tr>
		 
		 <tr>
		  <td>Cena:</td>
		  <td>
		   <input type="text" name="tbcena" placeholder="Cena"/>
		  </td>
		 </tr>
		 
		 <tr>
		  <td colspan="2" align="center">
		   <input type="submit" value="Upis" name="upis_telefon" class="btn btn-success">
		  </td>
		 </tr>
		</tr>
	   </table>
	  </form>
	  </hr>
	  </div>
	  
	  
	  <div id="sadrzaj_desno">
	   
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
		     
			 echo" <li><span class='glyphicon glyphicon-phone'></span>&nbsp;<a href='podkategorije.php?id=".$red3['id_proizvodjac']."'class='btn btn-info'>".$red3['naziv_proizvodjaca']."</a>&nbsp;<kbd>".$red3['broj']."</kbd></li>";
			 
		 }
		 echo"</ul>";
		 
		?>
	   </div>
	   
	   <div id="sadrzaj_desno_div">
	    <h2>NAJJEFTINIJI</h2>
		
		<?php 
		 $upit4="SELECT *, MIN(t.cena) as min_cena
		        FROM proizvodjac p, model m, telefon t
				WHERE p.id_proizvodjac=m.id_proizvodjac
				AND m.id_model=t.id_model
				GROUP BY t.cena,p.naziv_proizvodjaca LIMIT 5";
				
		$rezulatat4=mysql_query($upit4,$konekcija) or die ("Greska-upit4".mysql_error());
		echo "<table>";
		
		while($red4=mysql_fetch_array($rezulatat4)){
		     
			 echo"<tr><td><a href='prikaz.php?id=".$red4['id_model']."'class='btn btn-info'>".$red4[1]."-".$red4['naziv_modela']."</a></br><samp>Cena: ".$red4['min_cena'].".00&nbsp;din.</samp></td></tr>";
		}
		echo "</table>";
		include('kraj.php');
		?>
	   </div>
	  </div>
	 </div>
	<div>
	  <blockquote>
  <p>Poštovani admine, dobro došli na Mobilnishop.!</p>
  <footer class="text-primary">MobilniShop.com se bavi online prodajom mobilnih telefona najpoznatijih svetskih brendova kao što su Nokia, Samsung, Apple, LG, Sony, HTC, Blackberry, Motorola. Pored velikog izbora najnovijih modela, nudimo vam brzu i pouzdanu dostavu, niske, uvek proverene i ažurirane cene, kao i odgovore na sva vaša pitanja i probleme.<cite title="Source Title">Source Title</cite></footer>
</blockquote>
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
		  <li class="list-group-item" ><a href="https://www.facebook.com">Facebook</a></li>
		  <li class="list-group-item"><a href="https://www.linkedin.com">Linkedin</a></li>
		  <li class="list-group-item"><a href="https://mail.google.com">Gmail</a></li>
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