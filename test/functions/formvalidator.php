<script LANGUAGE="JavaScript">
/********************************************************************
* @author aslam.raisani.zakaria [all.document]
* 01/sept-17/oct 2001.
* note: this file may only be used if the software is licensed
*     : and all the comments and copyright notice is intact.
* property of epedas.sdn.bhd.    
********************************************************************/

/********************************************************************
* definitions
* note: init msg value + predefined values + type value.
*     : the predefined values may contain more characters when used
*     : sparingly with text manipulator.
********************************************************************/
var msg = "";
var defn_text	='abcdefghijklmnopqrstuvwxyz,. ';
var defn_number	='1234567890.,';
var defn_all	='1234567890abcdefghijklmnopqrstuvwxyz`~!@#$%^&*()-_+={}[]|\\;\':\"<>?,./ ';
var defn_email	='1234567890abcdefghijklmnopqrstuvwxyz@.-_';
var defn_date	='1234567890'+'janfebmrpyjulgsoctvd-'; // to allow char based date

var frmt_month  = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
var frmt_date	='dd-MMM-yyyy';
		// eg: 'dd MMM yyyy'
		// use 31 as max days and 12 as max months. years = depends on your usage.
		// available format is d for days m/M for months y for year
		// eg: ddmmyyyy or dd/mm/yyyy or dd/MMMMMM/yy (alphebetical month use M)
		
		
var frmt_pass   = 5; //min length of password.

//regular text
var type_text	=1;	
var type_number	=2;	
var type_all	=3;	
//formatting
var type_date	=4;
var type_email	=5;     
var type_pass	=6;
//selection item.
var type_check  =7;//radio n checkbox
var type_select =9;


/********************************************************************
* field manipulator
* note: getField + setField
*     : to be used sparingly with any document object with weird
*     : names eg: 'customer.care.center' etc2. (works in ie)
********************************************************************/

function getField(field)
{
	/*mod aslam.XX
	if(document.all)
	return document.all[field];
	if(document.getElementByid)
	return document.getElementByid(field);
	*/
	return field;
	/*else
	return document.layer[field];*/
}

function setField(field,newvalue)
{
	if(document.all)
	document.all[field].value=newvalue;
	if(document.getElementByid)
	document.getElementByid(field).value=newvalue;
	/*else
	document.layer[field].value=newvalue;*/
}


/********************************************************************
* verifier and constructors 
*      requirement + verify + (private) verifyOption + verifySelect
* note : sample useage
*      : reqXX = new requirement('field.name','additionalchar','nonallowablechar',type_text,true|false,'DISPLAY NAME');
*      : for mandatory field put true or false
*      : in jsp/htm : <input type=button onClick="if(verify())document.formName.submit();">
********************************************************************/

     var requirementCount = 0;
     var requirementItem  = new Array();
function requirement(/*mod aslam.XX field_name*/field, incl, excl, type_value, mandatory, display_name)
{
	//mod.aslam.XX this.field_name=field_name;
	this.field = field
	this.incl=incl;
	this.excl=excl;
	this.type_value=type_value;
	this.mandatory=mandatory;
	this.display_name=display_name;
	requirementItem[requirementCount]=this;
	requirementCount++;
}

function verify()
{
	var finalresult= true;
	var tempresult = true;
	msg ="Please correct the following error(s) and re-submit.\n";
	msg+="___________________________________________________ \n\n"
	for(j=0;j<requirementCount;j++)
	{
		var req = requirementItem[j];
		if(req.type_value==type_check || req.type_value == type_select)
			//mod: aslam.XX tempresult = verifyOption(req.field_name,req.type_value,req.mandatory,req.display_name);
			tempresult = verifyOption(req.field,req.type_value,req.mandatory,req.display_name);
		else
			//mod. aslam.XX tempresult = verifyFormat(req.field_name,req.incl,req.excl,req.type_value,req.mandatory,req.display_name);
			tempresult = verifyFormat(req.field,req.incl,req.excl,req.type_value,req.mandatory,req.display_name);
		if(finalresult)finalresult=tempresult;		
	}
	if(!finalresult)alert(msg);
	return finalresult;
}

function verifyOption(field,type_value,mandatory,name)
{
	var result = true;
	switch(type_value)
	{
		case type_check:
		result = chkcbox(field,mandatory,name);
		break;

		case type_select:
		result = chkselx(field,mandatory,name);
		break;
	}
	return result;
}

