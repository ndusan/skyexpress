// Title: Timestamp picker
// Description: See the demo at url
// URL: http://us.geocities.com/tspicker/
// Script featured on: http://javascriptkit.com/script/script2/timestamp.shtml
// Version: 1.0
// Date: 12-05-2001 (mm-dd-yyyy)
// Author: Denis Gritcyuk <denis@softcomplex.com>; <tspicker@yahoo.com>
// Notes: Permission given to use this script in any kind of applications if
//    header lines are left unchanged. Feel free to contact the author
//    for feature requests and/or donations

String.prototype.trim = function() { return this.replace(/(^\s*)|(\s*$)/g, ""); }

var arr_months	= new Array();
arr_months['en_EN']	= ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dec"]; 
arr_months['sr_SR']	= ["Jan", "Feb", "Mar", "Apr", "Maj", "Jun", "Jul", "Avg", "Sep", "Okt", "Nov", "Dec"]; 
var week_days	= new Array();
week_days['en_EN']	= ["Su", "Mo", "Th", "We", "Tu", "Fr", "Sa"];
week_days['sr_SR']	= ["Ne", "Po", "Ut", "Sr", "Če", "Pe", "Su"];
var n_weekstart = 1; // day week starts from (normally 0 or 1)

function getObj(which)
{
	if (document.getElementById)
		return eval ("document.getElementById('" + which + "')");
	else
		return eval ("document.all." + which);
}

function showCalendar(divCal, str_target, str_datetime, format, delimiter, calendarLanguage, strFromDate, strToDate, chkHrs, useWeekendDays, useYear)
{
	if (typeof strFromDate 		== 'undefined')	strFromDate		= '';
	if (typeof strToDate		== 'undefined')	strToDate		= '';
	if (typeof chkHrs			== 'undefined')	chkHrs			= false;
	if (typeof useWeekendDays	== 'undefined')	useWeekendDays	= true;
	if (typeof useYear			== 'undefined')	useYear			= true;
	if (typeof calendarLanguage	== 'undefined')	calendarLanguage= 'en_EN';
	if (calendarLanguage		== 'en_EN')		n_weekstart		= 0;
	var objCal	= getObj(divCal);
	objCal.style.visibility = 'visible';
	objCal.innerHTML = show_calendar(divCal, str_target, str_datetime, format, delimiter, calendarLanguage, strFromDate, strToDate, chkHrs, useWeekendDays, useYear);
}

function hideCalendar(divCal)
{
	var objCal = getObj(divCal);
	objCal.style.visibility = 'hidden';
	/*
	var objCal = getObj('monthId');
	objCal.style.visibility = 'hidden';
	
	var objCal = getObj('yearId');
	objCal.style.visibility = 'hidden';
	*/
}

