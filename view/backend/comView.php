<!DOCTYPE html>
<html>
<head>
<title>Commentaire</title>   

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"/> 

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<?= MON_SITE ?>public/css/bootstrap.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?= MON_SITE ?>public/css/font-awesome.min.css"/>

    <!-- Custom styles for this template-->
  <link rel="stylesheet" type="text/css" href="<?= MON_SITE ?>public/css/sb-admin-2.css" >

</head>

<body>
    <?php ob_start(); ?>
    <div id="cadreComAdmin">
        
        <div id="singleCommentAlert">
            <h2>Commentaires</h2>
                <p><strong>Commentaire de <?= htmlspecialchars($comm['author']) ?></strong> 
                    le <?= htmlspecialchars($comm['comment_date_fr']) ?></p>
                    <div id="commentaire"><?= htmlspecialchars($comm['comment']) ?></div>
        </div>        

            <div id="boutons">
                <div id="supprimer"><a href="<?= MON_SITE ?>suppComment/<?=$comm['id']?>"><h3>Supprimer</h3></a></div>
                <div id="accepter"><a href="<?= MON_SITE ?>okComment/<?=$comm['id']?>"><h3>Accépter</h3></a></div>
            </div>
        
        <div id="retour" style="text-align: center;"><a href="<?= MON_SITE ?>alertAdmin">Retour aux alertes</a></div>
    </div>
    <?php $content = ob_get_clean(); ?>
    <?php require('view/backend/admin.php'); ?>

</body>
</html>