function verifyFormat(field,incl,excl,type_value,mandatory,name)
{
	var data = field.value;
	var result = true;
	switch(type_value)
	{
		case type_text:
		result = chktext(data.toLowerCase(),mergetxt(defn_text,incl,excl),mandatory,name);
		break;

		case type_number:
		result = chktext(data.toLowerCase(),mergetxt(defn_number,incl,excl),mandatory,name);
		if(result)
			result=chknumb(data.toLowerCase(),name);
		break;

		case type_all:
		result = chktext(data.toLowerCase(),mergetxt(defn_all,incl,excl),mandatory,name);
		break;
		
		case type_date:
		//result = chkdate(data.toLowerCase(),mergetxt(defn_date,incl,excl),mandatory,name);
		result = chktext(data.toLowerCase(),mergetxt(defn_date,incl,excl),mandatory,name);
		break;
		
		case type_email:
		result = chkmail(data.toLowerCase(),mergetxt(defn_email,incl,excl),mandatory,name);
		break;
		
		case type_pass:
		result = chkpass(data.toLowerCase(),mergetxt(defn_text,incl,excl),mandatory,name);
		break;
	}	
	return result;
}


/********************************************************************
* text manipulator 
* note: addtext + remtext + mergetxt +chktext + chkmand
*     : these function will assist in allowable text checking by
*     : adding or removing characters from base/predefined text.
********************************************************************/
function addtext(orig,incl)
{
	var add_text=orig;
	for(i=0;i<incl.length;i++){
		var data = incl.substring(i,i+1);
		if(orig.indexOf(data) >-1){
			continue;
		}
		else{
			add_text=add_text+data;
		}
	}
	return add_text;
}
function remtext(orig,excl)
{
	var rem_text = orig;
	for(i=0;i<excl.length;i++){
		var data = excl.substring(i,i+1);
		rem_text=rem_text.replace(data,'');
	}
	return rem_text;	
}

function mergetxt(defn,incl,excl)
{
	var allowable = addtext(defn.toLowerCase(),incl.toLowerCase());
	    allowable = remtext(allowable,excl.toLowerCase());
	return allowable;    
}

function chkmand(mesg,mandatory,name)
{
	if(mandatory && mesg.length==0)
	{
		msg+="The "+name+" field is a mandatory field.\n";
		return false;
	}
	return true;	
}

function chktext(mesg,text,mandatory,name)
{
	var result = chkmand(mesg,mandatory,name);
	if(!result)return result;
	
	for(i=0;i<mesg.length;i++){
		var data = mesg.substring(i,i+1);
		if(text.indexOf(data)<0){
			msg+="The "+name+" field contains non allowable characters. eg."+data+"\n"
			return false;
		}
	}
	return true;
}

function chknumb(mesg,name)
{
	if(isNaN(mesg))
	{
		msg+="The "+name+" field is not a valid number value. \n"
		return false;
	}	
	else
		return true;
	
	
}

/********************************************************************
* selection checking
* note: chkcbox + chkselx  
*     : these function will assist in checking 'selecting'/'checking'
*     : feature available in html. (checkbox ,radio and selectbox)
********************************************************************/
function chkcbox(field,mandatory,name)
{
	if(mandatory)
	{
		for (i=0;i< field.length;i++) {
	        	if ((field[i].checked == true ) )
	                return true;
	        }
	        if(field.length==null)
	        {
	        	if(field.checked == true) return true;
	        }
		msg+="The "+name+" field must be checked for at least for one item.\n"
		return false;
	}
	return true;
}


function chkselx(field,mandatory,name)
{
	if(mandatory)
	{
		//ignoring the first available item!
		for(i=1;i< field.length;i++)
		{
			if((field[i].selected==true))
			return true;
		}
		msg+="The "+name+" field must be selected for at least one option.\n"
		return false;
	}
	return true;
}

/********************************************************************
* formatting check
* note: chkmail + chkdate + chkpass
*     : these function will assist in format for 3 most used feature.
*     : in html forms. (date , email and password field)
********************************************************************/

function chkmail(mesg,allowable,mandatory,name)
{
	var checking = true;
	//if(!chktext(mesg.toLowerCase(),defn_email.toLowerCase(),mandatory,name)){
	if(!chktext(mesg,allowable,mandatory,name))
		return false;
	if(mesg.length>0 && mesg.length<5)
	{
	
		var a = mesg.indexOf('@');
		var b = mesg.lastIndexOf('@');
		var c = mesg.indexOf('.');
		var d = mesg.lastIndexOf('.');
		if (a<=0||a!=b||b==mesg.length-1)	
			checking = false;
		if (c<=0||c< a||d==mesg.length-1)
			checking=false;	
	}			
	if(!checking)
		msg+="The "+name+" field does not conform to the email format - userid@host.domain\n"
	return checking;
}
	
