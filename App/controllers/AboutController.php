<?php

namespace App\controllers;

use App\views\AboutView;

Class AboutController
{
	public function show(){
		$view = new AboutView();
		$view->render();
	}
}
?>