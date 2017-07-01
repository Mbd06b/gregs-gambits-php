<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Greg's Gambits | The Battleground</title>
	<meta name="author" content="Matthew Dowell" />
	<meta name="date" content="Spring 2017" />
	<link href="greg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	
function battleIt(){
		//initialize variables
		var trollPts = 100;
		var trollPlay = 0; 
		var heroPts = 100; 
		var winScore = 130; 
		var heroPlay = 0; 
		var round = 1; 
		var weapons = ["magic rocks", "the sword","bow and arrow"];
		var str = ""; 
		var heroChoice = "";
		var trollChoice = "";
		var validInput = false; 

		//fill HTML page
		document.getElementById("heroPts").innerHTML = (heroPts);
		document.getElementById("trollPts").innerHTML = (trollPts);
		document.getElementById("playerWeapon").innerHTML = ("Your weapon: ");
		document.getElementById("trollWeapon").innerHTML = ("The troll's weapon: ");
		document.getElementById("winner").innerHTML = ("&nbsp;");
		//loop repeats until troll or player get 130 points
 		
		while ((trollPts < winScore) && (heroPts < winScore)) {
			// get player's weapon
			  do{
			    var smallWin = window.open("", "Question","width=460, height=220", "top=100, left=100");
				 	str = smallWin.prompt("Round: "+ round +", Enter '1'-rocks, '2'-sword, '3'-bow & arrow, or '4'-EXIT","");
				 	heroPlay = parseInt(str); //cleans up prompt str for clear calculations
					 	
					 	if(str == null){
					 		heroPlay = 4; 
					 		validInput = true; 
					 	}else if((str == "") ||(heroPlay < 1) || (heroPlay > 4)){
					 		smallWin.prompt("Invalid Choice Try again 1-3, or 4 for exit")
					 		validInput = false; 
					 	}else{
					 		console.log("Input Valid"); 
					 		round++; 
					 		validInput = true; 
					 	}
				   	 	smallWin.close(); 
			    }while(!validInput);
			  
			if(heroPlay == 4){
				 break; 
			}else{
				
			// get troll's weapon
				trollPlay = Math.floor(Math.random() * 3 +1); //random number  1-3;	 
				heroPlay--; //decreses selections by 1, aligns to weapons[i] array index. 
				trollPlay--; 
			
			// assign weapons to player and troll
				heroChoice = weapons[heroPlay];
				trollChoice = weapons[trollPlay];
			//display weapon selections
			
					document.getElementById("playerWeapon").innerHTML = "Your weapon: " + heroChoice;
					document.getElementById("trollWeapon").innerHTML = "The Troll's weapon: " + trollChoice; 
					console.log("innerHTML weapon element loads executed");
					
					 //find the winner
					 if(trollPlay == heroPlay){
						 //ties
						 document.getElementById("winner").innerHTML = "This round is a tie. New weapons must be chosen..."; 
					 }else if(((((heroPlay-trollPlay) + 3) % 3)) == 1){
						 //wins
						 document.getElementById("winner").innerHTML = '<img src="images/wizard.jpg" width="120" height="168" alt="wizard" />';
						 trollPts -= 10; 
						 heroPts += 10; 
						 document.getElementById("trollPts").innerHTML = (trollPts); 
						 document.getElementById("heroPts").innerHTML = (heroPts); 
					 }else{
						 //loses
						 document.getElementById("winner").innerHTML = '<img src="images/troll.jpg" width="120" height="168" alt="troll />'; 
						 trollPts += 10; 
						 heroPts -= 10; 
						 document.getElementById("trollPts").innerHTML = (trollPts); 
						 document.getElementById("heroPts").innerHTML = (heroPts); 
					 };
			};
		};//end of while pts < 130 loop
		
		//display the final winner
		if(heroPlay == 4){
			document.getElementById("winner").innerHTML = ("It's true: when you run, you live to fight another day. See you again soon."); 
		};
		if(trollPts >= winScore){
			document.getElementById("winner").innerHTML = ("The battle has been fought valiently but the troll has beaten you. Go home and nurse your wounds."); 
		};
		if(heroPts >= winScore){
			document.getElementById("winner").innerHTML = ("The battle has been fought valiently and you have prevailed! Congratulations!"); 
		};
}
</script>
<style type="text/css">

h1{
	text-align: center; 
}
.style1 {font-size: 18px;

}
table {
	border: none; 
	padding: 5px; 
	width: 85%;  
}

#winner{
	align: center; 
}

</style>
</head>

<body>
	<div id="container">
		<img src="images/superhero.jpg" width="120" height="120" class="floatleft" alt="superhero" />
		<h1>The Battleground</h1>
		<div style="clear: both;"></div>
<?php 
	include 'common/nav.php';
?>
		<div id="content">
			<table>
				<tr>
					<td><img src="images/wizard.jpg" width="120" height="168" alt="wizard" /></td>
					<td><img src="images/troll.jpg" width="120" height="168" alt="troll" /></td>
				</tr>
				<tr>
					<td><span class="style1">Wizard uses: </span></td>
					<td><span class="style1">Troll uses: </span></td>
				</tr>
				<tr>
					<td id="playerWeapon"><span class="style1">Weapon goes here</span></td>
					<td id="trollWeapon"><span class="style1">Weapon goes here</span></td>
				</tr>
				<tr>
					<td colspan=2><span class="style1">The winner is:</span></td>
				</tr>
				<tr>
					<td colspan=2 id="winner" class="style1">&nbsp;</td>
				</tr>
				<tr>
					<td><span class="style1">Wizard points: </span></td>
					<td><span class="style1">Troll points:</span></td>
				</tr>
				<tr>
					<td class="style1" id="heroPts">100</td>
					<td class="style1" id="trollPts">100</td>
				</tr>
				<tr>
					<td><input type="button" id="battle" value="Let the battle begin!" onclick="battleIt();" /></td>
					<td><input type="button" id="return" value="Return to battle instructions" onclick="location.href = 'greg_battle.html';"  /></td>
			</table>
		</div>
<?php 
include 'common/footer.php'
?>
	</div>
</body>
</html>
