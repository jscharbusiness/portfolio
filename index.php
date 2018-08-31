<?php 

function test($data) { // Prevent attacks 

	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;

}


//Projects array contains projects to loop through and output.  
//   Project name/project description/project url, reference URL
	$projects = array 
		(	
			array("Library Management System", 
				"Definitely my biggest project...During this past semester, one of my classes was about designing and creating a system from start to finish.  I chose to make a library database for my mother as she has thousands of books.  There were several things I had never encountered before.  The two main ones were planning out the book rental system, and adding the ability to print labels.  In the end, I learned a lot and continue to add improvements as I have time!", 
				"https://library.jeremyschar.com/", 
				"https://www.starkstate.edu/academics/programs/web-design-and-development/",
				"Check out the Stark State program!",
				"images/library.png"
			),
			array("Twitter Clone", 
				"I had some Udemy courses on web development and this is the modified final project of one of them.  It is written in PHP using the MVC pattern.  Focusing on PHP rather than design, most of the styling is from me.  I used Bootstrap for the main CSS but added my own on top. I changed most of the functionality too! I added likes, comments, and profiles! There are quite a few features I plan on adding in the future!", 
				"http://twitter.jeremyschar.com/", 
				"https://www.udemy.com/the-complete-web-developer-course-2/learn/v4/overview",
				"Rob Perceivals Udemy Course.",
				"images/twitter.png"
			),
			array("TeePress WordPress site", 
				"This was the final project for my CMS class.  We were to pretend we had met a client and create a website for him.  Although the project isn't for any real person or company, I enjoyed working on my first actual WordPress site (other than class projects)!  If it was a real store, I would probably buy the shirt that says, \"I don't always test my code - But when I do, I do it in production.\" *laughing*" , 
				"http://teepress.jeremyschar.com/", 
				"https://www.starkstate.edu/academics/programs/web-design-and-development/",
				"Check out the Stark State program!",
				"images/teepress.png"
			)
		);

	if ($_GET['action'] == "email") {

		if (!$_POST['name']) {

			echo "2";
			exit();

		} else if (!$_POST['email']) {

			echo "3";
			exit();

		} else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

			echo "4";
			exit();

		} else if (!$_POST['comments']) {

			echo "5";
			exit();

		}

		$name = test($_POST["name"]);
		$email = test($_POST["email"]);
		$comments = test($_POST["comments"]);

		//Prepare email

		$toEmail = "jscharbusiness@gmail.com, ".$email;
		$subject = "Contact Request From ". $name;
		$body = "<h2>Contact Request</h2>
				<h4>Name: </h4><p>".$name."</p>
				<h4>Email: </h4><p>".$email."</p>
				<h4>Message: </h4><p>".$comments."</p>";

		$headers = "MIME-Version: 1.0" ."\r\n";
		$headers .="Content-Type:text/html;charset=UTF-8". "\r\n";
		$headers .= "From: " .$name. "<".$email.">". "\r\n";

		if (mail($toEmail, $subject, $body, $headers)) {

			echo "1";
			exit();

		}

		
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Jeremy Schar Portfolio</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Merriweather|Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">

	<link rel="stylesheet" href="css/minstyles.css">

	<link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
	<link rel="manifest" href="/images/favicons/site.webmanifest">
	<link rel="mask-icon" href="/images/favicons/safari-pinned-tab.svg" color="#91a2ee">
	<link rel="shortcut icon" href="/images/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-config" content="/images/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

	<!-- Global site tag (gtag.js) - Google Analytics -->

	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117259184-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-117259184-1');
	</script> -->

