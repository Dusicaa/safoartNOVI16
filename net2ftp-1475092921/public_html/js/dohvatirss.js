
var xmlHttp=null;
function prikaziRSS(str){
	xmlHttp=GetXmlHttpObject();
	if(xmlHttp==null){
		
		
		alert("Browser ne podržava HTTP Request.");
		return;
	}
	var url="obradirss.php";
	url=url+"?rec="+str;
	xmlHttp.onreadystatechange=ispisVesti;
xmlHttp.open('GET',url,true);
xmlHttp.send(null);
}

function ispisVesti(){
	
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("rssVesti").innerHTML=xmlHttp.responseText;
		
	}
}