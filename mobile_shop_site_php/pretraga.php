 <!-- <html>
 <head>
 <title>Pretraga pomocu ajaxa, bez refresovanja</title>
 
  <!-- sa boostrapom
   
   
  <meta name="viewport" content="width=device, initial-state=1"/>
  
  <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
   
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
   
 </head>
 <body> -->
 <?php 
 echo " 
  <div class='container'>
  </br>
  <div class='form-group' width='200px'>
   <div class='input-group' >
    <span class='input-group-addon'>Pretraga proizvoda</span>
	<input type='text' name='search' id='search' placeholder='Unesite reci za pretragu' class='form-control' />
   </div>
  </div>
  <br/>
  <div id='result'>
   
  </div>
  </div>
 
 ";
 ?>
 
<script language="JavaScript">
 
 $(document).ready(function(){
 
  $('#search').keyup(function(){
   
   var txt=$(this).val();
   if(txt!=''){
   
   $.ajax({
    
	url:"povezivanje.php",
	method:"get",
	data:{search:txt},
	dataType:"text",
	sucess:function(data){
	 $('#result').html(data);
	}
   });
   
   }
   else{
   $('#result').html('');
   }
  });
 });
</script>