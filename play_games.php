<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
<title>Greg's Gambits | Games Menu</title>
<link href="greg.css" rel="stylesheet" type="text/css" />
<meta name="author" content="Matthew Dowell" />
<meta name="date" content="Spring 2017" /> 
<style>
 table {
	width: 90%;
	border: 0; 
	cellpadding: 5; 
}

table td {
	width: 50%; 
	}

</style>
</head>

<body>
<div id="container">

 <img src="images/superhero.jpg" width="120" height="120" class="floatleft" alt="superhero" />
 <h1 id="logo"><em>Play A Game</em></h1>
  
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php include 'common/nav.php'; ?>
<div id="content">
<p>Menu of Available Games </p>
<table>
  <tr>
    <td>&nbsp;<a href="gregs_tales.php">Greg's Tales</a></td>
    <td>&nbsp;<a href="gregs_fortune.php">Madame Vadoma Sees All</a></td>
  </tr>
  <tr>
    <td>&nbsp;<a href="greg_encoder.php">Secret Message Encoder</a></td>
    <td>&nbsp;<a href="greg_battle.php">Battle the Evil Troll</a></td>
  </tr>
  <tr>
    <td>&nbsp;<a href="tictactoe.php">Tic Tac Toe</a></td>
    <td>&nbsp;<a href="hangman.php">Play Hangman</a></td>
  </tr>
  <tr>
  	<td>&nbsp;<a href="game15.php">Greg's 15</a></td>
  	<td>&nbsp;</td>
</table>
<p>&nbsp;</p>
</div>
<?php include 'common/footer.php'; ?>
</body>
</html>
