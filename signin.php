<!DOCTYPE html>
<html lang="en">
<head>
	<!--
	      Introduction to Javascript Programming with XML and PHP - Elizabeth Drake
	      Chapter 1
	      Greg's Gambits: Creating and About You Page
	
	      Student Developer: Matthew B. Dowell
	      Date:   01/26/2017 
	      Course: ITSE-2302.WW1
	
	      Filename:  aboutyou.html
	   -->
	<meta charset="UTF-8" />
	<title>Greg's Gambits | Player Inventory</title>
	<link href="greg.css" rel="stylesheet" type="text/css" />
	<meta name="author" content="Matthew Dowell" />
	<meta name="date" content="Spring 2017" />
	
	<script>
		function getRealName(realname){	
			var realName = document.getElementById('realname').value; 
			document.getElementById('real_name').innerHTML = realName;
			console.log("get_name func executed, name is: " + realName); 
		}
		function getUserName(username){
			var userName = document.getElementById('username').value;
			document.getElementById('user_name').innerHTML = userName;
			console.log("get_username func executed, userName is: " + userName);
		}
		function getPoints(points){
			var pts = document.getElementById(points).value; 
			document.getElementById('user_points').innerHTML = pts; 
			console.log("getPoints func executed, pts = " + pts);
		}
		
		function get_avatar(){
			window.open('avatars.html'); 
		}
		function pick_avatar(picked){
			var avatar = document.getElementById(picked).value;
			document.getElementById('myavatar').innerHTML = avatar; 
			avatar = avatar.toLowerCase(); 
			document.getElementById('avatar_img').innerHTML = ("<img src='images/" + avatar + ".jpg' />");
			console.log("Avatar selected: "+ avatar); 
		}
		
		/*the get_home() method is using a common postMessage script
		  that can be used to pass information from one html page to another
		  without the use of a server-side client, localstorage or cookies.
		  
		  It is not a secure way of transferring data unless absolute URLs are
		  are used to validate the sent messages. Here I've used a '*' as the URL origin.
		  which should provide the code portablity for the sole purpose as an unpublished homework submission. 
		  Code sample credit to GitHub user: mbajour https://gist.github.com/mbajur/8325540
		*/
		function get_home(){
			 window.open('homes.html', "Greg's Gambits | Homes", "width=1000, height=300");
			 var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
			 var eventer = window[eventMethod];
			 var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
			 
			 eventer (messageEvent, function(e){
				 console.log('origin: ', e.origin)
				 document.getElementById('home_img').innerHTML = e.data; 
				 
				 if(e.origin !=  '*'){return}
				 
				 console.log('parent recieved mesasge!: ', e.data); 
			 }, false);	
		}
			
		function pick_weapons(){
					//the code example on page 417 is madness. This is better. 
					var i = 0; 
					var j = 0;
					var weapons = ["","",""]; 
					
					for(i = 0; i <= 9; i++){
						
						if(document.getElementById('w' + i).checked == true){
							
							weapons[j] = document.getElementById('w' + i).value; 
							document.getElementById('weapon_'+ (j + 1)).innerHTML = weapons[j];
							j++; 
						}
					}
					console.log("Weapons func: " + weapons[0] + ", "+ weapons[1] + ", " + weapons[2]);
				}
		
		function pick_supplies(){
			
			var i = 0; 
			var j = 0;
			var supplies = ["","","","",""]; 
			
			for(i = 0; i <= 9; i++){
				
				if(document.getElementById('s' + i).checked == true){
					
					supplies[j] = document.getElementById('s' + i).value; 
					document.getElementById('supply_' + (j + 1)).innerHTML = supplies[j];
					j++; 
				}
			}
			console.log("pick_supplies func: " + supplies[0] + ", "+ supplies[1] + ", "+ supplies[2] + ", "+ supplies[3] + ", "+ supplies[4]);
		}
	
		
	</script>
	
	<style>
		h2 {
		 align: center; 
		}
		
		fieldset h3, #infosummary h3, #homes h3, #avatars h3{
			padding: 10px 10px 10px 10px; 
		}	
	
		#avatars{
			width: 100%; 
			align: center; 
		}
		.nobdr{
			 table-border: none;
			 border: none; 
		}
		.nobdr td{
			margin: auto; 
		}
		
		#infosummary span{
			font-size: 1.17em;
			font-weight: bold; 
		}
	</style>
