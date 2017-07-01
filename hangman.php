<!DOCTYPE html>
<html lang="en">
<head>
		<!--
	      Introduction to Javascript Programming with XML and PHP - Elizabeth Drake
	      Chapter 7
	      Greg's Gambits:  Greg's Hangman
	
	      Student Developer: Matthew B. Dowell
	      Date:   03/30/2017 
	      Course: ITSE-2302.WW1
	
	      Filename:  gregs_hangman.html
	   -->
<meta charset="UTF-8" /> 
<title>Greg's Gambits | Hangman</title>
<meta name="author" content="Matthew B. Dowell" />
<meta name="date" content="Spring2017" /> 

<link href="greg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="src/mySource.js"></script>
<script>


//declare variables (Global)
var newWord;
var win; 
var goodGuess;  
var nooseCount; 
var newWord; 
var offSet;
var wordNum;
var winPicture;
var lgth; 


function startHangman(){
	
	//initialize start variables
	newWord = "";
	win = false;  
	goodGuess = false;
	nooseCount = 0; 
	offSet = 0; 
	wordNum = Math.floor((Math.random()*9)+1); 
	winPicture = "pic" + wordNum + ".jpg";  
	
	//change UI options 
	document.getElementById("start").style.display = 'none';
	document.getElementById("myguess").style.display = 'inline-block';
	document.getElementById("ok").style.display = 'inline-block'; 
	document.getElementById("replay").style.display = 'inline-block';
	document.getElementById("noose").innerHTML = ("<img src='images/hangman0.gif' alt='empty_noose'  />");
	
	
	//create switch structure to select a random word
	switch(wordNum){
	case 1: word = "ghost"; 
		break;
	case 2: word = "horse";
		break;
	case 3: word = "insect";
		break; 
	case 4: word = "celery";
		break; 
	case 5: word = "pelican";
		break; 
	case 6: word = "jewelbox";
		break; 
	case 7: word = "castle";
		break; 
	case 8: word = "monster";
		break; 
	case 9: word = "bunny";
		break; 
	default:
			alert("error, var wordNum not properly set: "+ wordNum); 
	}
	console.log("Word: " + word); 
	
	 lgth = word.length; 
	 for(var i = 0; i < lgth; i++){
			newWord = newWord + "_ ";
	 }
	 document.getElementById("game").innerHTML = newWord;
			
};
	

	
//create code to get user's letters and display hangman images where necessary
//or to enter a correct guess in the appropriate space
function guessLetter(myguess){
	

	var guess = document.getElementById('myguess').value;
		goodGuess = false; 
		document.getElementById('myguess').value = ''; //resets the field after submission. 
  	  	    
	for(var i = 0; i < lgth; i++){
		if(guess == word.charAt(i)){
			console.log("Found Letter: " + word.charAt(i) + " i: " + i);
			goodGuess = true;
			offSet = 2 * i; 
			console.log("newWord is: " + newWord + " offSet is: " +offSet+ " guessLetter is: " + guess);
			newWord = setCharAt(newWord, offSet, guess); 
			document.getElementById("game").innerHTML = newWord;
		}
	}
		win = checkWord(word, newWord); 
		console.log("newWord is: " + newWord);
			
			if(win == true){
				document.getElementById("result").innerHTML = ("You win!");
				var winStr = ('<img src="images/'+ winPicture + '" alt="winning_pic" />');
				document.getElementById("noose").innerHTML = (winStr); 
				document.getElementById("ok").style.display = 'none';
				document.getElementById("myguess").style.display = 'none';
			}else if(win == false){
				document.getElementById("result").innerHTML = ("not a winner yet"); 
				if((goodGuess == false) && (nooseCount < 10)){	
				nooseCount++; 
				var nooseStr =  ('<img src="images/hangman'+ nooseCount + '.gif" alt="hang_progressed" />');
					document.getElementById("noose").innerHTML = (nooseStr);
				}else if(nooseCount >= 10){
				document.getElementById("result").innerHTML = 'YOU LOST!';
				}
			}	
	}


	

//create function to check the word and replace a space with a correct guess
function checkWord(word, otherWord) {
	var cleanWord;
	cleanWord = otherWord;
	cleanWord = otherWord.replace(/ /g, ""); //takes out spaces between "a _ _ _ _" , returns "a____"  before check.
										   	//we get a proper comparison between word: "apple" and otherWord: "a p p l e". 
	if(word == cleanWord){
		return true;
	}else{
		return false; 
	}
}

function setCharAt(str,index,chr){
	
	if(index > (str.length - 1)){
		return str; 
	}; 
	return str.substr(0, index) + chr + str.substr(index+1);
}	
</script>

<style>
	h2{
	text-align: center; 
	}
	.content{
	width: 600px; 
	margin-left: auto; 
	margin-right: auto
	}
	
	input#replay{
	display: none; 
	}
	
	input#myguess, input#ok{
	display: none;
	}
	

</style>
</head>
<body>
	<div id="container">
		<img src="images/superhero.jpg" class="floatleft" alt="superhero" />
		<h1 id="logo"><em>The Game of Hangman</em></h1>
 		<h2>Greg Challenges You to a Game of Hangman</h2>
		<p>&nbsp;</p>
		<?php include 'common/nav.php'; ?>
	<div id="content">
		<form>
			<div id="play">
			<input type="text" maxlength="1" size="10" name="entertext" id="myguess" value="" autocomplete="off" />
			<input type="button"  id="ok" onclick="guessLetter('myguess');" value="ok" /> 
			</div>
			<br />
			<input type="button" id="start" value="Start the game" onclick="startHangman();" />
			<input type="submit" id="replay" onclick="startHangman();" value="Start Over?" /> 
		</form>
		<div id="noose" class="floatright">
			<img src="images/hangman10.gif" alt="hang_progress" />
		</div>
		<br />
		<br />
		<br />
		<div id="game"><p>&nbsp;</p></div>
		<div id="result"><p>&nbsp;</p></div>
		
		
	</div>
	<?php include 'common/footer.php'; ?>
</body>
<script>
//prevents the enter button 'keyCode 13' from reloading the DOM on submit, and instead runs the guessLetter func. 
document.getElementById('myguess').addEventListener('keypress', function(event) {
    if (event.keyCode == 13) {
        event.preventDefault();
        guessLetter('myguess');
    }
});
</script>
</html>
