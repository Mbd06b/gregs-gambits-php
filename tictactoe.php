<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="UTF-8" />
		<!--
	      Introduction to Javascript Programming with XML and PHP - Elizabeth Drake
	      Chapter 6 Part II
	      Greg's Gambits:  Tic Tac Toe
	
	      Student Developer: Matthew B. Dowell
	      Date:   03/22/2017 
	      Course: ITSE-2302.WW1
	
	      Filename:  tictactoe.html
	   -->
	<title>Greg's Gambits |Tic Tac Toe</title>
	<meta name="author" content="Matthew Dowell" />
	<meta name="date" content="Spring 2017" />
	
	<link href="greg.css" rel="stylesheet" type="text/css" />

<style>

#playagainbutton{
 display: none; 
}

#score{
	
}

h3{
 padding: 0px;
 margin: 0px; 
 text-align: center; 
}
#owins, #xwins, #draws{
	border-style: solid; 
	border-width: 2px;
	font-size: 100%; 
 	display: block;
 	padding: 10px;
 	margin: 5px; 
 	float: left; 
}

input{
	padding: 0px 2px 0px 2px;
}

input:hover {
    opacity: 0.8;
}

#gamestatus{
	width: 100%; 
	margin: auto;
}

#gametarget{
  width: 350px; 
  margin: auto; 
}

#gameboard > li:active {
    width: 100px;
    height: 100px;
    border: 0;
}

#wrapper{
}

#controls{
 }

#controls input, #playbutton {
	display: inline-block;
	 float: left; 
	padding: 10px; 
	text-weight: bold; 
}
	
</style>
	

<script type="text/javascript">

var BLANK_TILE_IMG = ""; 
var O_TILE_IMG = ""; 
var X_TILE_IMG = "";


var winner = false; 
var xWinCounter = 0; 
var oWinCounter = 0; 
var drawCounter = 0;

function reset(){
	xWinCounter = 0;
	oWinCounter = 0; 
	drawCounter = 0; 
	document.getElementById("xwins").innerHTML = "'X'-Score: "+xWinCounter;
	document.getElementById("owins").innerHTML = "'O'-Score: "+oWinCounter;
	document.getElementById("draws").innerHTML = "Draw: " + drawCounter; 
	
}

var boardWidth = 3;
var boardHeight = 3; 
var numGameTiles = boardWidth * boardHeight; 
var turn = 0; //0 for X, 1 for O;
var turnCounter = 0; 

				
var yBoard = [ [0,0,0],
			   [0,0,0],
			   [0,0,0]
			   ];
			   
var xBoard = [ [0,0,0],
			   [0,0,0],
			   [0,0,0]
			   ];
			   
var tempBoard = [[0,0,0], //will be assigned whoever we're checking
	  			 [0,0,0],
	  			 [0,0,0]
	  		]; 

//the init() function initializes a canvas element, and saves canvas images to storage to generate our gameboard. 
window.onload = function init(){  	
	 
 	var c = document.getElementById("tile_img");
	var ctx = c.getContext("2d");
	
	//create blank tile
	ctx.fillStyle="#f1f1f1"; 
	ctx.fillRect(0, 0, 100, 100);
	
		BLANK_TILE_IMG = c.toDataURL("image/png");

	
	//create "O" tile; 
    var radius = 25;
    ctx.beginPath();
    ctx.arc(50, 50, radius, 0, 2 * Math.PI, false);
  
    ctx.lineWidth = 10;
    ctx.strokeStyle = '#FFA500';
    ctx.stroke();
		O_TILE_IMG = c.toDataURL("image/png"); 	
		
	
	ctx.fillStyle="#f1f1f1"; 
	ctx.fillRect(0, 0, 100, 100);
	
	//create "X" tile; 
	ctx.beginPath();
	ctx.strokeStyle = '#FFFF00';
	ctx.lineWidth = 10;
    ctx.moveTo(29, 71);
    ctx.lineTo(71, 29);
    ctx.stroke();
    ctx.beginPath();
    ctx.moveTo(29,29); 
    ctx.lineTo(71,71);
    ctx.stroke(); 
	    X_TILE_IMG = c.toDataURL("image/png");

	 document.getElementById("tile_img").style.display = 'none';
		
}


 function newBoard(x, y){
	 
	 //reset global variables for new game. 
	 boardWidth = x;
	 boardHeight = y; 
	 winner = ""; 
	 turn = 0; 
	 turnCounter = 0; 
	 document.getElementById("gamestatus").innerHTML = "Player 'X' Begin!'"; 
	 
	 yBoard = [ [0,0,0],
		  		[0,0,0],
		  		[0,0,0]
		  	 ];
	 xBoard = [ [0,0,0],
		 	    [0,0,0],
		 	    [0,0,0]
		 	  ];
	 
	 tempBoard = [[0,0,0], //will be assigned whoever we're checking
				  [0,0,0],
				  [0,0,0]
				 ]; 
	 
	 numGameTiles = boardWidth * boardHeight; 
	 
	 //Generate Tic-Tac-Toe board using the image src's generated from init() canvas operations. 
	var gameBoardHTML = '<form id="gameboard">';
		for(var i = 0; i < boardHeight; i++){
			for(var j = 0; j < boardWidth; j++){
				gameBoardHTML += '<input id="tile'+i+''+j+'" class="" onclick="play('+i+','+j+'); return false;" type="image" src="'+ BLANK_TILE_IMG +'" alt="tile"></input>';
			}
		}
		gameBoardHTML += '</form>';  
		
		//adjust user inputs
		document.getElementById("gametarget").innerHTML = gameBoardHTML;
		document.getElementById("playbutton").style.display = 'none';
		document.getElementById("playagainbutton").style.display = 'block';
		document.getElementById("playagainbutton").setAttribute("Value","Reset");
 }
	

 
 
 
