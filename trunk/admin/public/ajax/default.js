function GetXmlHttpObject(handler){
    var objXMLHttp=null
    if (window.XMLHttpRequest){
        objXMLHttp=new XMLHttpRequest()
    }else if (window.ActiveXObject){
        objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
    }
    return objXMLHttp
}



// Will populate data based on input
function showArticle(location, src){
	var url=location+'/article.php?path='+location;

	if (src==0){
        document.getElementById('article_fk').innerHTML="<select name='jobs[article_fk]' disabled='disabled' style='width:500px'><option value='0'>Izaberite artikal</option></select> *";
		document.getElementById('articleType_fk').innerHTML="<select name='jobs[articleType_fk]' disabled='disabled' style='width:500px'><option value='0'>Izaberite tip artikla</option></select> *";
		document.getElementById('articleTypePrice_fk').innerHTML="";
        return;
    }
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null){
        alert ("Browser does not support HTTP Request");
        return;
    }

    xmlHttp.onreadystatechange=function(){
	    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
	            document.getElementById("article_fk").innerHTML= xmlHttp.responseText;
	    }else{
	            //alert(xmlHttp.status);
	    }
	};
    xmlHttp.open("GET",url,true) ;
    xmlHttp.send(null);
}


function showArticleType(location, src){
	var url=location+'/articleType.php?id='+src+'&path='+location;
	
	if (src==0){
        document.getElementById('articleType_fk').innerHTML="<select name='jobs[articleType_fk]' disabled='disabled' style='width:500px'><option value='0'>Izaberite tip artikla</option></select> *";
        document.getElementById('articleTypePrice_fk').innerHTML=""; 
        return;
    }
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null){
        alert ("Browser does not support HTTP Request");
        return;
    }

    xmlHttp.onreadystatechange=function(){
	    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
	            document.getElementById("articleType_fk").innerHTML= xmlHttp.responseText;
	    }else{
	            //alert(xmlHttp.status);
	    }
	};
    xmlHttp.open("GET",url,true) ;
    xmlHttp.send(null);
}

function showArticleTypePrice(location, src){
	var url=location+'/articleTypePrice.php?id='+src+'&path='+location;
	
	if (src==0){
        document.getElementById('articleTypePrice_fk').innerHTML=""; 
        return;
    }
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null){
        alert ("Browser does not support HTTP Request");
        return;
    }

    xmlHttp.onreadystatechange=function(){
	    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
	            document.getElementById("articleTypePrice_fk").innerHTML= xmlHttp.responseText;
	            document.getElementById("any_button").innerHTML="<input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>";
	    }else{
	            //alert(xmlHttp.status);
	    }
	};
    xmlHttp.open("GET",url,true) ;
    xmlHttp.send(null);
}

// Will populate data based on input
function calcArticleType(location, src){
	var url=location+'/articleType.php?id='+src+'&path='+location;
	
	if (src==0){
        document.getElementById('articleType_fk').innerHTML="<select name='jobs[articleType_fk]' disabled='disabled' style='width:500px'><option value='0'>Izaberite tip artikla</option></select> *";
        document.getElementById('articleTypePrice_fk').innerHTML=""; 
        return;
    }
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null){
        alert ("Browser does not support HTTP Request");
        return;
    }

    xmlHttp.onreadystatechange=function(){
	    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
	            document.getElementById("articleType_fk").innerHTML= xmlHttp.responseText;
	    }else{
	            //alert(xmlHttp.status);
	    }
	};
    xmlHttp.open("GET",url,true) ;
    xmlHttp.send(null);
}


function calcArticleTypePrice(location, src){
	var url=location+'/calcArticleTypePrice.php?id='+src+'&path='+location;
	
	if (src==0){
        document.getElementById('articleTypePrice_fk').innerHTML=""; 
        return;
    }
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null){
        alert ("Browser does not support HTTP Request");
        return;
    }

    xmlHttp.onreadystatechange=function(){
	    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
	            document.getElementById("articleTypePrice_fk").innerHTML= xmlHttp.responseText;
	    }else{
	            //alert(xmlHttp.status);
	    }
	};
    xmlHttp.open("GET",url,true) ;
    xmlHttp.send(null);
}

function getLiveResult(location, eventKey, newDivID, oldDivID){
	if (eventKey==0){
	        document.getElementById(newDivID).innerHTML=""; 
	        return;
	}
	xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null){
        alert ("Browser does not support HTTP Request");
        return;
    }
	var keyEvent = (eventKey) ? eventKey : window.event;
		
	var input = (eventKey.target) ? eventKey.target : eventKey.srcElement;
	
	if(keyEvent.type == "keyup"){
			if(input.value){
			var url=location +'/getLiveData.php?q='+input.value+'&newDiv='+newDivID+'&oldDiv='+oldDivID;

			xmlHttp.onreadystatechange=function(){
			    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			            document.getElementById(newDivID).innerHTML= xmlHttp.responseText;
			    }else{
			            //alert(xmlHttp.status);
			    }
			};
			xmlHttp.open("GET",url,true) ;
			xmlHttp.send(null);
			}else document.getElementById(newDivID).innerHTML= '';
			
	}
}

function getLiveResult2(location, eventKey, newDivID, oldDivID){
	if (eventKey==0){
	        document.getElementById(newDivID).innerHTML=""; 
	        return;
	}
	xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null){
        alert ("Browser does not support HTTP Request");
        return;
    }
	var keyEvent = (eventKey) ? eventKey : window.event;
		
	var input = (eventKey.target) ? eventKey.target : eventKey.srcElement;
	
	if(keyEvent.type == "keyup"){
			if(input.value){
			var url=location +'/getLiveData2.php?q='+input.value+'&newDiv='+newDivID+'&oldDiv='+oldDivID;

			xmlHttp.onreadystatechange=function(){
			    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			            document.getElementById(newDivID).innerHTML= xmlHttp.responseText;
			    }else{
			            //alert(xmlHttp.status);
			    }
			};
			xmlHttp.open("GET",url,true) ;
			xmlHttp.send(null);
			}else document.getElementById(newDivID).innerHTML= '';
			
	}
}

function fill(thisValue, newDivID, oldDivID) {

    document.getElementById(oldDivID).value=thisValue;
    document.getElementById(newDivID).innerHTML='';
}
