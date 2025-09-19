<?php 
	$phone_number_web2 = "+1-800-123-4567";
	$email_address_web2 = "info@domainname.com";
	$domainurl_web2 ="domainname.com";
	$domain_name_web2 = "domainname";

?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <meta name="robots" content="noindex, nofollow"> -->
	<!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"> 
    <!-- Bootstrap v5.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome Free 6.7.2 -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>
<header> 
	<section class="header-top_strip">
		<div class="container">
			<div class="row">
				<div class="col-md-6 d-none d-md-block">
					<p class="header_strip_text">Welcome to <?php echo $domain_name_web2; ?></p>
				</div>
				<div class="col-md-6">
					<div class="d-flex gap-4 justify-content-between justify-content-md-end">
						<a href="tel:<?php echo $phone_number_web2; ?>" class="header_strip_text">For Customer Assistance</a>
						<a href="mailto:<?php echo $email_address_web2; ?>" class="header_strip_text"><?php echo $email_address_web2; ?></a>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light nav_x-padding">
		    <a  href="./">
		    	<img src="images/logo.png" alt="" class="logo">
		    </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<?php
		              $nav_url1=$nav_url3=$nav_url4=$nav_url5=$nav_url6="";
		              $tt=explode("/",$_SERVER['PHP_SELF']);
		              $len=count($tt)-1;
		              $cur_page=$tt[$len];
		              switch($cur_page)
		              {
		              case "index.php":
		              $nav_url1='active';
		              break;
		              case "flights-offers.php":
		              $nav_url2='active';
		              break;
		              case "about-us.php":
		              $nav_url4='active';
		              break;
		              case "contact-us.php":
		              $nav_url5='active';
		              break;
		              }
		         ?>
		      <ul class="navbar-nav mx-auto">
			      <li class="nav-item">
			        <a class="nav-link <?php echo $nav_url1; ?>" href="./">Flights</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link <?php echo $nav_url2; ?>" href="flights-offers.php">Today's Deals</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link <?php echo $nav_url4; ?>" href="about-us.php">About Us</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link <?php echo $nav_url5; ?>" href="contact-us.php">Contact Us</a>
			      </li>
		      </ul>
		      <a href="#" class="header-tfn">
		      	<img src="images/header-tfn-icon.png" alt="">
		      	<div>
			      	<p>Speak to Expert Now</p>
			      	<span><?php echo $phone_number_web2; ?></span>
		      	</div>		
		      </a>
		    </div>
		</nav>
	</div>	
</header>
<!-- Header -->

<?php include("breadcrumb.php") ?>