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
    //Loading image start
	document.getElementById("loading").innerHTML = "<img src='http://admin.sky-express.rs/public/img/loading.gif' />";
	
    xmlHttp.onreadystatechange=function(){
	    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
	    		//Loading image over
				document.getElementById("loading").innerHTML = "";
	
	            //Here XML should be converted to String
	            var xmlDoc=xmlHttp.responseXML;
	            var onScreen = "<select name='jobs[article_fk]' style='width:500px' onChange='showArticleType(\""+location+"\", this.value)'>";
	            selectTag = xmlDoc.getElementsByTagName("article");
	            for (i=0; i<selectTag.length; i++){
	              onScreen = onScreen + "<option value='"+ selectTag[i].getElementsByTagName("value")[0].childNodes[0].nodeValue +"'>";
				  onScreen = onScreen + selectTag[i].getElementsByTagName("option")[0].childNodes[0].nodeValue;
				  onScreen = onScreen + "</option>";
				  }
				  onScreen = onScreen + "</select> *";
				  //Give that structure to div
				 // alert(onScreen);
				  document.getElementById("article_fk").innerHTML = onScreen;
				  //Reset XML

	    }else{
	            //alert(xmlHttp.status);
	    }
	};
    xmlHttp.open("GET",url,true) ;
    xmlHttp.send(url);
   
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
	//Loading image start
	document.getElementById("loading").innerHTML = "<img src='http://admin.sky-express.rs/public/img/loading.gif' />";
	
    xmlHttp.onreadystatechange=function(){
	    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
	    		//Loading image over
	    		document.getElementById("loading").innerHTML = "";
	    		
	    		//Here XML should be converted to String
	    		var xmlDoc=xmlHttp.responseXML;
	            var onScreen = "<select name='jobs[articleType_fk]' style='width:500px' onChange='showArticleTypePrice(\""+location+"\", this.value)' >";
	            selectTag = xmlDoc.getElementsByTagName("articleType");
	            //alert(selectTag.length);
	            for (i=0; i<selectTag.length; i++){
	              onScreen = onScreen + "<option value='"+ selectTag[i].getElementsByTagName("value")[0].childNodes[0].nodeValue +"'>";
				  onScreen = onScreen + selectTag[i].getElementsByTagName("option")[0].childNodes[0].nodeValue;
				  onScreen = onScreen + "</option>";
				  }
				  onScreen = onScreen + "</select> *";
				  //Give that structure to div
				//alert(onScreen);
	            document.getElementById("articleType_fk").innerHTML= onScreen;
	            //Reset XML
	    }else{
	            //alert(xmlHttp.status);
	    }
	};
    xmlHttp.open("GET",url,true) ;
    xmlHttp.send(url);
    
}

