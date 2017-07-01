<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="UTF-8" />
		<!--
	      Introduction to Javascript Programming with XML and PHP - Elizabeth Drake
	      Chapter 4
	      Greg's Gambits: 
	
	      Student Developer: Matthew B. Dowell
	      Date:   02/26/2017 
	      Course: ITSE-2302.WW1
	
	      Filename:  greg_encoder.html
	   -->
	<title>Greg's Gambits | Secret Message Encoder</title>
	<meta name="author" content="Matthew Dowell" />
	<meta name="date" content="Spring 2017" />
	
	<link href="greg.css" rel="stylesheet" type="text/css" />

<style>

	
table{
	width: 90%;
	resize: auto; 
	padding: 2px;
	border-spacing: 1;
	border-collapse: separate;
}
td{
	align: center;
	}
	
</style>
	

<script type="text/javascript">
function encodeIt(){	
 		 
		document.getElementById("message").innerHTML  = ("...");
		document.getElementById("secret").innerHTML = ("...");
		 //initialize variables
		 var str = ""; 
		 var newStr = "";
		 var choice = "";
		 var upperCaseCode = 155;
		 var newCode = 0; 
		 var lowerCaseCode = 219; 
		 var specialCode = 3; //for special characters and numerical values
		 
		//display prompt in separate window
		 var smallWin = window.open("", "Question","width=450, height=200", "top=100, left=100");
		 	str = smallWin.prompt("Enter your message.", "");
		 //does the user want original message displayed? 
		    if((str == null) || (str == "")){
		   	 	smallWin.close(); 
		    }else{
			   	choice = smallWin.prompt("Do you want original message displayed? 'Yes' or 'No'?", " ");
			   	smallWin.close(); 
		   	}
			
	
		if(str == ""){
			document.getElementById("message").innerHTML = "You did not submit a message to encode"; 
			document.getElementById("secret").innerHTML = "..."; 
			document.getElementById("encode").setAttribute("value", "Enter your message"); 
		}else{	
			 //the loop encodes each letter in the message string
			 for(var i = 0; i < str.length; i++){
			  	 
				 //check for upppercase letters and encode them
				 if((str.charCodeAt(i)>=65) && (str.charCodeAt(i) <=90)){
					 newCode = (upperCaseCode - str.charCodeAt(i));
					 
				//check for lowercase letters and encode them
				 }else if((str.charCodeAt(i >= 97)) && (str.charCodeAt(i) <= 122)){
					 newCode = (lowerCaseCode - str.charCodeAt(i));
					 
				//check for numbers and special characters and encode them
				 }else if((str.charCodeAt(i) > 90) && (str.charCodeAt(i) < 97) || (str.charCodeAt(i) < 65)){
					newCode = (str.charCodeAt(i) + specialCode);  
			 	 }
				
				//add each encoded character to the new message
				newStr = newStr + " " + String.fromCharCode(newCode); 
	
			 }//end for loop (i=0; i<str.length(); i++)  
			 
				//display the encoded message on the web page
				document.getElementById("secret").innerHTML = newStr;
				
			//decide if original message should be shown
			if((choice.charAt(0) == 'y') || (choice.charAt(0) == 'Y')){
				document.getElementById("message").innerHTML = str; 
			}
		}//end of if-else(str == "")
	
	if(newStr != "" || str != ""){
		document.getElementById("encode").setAttribute("value", "Enter another message"); 
	}; 		 
}
</script>
</head>

<body>
<div id="container">
 <img src="images/superhero.jpg" width="120" height="120" class="floatleft" alt="superhero" />
 <h1 id="logo"><em>The Secret Message Encoder</em></h1>
 <p>&nbsp;</p>
<?php include 'common/nav.php'; ?>
<div id="content">
	 <h2>Write A Message and Encode It</h2>
	<p>
	<input type="button" id="encode" value="Enter your message" onclick="encodeIt();" />
	</p>
  	<table>
	    <tr>
	    	<td><h2>Encoded Message:</h2></td>
	    	<td id="secret"><p>...</p></td> 
	    </tr> 
		<tr>
			<td><h2>Message:</h2></td>
			<td id="message">...</td>
		</tr>  
	</table>
</div>
<?php include 'common/footer.php'; ?>
</div>
</body>
</html>
