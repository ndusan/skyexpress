
function updateClock ( )
{
  var currentTime = new Date ( );

  var currentHours = currentTime.getHours();
  var currentMinutes = currentTime.getMinutes();
  var currentSeconds = currentTime.getSeconds();

  var currentDay = currentTime.getDate();
  var currentMonth = currentTime.getMonth()+1;
  var currentYear = currentTime.getFullYear();
  
  // Pad the minutes and seconds with leading zeros, if required
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  // Convert the hours component to 12-hour format if needed
 // currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  // Convert an hours component of "0" to "12"
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;


  //Convert the days and months with leading zeros, if required
  currentDay = ( currentDay < 10 ? "0" : "" ) + currentDay;
  currentMonth = ( currentMonth < 10 ? "0" : "" ) + currentMonth;  
  
  // Compose the string for display
  var currentTimeString = currentDay + "." + currentMonth + "." + currentYear + ". " + currentHours + ":" + currentMinutes + ":" + currentSeconds;
  
  if(document.getElementById("clock")!=null) document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}
//==========================================
// Check All boxes
//==========================================
function CheckAll(fmobj) {
  for (var i=0;i<fmobj.elements.length;i++) {
    var e = fmobj.elements[i];
    if ( (e.name != 'allbox') && (e.type=='checkbox') && (!e.disabled) ) {
      e.checked = fmobj.allbox.checked;
    }
  }
}

//==========================================
// Check all or uncheck all?
//==========================================
function CheckCheckAll(fmobj) {
  var TotalBoxes = 0;
  var TotalOn = 0;
  for (var i=0;i<fmobj.elements.length;i++) {
    var e = fmobj.elements[i];
    if ((e.name != 'allbox') && (e.type=='checkbox')) {
      TotalBoxes++;
      if (e.checked) {
       TotalOn++;
      }
    }
  }
  if (TotalBoxes==TotalOn) {
    fmobj.allbox.checked=true;
  }
  else {
   fmobj.allbox.checked=false;
  }
}


function showHidediv(id) {
	var myDiv = 'hideshow-'+id;
	
	//Check if this file is already visible or not
	
	if (document.getElementById) { // DOM3 = IE5, NS6
		if(document.getElementById(myDiv).style.visibility =='visible'){
			document.getElementById(myDiv).style.visibility = 'hidden';
		}else{
			document.getElementById(myDiv).style.visibility = 'visible';
		}
	}else {
		if (document.layers) { // Netscape 4
			if(document.myDiv.visibility == 'visible'){
				document.myDiv.visibility = 'hidden';
			}else{
				document.myDiv.visibility = 'visible';
			}
		}else { // IE 4
			if(document.all.myDiv.style.visibility == 'visible'){
				document.all.myDiv.style.visibility = 'hidden';
			}else{
				document.all.myDiv.style.visibility = 'visible';
			}
		}
	}
} 

function checkSelect(ctrl) {
	 var selectObj = document.getElementById('selectList');
	if (ctrl.checked == true){
		selectObj.removeAttribute('disabled');
	}else{ 
		selectObj.setAttribute('disabled', 'disabled');
	}
	
}

function clickclear(thisfield, defaulttext) {
	if (thisfield.value == defaulttext) {
	thisfield.value = "";
	}
}
function clickrecall(thisfield, defaulttext) {
	if (thisfield.value == "") {
	thisfield.value = defaulttext;
	}
}


function showHideDetailsDiv(id){
	if (document.getElementById){
		obj = document.getElementById(id);
		if (obj.style.display == "none"){
			
			obj.style.display = "";
		
			
		} else {
			obj.style.display = "none";
		}
	}
}

