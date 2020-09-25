<!DOCTYPE html>
<html>
<head>
  <title>postView</title>

</head>

<!-- Begin Page Content -->
 <?php ob_start(); ?>
        <div class="container-fluid">
          
              <div id=alertComment> 
           <h2>Alerts commentaires</h2>
           <?php if(!empty($commentaires)): ?>
            <?php foreach ($commentaires as $commentaire): ?> 
              <div id="cadreCom">
           <a href="alertCom/<?=$commentaire['id']?>"> <?= $commentaire['alert']?> de <?= $commentaire['author']?></a><br> <?= $commentaire['comment']?><br> 
            le <?= $commentaire['comment_date_fr']?>
           </div><br>
         <?php endforeach; ?>
         <?php else: ?>

          <div id="cadreCom">
            <h2>Aucune alerte !</h2>
          </div>
        <?php endif;?>
      </div>
       
        
        </div> 
        <?php $content = ob_get_clean(); ?>
        <?php require'view/backend/admin/admin.php'; ?>
        
</html>
        
