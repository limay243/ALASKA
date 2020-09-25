<!DOCTYPE html>
<html>
<head>
  <title>postView</title>

</head>

<!-- Begin Page Content -->
        <div class="container-fluid">
           <?php ob_start(); ?>
              <div class="cadreArticles">
          <h2>Liste des articles</h2>
          <?php foreach ($req as $req): ?> 
            <ul>
              <li id="art"><a href="<?= MON_SITE ?>post/<?= $req["id"]?>">ARTICLE N° <?= $req['id']?></a></li>
              <li id="titreArt">TITRE: <?= $req['titre']?></li><br>
              <li id="contenuArt"><?= $req['contenu']?></li>
              <div id="Modifier"><a href="<?= MON_SITE ?>editPostView/<?= $req['id']?>">Modifier</a></div>
            </ul>
          <?php endforeach ?> 
        </div>  
       
        <?php $content = ob_get_clean(); ?>
        </div> 
        <?php require'view/backEnd/admin/admin.php'; ?>
        
</html>
        