function show_calendar(divCal, str_target, str_datetime, format, delimiter, calendarLanguage, strFromDate, strToDate, chkHrs, useWeekendDays, useYear) 
{
	str_datetime = str_datetime.trim();

	if (!strFromDate|| strFromDate	== '')	fromDate	= null; 	else fromDate	= str2dt(strFromDate, format, delimiter, calendarLanguage, useYear);
	if (!strToDate	|| strToDate	== '')	toDate		= null; 	else toDate		= str2dt(strToDate, format, delimiter, calendarLanguage, useYear);

	var dt_datetime 	= str_datetime == null || str_datetime == "" ?  new Date() : str2dt(str_datetime, format, delimiter, calendarLanguage, useYear);
	var dt_prev_year	= new Date(dt_datetime);	dt_prev_year.setMonth(dt_datetime.getMonth()-12);
	var dt_next_year	= new Date(dt_datetime);	dt_next_year.setMonth(dt_datetime.getMonth()+12);
	var dt_prev_month	= new Date(dt_datetime);	dt_prev_month.setDate(1); dt_prev_month.setMonth(dt_datetime.getMonth()-1); 
	var dt_next_month	= new Date(dt_datetime);	dt_next_month.setDate(1); dt_next_month.setMonth(dt_datetime.getMonth()+1); 
	var dt_firstday		= new Date(dt_datetime);	dt_firstday.setDate(1);	dt_firstday.setDate(1-(7+dt_firstday.getDay()-n_weekstart)%7);
	var dt_lastday		= new Date(dt_next_month);	dt_lastday.setDate(0);
	
	var current_day		= dt_datetime.getDate();
	var current_month	= dt_datetime.getMonth();
	var current_year	= dt_datetime.getFullYear();
	var activeDate, currentDate, chkHours;
		
	// html generation (feel free to tune it for your particular application)
	// print calendar header
	var str_buffer = new String (
		"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"208\">\n"+
		"<tr><td class=\"tdhead\">\n"+
		"<table cellspacing=\"1\" cellpadding=\"2\" border=\"0\" width=\"208\">\n"+
		"<tr>\n"+
		"<td class=tdhead colspan=3>\n");
		if (useYear) {
			str_buffer +=  "	<a href=\"javascript:showCalendar('" + divCal + "','" + str_target + "','" + dt2dtstr(dt_prev_month,format,delimiter,calendarLanguage,useYear) + "','" + format + "','" + delimiter + "','" + calendarLanguage + "','" + strFromDate + "','" + strToDate + "', " + chkHrs + ", " + useWeekendDays + ", " + useYear + ");\" class='navig' />&laquo;</a>\n";
		}
		str_buffer +=  "<select name=\"monthId\" class=\"list\" onchange=\"showCalendar('" + divCal + "','" + str_target + "',this.value,'" + format + "','" + delimiter + "','" + calendarLanguage + "','" + strFromDate + "','" + strToDate + "', " + chkHrs + ", " + useWeekendDays + ", " + useYear + ");\">\n";
		
		if (useYear) {
			for (var m=1; m<13; m++) {
				if (m-1 == current_month)
					str_buffer += "	<option value='" + current_day + delimiter + m + delimiter + current_year + "' selected>" + arr_months[calendarLanguage][m-1] + "</option>\n";
				else
					str_buffer += "	<option value='" + current_day + delimiter + m + delimiter + current_year + "'>" + arr_months[calendarLanguage][m-1] + "</option>\n";
			}
		} else {
			for (var m=1; m<13; m++) {
				if (m-1 == current_month)
					str_buffer += "	<option value='" + current_day + '. ' + arr_months[calendarLanguage][m-1] + "' selected>" + arr_months[calendarLanguage][m-1] + "</option>\n";
				else
					str_buffer += "	<option value='" + current_day + '. ' + arr_months[calendarLanguage][m-1] + "'>" + arr_months[calendarLanguage][m-1] + "</option>\n";
			}	
		}
		str_buffer +=  "</select>\n";
		if (useYear) {
			str_buffer +=  "	<a href=\"javascript:showCalendar('" + divCal + "','" + str_target + "','" + dt2dtstr(dt_next_month,format,delimiter,calendarLanguage,useYear) + "','" + format + "','" + delimiter + "','" + calendarLanguage + "','" + strFromDate + "','" + strToDate + "', " + chkHrs + ", " + useWeekendDays + ", " + useYear + ");\" class='navig' />&raquo;</a>\n";
		}
		str_buffer +=  "</td>\n"+
		"<td class=tdhead colspan=3 align=right>\n";
		if (useYear) {
			str_buffer +=  "	<a href=\"javascript:showCalendar('" + divCal + "','" + str_target + "','" + dt2dtstr(dt_prev_year,format,delimiter,calendarLanguage,useYear) + "','" + format + "','" + delimiter + "','" + calendarLanguage + "','" + strFromDate + "','" + strToDate + "', " + chkHrs + ", " + useWeekendDays + ", " + useYear + ");\" class='navig' />&laquo;</a>\n"+
			"<select name=\"yearId\" class=\"list\" onchange=\"showCalendar('" + divCal + "', '" + str_target + "', this.value, '" + format + "', '" + delimiter + "', '" + calendarLanguage + "', '" + strFromDate + "', '" + strToDate + "', " + chkHrs + ", " + useWeekendDays + ", " + useYear + ");\">\n";
			
			for (var y=2000; y<2021; y++) {
				if (y == current_year)
					str_buffer += "	<option value='" + current_day + delimiter + (current_month+1) + delimiter + y + "' selected>" + y + "</option>\n";
				else
					str_buffer += "	<option value='" + current_day + delimiter + (current_month+1) + delimiter + y + "'>" + y + "</option>\n";
			}
			
			str_buffer +=  "</select>\n"+
			"	<a href=\"javascript:showCalendar('" + divCal + "','" + str_target + "','" + dt2dtstr(dt_next_year,format,delimiter,calendarLanguage,useYear) + "','" + format + "','" + delimiter + "','" + calendarLanguage + "','" + strFromDate + "','" + strToDate + "', " + chkHrs + ", " + useWeekendDays + ", " + useYear + ");\" class='navig' />&raquo;</a>\n";
		} else {
			str_buffer +=  "&nbsp;";
		}
		str_buffer +=  
		"</td>\n"+
		"<td class=tdhead align=\"center\"><a href=\"javascript:hideCalendar('" + divCal + "');\">[X]</a></td>\n"+
		"</tr>\n";

	var dt_current_day = new Date(dt_firstday);
	
	// print weekdays titles
	str_buffer += "<tr>\n";
	for (var n=0; n<7; n++) str_buffer += "<td class=tdhead>"+week_days[calendarLanguage][(n_weekstart+n)%7]+"</td>\n";
		
	// print calendar table
	str_buffer += "</tr>\n";
	while (dt_current_day.getMonth() == dt_datetime.getMonth() || dt_current_day.getMonth() == dt_firstday.getMonth()) {
		// print row heder
		str_buffer += "<tr align=right>\n";
		for (var n_current_wday=0; n_current_wday<7; n_current_wday++) {
			
			if ((fromDate == null 		&& toDate == null) || 
				(fromDate <= dt_current_day&& toDate == null) ||
				(fromDate == null 		&& toDate >= dt_current_day) ||
				(fromDate <= dt_current_day&& toDate >= dt_current_day)) activeDate = true; else activeDate = false;

			if (dt_current_day.getMonth() == dt_datetime.getMonth()) {
				
				currentDate = dt2dtstr(dt_current_day, format, delimiter, calendarLanguage, useYear);
				if (chkHrs) chkHours = ";chkHours('"+currentDate+"')"; else chkHours = '';
				
				if (dt_current_day.getDate() == dt_datetime.getDate() && dt_current_day.getMonth() == dt_datetime.getMonth()) {
					// print current date
					if (activeDate) 
						str_buffer += "	<td class=\"tdmark\" onmouseover=\"this.className='tdover'\" onmouseout=\"this.className='tdmark'\" onclick=\""+str_target+".value='"+currentDate+"'; hideCalendar('" + divCal + "')"+chkHours+"\">";
					else
						str_buffer += "	<td class=\"disabledtdmark\">";
				} else if (dt_current_day.getDay() == 0 || dt_current_day.getDay() == 6) {
					// weekend days
					if (useWeekendDays) {
						if (activeDate) 
							str_buffer += "	<td class=\"tdsn\" onmouseover=\"this.className='tdover'\" onmouseout=\"this.className='tdsn'\" onclick=\""+str_target+".value='"+currentDate+"'; hideCalendar('" + divCal + "')"+chkHours+"\">";
						else
							str_buffer += "	<td class=\"disabledtdsn\">";
					} else {
						str_buffer += "	<td class=\"disabledtdsn\">";
					}
				} else {
					// print working days of current month
					if (activeDate) 
						str_buffer += "	<td class=\"tdpuscp\" onmouseover=\"this.className='tdover'\" onmouseout=\"this.className='tdpuscp'\" onclick=\""+str_target+".value='"+currentDate+"'; hideCalendar('" + divCal + "')"+chkHours+"\">";
					else
						str_buffer += "	<td class=\"disabledtdpuscp\">";
				}

				// print days of current month
				if (activeDate) 
					str_buffer += dt_current_day.getDate()+"</td>\n";
				else
					str_buffer += "<span class=\"disableddt\">" + dt_current_day.getDate()+"</span></td>\n";
				
			} else {
				if (activeDate) {
					currentDate = dt2dtstr(dt_current_day, format, delimiter, calendarLanguage, useYear);
					if (chkHrs) chkHours = ";chkHours('"+currentDate+"')"; else chkHours = '';
					if (dt_current_day.getDay() == 0 || dt_current_day.getDay() == 6) {
						if (useWeekendDays) {
							str_buffer += "	<td class=\"tdpuscp\" onmouseover=\"this.className='tdover'\" onmouseout=\"this.className='tdpuscp'\" onclick=\""+str_target+".value='"+currentDate+"'; hideCalendar('" + divCal + "')"+chkHours+"\">";
							// print days of other months
							str_buffer += "<span class=\"otherdt\">"+dt_current_day.getDate()+"</span></td>\n";
						} else {
							str_buffer += "	<td class=\"disabledtdother\">";
							// print days of other months
							str_buffer += "<span class=\"disableddt\">"+dt_current_day.getDate()+"</span></td>\n";	
						}
					} else {
						str_buffer += "	<td class=\"tdpuscp\" onmouseover=\"this.className='tdover'\" onmouseout=\"this.className='tdpuscp'\" onclick=\""+str_target+".value='"+currentDate+"'; hideCalendar('" + divCal + "')"+chkHours+"\">";
						// print days of other months
						str_buffer += "<span class=\"otherdt\">"+dt_current_day.getDate()+"</span></td>\n";
					}
				} else {
					str_buffer += "	<td class=\"disabledtdother\">";
					// print days of other months
					str_buffer += "<span class=\"disableddt\">"+dt_current_day.getDate()+"</span></td>\n";
				}
			}
			dt_current_day.setDate(dt_current_day.getDate()+1);
		}
		// print row footer
		str_buffer += "</tr>\n";
	}
	// print calendar footer
	str_buffer +=
		"</table>\n" +
		"</tr>\n"+
		"</table>\n";

	
	return str_buffer;
}

