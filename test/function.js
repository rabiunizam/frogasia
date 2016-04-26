
var ERR_MSG;
var errFlag;
var defaultErrMsg;

function insertCR (InString)
{
	return InString + "\n";	
	
}

function framePrint(whichFrame){
parent[whichFrame].focus();
parent[whichFrame].print();
}
//<a href="javascript:framePrint('rightFrame');" >Print</a>
function formatCurrency(num) 
{
	num = num.toString().replace(/\$|\,/g,'');
	if(isNaN(num))
	num = "0";
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num*100+0.50000000001);
	cents = num%100;
	num = Math.floor(num/100).toString();
	if(cents<10)
	cents = "0" + cents;
	for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
	num = num.substring(0,num.length-(4*i+3))+','+
	num.substring(num.length-(4*i+3));
	return (((sign)?'':'-') + num + '.' + cents);
}

//added comma to currency value
function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}



//format the float pass in to the number of decimal point specified
function formatFloat(theFloat,decimalPoint){
	var multiplier;
	var totLength;
	var decimalPos;
	var reminder;
	
	multiplier = Math.pow(10,decimalPoint);
	theFloat = theFloat * multiplier;

	//round the number so that when formatFloat(14.44999,2); the result will be 14.5 instead of 14.44
	theFloat = Math.round(theFloat);
	//theFloat = parseInt(theFloat);	//this causes 14.44 to be return
	
	theFloat = theFloat / multiplier;
	
	//this will cause the result 14.4 to 14.40
	theFloat = theFloat + "";
	totLength = theFloat.length;
	decimalPos = theFloat.indexOf(".");
 
	totLength = totLength - 1;
    reminder = totLength - decimalPos;	
     
    if( reminder == 1){
		theFloat = theFloat + "0";
	}
		
	return theFloat;
}
//check for enter keypress and runs a function as pass in
function checkKey(strFunc){
	if (event.keyCode == 13){
		eval(strFunc);
	}
}

//trim the leading space
function ltrim(str){
	while (1){
		if (str.substring(0, 1) != ' '){
			break;
		}
		str = str.substring(1, str.length);
	}
	return str;
}

//trim the trailing space
function rtrim(str){
	while (1){
		if (str.substring(str.length - 1, str.length) != ' '){
			break;
		}
		str = str.substring(0, str.length - 1);
	}
	return str;
}

//remove all leading and trailing space
function trim(str){
	var tmpStr = ltrim(str);
	return rtrim(tmpStr);
}

//change the browser status
function chgIEStatus(strStatus){
	window.status = strStatus;
	return 1;
}

//clear the browser status, to default 'Done'
function clearIEStatus(){
	window.status = 'Done';
	return 1;
}

//to initialize error message
function initErrMsg(){
	
	ERR_MSG = "Please correct the following error(s) and re-submit.\n";
	
	ERR_MSG += "____________________________\n\n";	
	
	defaultErrMsg = ERR_MSG;
}        

//check for valid email
function isValidEmail(InString){
    if (InString.length==0){
        	return 1;
    }
	if ( (InString.indexOf('@') == -1) || (InString.indexOf('@') != InString.lastIndexOf('@')) ){
			return 0;
    }
	if (InString.indexOf('.') == -1){
			return 0;
    }
	if ( (InString.lastIndexOf('.')) < (InString.indexOf('@')) ){
			return 0; 
    }
    return 1;
}

//check for mandatory field
function checkMandatoryField(aField,prettyName){

	if (trim(aField.value) == "" )
	{
		ERR_MSG += "  - " + prettyName + "\n";
		errFlag = true;
		return 0;		
	}
	return 1;
}

//popups a window
function popupWin(sURL,sName,iWT,iHT){
	window.open(sURL,sName,'width=' + iWT + ',height=' + iHT + ',top=120,left=100,alwaysRaised=1,alwaysLowered=0,dependent=1,resizable=0');
}