function showArticleTypePrice(location, src, criteria,order){
	var url=location+'/articleTypePrice.php?id='+src;
	
	if(criteria) url = url + "&criteria=" + criteria;
	if(order) url = url + "&order=" + order;
	url = url + '&path='+location;
	
	
	if (src==0){
        document.getElementById('articleTypePrice_fk').innerHTML="";  
        return;
    }
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null){
        alert ("Browser does not support HTTP Request");
        return;
    }
	//Loading image start
	document.getElementById("loading").innerHTML = "<img src='http://admin.sky-express.rs/public/img/loading.gif' />";
	
    xmlHttp.onreadystatechange=function(){
	    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
	    		//Loading image start
				document.getElementById("loading").innerHTML = "";
	
	    	
	           // document.getElementById("articleTypePrice_fk").innerHTML= xmlHttp.responseText;
	           var xmlDoc=xmlHttp.responseXML;
	           var onScreen = "<br/>";
	           selectTag = xmlDoc.getElementsByTagName("row");
	           //Set warning if there is no article
	           //alert(selectTag);
	            if(xmlDoc.getElementsByTagName("jobs_num")[0].childNodes[0].nodeValue == 0){
	            	 onScreen = onScreen + "\n<br/><div id='login_error'>Trenutno ne postoje artikli za zadati kriterijum!</div>";
	            }else{
	           if(xmlDoc.getElementsByTagName("number")[0].childNodes[0].nodeValue != 0)
	           		onScreen = onScreen + "\n<div id='login_warning'>Bazna licenca za izabrani artikal iznosi količinski: <strong>"+ xmlDoc.getElementsByTagName("number")[0].childNodes[0].nodeValue +"</strong> kom. i ona je obavezna.</div>\n";
	            
	           onScreen = onScreen + "\n<br/>\n<table>\n\t<tr>\n\t\t<td id='table_header_center'>"; 
	           articleTypePrice = (xmlDoc.getElementsByTagName("articleTypePrice")[0].childNodes[0].nodeValue ? xmlDoc.getElementsByTagName("articleTypePrice")[0].childNodes[0].nodeValue : '');          
	           criteria = xmlDoc.getElementsByTagName("criteria")[0].childNodes[0].nodeValue;
	           order = xmlDoc.getElementsByTagName("order")[0].childNodes[0].nodeValue;
	           
	           onScreen = onScreen + "<a href='javascript:;' onClick='showArticleTypePrice(\"/public/ajax\", "+articleTypePrice+",\"name\",\""+(criteria=='name'?order:'asc')+"\")'>Naziv</a></td>\n\t\t<td id='table_header_center'>";
	           onScreen = onScreen + "<a href='javascript:;' onClick='showArticleTypePrice(\"/public/ajax\", "+articleTypePrice+",\"numOfLicence\",\""+(criteria=='numOfLicence'?order:'asc')+"\")'>Broj licenci</a></td>\n\t\t<td id='table_header_center'>";
	           onScreen = onScreen + "<a href='javascript:;' onClick='showArticleTypePrice(\"/public/ajax\", "+articleTypePrice+",\"duration\",\""+(criteria=='duration'?order:'asc')+"\")'>Trajanje</a></td>\n\t\t<td id='table_header_center'>";
	           onScreen = onScreen + "<a href='javascript:;' onClick='showArticleTypePrice(\"/public/ajax\", "+articleTypePrice+",\"pricePerYear\",\""+(criteria=='pricePerYear'?order:'asc')+"\")'>Cena</a>";
	           onScreen = onScreen + "</td>\n\t\t<td id='table_header_center'>Cena sa popustom</td>\n\t\t<td id='table_header_center'>Količina</td>\n\t</tr>";
	            //alert(selectTag.length);
	        
	            for (i=0; i<selectTag.length; i++){
	            	onScreen = onScreen + "\n\t<tr class='TrMouseOut' onMouseOut='this.className=\"TrMouseOut\"' onMouseOver='this.className=\"TrMouseOver\"'>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='padding-left:10px'  ><a href='javascript:;' onClick='showArticleTypePrice(\"/public/ajax\", this.value)'>"+ selectTag[i].getElementsByTagName("name")[0].childNodes[0].nodeValue +"</a> <a href='javascript:;' onClick='showHideDetailsDiv("+selectTag[i].getElementsByTagName("id")[0].childNodes[0].nodeValue+")'><img src='http://admin.sky-express.rs/public/img/info.gif' title='Detaljnije' /></a>";
					onScreen = onScreen + "<br style='clear:both'/><div id='"+selectTag[i].getElementsByTagName("id")[0].childNodes[0].nodeValue+"' class='details_info' style='display:none'><a href='javascript:;' onClick='showHideDetailsDiv("+selectTag[i].getElementsByTagName("id")[0].childNodes[0].nodeValue+")'><img src='http://admin.sky-express.rs/public/img/CloseButton.gif' title='Zatvori' style='float: right;padding-right:10px' /></a><br style='clear:both'/><div id='info'>"+selectTag[i].getElementsByTagName("details")[0].childNodes[0].nodeValue+"</div><br/></div></td>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='text-align:center' >"+ selectTag[i].getElementsByTagName("numOfLicence")[0].childNodes[0].nodeValue +"</td>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='text-align:center' >"+ selectTag[i].getElementsByTagName("duration")[0].childNodes[0].nodeValue +" god.</td>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='text-align:center' >"+ selectTag[i].getElementsByTagName("pricePerYear")[0].childNodes[0].nodeValue +"€</td>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='text-align:center' >"+ selectTag[i].getElementsByTagName("pricePerYearWithDiscount")[0].childNodes[0].nodeValue +"€</td>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='text-align:center' >";
	            	//Select list
	            	onScreen = onScreen + "\n\t\t\t<select name=jobs"+selectTag[i].getElementsByTagName("jobs")[0].childNodes[0].nodeValue+" style='width:60px'>\n";
	            		//Base or not
	            		if(selectTag[i].getElementsByTagName("base")[0].childNodes[0].nodeValue == 1)
	            			onScreen = onScreen + "\n\t\t\t\t<option value="+selectTag[i].getElementsByTagName("base")[0].childNodes[0].nodeValue+">"+selectTag[i].getElementsByTagName("base")[0].childNodes[0].nodeValue+"</option>\n";
	            		else
	            			for(j=0; j<=selectTag[i].getElementsByTagName("base")[0].childNodes[0].nodeValue; j++)
	            				onScreen = onScreen + "\n\t\t\t\t<option value="+j+">"+j+"</option>\n";
	            			
	            	onScreen = onScreen + "\n\t\t\t</select>";
	            	onScreen = onScreen + "\n\t\t</td>";
	            	onScreen = onScreen + "\n\t</tr>";
	            }
	            onScreen = onScreen + "\n</table>";
	            onScreen = onScreen + "<input type='hidden' value='"+xmlDoc.getElementsByTagName("jobs_num")[0].childNodes[0].nodeValue+"' name='jobs[num]'/>";
	           	document.getElementById("any_button").innerHTML="<input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>";
	           	}
	           	document.getElementById("articleTypePrice_fk").innerHTML = onScreen;
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
	//Loading image start
	document.getElementById("loading").innerHTML = "<img src='http://admin.sky-express.rs/public/img/loading.gif' />";
	
    xmlHttp.onreadystatechange=function(){
	    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
	    		//Loading image start
				document.getElementById("loading").innerHTML = "";
	
	    	
	    		//Here XML should be converted to String
	    		var xmlDoc=xmlHttp.responseXML;
	            var onScreen = "<select name='jobs[articleType_fk]' style='width:500px' onChange='calcArticleTypePrice(\""+location+"\", this.value)' >";
	            selectTag = xmlDoc.getElementsByTagName("articleType");
	            //alert(selectTag.length);
	            for (i=0; i<selectTag.length; i++){
	              onScreen = onScreen + "<option value='"+ selectTag[i].getElementsByTagName("value")[0].childNodes[0].nodeValue +"'>";
				  onScreen = onScreen + selectTag[i].getElementsByTagName("option")[0].childNodes[0].nodeValue;
				  onScreen = onScreen + "</option>";
				  }
				  onScreen = onScreen + "</select> *";
				  //Give that structure to div
				//alert(onScreen);
	            document.getElementById("articleType_fk").innerHTML= onScreen;
	            //Reset XML
	    }else{
	            //alert(xmlHttp.status);
	    }
	};
    xmlHttp.open("GET",url,true) ;
    xmlHttp.send(url);
    
}


