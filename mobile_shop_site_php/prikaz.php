<?php 
 @session_start();
  include("konekcija.php");
 if(isset($_POST['btnLogIn'])){
        
        $user = $_POST['tbUser'];
        $pass = $_POST['tbPassw'];
        
        $upit = "SELECT k.id_korisnik1, user, password, u.naziv_uloge FROM korisnici1 k INNER JOIN uloga_korisnici ug ON k.id_korisnik1 = ug.id_korisnik1 INNER JOIN uloge u ON u.id_uloge = ug.id_uloge WHERE user = '$user' AND password = '$pass'";
        $rez = mysql_query($upit);
        
        if(mysql_num_rows($rez)==1){
          
            $red = mysql_fetch_array($rez);
            
            $_SESSION['user'] = $user;
            $_SESSION['uloga'] = $red['naziv_uloge'];
            
        }
        else{
            echo "Logovanje nije uspelo";
        }
    }

?>
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
	  
	  if(isset($_SESSION['user'])){
            
            if($_SESSION['uloga'] == 'admin'){
                
                $upit = "SELECT * FROM meni";
                $rez = mysql_query($upit);
                echo "<ul class='nav navbar-nav'>";
                while($red = mysql_fetch_array($rez)){
                    echo "<li><a href='".$red['link']."'>".$red['ime_linka']."</a></li>";
                }
				 echo "</ul>";
            }
            else if($_SESSION['uloga'] == 'korisnici'){
                
                $upit = "SELECT * FROM meni WHERE id_uloge=2";
                $rez = mysql_query($upit);
                echo "<ul class='nav navbar-nav'>";
                while($red = mysql_fetch_array($rez)){
                    echo "<li><a href='".$red['link']."'>".$red['ime_linka']."</a></li>";
                }
				 echo "</ul>";
            }
			
        }
		else{
				$upit = "SELECT * FROM meni WHERE id_uloge=2";
                $rez = mysql_query($upit);
                echo "<ul class='nav navbar-nav'>";
                while($red = mysql_fetch_array($rez)){
                    echo "<li><a href='".$red['link']."'>".$red['ime_linka']."</a></li>";
                }
				 echo "</ul>";
			}
	  
	  
	   
	  ?>
	
	 <ul class="nav navbar-nav navbar-right">
	 
	     <li>
		 <?php if(isset($_SESSION['user']))
		 {
			 ?>
		 <a href="logout.php" class="navbar-brand btn btn-primary btn-lg active" >&nbsp;ODJAVA</a>
		 <?php }?>
		 </li>
	       &nbsp;
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
	 </div>
	 <div id="sadrzaj">
	  <div id="sadrzaj_levo">
	   <div id="sadrzaj_levo_div">
	    <button type="button" class="btn btn-denger" data-toggle="modal" data-target="#popUpWindow">Log in</button>

    <div class="modal fade" id="popUpWindow">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Prijavite se :D</h3>
                </div>

                <!-- body (form) -->
                <div class="modal-body">
                    <form name="form" action="index.php" method="post">
                        <div class="form-group">
     <input type="text" class="form-control" placeholder="Korisnik" name="tbUser" id="tbUser">
                        </div>
                        <div class="form-group">
     <input type="password" class="form-control" placeholder="Lozinka" name="tbPassw" id="tbPassw">
                        </div>
						 <div class="modal-footer">
    <button class="btn btn-primary btn-block" name="btnLogIn">Prijava </button>
                </div>

                    </form>
                </div>

               
            </div>
        </div>
    </div>
	    <h2><a href="index.php" class="btn btn-primary">Pocetna strana</a></h2>
	   </div>
	   
	   <?php 
	   
	    include('konekcija.php');
		
		$upit="SELECT *
		        FROM proizvodjac
				ORDER BY naziv_proizvodjaca";
				
		$rezultat=mysql_query($upit,$konekcija) or die("Greska-upit".mysql_error());
		
		echo "<ul id='meni' class='krug'>";
		
		while($red=mysql_fetch_array($rezultat)){
			echo "<li><a href='#' class='btn btn-info'>".$red['naziv_proizvodjaca']."</a>";
		
		$upit1="SELECT * 
		        FROM model 
				WHERE id_proizvodjac=".$red['id_proizvodjac'];
	 $rezultat1=mysql_query($upit1,$konekcija) or die("
	 Greska-upit1".mysql_error());
	 
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
	  
	   <?php 
	   
	    @$id_model=$_GET['id'];
		$folderSlike="slike/";
		
		if(isset($id_model)){
		 
		 $upit2="SELECT *
		         FROM proizvodjac p, model m, telefon t 
				 WHERE p.id_proizvodjac=m.id_proizvodjac
				 AND m.id_model=t.id_model
				 AND t.id_model=".$id_model;
		$rezultat2=mysql_query($upit2,$konekcija) or die
		("Greska-upit2".mysql_error());
		
		$broj=mysql_num_rows($rezultat2);
		
		if($broj==0){
		 echo "Trenutno ne postoji opis modela koji trazite";
		 
		}
		else{
		 echo "<table class='table table-striped' style='margin-top:100px;'>";
		 $rb=1;
		 
		 while($red2=mysql_fetch_array($rezultat2)){
		  if($rb%2==0){
		   echo "<tr><th align='left'>RB</th><td align='center' width='75px'>".$rb."</td><td rowspan='7' width='100px'><img src='".$folderSlike.$red2[3]."'height='140px' width='80px' class='img-thumbnail'></td></tr>
		   
		   
		   <tr><th align='left'>Proizvodjac</th><td align='center'>".$red2[1]."</td></tr>
		   
		   <tr><th align='left'>Model</th><td align='center'>".$red2[4]."</td></tr>
		   
		   <tr><th align='left'>Boja</th><td align='center'>".$red2[7]."</td></tr>
		   
		   <tr><th align='left'>Kamera</th><td align='center'>".$red2[8]."</td></tr>
		   
		   <tr><th align='left'>Status</th><td align='center'>".$red2[9]."</td></tr>
		   
		   <tr><th align='left'>Cena</th><td align='center'>".$red2[11]."</td></tr>
		   ";
		  }
		  else{
		  echo "<tr> <td rowspan='7'><img src='slike/".$red2['slika']."' height='200px' width='110px'></td><td align='center'>".$rb."</td><th align='right'>RB</th></tr>
		  
		  <tr><td align='center'>".$red2[1]."</td><th align='right'>Proizvodjac</th></tr>
		  
		  <tr><td align='center'>".$red2['naziv_modela']."</td><th align='right'>Model</th></tr>
		  
		  <tr><td align='center'>".$red2['boja']."</td><th align='right'>Boja</th></tr>
		  
		  <tr><td align='center'>".$red2['kamera']."</td><th align='right'>Kamera</th></tr>
		  
		  <tr><td align='center'>".$red2['status']."</td><th align='right'>Status</th></tr>
		  
		  <tr><td align='center'>".$red2['cena']."</td><th align='right'>Cena</th></tr>";
		  }
		  $rb++;
		 }
		 echo "</table>";
		}
		}
	   ?>
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
		     
			 echo" <li><span class='glyphicon glyphicon-phone'></span>&nbsp;<a href='podkategorije.php?id=".$red3['id_proizvodjac']."'class='btn btn-info'>".$red3['naziv_proizvodjaca']."</a>&nbsp;&nbsp;<kbd>".$red3['broj']."</kbd></li>";
			 
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