function checkValidPhoneNo(phoneNo){
	var strPhoneNo = phoneNo + "";
	var substringPhoneNo;
	var startIndex;
	var posPhoneNo;
	if(strPhoneNo.length == 0){
		return false;
	}else{
		//only accept numeric number from 0-9 and '-' only
		for(i=1; i-1 < strPhoneNo.length; i++){		
			startIndex = i - 1;
			substringPhoneNo = strPhoneNo.substring(startIndex,i);
			if ((substringPhoneNo != '-')&&(substringPhoneNo != '0')&&(substringPhoneNo != '1')&&(substringPhoneNo != '2')&&(substringPhoneNo != '3')&&(substringPhoneNo != '4')&&(substringPhoneNo != '5')&&(substringPhoneNo != '6')&&(substringPhoneNo != '7')&&(substringPhoneNo != '8')&&(substringPhoneNo != '9')){
				return false;		
			 }
		} 
		posPhoneNo = strPhoneNo.indexOf('-');
		//the dash '-' only can exist on the position likes: 03-,603-,0103-
		//and after the dash '-' should not be less than 6 digit
		if((posPhoneNo != 2) && (posPhoneNo != 3)&& (posPhoneNo != 4)){
			return false;
		}else{
				if(posPhoneNo == 2){
					if((strPhoneNo.length - 3) < 6){
						return false;
					}
				}else if(posPhoneNo == 3){
						if((strPhoneNo.length - 4) < 6){
							return false;
						}
				}else if(posPhoneNo == 4){
						if((strPhoneNo.length - 5) < 6){
							return false;
						}
					}				
				}		 				
			return true;
		}	
}

function IsFutureDate (objName) {
	var testdate;
    var date2;
    var todaydate;				//Declare today date object.
	
	testdate = objName.value;
	testdate = testdate.substring(0, 2) + " " + testdate.substring(3, 6) + " " + testdate.substring(7, 11)
	
	date2 = new Date(testdate);
	todaydate = new Date();
	if (date2 - todaydate > -86386380){ //a day
		return true;
	}else{
		return false;
	}
}

//function used by the menu
var menuFlag;
menuFlag = 0;
function changeColor(strColor,objName)
{
	objName.style.backgroundColor = strColor;
	
	if (strColor=='#0066CC'){
		if (document.getElementById){
			if (HM_NS6==true){
				objName.style.cursor = "pointer";
			}else{
				objName.style.cursor = "hand";
			}
		}
	}
}

function swapImg(strImgPath,objName){
	objName.src = strImgPath;
}

var popup_detailsWindow=null;
function popup_details(mypage,myname,w,h,pos,infocus,scrol,menu)
{

	if (pos == 'random')
	{
		LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;
		TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;
	}
	else
	{
		LeftPosition=(screen.width)?(screen.width-w)/2:100;
		TopPosition=(screen.height)?(screen.height-h)/2:100;}
		settings='width='+ w + ',height='+ h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars='+yes+',location=no,directories=no,status=no,menubar='+menu+',toolbar=no,resizable=no';
		popup_detailsWindow=window.open('',myname,settings);
		if(infocus=='front'){popup_detailsWindow.focus();popup_detailsWindow.location=mypage;
	}

	if(infocus=='back')
	{
		popup_detailsWindow.blur();
		popup_detailsWindow.location=mypage;
		popup_detailsWindow.blur();
	}
}




function goLink(strURL){
	location.href = Const_Base_Path + strURL;
}
function expand(strID,objName){
	if (menuFlag == 0){
		eval(strID + ".style.display = 'none'");
		objName.src = Const_Base_Path + "/images/misc/up.gif";
		menuFlag = 1;
	}else{
		eval(strID + ".style.display = ''");
		objName.src = Const_Base_Path + "/images/misc/down.gif";
		menuFlag = 0;
	}
}

function getHTTPObject() 
{

var xmlhttp;

  /*@cc_on

  @if (@_jscript_version >= 5)

    try {

      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

    } catch (e) {

      try {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

      } catch (E) {

        xmlhttp = false;

      }

    }

  @else

  xmlhttp = false;

  @end @*/

  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {

    try {

      xmlhttp = new XMLHttpRequest();

    } catch (e) {

      xmlhttp = false;

    }

  }

  return xmlhttp;


}

var http = getHTTPObject(); // We create the HTTP Object







