<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
</head>
<body>
	<?php ob_start(); ?>
<div id="content">
	<div id="cadrePresentation">
		<h1>Bienvenu sur mon blog !</h1>
		<p>Bonjour à tous,<br>
			je m'appele Jean Forteroche, je suis acteur et écrivain.<br> Je travaille actuellement sur mon prochain livre que je vais intituler "<b>Billet simple pour l'Alaska".</b><br> 
		</p>
	</div>

	<div id="dernierArticle">
			<h1>Dernier article</h1>
		<div class="news">
		    <h2><?= htmlspecialchars($post['titre']) ?></h2><br>
		    <em>Créé le <?= htmlspecialchars($post['creation_date_fr']) ?></em><br>
		    <p><?= htmlspecialchars($post['contenu']) ?></p> 
		</div>
	</div>
</div>
	
	<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
</body>
</html>

