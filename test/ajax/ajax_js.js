//////////////////// /////////////////
// This file is for ajax
/////////////////////////////////////////////////////////////////////
	
function handleHttpResponse() 
	{	
		if (http.readyState == 4) {
			  if(http.status==200) {
			  	var results=http.responseText;
			  document.getElementById('divList').innerHTML = results;
			  }
  			}
	}
  var url = "get_artifak_list.php?id=";
function requestArtifakList(url) 
		{      
            var sId = document.getElementById("No_Pendaftaran1").value;
			http.open("GET", url + escape(sId), true);
			http.onreadystatechange = handleHttpResponse;
			http.send(null);
        }
		
function getHTTPObject() {
  var xmlhttp;
 
  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
  }
  else if (window.ActiveXObject){
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    if (!xmlhttp){
        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
    
}
  return xmlhttp;

  
}
var http = getHTTPObject(); // We create the HTTP Object

 function handleHttpResponse_getDepartment_Ajax() 
{
  
 //alert(http.responseText);
  
  
  if (http.readyState == 4) 
  {
	if(http.responseText == "")
	{
		document.form1.facultyid.options[0] = new Option('Not Found','' );
	}
	else
	{
		
		var main_array1=http.responseText.split("|");
		var num=0;
		var main_array2;
		var main_array20;
		var main_array21;
		
		while (num < main_array1.length-1)
		{
		 	main_array2=main_array1[num].split("^");
		 	main_array20 = main_array2[0];
			main_array21 = main_array2[1];
			
			document.form1.facultyid.options[num] = new Option(main_array21,main_array20);
			num+=1;
		}
	}	
  }
}
function getDepartment_Ajax(str)
{
	
	document.form1.facultyid.options.length = 0;
	document.form1.facultyid.options[0] = new Option('Loading..Please wait...','' );
	http.open("GET","../../ajax/ajax.php?action=getDepartment&collegeid="+str, true);
	
  	http.onreadystatechange = handleHttpResponse_getDepartment_Ajax;
	
  	http.send(null);
}

function handleHttpResponse_getCourse_Ajax() 
{
	// alert(http.responseText);
  
 if (http.readyState == 4) 
  {
	if(http.responseText == "")
	{
		document.form1.studCourse.options[0] = new Option('Not Found','' );
	}
	else
	{
		var main_array1=http.responseText.split("|");
		var num=0;
		var main_array2;
		var main_array20;
		var main_array21;
	while (num < main_array1.length-1)
		{
		 	main_array2=main_array1[num].split("^");
		 	main_array20 = main_array2[0];
			main_array21 = main_array2[1];
			document.form1.studCourse.options[num] = new Option(main_array21,main_array20);
		 	
			
			
			num+=1;
		}
	}	
  }
}


function handleHttpResponse_getEmployeeCourse_Ajax() 
{
	// alert(http.responseText);
  
 if (http.readyState == 4) 
  {
	if(http.responseText == "")
	{
		document.form1.employeecourse.options[0] = new Option('Not Found','' );
	}
	else
	{
		var main_array3=http.responseText.split("|");
		var num=0;
		var main_array4;
		var main_array22;
		var main_array23;
	while (num < main_array3.length-1)
		{
		 	main_array4=main_array3[num].split("^");
			//alert(main_array4);
		 	main_array22 = main_array4[0];
			main_array23 = main_array4[1];
		//	alert(main_array22);
		//	alert(main_array23);
			
			document.form1.employeecourse.options[num] = new Option(main_array23,main_array22);
		 
			num+=1;
		}
	}	
  }
}

function getCourse_Ajax(str1,str2)
{
	document.form1.studCourse.options.length = 0;
	document.form1.studCourse.options[0] = new Option('Loading..Please wait...','' );
	
	http.open("GET","../../ajax/ajax.php?action=getCourse&facultyid="+str1+"&collegeid="+str2, true);
  	http.onreadystatechange = handleHttpResponse_getCourse_Ajax;
  	http.send(null);
}

function getCourse_Ajax2(str1)
{
	//alert(str1)
	document.form1.employeecourse.options.length = 0;
	document.form1.employeecourse.options[0] = new Option('Loading..Please wait...','' );
	
	http.open("GET","../../ajax/ajax.php?action=getCourse2&employeedicipline="+str1, true);
  	http.onreadystatechange = handleHttpResponse_getEmployeeCourse_Ajax;
  	http.send(null);
} 



function getDispCourse_Ajax(str1)
{
	document.form1.studCourse.options.length = 0;
	document.form1.studCourse.options[0] = new Option('Loading..Please wait...','' );
	
	http.open("GET","../../ajax/ajax.php?action=getDispCourse&facultyid="+str1, true);
  	http.onreadystatechange = handleHttpResponse_getCourse_Ajax;
  	http.send(null);
} 


 function handleHttpResponse_getSubject_Ajax() 
{
	// alert(http.responseText);
  
 if (http.readyState == 4) 
  {
	if(http.responseText == "")
	{
		document.form1.coursesubjectid.options[0] = new Option('Not Found','' );
	}
	else
	{
		var main_array1=http.responseText.split("|");
		var num=0;
		var main_array2;
		var main_array20;
		var main_array21;
	while (num < main_array1.length-1)
		{
		 	main_array2=main_array1[num].split("^");
		 	main_array20 = main_array2[0];
			main_array21 = main_array2[1];
			document.form1.coursesubjectid.options[num] = new Option(main_array21,main_array20);
		 	
			
			
			num+=1;
		}
	}	
  }
}
function getCourseSubject_Ajax(str1,str2)
{
	document.form1.coursesubjectid.options.length = 0;
	document.form1.coursesubjectid.options[0] = new Option('Loading..Please wait...','' );
	
	http.open("GET","../../ajax/ajax.php?action=getCourseSubject&studCourse="+str1+"&year="+str2, true);
  	http.onreadystatechange = handleHttpResponse_getSubject_Ajax;
  	http.send(null);
} 

