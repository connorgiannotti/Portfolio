<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connor Giannotti | Portfolio</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link rel="icon" href="images/goi-logo.png">

</head>
<body id="head">

	<div class="cover">
	<div id="header">
	<div class="box blur blur-img tinted">
		<p class="rule"><i class="fa fa-arrows" aria-hidden="true"></i> Click and drag</p>
		<h1 class="title">Connor <span class="thin">Giannotti</span><br><small>Web Design Portfolio</small></h1>
	</div>
		<a href="#head"><img id="logo" class="logo" src="images/goi-logo.png"></a>
		<ul class="nav nav-pills">
		    <li role="presentation"><a href="#work">Work</a></li>
		    <li role="presentation"><a href="#contact">Contact</a></li>
		</ul>
	</div>
		<a href="#work" class="arrow bounce"><i class="fa fa-angle-down fa-4x text-center" aria-hidden="true"></i></a>
	</div>

	<div id="work">
		<h1>Work</h1>
			<!-- <div class="try"><div class="page first"></div></div>
			<div class="try"><div class="page second"></div></div>
			<div class="try"><div class="page thrid"></div></div>
			<div class="try"><div class="page fourth"></div></div> -->
	

	<article id="slider">
		
		<input checked type=radio name=slider id=slide1 />
		<input type=radio name=slider id=slide2 />
		<input type=radio name=slider id=slide3 />
		<input type=radio name=slider id=slide4 />

		<div id=slides>
		
			<div id=overflow>
			
				<div class=inner>
				
					<article>
						<a href="/SchemeWeb/" target="_blank"><div class="try"><div class="page first"></div></div></a>
            			<!-- <img src="images/scheme.png"/> -->
            			<div class="info text-center"><h3>Scheme</h3></div>
					</article>
					
					<article>
						<a href="/thunderboltmusic/" target="_blank"><div class="try"><div class="page second"></div></div></a>
						<!-- <img src="images/thunderbolt.png"/> -->
						<div class="info text-center"><h3>ThunderBolt Music</h3></div>
					</article>
					
					<article>
						<a href="/sunglasshut/index.html" target="_blank"><div class="try"><div class="page thrid"></div></div></a>
						<!-- <img src="images/sunglasshut.png"/> -->
						<div class="info text-center"><h3>Sunglass Hut</h3></div>			
					</article>
					
					<article>
						<a href="/flytothelimit/index.html" target="_blank"><div class="try"><div class="page fourth"></div></div></a>
						<!-- <img src="images/fttl.png"/> -->
						<div class="info text-center"><h3>Fly to the Limit</h3></div>					
					</article>
					
				</div> <!-- .inner -->
				
			</div> <!-- #overflow -->
		
		</div> <!-- #slides -->

		<div id=controls>

			<label for=slide1></label>
			<label for=slide2></label>
			<label for=slide3></label>
			<label for=slide4></label>
		
		</div> <!-- #controls -->
		
		<div id=active>

			<label for=slide1></label>
			<label for=slide2></label>
			<label for=slide3></label>
			<label for=slide4></label>
			
		</div> <!-- #active -->
	
	</article> <!-- #slider -->

	</div>

	
	<div id="contact" class="text-center">
		<div>
			<h1>Contact</h1>
		</div>
		<div>
			<p>Feel free to contact me at</p>
			<h3>Email</h3>
			<p class="info">connorgiannotti.webdesign@gmail.com</p>
			<h3>Phone</h3>
			<p class="info">021 064 2273</p>
		</div>
	</div>



	<!-- <div id="aboutpage">
		<h1>ABOUTME</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<img class="me" src="http://placehold.it/600x600">
	</div> -->


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>