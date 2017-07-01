<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<!--
	      Introduction to Javascript Programming with XML and PHP - Elizabeth Drake
	      Chapter 1
	      Greg's Gambits: Case Study Chp 1
	
	      Student Developer: Matthew B. Dowell
	      Date:   01/26/2017 
	      Course: ITSE-2302.WW1
	
	      Filename:  homes.html
	   -->
<title>Greg's Gambits</title>
<link href="greg.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
h2{
align: center; 
}
</style>

</head>
<body>
<div id="container">

 <img src="images/superhero.jpg" alt="superhero" width="120" height="120" class="floatleft" />
 <h1 id="logo"><em>Greg's Gambits </em></h1>
  
<h2><em> Games for Everyone!</em></h2>

<p>&nbsp;</p>
<?php  include 'common/nav.php'; ?>

<div id="content">
<p>Greg's Gambits offers a variety of games for all ages and more are added all the time. You can play our games any time you want for free.</p>
<p>Meet the real-life Greg in the About Greg page. Sign up to keep your account active or sign in every time you return through our Sign Up link. Choose your game from the Play a Game menu and contact us with questions, comments, and ideas. We're always looking for new games and new ideas!</p>
<p>&nbsp;</p>
</div>
<?php include 'common/footer.php'; ?>
</body>


<script src="https://www.gstatic.com/firebasejs/4.0.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDieXV4wDwlJU8t1XguD8dTfKQZTYxtJfY",
    authDomain: "gregs-gambits.firebaseapp.com",
    databaseURL: "https://gregs-gambits.firebaseio.com",
    projectId: "gregs-gambits",
    storageBucket: "gregs-gambits.appspot.com",
    messagingSenderId: "465317337240"
  };
  firebase.initializeApp(config);
</script>
</html>
 