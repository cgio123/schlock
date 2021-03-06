<?php

namespace App\views;

abstract Class View{

	protected $data;

	public function __construct($data){
		$this->data = $data;
	}

	abstract public function render();

}
?>