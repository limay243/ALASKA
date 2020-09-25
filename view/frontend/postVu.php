<?php ob_start(); ?>
    <div id="cadre">
        <div class="news">
            <h2>
                <?= htmlspecialchars($post['titre']) ?>
            </h2><br>
                <?php if(empty($editPost)): ?>
            <em>Créé le <?= $post['creation_date_fr'] ?></em><br>
                <?php endif; ?>
            <em>Dernière modification le <?= $post['modif_date_fr'] ?></em>
            <p><?= htmlspecialchars($post['contenu']) ?></p>               
        </div>

        <?php if(isset($_SESSION['userType']) && $_SESSION['userType']==1): ?> 
                
        <div id="singleComment">
            <h2>Commentaires</h2>
            <?php foreach ($comments as $comment){?>
                <p>
                    <strong><?= htmlspecialchars($comment['author']) ?></strong>: 
                    le <?= htmlspecialchars($comment['comment_date_fr']) ?><br>
                    <?= htmlspecialchars($comment['comment']) ?><br>
                    <?php if(isset($_SESSION["userType"])): ?>

                    <?php if(isset($alertComment)==true): ?>
                     <p><font color="red">deja signalé</font></p>
                    <?php else: ?>
                     <div id='signalCom'><a href="<?=MON_SITE?>alertComment/<?=$comment['id']?>">Signaler</a></div>
                    <?php endif; ?>
                    <?php endif; ?>
                </p>
            <?php }?>
        </div>
    <?php endif; ?> 


    <?php if(isset($_SESSION['userType'])): ?>

        <form action="<?= MON_SITE ?>addComment/<?= $post['id'] ?>" method="post" id="formCom">
            <h2>Ajouter un commentaire</h2>
            <div id="author">
                <label for="author">Auteur</label><br/>
                <input type="text" name="author" />
            </div><br/>
            <div id="comment">
                <label for="comment">Commentaire</label><br/>
                <textarea name="comment"></textarea>
            </div>
            <input type="hidden" name="postId" value="<?= $post['id'] ?>">
            <input type="submit" value="Ajouter" />
        </form><br>
                <h3><a href="<?= MON_SITE ?>listPosts">Retour aux articles</a></h3>

    <?php endif; ?>

    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require'template.php'; ?>

</div>