function calcArticleTypePrice(location, src, criteria, order){
	var url=location+'/articleTypePrice.php?id='+src;
	
	if(criteria) url = url + "&criteria=" + criteria;
	if(order) url = url + "&order=" + order;
	url = url + '&path='+location;
	
	if (src==0){
        document.getElementById('articleTypePrice_fk').innerHTML="";  
        return;
    }
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null){
        alert ("Browser does not support HTTP Request");
        return;
    }
	//Loading image start
	document.getElementById("loading").innerHTML = "<img src='http://admin.sky-express.rs/public/img/loading.gif' />";
	
    xmlHttp.onreadystatechange=function(){
	    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
	    		//Loading image start
				document.getElementById("loading").innerHTML = "";
	
	    		
	           // document.getElementById("articleTypePrice_fk").innerHTML= xmlHttp.responseText;
	           var xmlDoc=xmlHttp.responseXML;
	           var onScreen = "<br/>";
	           selectTag = xmlDoc.getElementsByTagName("row");
	           //Set warning if there is no article
	           //alert(selectTag);
	            if(xmlDoc.getElementsByTagName("jobs_num")[0].childNodes[0].nodeValue == 0){
	            	 onScreen = onScreen + "\n<br/><div id='login_error'>Trenutno ne postoje artikli za zadati kriterijum!</div>";
	            }else{
	           if(xmlDoc.getElementsByTagName("number")[0].childNodes[0].nodeValue != 0)
	           		onScreen = onScreen + "\n<div id='login_warning'>Bazna licenca za izabrani artikal iznosi količinski: <strong>"+ xmlDoc.getElementsByTagName("number")[0].childNodes[0].nodeValue +"</strong> kom. i ona je obavezna.</div>\n";
	                      
	           onScreen = onScreen + "\n<br/>\n<table>\n\t<tr>\n\t\t<td id='table_header_center'>";
	           articleTypePrice = (xmlDoc.getElementsByTagName("articleTypePrice")[0].childNodes[0].nodeValue ? xmlDoc.getElementsByTagName("articleTypePrice")[0].childNodes[0].nodeValue : '');
	           criteria = xmlDoc.getElementsByTagName("criteria")[0].childNodes[0].nodeValue;
	           order = xmlDoc.getElementsByTagName("order")[0].childNodes[0].nodeValue;
	           
	           onScreen = onScreen + "<a href='javascript:;' onClick='calcArticleTypePrice(\"/public/ajax\", "+articleTypePrice+",\"name\",\""+(criteria=='name'?order:'asc')+"\")'>Naziv</a></td>\n\t\t<td id='table_header_center'>";
	           onScreen = onScreen + "<a href='javascript:;' onClick='calcArticleTypePrice(\"/public/ajax\", "+articleTypePrice+",\"numOfLicence\",\""+(criteria=='numOfLicence'?order:'asc')+"\")'>Broj licenci</a></td>\n\t\t<td id='table_header_center'>";
	           onScreen = onScreen + "<a href='javascript:;' onClick='calcArticleTypePrice(\"/public/ajax\", "+articleTypePrice+",\"duration\",\""+(criteria=='duration'?order:'asc')+"\")'>Trajanje</a></td>\n\t\t<td id='table_header_center'>";
	           onScreen = onScreen + "<a href='javascript:;' onClick='calcArticleTypePrice(\"/public/ajax\", "+articleTypePrice+",\"pricePerYear\",\""+(criteria=='pricePerYear'?order:'asc')+"\")'>Cena</a>";
	           onScreen = onScreen + "</td>\n\t\t<td id='table_header_center'>Cena sa popustom</td>\n\t\t<td id='table_header_center'>Količina</td>\n\t</tr>";
	            //alert(selectTag.length);
	        
	            for (i=0; i<selectTag.length; i++){
	            	onScreen = onScreen + "\n\t<tr class='TrMouseOut' onMouseOut='this.className=\"TrMouseOut\"' onMouseOver='this.className=\"TrMouseOver\"'>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='padding-left:10px'  >"+ selectTag[i].getElementsByTagName("name")[0].childNodes[0].nodeValue +" <a href='javascript:;' onClick='showHideDetailsDiv("+selectTag[i].getElementsByTagName("id")[0].childNodes[0].nodeValue+")'><img src='http://admin.sky-express.rs/public/img/info.gif' title='Detaljnije' /></a>";
					onScreen = onScreen + "<br style='clear:both'/><div id='"+selectTag[i].getElementsByTagName("id")[0].childNodes[0].nodeValue+"' class='details_info' style='display:none'><a href='javascript:;' onClick='showHideDetailsDiv("+selectTag[i].getElementsByTagName("id")[0].childNodes[0].nodeValue+")'><img src='http://admin.sky-express.rs/public/img/CloseButton.gif' title='Zatvori' style='float: right;padding-right:10px' /></a><br style='clear:both'/><div id='info'>"+selectTag[i].getElementsByTagName("details")[0].childNodes[0].nodeValue+"</div><br/></div></td>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='text-align:center' >"+ selectTag[i].getElementsByTagName("numOfLicence")[0].childNodes[0].nodeValue +"</td>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='text-align:center' >"+ selectTag[i].getElementsByTagName("duration")[0].childNodes[0].nodeValue +" god.</td>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='text-align:center' >"+ selectTag[i].getElementsByTagName("pricePerYear")[0].childNodes[0].nodeValue +"€</td>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='text-align:center' >"+ selectTag[i].getElementsByTagName("pricePerYearWithDiscount")[0].childNodes[0].nodeValue +"€</td>";
					onScreen = onScreen + "\n\t\t<td id='tabela' style='text-align:center' >";
	            	//Select list
	            	onScreen = onScreen + "\n\t\t\t<select name=jobs"+selectTag[i].getElementsByTagName("jobs")[0].childNodes[0].nodeValue+" style='width:60px'>\n";
	            		//Base or not
	            		if(selectTag[i].getElementsByTagName("base")[0].childNodes[0].nodeValue == 1)
	            			onScreen = onScreen + "\n\t\t\t\t<option value="+selectTag[i].getElementsByTagName("base")[0].childNodes[0].nodeValue+">"+selectTag[i].getElementsByTagName("base")[0].childNodes[0].nodeValue+"</option>\n";
	            		else
	            			for(j=0; j<=selectTag[i].getElementsByTagName("base")[0].childNodes[0].nodeValue; j++)
	            				onScreen = onScreen + "\n\t\t\t\t<option value="+j+">"+j+"</option>\n";
	            			
	            	onScreen = onScreen + "\n\t\t\t</select>";
	            	onScreen = onScreen + "\n\t\t</td>";
	            	onScreen = onScreen + "\n\t</tr>";
	            }
	            onScreen = onScreen + "\n</table>";
	            onScreen = onScreen + "<input type='hidden' value='"+xmlDoc.getElementsByTagName("jobs_num")[0].childNodes[0].nodeValue+"' name='jobs[num]'/>";
	           	document.getElementById("any_button").innerHTML="<input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>";
	           	}
	           	document.getElementById("articleTypePrice_fk").innerHTML = onScreen;
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
			           // document.getElementById(newDivID).innerHTML= xmlHttp.responseText;
			           	var xmlDoc=xmlHttp.responseXML;
			           	if(xmlDoc.getElementsByTagName("sum")[0].childNodes[0].nodeValue>0){
	           			var onScreen = "\n<table bgcolor=#FFFFFF style='border: 1px solid #CCCCCC'>";
	           			selectTag = xmlDoc.getElementsByTagName("value");
	           			
	           			for (i=0; i<selectTag.length; i++){
	            			onScreen = onScreen + "\n\t<tr>\n\t\t<td onClick='fill(\""+ selectTag[i].childNodes[0].nodeValue +"\", \""+newDivID+"\", \""+oldDivID+"\")' id='choiceDiv'>"+ selectTag[i].childNodes[0].nodeValue +"</td>\n\t</tr>\n";
	           			}
	           			onScreen = onScreen + "\n</table>";
	           			document.getElementById(newDivID).innerHTML = onScreen;
			           	}
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
			            // document.getElementById(newDivID).innerHTML= xmlHttp.responseText;
			           	var xmlDoc=xmlHttp.responseXML;
			           	if(xmlDoc.getElementsByTagName("sum")[0].childNodes[0].nodeValue>0){
	           			var onScreen = "\n<table bgcolor=#FFFFFF style='border: 1px solid #CCCCCC'>";
	           			selectTag = xmlDoc.getElementsByTagName("value");
	           			
	           			for (i=0; i<selectTag.length; i++){
	            			onScreen = onScreen + "\n\t<tr>\n\t\t<td onClick='fill(\""+ selectTag[i].childNodes[0].nodeValue +"\", \""+newDivID+"\", \""+oldDivID+"\")' id='choiceDiv'>"+ selectTag[i].childNodes[0].nodeValue +"</td>\n\t</tr>";
	           			}
	           			onScreen = onScreen + "\n</table>";
	           			document.getElementById(newDivID).innerHTML = onScreen;
			           	}
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
//Ajax Request/post functions
function ajaxGet (what, params, where, on){
	new Request.HTML({
		headers: {'If-Modified-Since': 'Thu, 1 Jan 1970 00:00:00 GMT','Content-type':'text/html; charset=utf-8'},
		url: what,
		onRequest: $('loading').setStyle('display','block'),
		method: 'get',
		evalScripts: true,
		evalResponse: true,
		update: where,
		/*onComplete : */
		onSuccess:$('loading').setStyle('display','none')
	}).send(params);
}

function ajaxPost(form, what, where, on){
	new Request.HTML({		
		url: what,
		onRequest:function(){$(document.body).setStyle('cursor','progress');},
		evalScripts: true,
		evalResponse: true,
		update: where,
		onSuccess:function(){$(document.body).setStyle('cursor','auto');}
	}).post(form);
}