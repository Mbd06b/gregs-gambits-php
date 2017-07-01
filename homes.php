<!DOCTYPE html>
<html lang="en">
<head>
	<!--
	      Introduction to Javascript Programming with XML and PHP - Elizabeth Drake
	      Chapter 1
	      Greg's Gambits: Case Study
	
	      Student Developer: Matthew B. Dowell
	      Date:   01/26/2017 
	      Course: ITSE-2302.WW1
	
	      Filename:  homes.html
	   -->
	<meta charset="UTF-8">
	<title>Greg's Gambits | Homes</title>
	<meta name="author" content="Matthew Dowell" />
	<meta name="date" content="Spring 2017" /> 

<script>

function send_home(elementId) {
	 var home = document.getElementById(elementId).innerHTML;
	 window.opener.postMessage(home, '*');
	 window.close();
	}
	
</script>

<style>
  table{
   width:90%; 
   align: center;
   border: 0; 
  }
</style>

</head>
<body>
	<table>
		<tr><td>
		<h1>&nbsp;</h1>
		<hr />
		<h2> Select your home: </h2>
		</td></tr>
		<tr><td>
		
		<!--  Free use images sourced from OpenClipArt.org -->
		<h3>
			<img src="images/mobile-home.jpg" alt="mobile home" />
				<button type="button" onclick="send_home(this.id)" id="mobile">Mobile Home</button>&nbsp;&nbsp;
			<img src="images/apartment-home.jpg" alt="apartment home" />
				<button type="button" onclick="send_home(this.id)" id="apartment">Apartment</button> &nbsp;&nbsp;
		    <img src="images/farm-home.jpg" alt="farm hose" />
		  		<button type="button" onclick="send_home(this.id)" id="farm">Farm</button> &nbsp;&nbsp;&nbsp;
		    <img src="images/manor-home.jpg" alt="manor home" />
		  		<button type="button" onclick="send_home(this.id)" id="mansion">Mansion</button>  &nbsp;&nbsp;
		    <img src="images/castle-home.jpg" alt="castle" />
		  		<button type="button" onclick="send_home(this.id)" id="castle">Castle</button>
		 </h3>
		</td></tr>
		<tr><td>
		</td></tr> 
	</table>
</body>
</html>