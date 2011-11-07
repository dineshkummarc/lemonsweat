<?php
include_once("model/Model.php");

class Controller {
	public $model, $facebook, $user, $user_profile;
	
	public function __construct() {  
        $this->model = new Model();
		$this->facebook = $this->model->facebook;
		$this->user = $this->model->user;
		$this->user_profile = $this->model->user_profile;
    } 
	
	public function logInOutButton() {
		if ($this->user) {
		  	$logoutUrl = $this->facebook->getLogoutUrl();
		} else {
		  	$loginUrl = $this->facebook->getLoginUrl();
		}
			
	    if (!$this->user) {
			return "<fb:login-button></fb:login-button>";
		} else {
			return "<a href='" . $logoutUrl . "'>logout</a>";
		}
	}
	
	public function invoke() {

				
		//require("model/Temp.php");
		
		include 'view/home.php';

		/*
		if (!isset($_GET['book'])) {
			// no special book is requested, we'll show a list of all available books
			$books = $this->model->getBookList();
			include 'view/booklist.php';
		} else {
			// show the requested book
			$book = $this->model->getBook($_GET['book']);
			include 'view/viewbook.php';
		}
		*/
	}
}