<?php
 $host='localhost';
 $korisnik='root';
 $lozinka='';
 $nazivBaze='mobilni_telefoni';
 // konekcija na server
 $konekcija=mysql_connect($host,$korisnik,$lozinka);
 // konek na bazu
 $baza=mysql_select_db($nazivBaze,$konekcija);
 
 $greske=array();
 if(!$konekcija){
	 $greske[]="Greska pri konekciji na server".mysql_error();
 }
 else{
	 if(!$baza){
		 $greske[]="Greska pri konek na bazu".mysql_error();
	 }
 }
 mysql_set_charset('utf8');
 ?>