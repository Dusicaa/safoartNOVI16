function GetXmlHttpObject(){
	
	
	var xmlhttp=null;
	try{
		//firefox,opera ,safari
		xmlHttp=new XMLHttpRequest();
		
	}catch(e){
		//internet explorer
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
			
		}catch(e){
			
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
	}return xmlHttp;
}