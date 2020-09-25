<!DOCTYPE html>
<html>
<head>
  <title>Mot de passe oublié</title>

</head>


<?php ob_start(); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Mot de passe oublié?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Saisissez votre adresse E-mail...">
                    </div>
                    <a href="login.html" class="btn btn-primary btn-user btn-block">
                      Nouveau mot de passe
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="index.php?action=createLogView">Créer votre cpmpte!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="index.php?action=loginView">Vous avez deja un compte? Connectez-vous!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <?php $content = ob_get_clean(); ?>
  <?php require('view/frontend/template.php'); ?>

</html>