// datetime parsing and formatting routimes. modify them if you wish other datetime format
function str2dt (str_datetime, format, delimiter, calendarLanguage, useYear) 
{
	if (useYear) {
		var d	= str_datetime.split(delimiter);
		var f	= (format.toLowerCase()).split(delimiter);
		format	= '';
		for (var i=0; i < f.length; i++) format += f[i];
		switch(format) {
			case 'dmy' : return (new Date (d[2], d[1]-1, d[0])); break;
			case 'dym' : return (new Date (d[1], d[2]-1, d[0])); break;
			case 'mdy' : return (new Date (d[2], d[0]-1, d[1])); break;
			case 'myd' : return (new Date (d[1], d[0]-1, d[2])); break;
			case 'ymd' : return (new Date (d[0], d[1]-1, d[2])); break;
			case 'ydm' : return (new Date (d[0], d[2]-1, d[1])); break;
		}
	} else {
		var d		= str_datetime.split('. ');
		var currD	= new Date();
		var year	= currD.getYear()
		if (year < 2000) year = year + 1900;
		
		// get month
		for(var month=0; month < arr_months[calendarLanguage].length; month++) {
			if (arr_months[calendarLanguage][month] == d[1]) break;
		}
		
		return (new Date (year, month, d[0]));
	}
	
	return new Date();
}

