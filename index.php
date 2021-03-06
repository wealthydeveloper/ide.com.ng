<?php
require 'mail.php';
require ('mysql.php');


// function to validate, trim and htmlspecialchars inputs
function test_input($data){
  $data = trim($data);
  $data = htmlspecialchars($data);

  return $data;   
}

if(isset($_POST['submit']) && $_POST['submit']=='Send Message'){
  $name = test_input($_POST['name']);
  $email = test_input($_POST['email']);
  $phone = test_input($_POST['phone']);
  $findout = test_input($_POST['findout']);
  $message = test_input($_POST['message']);

  // validate name
  if(empty($name)){
    $err1 = "name field cannot be empty";
  }

  // validate email
  if(empty($email)){
    $err2 = "emailaddress field cannot be empty";
  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

    $err2 = "Invalid Email Address Format!";
  }

  if(empty($phone)){

    $err3 = "phonenumber field cannot be empty"; 
  }elseif(!preg_match('/(^0)([7|8|9])(\d{9})/',$phone)){
    $err3 = "invalid Phone Number";
  }
   

   // validate findout about me
   if(empty($findout)){
    $err4 = "findout field cannot be empty";
  }

   // validate lastname
   if(empty($message)){
    $err5 = "message field cannot be empty";
  }
  

// check if there is no validation error and insert into database table

if($err1=='' && $err2=='' && $err3=='' && $err4=='' && $err5==''){

//Recipient
$mail->setFrom($email,$name);
$mail->addAddress('info@ide.com.ng', 'idongesit');


//Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Here is the subject';
$mail->Body    = "<div style='box-shadow:0 0 4px 9px black;'><p style='color:green;font-size:16px;'>Heard about you from: $findout</p><br><p>$phone</p><br><p>$email</p><br><p style='padding:5px'>$message</p></div>";
$mail->AltBody = "Heard about you from: $findout\n$phone\n$email\n$message";

try{
  $mail->send();
  echo " <script>
     alert('Thank you, your message was successfully sent!');
     	
  </script> ";
} catch (Exception $e) {
  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  exit;
}

}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Idongesit - Freelance Web developer from Abuja, Nigeria </title>

    <meta charset="utf-8">
    <meta name="description" content="A freelance web developer, web application developer, online services, online marketing solutions, 
    online presence, projects, portfolio, lets bring to live your amazing applications to live."/>
    <meta name="author" content="Idongesit">
    <meta name="keywords" content="Web developer Abuja, web application development Abuja, Nigeria, PHP developer, PHP developer in 
    Abuja Nigeria, web development companies in Abuja, Web designer companies in Abuja Nigeria, Web application developer Nigeria, Nigerian PHP developer
    web designer, web developer, websites, Idongesit, freelancers in Abuja Nigeria, freelance web development, Web developer freelance
    website portal development, Wuse Abuja developers, Apo Abuja developers, E-commerce website developers, web programmer, programming
    Abuja Nigeria" />

    <meta property="og:title" content="Idongesit - Freelance Web developer from Abuja, Nigeria"/>
    <meta property="og:description" content="A freelance web application developer living in Abuja, Nigeria" />
    <meta property="og:url" content="https://ide.com.ng" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">  
    <script type="text/javascript" src="bootstrap/js/jquery-3.1.1.js"></script>
  	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script> 

    <!-- Fonts -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
    <link rel="shortcut icon" href="favicon-96x96.png" type="image/x-icon">
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <!--<link-->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 
</head>
<body>
  <!-- Navigation -->    
<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">

  <!-- Collapsable Navbar -->
  		  <div class="navbar-header">							
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               
						</button>
				  <a class="navbar-brand animated flip" id="bot" href="#top">Idongesit</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">						 
            <li><a href="#about"><span class="fa fa-info-circle"></span> About</a></li>
            <li><a href="#skills"><span class="fa fa-cogs"></span> Tools</a></li>
            <li><a href="#services"><span class="fa fa-smile-o"></span> MyServices</a></li>
					  <li><a href="#portfolio"><span class="fa fa-book"></span> Portfolio</a></li> 
					  <li><a href="#contact"><span class="fa fa-envelope"></span> Contact</a></li> 
					</ul>
				</div>
    </div>
     <!-- /.container-fluid -->
</nav>
 
<!-- Header -->
<header>
 <div class="container-fluid slides">
     <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6"> 
          
            <div class="social-profile">
               <figure class="social-avatar">
                <img src="images/suits.png"  class="img-responsive img-circle" alt="profile-picture"/>
                <figcaption>
                   <a target="_blank" href="https://twitter.com/Styleid1" class="s-twitter"><i class="fa fa-twitter fa-fw"></i><span> his twitter </span></a>
                   <a target="_blank" href="https://github.com/wealthydeveloper" class="s-github"><i class="fa fa-github fa-fw"></i><span> his github </span></a>
                   <a target="_blank" href="https://www.instagram.com/dezzery4/" class="s-instagram"><i class="fa fa-instagram fa-fw"></i><span> his instagram </span></a>
                   <a target="_blank" href="https://www.freecodecamp.org/stylesid" class="s-freecodecamp"><i class="fa fa-fire fa-fw"></i><span> his freeCodeCamp </span></a>
                </figcaption>
               </figure>
            </div>
              <div style="background-color:rgba(71, 51, 51, 0.384)">  
                  <h2 class="intro-lead-in" style="padding-left:50px">Idongesit Utong</h2>
                  <h3 class="intro-heading" style="padding-left:50px">
                     Full Stack Web Developer based in Abuja.
                  </h3>
            </div>
          <div class="col-md-3"> </div>
       </div>
      </div>
</header>
<!-- Header Ends-->


<!-- About Section -->
<section id="about" class="container">

    <div class="row section-banner">
      <div class="col-md-offset-3 col-md-6 text-center">
        <div>
          <span class="line about"></span>
          <span class="section-title about">ABOUT</span>
          <span class="line about"></span>
        </div>
      </div>
    </div>


    <div class="row max">

      <div class="col-sm-4 text-center">
        <div class="desc">
          <div class="icon-me"><i class="fa fa-user"></i></div>
          <p>A full stack developer with an eye for design, UX and UI development and a strong desire to learn and create. This I achieve through the utilization of standard up-to-date techniques and tools. Every project gives me an opportunity to overcome new challenges, improve my knowledge and skills.</p>
        </div>
      </div>

      <div class="col-sm-4 text-center">
        <div class="desc">
          <div class="icon-me"><i class="fa fa-mortar-board"></i></div>
          <p>I firmly believe in life long learning and I'm constantly exploring new ideas and technologies. MOOC's have enabled me to update my skills and keep abreast of the latest trends in design and coding.</p>
        </div>
      </div>

      <div class="col-sm-4 text-center">
        <div class="desc">
          <div class="icon-me"><i class="fa fa-rocket"></i></div>
          <p>My interests are wide with formal qualifications in Computer programming. I have designed and written software applications.</p>
        </div>
      </div>

    </div>


  </section>

<!--End About Section -->

<!-- start of Tools -->
<section id="skills">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">TOOLS</h2>
          <hr>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-md-3">
          <div class="icon-container">
            <i class="devicon-git-plain wordmark colored fa-5x"></i>
          </div>
          <h4 class="skills-heading">Git</h4>
        </div>

        <div class="col-md-3">
        <div class="icon-container">
            <i class="devicon-javascript-plain colored fa-5x"></i>
          </div>
          <h4 class="skills-heading">JavaScript</h4>
        </div>

        <div class="col-md-3">
        <div class="icon-container">
            <i class="devicon-jquery-plain colored fa-5x"></i>
          </div>
          <h4 class="skills-heading">jquery</h4>
          </div>

        <div class="col-md-3">
          <div class="icon-container">
          <i class="devicon-php-plain colored fa-5x"></i>
          </div>
          <h4 class="skills-heading">Php</h4>
        </div>
      </div>

      <!-- -->

      <div class="row text-center">
        <div class="col-md-3">
          <div class="icon-container">
          <i class="devicon-laravel-plain colored fa-5x"></i>
          </div>
          <h4 class="skills-heading">Laravel</h4>
        </div>

        
            <div class="col-md-3">
              <div class="icon-container">
                <i class="devicon-bootstrap-plain colored fa-5x"></i>
              </div>
              <h4 class="skills-heading">BootStrap</h4>
            </div>
            

        <div class="col-md-3">
          <div class="icon-container">
            
            <i class="devicon-html5-plain colored fa-5x"></i>
          </div>
          <h4 class="skills-heading">Html5</h4>
          
        </div>

        <div class="col-md-3">
          <div class="icon-container">
          <i class="devicon-css3-plain colored fa-5x"></i>
          </div>
          <h4 class="skills-heading">Css3</h4>
        </div>

      </div>
    </div>
  </section>
  <!-- end of Tools -->


 <!-- Service section -->
<section id="services">
    <div class="container">
        <div class="section-title">
            <h1>My <span class="accent-text">Services</span></h1>
        </div>
        
        <div class="row center-xs center-sm center-md center-lg trigger"><!--Row 1-->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 hb vb">
                <div class="service-block">
                    <span class="icon"><i class="fa fa-code"></i></span>
                    <h4 class="ho">Web Development</h4>
                    <p>Get the two broad divisions of web development – front-end (also called client-side development) and back-end development (also called server-side development) all in one pack.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 hb vb">
                <div class="service-block">
                    <span class="icon"><i class="fa fa-laptop"></i></span>
                    <h4 class="ho">Web Design</h4>
                    <p>I design the visual aesthetics web layout of a website. It goes hand-in-hand with web development in the creation of a <b>static website or dynamic web application.</b></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 hb vb">
                <div class="service-block">
                   <span class="icon"><i class="fa fa-mobile"></i></span>
                    <h4 class="ho">Fully Responsive</h4>
                    <p>Get great and well functioning website on all devices, such as laptops, tablets and mobile-phone. Responsive web design that render web pages excellently across all platforms. </p>
                </div>
            </div>  
        
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 hb vb">
                <div class="service-block">
                    <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                    <h4 class="ho">eCommerce  site</h4>
                    <p>Get all types of ecommerce site solutions that matches your every needs.A customized eCommerce store from yours truly is the best way for you to reach more people, increase sales and boost your business profits.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 hb vb">
                <div class="service-block">
                    <span class="icon"><i class="fa fa-user-plus"></i></span>
                    <h4 class="ho">Personal Website</h4>
                    <p>Get your personal website for your career, online presence,  marketing, (containing a list of the individual's skills, experience and a CV), social networking with other people with shared interests, or as a space for personal expression.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 hb vb">
                <div class="service-block">
                    <span class="icon"><i class="fa fa-cogs"></i></span>
                    <h4 class="ho">Custom Support</h4>
                    <p>Get ranges of services to provide assistance to customers in making cost effective, upgrading, and maintenance of your website.</p>
                </div>
            </div>
        </div>
        
    </div>
</section>
    
<!-- Portfolio -->
  <div id="portfolio" class="content-section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="section-title">PORT <span class="accent-text">FOLOI</span></h1>
          <p class="lead text-center">Below you'll find some of my recent work.</p>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="images/janova.png" alt="Project online car sell">
            <div class="caption">
              <h4>Janova Automobile Jenture</h4>
              <p>Online cars sells site. Presently working on</p>
              
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="images/marketsquares.png" alt="Project Marketsquare">
            <div class="caption">
              <h4>MarketSquare</h4>
              <p>eCommerce shopping site.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="images/shott.png" alt="project Endless Time piece">
            <div class="caption">
              <h4>Endless TimePiece</h4>
              <p>Luxurious watches</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="images/tech.png" alt="Project Tech World">            
            <div class="caption">
              <h4>Tech World</h4>
              <p>All about tech.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="images/artpic.png" alt="Project Renown art">
            <div class="caption">
              <h4>Renown Art</h4>
              <p>Art at it finest.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="images/scoresheet.png" alt="Project score sheet">
            <div class="caption">
              <h4>Javascript Score-sheet</h4>
              <p>Score sheet that calculate students examination and gives remakes.</p>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Portfolio -->

<!-- contact -->
<section id="contact">
    <div class="container" id="cont">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Contact</h1>
                <h3 class="section-subheading" style="text-align:center" id="make">Let's have a chat and build something amazing together</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm" method="POST" action="">
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <h4 class="section-heading">Free feel to contact me</h4>
                                <h4 class="section-heading">Email:</h4>
                                <p><b>info@ide.com.ng</b></p>

                                <h4 class="section-heading"> <span class="icon"><i class="fa fa-mobile colored fa-3x"></i></span> </h4>
                                <p><b>+2347086106891</b></p>

                                
                                <h4 class="section-heading"> <span  class="icon"><i style="color: #00ff00;" class="fa fa-whatsapp fa-3x"></i></span> </h4>
                                <p><b>+2348137489567</b></p>

                            </div>
                        </div>
                        <div class="col-md-9">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name"> I will like to know you:</label>
                                        <input type="text" class="form-control"  name="name" id="name"  placeholder="Name" value="<?php echo $_POST['name']; ?>" required>
                                      
                                        <p class="error"><?php echo $err1; ?></p>                                       
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email@" value="<?php echo $_POST['name']; ?>" required>                                        
                                    </div>
                                    <p class="error"><?php echo $err2; ?></p>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="PhoneNumber" value="<?php echo $_POST['phone']; ?>" required>
                                        <p class="error"><?php echo $err3; ?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="how">How did you found out about me:</label>
                                        <input type="text" class="form-control" name="findout" id="finddout" placeholder="message" value="<?php echo $_POST['findout']; ?>" required>     
                                    </div>
                                    <p class="error"><?php echo $err4; ?></p>
                                </div>

                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="message">Your messagee:</label>
                                        <textarea class="form-control" name="message" id="message" placeholder="Your Message" value="<?php echo $_POST['message']; ?>" required></textarea>
                                        <p class="error"><?php echo $err5; ?></p>
                                    </div>
                                    <div class="pull-right">
                                    <input type="submit" name="submit" Value="Send Message" class="btn btn-success" />
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- contact -->


<!-- footer -->
<footer id="footer-links">
    <ul>
        <li><a href="#about"><span class="fa fa-info-circle"></span> About</a></li>
        <li><a href="#skills"><span class="fa fa-cogs"></span> Tools</a></li>
        <li><a href="#services"><span class="fa fa-smile-o"></span> MyServices</a></li>
        <li><a href="#portfolio"><span class="fa fa-book"></span> Portfolio</a></li> 
   </ul>
    <p>&copy; Designs <?php echo date("Y");?></p>
  </footer>
<!-- footer -->
    
</body>
</html>