<?php

class Pagination
{
	public function __construct($itemPerPage){
		$this->itemPerPage = $itemPerPage;
	}

	public function totalPages($countItem){
		$pagesTotal = ceil($countItem/$this->itemPerPage);

		return $pagesTotal;
	}

	public function getStartIndex(){
		$this->page = $this->getPage();
		$start = ($this->page-1 )*$this->itemPerPage;

		return $start;
	}

	public function getPage(){
		$explodeURL = explode("/",$_SERVER['REQUEST_URI']);

		if(isset($explodeURL[3]) && is_int(intval($explodeURL[3]))==true){
			return $explodeURL[3];
		} else {
			return 1;
		}
	}

	public function getItemPerPage(){
		return $this->itemPerPage;
	}
}

?>