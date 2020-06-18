<html>
<head>
<link rel="stylesheet" href="register.css" type="text/css">
 <meta name="description" content="Mobile shop">
  <meta name="keywords" content="Mobile shop">
  <meta name="author" content="Milos Tanaskovic">
</head>
<script type="JavaScript">
 function prijavi(){
	 
	 var ime=document.getElementById('tbImePrezime').value;
	 var adresa=document.getElementById('tbAdresa').value;
	 var mail=document.getElementById('mail').value;
	 var lozinka=document.getElementById('lozinka').value;
	 var grad=document.getElementById('ddlGrad').value;
	 var pol=document.getElementsByName['rbPol'];
	 
	 var regIme=/^[A-Z][a-z]{2,10}(\s[A-Z][a-z]{2,10})+$/;
	 var regAdresa=/^([A-z]{2,10}\s)+\d+$/;
	 var regmail=/^\w+([\.]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	 
	 if(!ime.match(regIme)){
		 alert("Ime i prezime nisu u dobrom formatu!");
			return;
	 }
	 if(!adresa.match(regAdresa)){
		 alert("Nije dobro uneta adresa");
		 return;
	 }
	 if(!mail.match(regmail)){
		 alert("Mail nije u dobrom formatu");
		 return;
	 }
	 var forma = document.getElementById('forma');
		
		forma.action = "index.php?btnSubmit=1";
		
		
		forma.submit();
	 
 }
</script>

<body>

<?php
	include("konekcija.php");
	
	
?>	
	<div class="body-content">
  <div class="module">
    <h1>Napravi nalog</h1>
   <form method="POST" action="<?php print $_SERVER['PHP_SELF']; ?>" id="forma" name="forma" >
	     <table style="width:500px; margin:0 auto;">
		     
			 <tr>
			    <td>Ime i prezime:</td>
				<td>
				   <input type="text" class="styled" id="tbImePrezime" name="tbImePrezime" />
				</td>
			 </tr>
			 <tr>
			    <td>Adresa:</td>
				<td>
				   <input type="text"  id="tbAdresa" name="tbAdresa" />
				</td>
			 </tr>
			 <tr>
			  <td>Mail</td>
			  <td>
			  <input type="text" id="mail" name="mail" />
			  </td>
			 </tr>
			 
			
			 <tr>
			    <td>Grad:</td>
				<td>
<select class="styled" style="width:145px;" id="ddlGrad" name="ddlGrad">
 <option value="0">Izaberi...</option>
 <?php
	$upit = "SELECT id_grad, naziv_grada FROM grad ORDER BY naziv_grada";
	
	$rez = mysql_query($upit, $konekcija);
	
	while($r = mysql_fetch_array($rez))
	{
		echo "<option value='".$r['id_grad']."'>".$r['naziv_grada']."</option>";
	}
 ?>
</select>
				</td>
			 </tr>
			
			 <tr>
			    <td>Pol:</td>
				<td>
				   <input type="radio" name="rbPol" value="M" /> Muški <br/>
				   <input type="radio" name="rbPol" value="Z" /> Ženski <br/>
				</td>
			 </tr>
			  <tr>
			  <td>Korisnicko ime</td>
			  <td>
			  <input type="text" id="tbUser" name="tbUser" />
			  </td>
			 </tr>
			  <tr>
			  <td>Lozinka</td>
			  <td>
			  <input type="password" id="lozinka" name="tbPassword" />
			  </td>
			 </tr>
			 <tr>
			    <td colspan="2" align="center">
				    <input type="submit" class="btn btn-primary btn-block" value="Prijavi" class="button" id="btnSubmit" name="btnSubmit"  />
				</td>
			 </tr>
		 </table>
	  
	  </form>

	<?php
	if(isset($_REQUEST['btnSubmit'])){
		$ime = $_REQUEST['tbImePrezime'];
		
		$adresa = $_REQUEST['tbAdresa'];
		$mail=$_REQUEST['mail'];
		
		@$pol=$_REQUEST['rbPol'];
		$id_grad = $_REQUEST['ddlGrad'];
		$user=$_REQUEST['tbUser'];
		$password=$_REQUEST['tbPassword'];
		
		$regIme="/^[A-Z]{1}[a-z]{2,9}(\s[A-Z]{1}[a-z]{2,9})+$/";
		//$regmail="/^\w+([\.]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;";
		
		$greske = array();
		$podaci = array();
		
		if(!preg_match($regIme,$ime)){
			$greske[] = "Ime i prezime nisu u dobrom formatu!";
		}
		if(!$adresa){
			$greske[]="Adresa nije u dobrom formatu";
		}
	//if(@!preg_match($regmail,$mail)){
		//	$greske[]="Mail nije u dobrom formatu";
	//	}
		if(empty($pol)){
			$greske[]="Izaberite pol";
		}
		if($id_grad=="0"){
			$greske[]="Izaberite grad";
		}
		if(count($greske) != 0)
	{
		
		foreach($greske as $g)
		{
			echo $g ." <br/>";
		}
	}else{
		
		$upit_upis = "INSERT INTO korisnici1 VALUES('','$ime', '$adresa','$mail','$pol',$id_grad,'$user','$password')";
		
		
		$rez_upis = mysql_query($upit_upis, $konekcija);
		if($rez_upis){
			$upit="SELECT id_korisnik1 FROM korisnici1 WHERE user='$user'";
			$rez=mysql_query($upit);
			if(mysql_num_rows($rez)==1){
				$red=mysql_fetch_array($rez);
				$upit1="INSERT INTO uloga_korisnici VALUES('',2,".$red['id_korisnik1'].")";
				$rez1=mysql_query($upit1);
			}
		}
	}
	}
	 include('kraj.php');
	?>
  </div>
</div>
</body>
<html>