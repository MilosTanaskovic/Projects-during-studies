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
   <!--uvezen font-->
   <link href='http://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet' type='text/css'>
   <!-- sa boostrapom-->
   
   
  <meta name="viewport" content="width=device-width, initial-state=1"/>
  
  <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
   
   
   <!--video u boostrapu-->
   <link href='http://fonts.googleapis.com/css?family=Buenard:700' rel='stylesheet' type='text/css'>
<script src="http://pupunzi.com/mb.components/mb.YTPlayer/demo/inc/jquery.mb.YTPlayer.js"></script>

   
 </head>
 <body>
 
 <!-- navigacija-->
 <nav class="navbar navbar-inverse navbar-fixed-top  " >
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
	
	 </div>
	 
	 <div class="row" style="margin-bottom:10px;">
	 <div class="col-sm-12">
	 <div class="alert alert-danger fade in" style="margin:0px; padding:0px;">
	   <h3 style="margin-left:20px;">Dobrodosli u MobileShop...<a href="#" data-dismiss="alert" aria-label="close">&times;</a></h3>
	 </div>
   </div>
   </div>
	 
	 <div id="sadrzaj">
	  <div id="sadrzaj_levo">
	   <div id="sadrzaj_levo_div">
	   
	     <!-- boostrap -->
	   <!-- data-toggle lets you display modal without any JavaScript -->
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
   <!-- kraj boostrapa-->
	   
	    <div id="sadrzaj_levo_div">
		 <h2>SVI MODELI TELEFONA</h2>
		</div>
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
			     echo "<li ><a href='#' class='btn btn-info'>".$red['naziv_proizvodjaca']."</a>";
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
			   @$odgovor=$_POST['rbanketa'];
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
		echo "Rezultati ankete &nbsp; <span class='glyphicon glyphicon-hand-down'></span> ";
		echo "</br><table>";
		
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
		
		 @$dugme_promena=$_POST['promena'];
		 if(isset($dugme_promena)){
			 $upit10="UPDATE telefon 
			          SET status_slika=0";
			$rezultat10=mysql_query($upit10,$konekcija) or die ('Greska-upit10'.mysql_error());
			
			@$cekiraneStavke=$_POST['cekirano'];
			
			foreach($cekiraneStavke as $check){
				
				 $upit11="UPDATE telefon 
				          SET status_slika='1'
						  WHERE id_telefon=$check";
				$rezultat11=mysql_query($upit11,$konekcija) or die('Greska-upit11'.mysql_error());
				}
				$tbBroj=1;
				$brojKolona=4;
				
				$upit12="SELECT *
				         FROM proizvodjac p, model m, telefon t
						 WHERE p.id_proizvodjac=m.id_proizvodjac AND m.id_model=t.id_model AND status_slika='1'";
				$rezultat12=mysql_query($upit12,$konekcija) or die ("Greska-upit12".mysql_error());
				
				echo "<table align='center'>";
				//echo "<tr><th colspan='5'>KARAKTERISTIKE </th></tr>";
				
				while($red12=mysql_fetch_array($rezultat12)){
					
					if($tbBroj==1)
						
						echo "<tr>";
					
						echo "<td><img src='slike/".$red12['slika']."' width='200px' height='230px'></br>".$red12[1]."-".$red12[4]."</td>";
						
						if($tbBroj==$brojKolona){
							echo"</tr>";
							
							$tbBroj=1;
							
				
						}
						else{
							$tbBroj++;
						} 
						
						if($tbBroj!=1){
							
							while($tbBroj<=$brojKolona){
								echo"<td>&nbsp;</td>";
								$tbBroj++;
							}
							echo"</tr>";
						}
						echo "</table>";
					}
					}
					else
					{
						
						$tbBroj=1;
						$brojKolona=4;
						$upit9="SELECT *
						        FROM proizvodjac p, model m, telefon t
						        WHERE p.id_proizvodjac=m.id_proizvodjac AND m.id_model=t.id_model";
					$rezulatat9=mysql_query($upit9,$konekcija) or die ("greska-upit9".mysql_error());
					
					echo "<form name='promenaChexbox' action='index.php' method='post'>";
					echo "<table align='center'>";
					
					while($red9=mysql_fetch_array($rezulatat9)){
						$putanja = $red9['slika'];
						if($tbBroj==1)
							echo "<tr>";
					$cekirano=($red9['status_slika']=='1')?'checked="checked"':'';
					echo "<td>
				<a data-fancybox=\"gallery\" href=\"slike/$putanja\"><img src=\"slike/$putanja\" width='120px' height='160px'></a>
					</td>
					<td><input type='checkbox' name='cekirano[]' value='".$red9['id_telefon']."'".$cekirano."></td>";
					
					if($tbBroj==$brojKolona){
						echo "</tr>";
						$tbBroj=1;
					}
					
					else
					{
						$tbBroj++;
					}
					
						}
			if($tbBroj!=1){
				
				while($tbBroj<=$brojKolona){
					echo" <td>&nbsp;</td>";
					$tbBroj++;
				}
				echo"</tr>";
			}
			echo"<tr><td colspan='4' align='center'><input type='submit' name='promena' value='Promeni' class='btn btn-success'>";
			
			echo "</table>";
			echo"</form>";
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
		     
			 echo" <li><span class='glyphicon glyphicon-phone'></span>&nbsp;<a href='podkategorije.php?id=".$red3['id_proizvodjac']."'class='btn btn info'>".$red3['naziv_proizvodjaca']."</a>&nbsp;&nbsp;<kbd>".$red3['broj']."</kbd></li>";
			 
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
	   
	   <!-- video boostrap-->
	   <div id="sadrzaj_desno_div">
	     <div class="embed-responsive embed-responsive-16by9"> 
		 <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FNokiaMobile%2Fvideos%2F487196228335452%2F&show_text=0&width=560" width="200" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true" class="img-rounded"></iframe>
		 
		</div>
		</div>
	    </br></br>
		 <div id="sadrzaj_desno_div">
	     <div class="embed-responsive embed-responsive-16by9"> 
		<iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FTelefonySamsung%2Fvideos%2F1241663635870827%2F&show_text=0&width=560" width="200" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true" class="img-rounded"></iframe>
		 
		</div>
		</div>
		<br/></br>
		<div id="sadrzaj_desno_div">
	     <div class="embed-responsive embed-responsive-16by9"> 
		 <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FHuaweimobileRS%2Fvideos%2F1355694544476377%2F&show_text=0&width=300" width="200" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true" class="img-rounded"></iframe>
		 
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
		   <li class="list-group-item"><a href="dokumentacija.pdf">Dokumentacija</a></li>
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
  <link  href="fancybox-3.0/dist/jquery.fancybox.min.css" rel="stylesheet">
<script src="fancybox-3.0/dist/jquery.fancybox.min.js"></script>
 </body>
 
 </html>
