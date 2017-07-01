<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
<title>Greg's Gambits | Madame Vadoma Sees All</title>
<link href="greg.css" rel="stylesheet" type="text/css" />
<meta name="author" content="Matthew Dowell" />
<meta name="date" content="Spring 2017" /> 
<style>
.container h2{
 align: center; 
 }
</style>
<script type="text/javascript">

window.onload = function(){
console.log("window onload func executed");
sessionStorage.originalButton = document.getElementById("content").innerHTML;
console.log("Session storage captured HTML of 'content'");
}

function startFortune()
{
 	//initialize variables: edit fortunes if you want
	var num = 0; 
	var question = ""; 
	var noFortune = "You did not ask a question"; 
	var fortune1 = '"Absolutely"';
	var fortune2 = '"No way"';
	var fortune3 = '"Probably"';
	var fortune4 = '"Doubtful"';
	var fortune5 = '"Could be"';
	var fortune6 = '"Madame Vadoma cannot answer such a question."';
	var fortune7 = '"You must find the answer within yourself."';
	var fortune8 = '"Yes, of course!"';
	var fortune9 = '"You don&#39t really believe this works, do you?"';
	var fortune10 = '"Madame Vadoma wonders about that too."';
	var error =  'My guidance is blind! something is wrong! Please contact the Webmaster!" <a href="mailto:yourfirstname@yourlastname.com">yourfirstname@yourlastname.com</a>';  

	console.log("Variables Initiated"); 	
	num = (Math.floor(Math.random() * 10)) + 1;
	var smallWin = window.open(this.href, "Question","width=450, height=200", "top=100, left=100");
	question = smallWin.prompt("What is your question? ", "");
	smallWin.close();  
	
	if(question == "" || question == null){
		document.getElementById("content").innerHTML = noFortune; 
	}else{
		
		console.log("Prompt Recieved"); 
		switch(num)
		{
			case 1:
				document.getElementById("content").innerHTML = question + "<br />" + fortune1;
				break;
			case 2:
				document.getElementById("content").innerHTML = question + "<br />" + fortune2;
				break;
			case 3:
				document.getElementById("content").innerHTML = question + "<br />" + fortune3;
				break;
			case 4:
				document.getElementById("content").innerHTML = question + "<br />" + fortune4;
				break;
			case 5:
				document.getElementById("content").innerHTML = question + "<br />" + fortune5;
				break;
			case 6:
				document.getElementById("content").innerHTML = question + "<br />" + fortune6;
				break;
			case 7:
				document.getElementById("content").innerHTML = question + "<br />" + fortune7;
				break;
			case 8:
				document.getElementById("content").innerHTML = question + "<br />" + fortune8;
				break;
			case 9:
				document.getElementById("content").innerHTML = question + "<br />" + fortune9;
				break;
			case 10:
				document.getElementById("content").innerHTML = question + "<br />" + fortune10;
				break;
			default: 
				document.getElementById("content").innerHTML = error; 
		}
		console.log("switch executed");
	}//end if-else 
		
		
		document.getElementById("content").innerHTML += "<br />";
		document.getElementById("content").innerHTML += sessionStorage.originalButton; 
			console.log("innerHTML recreated"); 
	
}
</script>
</head>
<body>
<div id="container">

 <img src="images/superhero.jpg" width="120" height="120" class="floatleft" alt="superhero" />
 <h1 id="logo"><em>Madame Vadoma Sees All!</em></h1>
  
<h2>Ask Madame Vadoma anything that you are worried about </h2>

<p>&nbsp;</p>
<?php include 'common/nav.php'; ?>
<div id="content">
	 <p class="floatright">Madame Vadoma<br /><br />
	 <img src ="images/madame.jpg" alt="Madame_Vadoma" /></p>
	 <p>&nbsp;</p>
	 <p><input id="startButton" type="button" value="Ask your question" onclick="startFortune();" /></p>
	 <p>&nbsp;</p>
</div>
<?php include 'common/footer.php'; ?>
</body>
</html>
