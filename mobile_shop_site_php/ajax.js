var xmlHttp=null;
function GetXmlHttpObject();
{
	try{
		
		xmlHttp=new XMLHttpRequest();
		
	}
	catch(e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}
function setOutput(){
	if(xmlHttp.readyState=4){
		document.getElementById('rezultat').innerHTML=xmlHttp.responseText;
	}
}
function prikaz(){
	xmlHttp=GetXmlHttpObject();
	var proizvodjac=document.getElementById('proizvodjac1').value;
	
	if(xmlHttp!=null){
		xmlHttp.open("GET","obrada.php?id="+proizvodjac,true);
		xmlHttp.send(null);
		xmlHttp.onreadystatechange=setOutput;
	}
}