function handleHttpResponse_getDistrict_Ajax() 
{
  
 //alert(http.responseText);
  
  
  if (http.readyState == 4) 
  {
	if(http.responseText == "")
	{
		document.form1.districtid.options[0] = new Option('Not Found','' );
	}
	else
	{
		
		var main_array1=http.responseText.split("|");
		var num=0;
		var main_array2;
		var main_array20;
		var main_array21;
		
		while (num < main_array1.length-1)
		{
		 	main_array2=main_array1[num].split("^");
		 	main_array20 = main_array2[0];
			main_array21 = main_array2[1];
			
			document.form1.districtid.options[num] = new Option(main_array21,main_array20);
			num+=1;
		}
	}	
  }
}

function getDistrict_Ajax(str)
{
	
	document.form1.districtid.options.length = 0;
	document.form1.districtid.options[0] = new Option('Loading..Please wait...','' );
	http.open("GET","../../ajax/ajax.php?action=getDistrict&stateid="+str, true);
	
  	http.onreadystatechange = handleHttpResponse_getDistrict_Ajax;
	
  	http.send(null);
}

function handleHttpResponse_getSchool_Ajax() 
{
	// alert(http.responseText);
  
 if (http.readyState == 4) 
  {
	if(http.responseText == "")
	{
		document.form1.collegeid.options[0] = new Option('Not Found','' );
	}
	else
	{
		var main_array1=http.responseText.split("|");
		var num=0;
		var main_array2;
		var main_array20;
		var main_array21;
	while (num < main_array1.length-1)
		{
		 	main_array2=main_array1[num].split("^");
		 	main_array20 = main_array2[0];
			main_array21 = main_array2[1];
			document.form1.collegeid.options[num] = new Option(main_array21,main_array20);
		 	
			
			
			num+=1;
		}
	}	
  }
}

function getSchool_Ajax(str1,str2)
{
	document.form1.collegeid.options.length = 0;
	document.form1.collegeid.options[0] = new Option('Loading..Please wait...','' );
	
	http.open("GET","../../ajax/ajax.php?action=getSchool&districtid="+str1+"&stateid="+str2, true);
  	http.onreadystatechange = handleHttpResponse_getCourse_Ajax;
  	http.send(null);
} 

function handleHttpResponse_getYear_Ajax() 
{
  
 //alert(http.responseText);
  
  
  if (http.readyState == 4) 
  {
	if(http.responseText == "")
	{
		document.form1.year.options[0] = new Option('Not Found','' );
	}
	else
	{
		
		var main_array1=http.responseText.split("|");
		var num=0;
		var main_array2;
		var main_array20;
		var main_array21;
		
		while (num < main_array1.length-1)
		{
		 	main_array2=main_array1[num].split("^");
		 	main_array20 = main_array2[0];
			main_array21 = main_array2[1];
			
			document.form1.year.options[num] = new Option(main_array21,main_array20);
			num+=1;
		}
	}	
  }
}
function getYear_Ajax(str)
{
	
	document.form1.year.options.length = 0;
	document.form1.year.options[0] = new Option('Loading..Please wait...','' );
	http.open("GET","../../ajax/ajax.php?action=getDepartment&year="+str, true);
	
  	http.onreadystatechange = handleHttpResponse_getYear_Ajax;
	
  	http.send(null);
}

function handleHttpResponse_getStudYear_Ajax() 
{
	// alert(http.responseText);
  
 if (http.readyState == 4) 
  {
	if(http.responseText == "")
	{
		document.form1.year.options[0] = new Option('Not Found','' );
	}
	else
	{
		var main_array1=http.responseText.split("|");
		var num=0;
		var main_array2;
		var main_array20;
		var main_array21;
	while (num < main_array1.length-1)
		{
		 	main_array2=main_array1[num].split("^");
		 	main_array20 = main_array2[0];
			main_array21 = main_array2[1];
			document.form1.year.options[num] = new Option(main_array21,main_array20);
		 	
			
			
			num+=1;
		}
	}	
  }
}

function getStudYear_Ajax(str1,str2,str3)
{
	document.form1.year.options.length = 0;
	document.form1.year.options[0] = new Option('Loading..Please wait...','' );
	
	http.open("GET","../../ajax/ajax.php?action=getStudYear&collegeid="+str1+"&facultydid="+str2+"&studCourse="+str3, true);
  	http.onreadystatechange = handleHttpResponse_getStudYear_Ajax;
  	http.send(null);
}

