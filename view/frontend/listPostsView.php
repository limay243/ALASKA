<?php ob_start(); ?>

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- col-md-12 -->
        <div class="col-md-12">
            <h2>Article(s) recent</h2>
        </div>
            <!-- row -->
                <div class="row">
                    <?php foreach($posts as $posts){ ?>
                <!-- col-md-4 -->       
                <div class="col-md-4">
                    <h2>Titre: <a href="<?= MON_SITE ?>post/<?= $posts['id'] ?>"><?= htmlspecialchars($posts['titre']) ?></a>
                    </h2>
                    <!-- post -->
                    <div class="post">
                        <a class="post-img" href="<?= MON_SITE ?>post/<?= $posts['id'] ?>"><img src="<?=MON_SITE?>public/img/train.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <span class="post-date"><time>le <?= $posts['creation_date'] ?></time></span><br>
                            <em><a href="<?= MON_SITE ?>post/<?= $posts['id'] ?>">Commentaires</a></em>
                        </div>
                    </div>
                </div>
            <!-- post -->
        </div>
            <?php } ?>
                    <div id="pagination">
                            <?php
                                for($i = 1; $i <= $pagesTotal; $i++){
                                    echo'<a href="'.MON_SITE.'listPosts/'.$i.'">&nbsp;&nbsp;'.$i.'&nbsp;|</a>';
                                }
                            ?>
                    </div>        
<!-- col-md-4 -->
                </div>
<!-- row -->
            </div>
<!-- col-md-12 -->  
        </div>
<!-- container -->  
    </div>

<!-- section -->    
</div>
        <?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
