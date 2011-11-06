<?php
#include_once("model/Book.php");

require 'facebook.php';

class Model {
	public $facebook;
	public $user;
	public $user_profile;

	function __construct() {
        $this->facebook = new Facebook(array(
			'appId'  => '191577744250793',
			'secret' => '2ce0aabf76499ec4a168238d1f6e938c',
		));
		
		//$session = $facebook->getSession();
		
		$this->user = $this->facebook->getUser();
		
		// controller
		if ($this->user) {
				try {
					// Proceed knowing you have a logged in user who's authenticated.
					$this->user_profile = $this->facebook->api('/me');
				} catch (FacebookApiException $e) {
					echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
					$this->user = null;
				}
		}
    }
	
	/*
	public function getBookList()
	{
		// here goes some hardcoded values to simulate the database
		return array(
			"Jungle Book" => new Book("Jungle Book", "R. Kipling", "A classic book."),
			"Moonwalker" => new Book("Moonwalker", "J. Walker", ""),
			"PHP for Dummies" => new Book("PHP for Dummies", "Some Smart Guy", "")
		);
	}
	
	public function getBook($title)
	{
		// we use the previous function to get all the books and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allBooks = $this->getBookList();
		return $allBooks[$title];
	}
	*/	
}