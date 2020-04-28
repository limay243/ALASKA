  		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- col-md-12 -->
				<div class="col-md-12">
				<h2>Articles recent</h2>
				</div>
					<!-- row -->
					<div class="row">
							<?php foreach($posts as $post): ?>
						<!-- col-md-4 -->		
						<div class="col-md-4">
							<!-- post -->
							<div class="post">
								<!-- image -->
								<a class="post-img" href="post&id=<?= $post->id()?>"><img src="./public/img/train.jpg" alt="">
								</a>
								<div class="post-body">
									<div class="post-meta">
										<a href=""><?=$post->categorie()?></a><br>
								
										<span class="post-date"><time><?=$post->date()?></time></span><br>
										<a href="post&id=<?= $post->id()?>"><b><?=$post->titre()?></b></a>
									</div>															
								</div>
							<!-- post -->
							</div>
						<!-- col-md-4 -->
						</div>
							<?php endforeach; ?>
					<!-- row -->
					</div>
				<!-- col-md-12 -->	
				</div>
			<!-- container -->	
			</div>
		<!-- section -->	
		</div>

