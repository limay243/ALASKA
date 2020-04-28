<?php



class PostManager extends Model
{
	//gérer la fonction qui va récupérer tous les articles dans la bdd
	public function getPosts(){
		return $this->getAll('posts', 'Post');
	}
}

?>