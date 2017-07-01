<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Greg's Gambits | Battle the Evil Troll</title>
	<link href="greg.css" rel="stylesheet" type="text/css" />
	<meta name="author" content="Matthew Dowell" />
	<meta name="date" content="Spring 2017" />
	
	
<style type="text/css">

h1 {
	text-align: center !important;
}

table#mytable{
	width: 85% !important;
	padding: 5px !important;
	border: none !important;
}

.style1{
	font-size: 18px;
}

#charimage1, #charimage2{
	width: 20% !important; 
}

#weapons{
	width: 50% !important; 
}

</style>
</head>

<body>
	<div id="container">
		<img src="images/superhero.jpg" width="120" height="120" class="floatleft" alt="floatleft" />
		<h1>
			<em>Battle the Evil Troll</em>
		</h1>

		<div style="clear: both;"></div>
	<?php include 'common/nav.php'; ?>
		<div id="content">
			<table id="mytable">
				<tr>
					<td colspan=4><span class="style1">In this game you
							will battle the evil troll. You can choose your weapon from the
							three shown -- a set of magic rocks that are a lot stronger and
							heavier than they look, an extremely sharp sword, or a crossbow
							and arrow. Unfortunately, you do not know ahead of time what
							weapon the troll will use. You each begin with 100 points. For
							each round of the battle, the winner takes 10 points from the
							loser. When either of you reaches 200 points, the battle is over
							and one of you will lie dead. The winner is determined by the
							list shown below. Push the button when you are ready to begin the
							battle and ... Good luck!</span></td>
				</tr>
				<tr>
					<td id=charimage1>
						<p>
							<img src="images/wizard.jpg" width="120" height="168" alt="wizard">
						</p>
						<p>
							<span class="style1">Wizard</span>
						</p>
					</td>
					<td id=charimage2 >
						<p>
							<img src="images/troll.jpg" width="120" height="168" alt="troll">
						</p>
						<p>
							<span class="style1">Troll</span>
						</p>
					</td>
					<td>&nbsp;</td>
					<td id=weapons>
						<p>
							<span class="style1">Weapons</span><br />
							<img src="images/arrow.jpg" alt="arrows">
							<img src="images/sword.jpg" alt="sword">
							<img src="images/rock.jpg" alt="rock">
						</p> <!-- display weapons --> &nbsp;
					</td>
				</tr>
				<tr>
					<td colspan=4><span class="style1">Note: <br /> The
							rocks can deflect the arrow. <br /> The sword beats the rocks. <br />
							The arrow beats the sword.
					</span></td>
				</tr>
			</table>
			<input type="button" id="battle" value="Begin the battle!"
				onclick="location.href = 'battleground.html';" />
		</div>
		<?php include 'common/footer.php'; ?>
	</div>
</body>
</html>