function dt2dtstr (dt_datetime, format, delimiter, calendarLanguage, useYear) 
{
	var returnValue = '';
	if (useYear) {
		var f			= (format.toLowerCase()).split(delimiter);
		format			= '';
		for (var i=0; i < f.length; i++) format += f[i];
		if(f.length == 4) var last = delimiter; else var last = '';
		switch(format) {
			case 'dmy' : returnValue = (new String (dt_datetime.getDate() 		+ delimiter + (dt_datetime.getMonth()+1)+ delimiter + dt_datetime.getFullYear()) 	+ last); break;
			case 'dym' : returnValue = (new String (dt_datetime.getDate() 		+ delimiter + dt_datetime.getFullYear()	+ delimiter + (dt_datetime.getMonth()+1)) 	+ last); break;
			case 'mdy' : returnValue = (new String ((dt_datetime.getMonth()+1)	+ delimiter + dt_datetime.getDate()		+ delimiter + dt_datetime.getFullYear()) 	+ last); break;
			case 'myd' : returnValue = (new String ((dt_datetime.getMonth()+1)	+ delimiter + dt_datetime.getFullYear()	+ delimiter + dt_datetime.getDate()) 		+ last); break;
			case 'ymd' : returnValue = (new String (dt_datetime.getFullYear() 	+ delimiter + (dt_datetime.getMonth()+1)+ delimiter + dt_datetime.getDate()) 		+ last); break;
			case 'ydm' : returnValue = (new String (dt_datetime.getFullYear() 	+ delimiter + dt_datetime.getDate() 	+ delimiter + (dt_datetime.getMonth()+1)) 	+ last); break;
			default	   : returnValue = (new String (dt_datetime.getDate() 		+ delimiter + (dt_datetime.getMonth()+1)+ delimiter + dt_datetime.getFullYear()) 	+ last); break;
		}
	} else {
		returnValue = new String (dt_datetime.getDate() + '. ' + arr_months[calendarLanguage][dt_datetime.getMonth()]);
	}
	return returnValue;
}