
<script type="text/javascript">
				function glasanje(){
					var for_chck=document.getElementsByName('rbAnketa');
					var b=false;
					for(var i=0; i<for_chck.length; i++){
						if(for_chck[i].checked){
							b=true;
							break;
						}
						b=false;
					}
					if(b){
						// xml object
						var httpObj=null;
						// xml request function for creation
						function xml_request_create(){
						  	var request=null;
							if(window.XMLHttpRequest)
								request=new XMLHttpRequest();
							
							else
								request=new ActiveXObject("Microsoft.XMLHTTP");
							
							var xmldoc;
							document.getElementById('anketa').innerHTML="";
							var grade=document.getElementsByName('rbAnketa');
							for(var i=0; i<grade.length; i++){
								if(grade[i].checked){
									var grd=grade[i].value;
									break;
								}
							}

							var url="anketa.php?rbAnketa="+grd;
							request.open("GET",url,true);
							request.onreadystatechange=function(){
								document.getElementById('anketaPrikaz').innerHTML=request.responseText;
							};
							request.send();							
						}
						// calling xml request
						xml_request_create();
					}
					else{
						alert("Niste odabrali ocenu!");
					}
				}
			</script>