</head>
<body>
	<div id="container">
		
		 <img src="images/superhero.jpg" alt="superhero" width="120" height="120" class="floatleft" />
		 <h1 id="logo"><em>Your Information and Inventory </em></h1>
		<br />
		<br />
		
		<p>&nbsp;</p>
		<?php include 'common/nav.php'; ?>
		
	<div id="content">
			<h2><br />Tell Greg About You</h2>
	<div>
		
	 <form name="inventory">
		<div>
				<fieldset><h3>Enter the following information:</h3>
				<p><label>Your name:<br /></label>
					<input type="text" value="" size="40" id="realname" />
					<input type="button" onclick="getRealName('realname')" value="ok">
				</p>
				<p><label>Your username:<br /></label>
					<input type="text" value="" size="40" id="username" />
					<input type="button" onclick="getUserName('username')" value="ok" />
				</p>
				<p><label>Points to date:<br /></label>
					<input type="text" id="points" size="10" value="" />
					<input type="button" onclick="getPoints('points')" value="ok" />
				</p>
				</fieldset>
				<div style="clear:both;"></div>
		</div>
			
		<div>
					<table id=avatars>
						<tr><td colspan = 5 class ="nobdr"><h3>Your Avatar</h3></td></tr>
						<tr>
							<td class="nobdr"><img src="images/bunny.jpg" alt="bunny" /></td>
							<td class="nobdr"><img src="images/elf.jpg" alt="elf" /></td>
							<td class="nobdr"><img src="images/ghost.jpg" alt="ghost" /></td>
							<td class="nobdr"><img src="images/princess.jpg" alt="princess" /></td>
							<td class="nobdr"><img src="images/wizard.jpg" alt="wizard" /></td>
						</tr>
						<tr>
							<td class="nobdr"><input type="radio" name="avatar" id="bunny" value="Bunny" onclick="pick_avatar('bunny')" /></td>	
							<td class="nobdr"><input type="radio" name="avatar" id="elf" value="Elf" onclick="pick_avatar('elf')" /></td>
							<td class="nobdr"><input type="radio" name="avatar" id="ghost" value="Ghost" onclick="pick_avatar('ghost')" /></td>
							<td class="nobdr"><input type="radio" name="avatar" id="princess" value="Princess" onclick="pick_avatar('princess')" /></td>
							<td class="nobdr"><input type="radio" name="avatar" id="wizard" value="Wizard" onclick="pick_avatar('wizard')" /></td>
						</tr>	
					</table><br /><br />
		</div>
		<div style="width: 50%; float: left;">
			<fieldset>
			<h3>Select three weapons to help you in your quest</h3>
				<input type="checkbox" name="weapon" id="w0" value="Sword">Sword<br />
				<input type="checkbox" name="weapon" id="w1" value="Slingshot">Slingshot<br />
				<input type="checkbox" name="weapon" id="w2" value="Shield">Shield<br /> 
				<input type="checkbox" name="weapon" id="w3" value="Arrows">Arrows<br /> 
				<input type="checkbox" name="weapon" id="w4" value="Magic Rocks">Magic Rocks<br /> 
				<input type="checkbox" name="weapon" id="w5" value="Knife">Knife<br />
				<input type="checkbox" name="weapon" id="w6" value="Staff">Staff<br />
				<input type="checkbox" name="weapon" id="w7" value="Wizard's Wand">Wizard's Wand<br />
				<input type="checkbox" name="weapon" id="w8" value="Extra Arrows">Extra Arrows<br />
				<input type="checkbox" name="weapon" id="w9" value="Cloak of Invisibility">Cloak of Invisibility<br />
		    	<input type="button" onclick="pick_weapons()" value="Enter my selections" />
			 </fieldset>
		</div>		 
		
		<div style="width: 50%; float: left;">
			 <fieldset>
			 <h3>Select five items to carry with you on your journeys</h3>
				<input type="checkbox" name="supply" id="s0" value="Day Food Supply">Day Food Supply<br />
				<input type="checkbox" name="supply" id="s1" value="Backpack">Backpack<br />
				<input type="checkbox" name="supply" id="s2" value="Kevlar Vest">Kevlar Vest<br /> 
				<input type="checkbox" name="supply" id="s3" value="3-Day Water Bottle">3-Day Supply of Water<br /> 
				<input type="checkbox" name="supply" id="s4" value="Box of 5 Firestarters">Box of 5 Firestarters <br /> 
				<input type="checkbox" name="supply" id="s5" value="Tent">Tent<br />
				<input type="checkbox" name="supply" id="s6" value="First Aid Kit">First Aid Kit<br />
				<input type="checkbox" name="supply" id="s7" value="Warm Jacket">Warm Jacket<br />
				<input type="checkbox" name="supply" id="s8" value="3 Pairs Extra Socks">3 Pairs Extra Socks<br />
				<input type="checkbox" name="supply" id="s9" value="Pen and Notebook">Pen and Notebook<br />
				<input type="button" onclick="pick_supplies()" value="Enter my selections" />
			 </fieldset>
		 </div>
			 
			 <div style="clear: both;"></div>
		 <div id=homes>
			 <br />
				<button type="button" onclick="get_home()">Select your avatar's home</button><br />
			
		 </div>
		 	<br /><br />
		 	<input type="reset" value="ooops! I made a mistake. Let me start over."><br />
		 
			 <div id=infosummary style="width: 90%; float: left;">
				<h3 style="align: left;">Your information<br />
					Your name: <span id="real_name"></span><br /><br />
					Username: <span id="user_name"></span><br /><br />
					Player points: <span id="user_points"></span><br /><br />
					Avatar: <span id="myavatar">&nbsp;</span><span id="avatar_img">&nbsp;</span>
					<br /><br />
					Home: <span id="myhome"></span><span id="home_img">&nbsp;</span>
					<br /><br />
					Weapons:<br />
					<span id="weapon_1">&nbsp;</span><br />
					<span id="weapon_2">&nbsp;</span><br />
					<span id="weapon_3">&nbsp;</span>
					<br /><br />
					Supplies:<br />
					<span id="supply_1">&nbsp;</span><br />
					<span id="supply_2">&nbsp;</span><br />
					<span id="supply_3">&nbsp;</span><br />
					<span id="supply_4">&nbsp;</span><br />
					<span id="supply_5">&nbsp;</span><br />
				</h3>
			</div>
		
	</form>
		
			  <div style="clear:both;"></div>
		
		</div><!-- form -->
				
		<p>&nbsp;</p>
		<?php 'common/footer.php'; ?>
		 </div><!-- content -->
	</div><!-- container -->
</body>
</html>