function play(row, col){
	
 var e = document.getElementById('tile'+row+col);
 var played = e.getAttribute("class"); 
 var sum = 0; 

if((played == "") && (!winner)){
	
	if(turn == 0){// X's turn
		e.setAttribute("src", X_TILE_IMG);
		e.setAttribute("class", "X");
		xBoard[row][col] = 1; 
		tempBoard = xBoard; //will be assigned whoever we're checking

	}else{ //Y's Turn
		e.setAttribute("src", O_TILE_IMG);
		e.setAttribute("class", "Y");
		yBoard[row][col] = 1; 
		tempBoard = yBoard; 
	}
	turnCounter++; 
}

//Checks all Horizontal Wins
for(var i = 0; i < 3; i++){
	
	for(var j = 0; j < 3; j++){
		sum += tempBoard[i][j]; 	
	}
		if((j == 3) && (sum == 3)){ 
	 		winner = true;//Horizontal win
	 	}else{
	 		sum = 0; //set sum to 0 check next row
	 	};
}	 

//Checks all Vertical Wins
for(var j = 0; j < 3; j++){
	
	 for(var i = 0; i < 3; i++){
		 sum += tempBoard[i][j]; 
	 	};
		 if((i == 3) && (sum == 3)){ 
		 		winner = true;//Vertical Win
		 	}else{
		 		sum = 0; //set sum to 0 check next row
		 	};
	 	
 }
 
 //Checks all diagonal Wins
 if((tempBoard[0][0] + tempBoard[1][1] + tempBoard[2][2]) == 3){
	 winner = true;
 }
 if((tempBoard[2][0] + tempBoard[1][1] + tempBoard[0][2]) == 3){
	 winner = true //diagonal win
 }
 
 //announce winner if identified
 if(winner){
		if(turn == 0){
			xWinCounter++;
			document.getElementById("gamestatus").innerHTML = "<h3>X-WINS!</h3>";
			document.getElementById("xwins").innerHTML = "'X'-Score: "+xWinCounter;
		}else{
			oWinCounter++;
			document.getElementById("gamestatus").innerHTML = "<h3>O-WINS!</h3>";
			document.getElementById("owins").innerHTML = "'O'-Score: "+oWinCounter;
		}
		document.getElementById("playagainbutton").setAttribute("value","Play Again?"); 
}else{
	if(turnCounter < 9){ //announce tie! 
		 //change turn
		 if(turn == 0){
			 turn = 1;
			 document.getElementById("gamestatus").innerHTML = "'O's Turn";
		 }else{
			 turn = 0; 
			 document.getElementById("gamestatus").innerHTML = "'X's Turn"; 
		 };
	}else{
		drawCounter++; 
		document.getElementById("gamestatus").innerHTML = "<h3>TIE!</h3>";
		document.getElementById("playagainbutton").setAttribute("value","Play Again?"); 
		document.getElementById("draws").innerHTML = "Draw: " + drawCounter; 
	}
}
 

return false; //returning false prevents the DOM from reloading. 
}





</script>
</head>

<body>
<div id="container">
 <img src="images/superhero.jpg" width="120" height="120" class="floatleft" alt="superhero" />
 <h1 id="logo"><em>Tic Tac Toe</em></h1>
 <p>&nbsp;</p>
<?php include 'common/nav.php'; ?>


<div id="content">
	 <h2>Let's Play Tic Tac Toe</h2>
		 <p>This game is for two players X and O. The goal is to get three boxes in a row (across, down, or diagonally).
	 	</p>
	 	<input type=button id="playbutton" onclick="newBoard(3,3);" value="Let's Play" />
	 	
	 	<div id="gamestatus"></div>
	 	<br />
	 	
	  		<div id="gametarget">
	  		<!-- TIC TAC TOE FORM GENERATED HERE -->
	  		</div>
	  		
		<br />

			<div id="score">
				<span id="xwins">'X'-score: 0</span>    
				<span id="owins">'O'-score: 0</span>
				<span id="draws">Draw: 0</span>
			</div>
		<br />
		<br />
		<br />
		<div id="wrapper">
			<div id="controls">
				<input type="button" id="playagainbutton" onclick="newBoard(3,3); return false;" value="Reset Game" />
				<input type="button" id="resetscore" onclick="reset();" value="Reset Scores" />
			</div>
		</div>
	

 <canvas id="tile_img" width="100" height="100" style="border: 1px solid white;">
Your browser does not support the HTML5 canvas tag. 
</canvas>
  
</div>
<?php 'common/footer.php'; ?>
</div>
</body>
</html>
