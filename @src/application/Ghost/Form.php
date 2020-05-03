<?php namespace Application\Ghost;

use Application\Service\FormGMark;
class Form extends FormGhost{

	public function getQuestions(){
		return FormGMark::Service()->parse($this->questions);
	}

}
