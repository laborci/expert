<?php namespace Application;

use Andesite\Ghost\Decorator;

/**
 * @ghost User
 * @ghost Collection
 * @ghost Form
 * @ghost Answer
 */
class Ghosts{

	public function collection(Decorator $decorator){
		$decorator->hasAttachment('images')->acceptExtensions('jpg', 'jpeg', 'png');
	}
	public function user(Decorator $decorator){
		$decorator->protectField('password', false, true);
		$decorator->hasAttachment('avatar')->maxFileCount(1)->acceptExtensions('png', 'jpg')->maxFileSize(500 * 1024);
	}

}