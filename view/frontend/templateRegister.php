<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $titre ?></title>

        <!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"/> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="./public/templateCSS/css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="./public/templateCSS/css/font-awesome.min.css"/>

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="./public/templateCSS/css/style.css"/>

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
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<h2>Billet simple pour l'Alaska</h2>
							<a href="accueil" class="logo"><img src="./public/img/train.jpg"></a>
						</div>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<li><a href="accueil">Accueil</a></li>

							<li><a href="listPosts">Liste des articles</a></li>
							
							<? if(isset($_SESSION['userType'])){
							}else{
								echo' <li id="loginLine"><a href="loginView">Login</a></li>
								  	  <li><a href="registerView">Inscris toi</a></li>';
							}
							?>

							<? if(isset($_SESSION['userType']) && !empty($_SESSION['userType']==1)): ?> 
								<li> <a href="iadminPage"> Admin </a></li>
							<?php endif; ?>
						</ul>


						<!-- /nav -->
						<? if(!empty($_SESSION['email']) && $_SESSION['pass1']): ?>								
                          <form action="deconnexionView" method="POST" name="deconnexion" id="deconectForm">
                                <div class="pseudolog"> Bonjour <?= $_SESSION["prenom"]." ". $_SESSION["nom"] ?></div>
                                <input type="submit" name="deconnection" class="deconnexion"value="Déconnexion">
                                </form>
                            <?php endif; ?>
					</div>
				</div>
				<!-- /Main Nav -->

				<!-- Aside Nav -->
				<div id="nav-aside">
					<!-- nav -->
					<div class="section-row">
						<ul class="nav-aside-menu">
							<li><a href="accueil">"Accueil</a></li>
							<li><a href="about.html">Qui suis-je ?</a></li>
							<li><a href="createLogView">Inscris toi</a></li>
							<li><a href="contact.html">Contacts</a></li>
						</ul>
					</div>
					<!-- /nav -->

					<!-- social links -->
					<div class="section-row">
						<h3>Suivez nous !</h3>
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

    	

        <!-- Footer -->
		<footer id="footer">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-5">
						<div class="footer-widget">
							<div class="footer-logo">
								<a href="accueil"><h2>Billet simple pour l'Alaska</h2></a>
							</div>
							<ul class="footer-nav">
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Advertisement</a></li>
							</ul>
							<div class="footer-copyright">
								<span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title"><a href="index.php">Qui suis-je ?</a></h3>
									<ul class="footer-links">
										<li><a href="about.html">Qui suis-je ?</a></li>
										<li><a href="contact.html">Contact</a></li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>

					<div class="col-md-3">
						<div class="footer-widget">
							<h3 class="footer-title">Newsletter</h3>
							<div class="footer-newsletter">
								<form>
									<input class="input" type="email" name="newsletter" placeholder="Saisissez votre email">
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
		<script src="./public/js/jquery.js"></script>
		<script src="./public/js/jquery.min.js"></script>
		<script src="./public/js/bootstrap.min.js"></script>
		<script src="./public/js/main.js"></script>
		<script src="./public/js/moovNav.js"></script>
		<script src="./public/js/signalColor.js"></script>

    </body>
</html>