</head>
<body>
	<div class="container">
			
			<div id="inHeader" class="nav-down">
				<div class="nav nav-left">
					<a id="headerA" href="#header"><img src="images/logo.png" alt="Logo"></a>
					<div id="headerDetails">
						<span>Jeremy Schar</span>
						<p>Web Developer</p>
					</div>
					<ul id="headerUl">
						<li id="li1"><a href="#aboutTP">About</a></li>
						<li id="li2"><a href="#skillsTP">Skills</a></li>
						<li id="li3"><a href="#projectsTP">Projects</a></li>
						<li id="li4"><a href="#contactTP">Contact</a></li>
					</ul>
				</div>
			</div>

			<div id="inBody" class="nav-down hidden">
				<div class="nav nav-left">
					<a id="bodyA" href="#header"><img src="images/logo.png" alt="Logo"></a>
					<div class="menu">
						<div class="bar1"></div>
						<div class="bar2"></div>
						<div class="bar3"></div>
					</div>
					<ul id="bodyU1">
						<li class="closeMenu" id="li12"><a href="#aboutTP">About</a></li>
						<li class="closeMenu" id="li22"><a href="#skillsTP">Skills</a></li>
						<li class="closeMenu" id="li32"><a href="#projectsTP">Projects</a></li>
						<li class="closeMenu" id="li42"><a href="#contactTP">Contact</a></li>
					</ul>
				</div>
			</div>


		<div id="header" class="section">
				
			<div id="menuDetails">
				<span>Jeremy Schar</span>
				<p>Web Developer</p>
			</div>

		</div>

		<div id="aboutTP" class="middleGray"></div>
		<div class="bottomBlue">ME</div>
		<div class="middleGray"></div>

		<div id="about" class="section smaller">
			<div class="content">
				<div id="bar"></div>
				<div class="title">Ask me anything...</div>

				<div class="question">

					<p>Who Am I?</p>
					<span class="line"></span>
					<span class="circle"></span>
					<p>I'm just a guy who thinks a lot and loves to code!</p>

				</div>
				<div class="question">

					<p>Why Web Development?</p>
					<span class="line"></span>
					<span class="circle"></span>
					<p>I've always had a thing for psychology and technology.  Upon discovering web development, I knew it was the career for me.  I could take my love of studying how people think, and use it to create intuitive user-centered websites! </p>

				</div>
				<div class="question">

					<p>What are my Goals?</p>
					<span class="line"></span>
					<span class="circle"></span>
					<p>While I am still a junior web developer, I have big dreams.  My list of future websites is ever-growing, and my desire to learn keeps increasing. I want to know everything!</p>

				</div>
				<div class="question">

					<p>Any other interests?</p>
					<span class="line"></span>
					<span class="circle"></span>
					<p>Well, I enjoy researching basically anything, working on my foreign language skills, and playing pool!</p>

				</div>
				<div class="question">

					<p>What about school?</p>
					<span class="line"></span>
					<span class="circle"></span>
					<p>I've come to realize that the best way to learn is by immersion.  Working on my own projects has taught me more than I learned in school! Needless to say, I just finished my associates in Web Design and Development this May...</p>

				</div>

				<div class="title">...for real!</div>
				
			</div>

		</div>

		<div id="skillsTP" class="middleGray"></div>
		<div class="bottomBlue">SKILLS</div>
		<div class="middleGray"></div>

		<div id="skills" class="section smaller">

			<div class="title">I have some experience with these...</div>

			<div class="middleGreen">
				<div class="contentDivs html">
					<i class="devicon-html5-plain"></i>
					<p>HTML</p>
					<p> <progress value="7" max="10"></progress></p>
				</div>
				<div class="contentDivs css">
					<i class="devicon-css3-plain"></i>
					<p>CSS</p>
					<p><progress value="6" max="10"></progress></p>
				</div>
				<div class="contentDivs js">
					<i class="devicon-javascript-plain"></i>
					<p>JavaScript</p>
					<p><progress value="4" max="10"></progress></p>
				</div>
				<div class="contentDivs jquery">
					<i class="devicon-jquery-plain colored"></i>
					<p>jQuery</p>
					<p><progress value="5" max="10"></progress></p>
				</div>
				<div class="contentDivs php">
					<i class="devicon-php-plain"></i>
					<p>PHP</p>
					<p><progress value="4" max="10"></progress></p>
				</div>
				<div class="contentDivs mysql">
					<i class="devicon-mysql-plain"></i>
					<p>MySQL</p>
					<p><progress value="5" max="10"></progress></p>
				</div>
				<div class="contentDivs wordpress">
					<i class="devicon-wordpress-plain"></i>
					<p>WordPress</p>
					<p><progress value="4" max="10"></progress></p>
				</div>
				<div class="contentDivs gimp">
					<i class="devicon-gimp-plain"></i>
					<p>GIMP</p>
					<p><progress value="3" max="10"></progress></p>
				</div>
			</div>

			<div class="title">...but everytime I use them, I learn more!</div>
			<div id="projectsTP" class="middleGray"></div>
			<div class="bottomBlue">PROJECTS</div>
			<div class="middleGray"></div>
		</div>
		<div id="projects" class="section smaller">

			<div class="title">Isn't it fun to finish something...</div>
			
			<?php

				$i = 0;
				$lastElement = end($projects);
				foreach ($projects as $arrayNumber => $project) {

					$name = $project[0];
					$description = $project[1];
					$url = $project[2];
					$refUrl = $project[3];
					$refName = $project[4];
					$imgUrl = $project[5];

					echo '<div class="project">

						<div class="projectName"><p>'.$name.'</p></div>

						<div class="left">
							<div class="projectInfoButton"><div>Info</div></div>
							<div class="projectVisit"><a href="'.$url.'">Visit</a></div>
						</div>
						<div class="right">
							<div class="projectImage projectFlop">
								<div class="projectURL">
									<img data-src="'.$imgUrl.'" alt="Image of '.$name.'">
								</div>
							</div>
							<div class="projectInfo hidden projectFlop">
								<div class="projectDescription">'.$description.'</div><br>
								
								<div class="reference"><a href="'.$refUrl.'">'.$refName.'</a></div>
							</div>
						</div>

					</div>
					<div class="closeProject"></div>';

					if($project != $lastElement) {

						echo '<div class="blueBar"></div>';

				    }

					$i++;
				}

			?>

			<div class="title">...only to start something else?</div>

		</div>
		<div id="contactTP" class="middleGray"></div>
		<div class="bottomBlue">CONTACT</div>
		<div class="middleGray"></div>

		<div class="title">I'll probably use this the most...</div>
	

		<div class='formHeading'>Don't worry, this is secure!</div>
		<div id="contact" class="section smaller">
			
			<?php 
			

			echo "
				<div id='form'>
					<div id='error'></div>
					<div id='success'></div>
					<label>* Name: </label><input placeholder='Ima Coder' type=\"text\" class='formInput' id='name' name=\"name\" value=\"\"/>
					<label>* Email: </label><input placeholder='imacoder@notacoder.code' type=\"email\" class='formInput' id='email' name=\"email\" value=\"\"/>
					<label>* Comments: </label><textarea placeholder=\"I'm not a coder...\"class='formTextarea' id='comments' name=\"comments\" rows=\"5\" cols=\"15\"></textarea>
					<div class='formSubmit'><div class=\"submit\" id=\"submit\" name=\"submit\">Send!</div></div>
				</div>
				";

		?>

		</div>
		<div class="title">...we coders get lonely, you know...</div>
		<div class="middleGray"></div>
		<div class="bottomBlue">THANKS</div>
		<div class="middleGray"></div>
		<div id="footer" class="section">
			<div class="returnToHeader">
				<a href="#header">Return to top</a>
			</div>
			<div class="socialMedia">
				<a href="https://www.linkedin.com/in/jeremy-schar/"><img src="./images/linkedin.png" alt="Linkedin"></a>
			</div>
			<div class="copyright">
				<p>&copy; 2018 Jeremy Schar </p>
			</div>
		</div>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/minscripts.js"></script>
</body>
</html>