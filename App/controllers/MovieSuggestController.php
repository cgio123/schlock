<?php

namespace App\controllers;

use App\views\SuggesterEmailView;
use App\views\MovieSuggestSuccessView;

Class MovieSuggestController
{
	protected $moviesuggest = [
							'errors'=>[]
						];
	public function __construct(){
		$this->moviesuggest = [
							'errors'=> []
		];
	}

	public function resetSessionData(){
		$_SESSION['moviesuggest']= null;
	}

	public function getFormData(){

		// moving form information into moviesuggest variable
		
		$expectedVariables = ['title','email','checkbox'];

		foreach ($expectedVariables as $variable) {

			// creating entries for error field
			$this->this->moviesuggest['errors'][$variable]="";

			// move all $_POST values into movieSuggest array
			if (isset($_POST[$variable])) {
				$this->moviesuggest[$variable] = $_POST[$variable];
			}else{
				$this->this->moviesuggest[$variable]="";
			}
		}
	}

	public function isFormValid(){
		// form validation

		$errors = false;

		if (strlen($this->moviesuggest['title']) === 0) {
			$this->moviesuggest['errors']['title']="Enter a title.";
			$errors = true;
		}

		if (! filter_var($this->moviesuggest['email'], FILTER_VALIDATE_EMAIL)) {
			$this->moviesuggest['errors']['email']="Enter a valid email.";
   			$errors = true;
		}
		return $errors;
	}

	public function show(){

		$this->resetSessionData();

		$this->getFormData();
		
		if ($this->isFormValid() === true) {

			$_SESSION['moviesuggestError'] = true;
			$_SESSION['moviesuggest'] = $this->moviesuggest;
			header("location:./");
			return;
		}
		header("Location:./?page=moviesuggestsuccess");

		// send email using mailgin API
		$view = new SuggesterEmailView(compact('moviesuggest'));
		$view->render();
	}

	public function generateSuccessPage(){

		$view = new MovieSuggestSuccessView();
		$view->render();
	}
}
