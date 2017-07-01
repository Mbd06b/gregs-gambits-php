<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
	<title>Greg's Gambits | Greg's Tales</title>
	
	<meta name="author" content="Matthew Dowell" />
	<meta name="date" content="Spring 2017" />
	
	<link href="greg.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript">
	
	function startGame()
	{   
		
		// initialize variables and prompt for information
		var numYears = prompt("Enter a number greater than 0: "); 
		var gender = prompt("Is the story about a boy or girl? ");
		var name = prompt("Enter the hero's name: ");
		var city = prompt("Enter the name of a city: "); 
		var monster = prompt("Enter a type of monster: ");
		var food = prompt("Enter a food you like: ");
		var drink = prompt("Enter a drink you like: "); 
		
		//check for gender with charAt()
		var letter = gender.charAt(0); 
		gender = (letter == 'b' || letter == 'B')? "boy" : "girl"; //if true, boy. Otherwise girl. 
		var pronoun = (gender == "boy")? "he" : "she";
		
		//build the story in variables
		var story =  "Once upon a time, about " + numYears + " years ago, there was a "+ gender + " named " + name + ". " + name + " lived in a small cabin in the woods just outside " + city + " limits.</p> <p>" + name + " enjoyed walking in the woods every day until... One day " + pronoun + " came upon a " + monster + " sitting on a log eating a " + food + ".</p> <p>The " + monster + " jumped up, spilling his " + drink + ". " + name + " ran home as fast as " + pronoun + " could but the " + monster + " followed and ...</p>";
		var choice = "<h3>What happened? You decide! </h3> ";
		var ending1 = "<p>Ending 1: The " + monster + " and " + name  + " became best friends and lived in " + name + "'s house happily ever after.</p>"; 
		var ending2 = "<p>Ending 2: The " + monster + " overpowered " + name + " and gobbled down all the " + food + " and " + drink + " in " + name + "'s refrigerator.</p>";
		var ending3 = "<p>Ending 3: " + name + " screamed mean things at the " + monster + ", causing the " + monster + " to turn and run back to the woods, never to be seen again.</p>";

		//concatenate the chunks of our story and display
		document.getElementById("content").innerHTML = story + choice + ending1 + ending2 + ending3; 		
		}
	</script>
	</head>
	<body>
		<div id="container">
		<img src="images/superhero.jpg" class="floatleft" alt="Superhero" />
		<h1><em>Greg's Tales</em></h1>
		<h3>For this game, you will create a story by entering words as prompted. The story will change each time you run this game, as you enter different words.</h3>
		<?php include 'common/nav.php'; ?>
		<div id="content">
			<p>&nbsp;</p>
			<!-- code here to start game -->
			<button type="button" onclick="startGame()">Click to Begin</button>
		</div>
		<?php include 'common/footer.php'; ?>
		</div>
	</body>
	

</html>
