<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="<?= MON_SITE ?>public/css/bootstrap.min.css"/>
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="<?= MON_SITE ?>public/css/font-awesome.min.css">
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="<?= MON_SITE ?>public/css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<!-- Nav -->
			<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="containerTemp">
						<!-- logo -->
						<div class="nav-logo">
							<a href="<?= MON_SITE ?>accueil" class="logo"><img src="<?= MON_SITE ?>public/img/train.jpg"></a>
						</div><h2>Billet simple pour l'Alaska</h2>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<li><a href="<?= MON_SITE ?>accueil">Accueil</a></li>
							<li><a href="<?= MON_SITE ?>listPosts">Articles</a></li>
							<?php if(isset($_SESSION['userType'])):?>
							<?php else: ?>
								 <li id="loginLine"><a href="<?= MON_SITE ?>loginView">Login</a></li>
								  	  <li><a href="<?= MON_SITE ?>registerView">Inscris toi</a></li>
							<?php endif; ?>
							<?php if(isset($_SESSION['userType']) && !empty($_SESSION['userType']==1)): ?> 
								<li> <a href="<?= MON_SITE ?>adminPage"> Admin </a></li>
							<?php endif; ?>
						</ul>

						<? if(!empty($_SESSION['email']) && $_SESSION['pass1']): ?>								
                          <form action="<?= MON_SITE ?>deconnexionView" method="POST" name="deconnexion" id="deconectForm">
                                <div class="pseudoLog"> Bonjour <?= $_SESSION["prenom"]." ". $_SESSION["nom"] ?></div>
                                <input type="submit" name="deconnection" class="deconnexion"value="Déconnexion">
                                </form>
                            <?php endif; ?>
						</ul>
						<!-- /nav -->

						<!-- search & aside toggle -->
						<div class="nav-btns">
							<button class="aside-btn"><i class="fa fa-bars"></i></button>
							<button class="search-btn"><i class="fa fa-search"></i></button>
							<div class="search-form">
								<input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
								<button class="search-close"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- /search & aside toggle -->
					</div>
				</div>
				<!-- /Main Nav -->

				<!-- Aside Nav -->
				<div id="nav-aside">
					<!-- nav -->
					<div class="section-row">
						<ul class="nav-aside-menu">
							<li><a href="<?= MON_SITE ?>listPosts">Articles</a></li>
							<li><a href="<?= MON_SITE ?>loginView">Login</a></li>
							<li><a href="<?= MON_SITE ?>registerView">inscris toi</a></li>
							<li><a href="#">Contacts</a></li>
							<? if(!empty($_SESSION['email']) && $_SESSION['pass1']): ?>
							<li><a href="adminPage">Admin</a></li>
						</ul>
					</div>
					<?php else: ?>
					<?php endif;?>
					<!-- /nav -->

					<!-- widget posts -->
					<div class="section-row">
						<h3>Articles ressents</h3>
						<div class="post post-widget">
							<a class="post-img" href="listPosts"><img src="<?= MON_SITE ?>public/img/train.jpg" width="20" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="listPosts">Tous vos articles ici !</a><br><br><br></h3>
							</div>
						</div>

						<h3>Qui est Jean Forteroche</h3>
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="<?= MON_SITE ?>public/img/train.jpg" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.html">Vennez découvrir l'univer de Jean Forteroche et vous ne serez pas decu !</a></h3>
							</div>
						</div>

						<h3>Contact</h3>
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="<?= MON_SITE ?>public/img/train.jpg" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.html">Contactez-moi pour de plus emples informations sur mon projet. A bientot !</a></h3>
							</div>
						</div>
					</div>
					<!-- /widget posts -->

					<!-- social links -->
					<div class="section-row">
						<h3>Suivez moi sur :</h3>
						<ul class="nav-aside-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
					<!-- /social links -->

					<!-- aside nav close -->
					<button class="nav-aside-close"><i class="fa fa-times"></i></button>
					<!-- /aside nav close -->
				</div>
				<!-- Aside Nav -->
			</div>
			<!-- /Nav -->
		</header>
		<!-- /Header -->

		 <?= $content ?>

		<!-- Footer -->
		<footer id="footer">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-5">
						<div class="footer-widget">
							<div class="footer-logo">
								<a href="index.html" class="logo"><img src="./img/logo.png" alt=""></a>
							</div>
							<ul class="footer-nav">
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Avertissement</a></li>
							</ul>
							<div class="footer-copyright">
								<span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
									Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Cette template est créée avec <i class="fa fa-heart-o" aria-hidden="true"></i> by 
								<a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">Jean Forteroche</h3>
									<ul class="footer-links">
										<li><a href="about.html">Rejoins nous</a></li>
										<li><a href="#">Connecte toi</a></li>
										<li><a href="contact.html">Contacts</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">Catagories</h3>
									<ul class="footer-links">
										<li><a href="category.html">Web Design</a></li>
										<li><a href="category.html">JavaScript</a></li>
										<li><a href="category.html">Css</a></li>
										<li><a href="category.html">Jquery</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="footer-widget">
							<h3 class="footer-title">Active ta Newsletter</h3>
							<div class="footer-newsletter">
								<form>
									<input class="input" type="email" name="newsletter" placeholder="Saisie ton email">
									<button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
								</form>
							</div>
							<ul class="footer-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</footer>
		<!-- /Footer -->

		<!-- jQuery Plugins -->
		<script src="<?= MON_SITE ?>public/js/jquery.js"></script>
		<script src="<?= MON_SITE ?>public/js/jquery.min.js"></script>
		<script src="<?= MON_SITE ?>public/js/bootstrap.min.js"></script>
		<script src="<?= MON_SITE ?>public/js/main.js"></script>
		

	</body>
</html>
