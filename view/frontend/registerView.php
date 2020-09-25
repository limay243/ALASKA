<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Enregistrement</title>
</head>

<body>
		<!-- Nested Row within Card Body -->        	
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crééz votre compte!</h1>
              </div>
              <form class="user" action="register" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Prénom" name="prenom">
                  </div>
                  <div class="col-sm-6">
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Nom" name="nom">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="E-mail" name="email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mot de passe" name="pass1">
                  </div>

                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Répéter mot de passe" name="pass2">
                  </div>

                  <div class="col-sm-6">
                    <input type="hidden" value="0" name="userType">
                  </div>

                  <div class="col-sm-6">
                    <input type="hidden" name="token_inscription">
                  </div>

                </div>
                <input type="submit" name="envoi" class="btn btn-primary btn-user btn-block">
               
                <hr>
                
                <a href="regGoogle" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i>Enregistrer avec Google</a>
                <a href="regFacebook" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i>Enregistrer avec Facebook
                </a>
               </form>
              <hr>
              <div class="text-center">
                <a class="small" href="createForgotPass">Mot de passe oublié?</a>
              </div>
              <div class="text-center">
                <a class="small" href="loginView">Vous avez deja un compte? Connexion!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

</body>
<?php $content = ob_get_clean(); ?>
<?php require('template.php') ;?>

</html>
