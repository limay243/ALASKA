<?php



class PostManager extends Model
{

	//gérer la fonction qui va récupérer tous les articles dans la bdd
	public function getPosts(){
		return $this->getAll('posts', 'Post');
	}

	//gérer la fonction qui va récupérer un seul article dans la bdd
	public function getPost($id){
		return $this->getOne('posts', 'Post', $id);
	}
	
}

?>