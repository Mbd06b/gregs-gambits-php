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
<title>Greg's Gambits | Greg's 15</title>
<meta name="author" content="Matthew B.Dowell" />
<meta name="date" content="Spring 2017" /> 
<link href="greg.css" rel="stylesheet" type="text/css" />
<script type = "text/javascript">

//global variables
	var cells;
	var swapped;
//declare and initialize variables

function setup(){
	cells = [
		[document.getElementById("cell00"),
		 document.getElementById("cell01"),
		 document.getElementById("cell02"),
		 document.getElementById("cell03")],
		[document.getElementById("cell10"),
		 document.getElementById("cell11"),
		 document.getElementById("cell12"),
		 document.getElementById("cell13")],
		[document.getElementById("cell20"),
		 document.getElementById("cell21"),
		 document.getElementById("cell22"),
		 document.getElementById("cell23")],
		[document.getElementById("cell30"),
		 document.getElementById("cell31"),
		 document.getElementById("cell32"),
		 document.getElementById("cell33")]
		]
		
	// create function to load array and call placeNumbers()
	placeNumbers();
	}
	
	// create function to place random numbers in the cells
function placeNumbers(){
		
		var numbers = [];
		var randomLoc;
		var temp;// create function to place random numbers in the cells
		var i;
		
		for(i = 0; i < 16; i++){
			numbers[i] = i; 
		}
		
		for(i = 0; i < 16; i++){
			randomLoc = Math.floor(Math.random() * 15 + 1);
			temp = numbers[i];
			numbers[i] = numbers[randomLoc];
			numbers[randomLoc] = temp; 
		}
		
		i = 0; 
		for(var rows = 0; rows < 4; rows++){
			for(var cols = 0; cols < 4; cols++){
				if(numbers[i]!= 0){
					cells[rows][cols].innerHTML = numbers[i];
				}else{
					cells[rows][cols].innerHTML = "";  
				}
				i++; 
			}
		}
		

	}

function doClick(row, col){

	// create the function that will check, each time a cell is clicked, if
	// the move is legal and will, if it is not legal, display an alert
	// if the move is legal, the function should call the swap() function
	// it should also check to see if this move is a winner, i.e., call checkWinner()
	var top = row - 1; 
	var bottom = row + 1; 
	var left = col - 1; 
	var right = col + 1; 
	swapped = false; 
	if(top != -1 && cells[top][col].innerHTML == ""){
		swap(cells[row][col], cells[top][col]);
	}else if(right != 4 && cells[row][right].innerHTML == ""){
		swap(cells[row][col], cells[row][right]);
	}else if(bottom != 4 && cells[bottom][col].innerHTML == ""){
		swap(cells[row][col], cells[bottom][col]);
	}else if(left != -1 && cells[row][left].innerHTML == ""){
		swap(cells[row][col], cells[row][left]);
	}else{
		alert("ILLEGAL MOVE"); 
	}
	checkWinner(); 
}
	
	
function swap(firstCell, secondCell){
	// create function to swap values
	swapped = true; 
	secondCell.innerHTML = firstCell.innerHTML; 
	firstCell.innerHTML = "";
	}
	

function checkWinner(){
	// create function to check if the last move made makes this a win
	var win = true;
	for(var i = 0; i < 4; i++){
		for(var j = 0; j < 4; j++){
			if(!(cells[i][j].innerHTML == i*4 + j + 1)){
				if(!(i == 3 && j == 3)){
					win = false; 
				}
			}
		}
	}
	// display winning message if it is a winner
	if(win){
		alert("Congratulations! You won!"); 
		if(window.prompt("Play again?", "yes")){
			placeNumbers(); 
		}
	}	
}

</script>
<style>

table	{
	width:60%;
	height: 60%;
	margin-left: auto; 
	margin-right: auto
}

td	{	
	padding: 10px; 
	text-align: center; 
}



</style>
</head>
<body onload="setup();">
<div id="container">
	<img src="images/superhero.jpg" class="floatleft" alt="superhero" />
	<h1 id="logo"><em>Greg's 15</em></h1>
	<p>&nbsp;</p>
	<?php include 'common/nav.php' ?>
	
	<div id="content">
	<p><input type="button" value = "Start the game" onclick="setup();" /></p>
	<p>You can move any number into an empty spot by moving up, down,right, or left. Diagonal moves are not allowed. The object is to get all the numbers into correct order, from 1 through 15 with the empty space at the end. </p>
		<table>
			<tr>
				<td><span onclick="doClick(0,0);" id="cell00" ></span></td>
				<td><span onclick="doClick(0,1);" id="cell01" ></span></td>
				<td><span onclick="doClick(0,2);" id="cell02" ></span></td>
				<td><span onclick="doClick(0,3);" id="cell03" ></span></td>
			</tr>
			<tr>
				<td><span onclick="doClick(1,0);" id="cell10" ></span></td>
				<td><span onclick="doClick(1,1);" id="cell11" ></span></td>
				<td><span onclick="doClick(1,2);" id="cell12" ></span></td>
				<td><span onclick="doClick(1,3);" id="cell13" ></span></td>
			</tr>
			<tr>
				<td><span onclick="doClick(2,0);" id="cell20" ></span></td>
				<td><span onclick="doClick(2,1);" id="cell21" ></span></td>
				<td><span onclick="doClick(2,2);" id="cell22" ></span></td>
				<td><span onclick="doClick(2,3);" id="cell23" ></span></td>
			</tr>
			<tr>
				<td><span onclick="doClick(3,0);" id="cell30" ></span></td>
				<td><span onclick="doClick(3,1);" id="cell31" ></span></td>
				<td><span onclick="doClick(3,2);" id="cell32" ></span></td>
				<td><span onclick="doClick(3,3);" id="cell33" ></span></td>
			</tr>
		</table>
</div>
<?php include 'common/footer.php'; ?>
</body></html>