function chkdate(mesg,allowable,mandatory,name)
{
	
	var checking = true;
	if(!chktext(mesg,allowable,mandatory,name))
	return false;
	if(mesg.length>0)
	{
		if(mesg.length!=frmt_date.length)
			checking = false;
		var d = mesg.substring(frmt_date.indexOf('d'),frmt_date.lastIndexOf('d')+1);
		var m = mesg.substring(frmt_date.indexOf('m'),frmt_date.lastIndexOf('m')+1);
		var M = mesg.substring(frmt_date.indexOf('M'),frmt_date.lastIndexOf('M')+1).toLowerCase();
		var y = mesg.substring(frmt_date.indexOf('y'),frmt_date.lastIndexOf('y')+1);
		if(isNaN(d)||isNaN(m)||isNaN(y))
			checking = false;
		//alert("d==0:"+(d==0)+"\nd>31:"+(d>31)+"\nm==0:"+(m==0)+"\nm>12:"+(m>12)+"\ny==0:"+(y==0)+"\ny>9999:"+(y>9999));
		if((frmt_date.indexOf('d')>=0) && (d==0||d>31)  )checking = false;
		if((frmt_date.indexOf('m')>=0) && (m==0||m>12)  )checking = false;
		if((frmt_date.indexOf('y')>=0) && (y==0||y>9999))checking = false;
		
		if((frmt_date.indexOf('M')>=0))
		{
			var found = false;
			for(i=0;i<frmt_month.length;i++)
			{
				if(frmt_month[i].indexOf(M)>-1){found=true;break;}
			}
			if(!found)checking=false;
		}
	}
	if(!checking)
		msg+="The "+name+" field does not conform to the allowable date format - "+frmt_date+".\n"
	return checking;
}

function chkpass(mesg,allowable,mandatory,name)
{
	if(!chktext(mesg,allowable,mandatory,name))
		return false;
	var checking = true;
	var foundchar=false;
	var foundnumb=false;
	for(i=0;i<mesg.length;i++){
		var data = mesg.substring(i,i+1);
		if(isNaN(data))foundchar=true;
		else foundnumb=true;
		if(foundchar && foundnumb)break;
	}
	if(( mesg.length>0 && mesg.length<frmt_pass)&&(!foundchar || !foundnumb))
		checking=false;
	
	if(!checking)
		//msg+="The "+name+" field must contain both characters and number and must be longer than 8 characters.\n"
		msg+="The "+name+" field must must be longer than "+frmt_pass+" characters.\n"
	return checking;
}


function replaceNewLine(field)
{
  var newstr = '';
  for (var i=0;i<field.value.length;i++)
  if (field.value.charCodeAt(i) == 13) newstr = newstr;
  else if (field.value.charCodeAt(i) == 10) newstr += ' ';
  else newstr += field.value.charAt(i);
  field.value = newstr;
}

//objArr = new Array (obj.txtAdd1,obj.txtAdd2,obj.txtAdd3,obj.txtPostcode,obj.txtFaxNo,obj.txtPhoneNo,obj.txtEmail);
//enableObj(objArr);
//enableObj(objArr);
//objArr = new Array(req01,req02)
//changeMan(objArr,newValue)
function changeMan(objArr,newValue)
{
	if(objArr.length==null)
	{
		objArr.mandatory = newValue;
	}
	else
	{
		for(i=0;i<objArr.length;i++)
		{
			objArr[i].mandatory = newValue;
		}
	}
}
function disableObj(objArr)
{
	if(objArr.length==null)
	{
		objArr.value="";objArr.disabled = true;
	}
	else
	{
		for(i=0;i<objArr.length;i++)
		{
			//objArr[i].value="";objArr[i].disabled=true;
			objArr[i].disabled=true;
		}
	}
}
function enableObj(objArr)
{
	if(objArr.length==null){
		objArr.value="";objArr.disabled = false;}
	else
	{
		for(i=0;i<objArr.length;i++)
		{
			//objArr[i].value="";objArr[i].disabled=false;
			objArr[i].disabled=false;
		}
	}
}


</script>