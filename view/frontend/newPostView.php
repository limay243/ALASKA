<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
       <title>Modifier article</title>
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= MON_SITE ?>public/Contact_Form/images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="<?= MON_SITE ?>public/Contact_Form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= MON_SITE ?>public/Contact_Form/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= MON_SITE ?>public/Contact_Form/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= MON_SITE ?>public/Contact_Form/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= MON_SITE ?>public/Contact_Form/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= MON_SITE ?>public/Contact_Form/css/main.css">


	<link rel="stylesheet" type="text/css" href="<?= MON_SITE ?>view/backEnd/admin/css/sb-admin-2.css" >

<!--===============================================================================================-->
  <script src="https://cdn.tiny.cloud/1/g7twshktaukuhj4z0joc2kwe7k0oyytpd495s1jzxaqfkrb7/tinymce/5/tinymce.min.js
  			" referrerpolicy="origin">
  </script>
</head>
<body>
<?php ob_start(); ?>
	<div class="contact1">
		
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="<?= MON_SITE ?>public/Contact_Form/images/img-01.png" alt="IMG">
			</div>

			<form method="post" action="<?= MON_SITE ?>editPost/<?= $post['id']?>"class="contact1-form validate-form">
				
				<span class="contact1-form-title">Modifier un post</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="titre" placeholder="<?= htmlspecialchars($post['titre']) ?>">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Message is required">
  					<textarea id="contenText" name="content"><?= htmlspecialchars($post['contenu']) ?></textarea>
  					
			  <script>
			    tinymce.init({
			      selector: 'textarea',
			      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
			      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
			      toolbar_mode: 'floating',
			      tinycomments_mode: 'embedded',
			      tinycomments_author: 'Author name',

			      forced_root_block : false,
				  force_br_newlines : true,
				  force_p_newlines : false
			    });
			  </script>

  	<span class="shadow-input1"></span>
  	
				</div>

				<div class="container-contact1-form-btn">
					<button type="submit" class="contact1-form-btn">
						<span>
							Modifiez
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="<?= MON_SITE ?>public/Contact_Form/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= MON_SITE ?>public/Contact_Form/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= MON_SITE ?>public/Contact_Form/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= MON_SITE ?>public/Contact_Form/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= MON_SITE ?>public/Contact_Form/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<script src="<?= MON_SITE ?>public/js/main.js"></script>

	<?php $content = ob_get_clean(); ?>
	<?php require'view/backend/admin/admin.php'; ?>

</body>
</html>
