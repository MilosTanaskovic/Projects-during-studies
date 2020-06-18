/*function provera(){
	 var x1=document.formular.ime.value;
	 var x2=document.formular.email.value;
	 var x3=document.formular.tele.value;
	 var x4=document.formular.message.value;
	 
	 if(x1.length<2){
	 alert("Your name!");
	 }
    else if(x2==""){
	alert("Your email!");
	}
	else if(x3==""){
		alert("Zour namber phone")
	}
	else{
		location="mailto:milostanaskovic12@gmail.com?subject=Rezultat ankete&body=name:"+x1+"%0Aemail:"+x2+"%0ANamber phone:"+x3"%0AMesage "+x4;
		return;
	}
	
	 
}*/
function provera(){
	var name = document.getElementById("tbName");
	var regName = /^([A-Z][a-z]+\s)+([A-Z][a-z]+)|([A-Z][a-z]+)$/;
	var podaci = new Array;
	var greske = new Array;
	
	
	if(name.value.match(regName)){
		podaci.push(name.value);
	}
	else{
		greske.push("unesite ime");
	}
	
	
	var mail = document.getElementById("tbEmail");
	var regMail = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
	if(mail.value.match(regMail)){
		podaci.push(mail.value);
	}
	else{
		greske.push("unesite e mail");
	}
	
	/*var sub = document.getElementById("tbSubject");*/
	

	var message = document.getElementById("mesage");
	
	if(message.value==""){
		greske.push("unesite poruku");
	}
	else{
		podaci.push(message.value);
	}
	
	if(greske.length==0){
        var mailLink="mailto:milostanaskovic12@gmailgmail.com?subject="+sub.value+"&body="+message.value;
        window.location.href=mailLink;
		document.forma.submit();
    }
}