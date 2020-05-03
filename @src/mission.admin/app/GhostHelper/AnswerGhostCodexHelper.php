<?php namespace Application\AdminCodex\GhostHelper;

use Andesite\Codex\Form\AdminDescriptor;
use Andesite\Codex\Form\DataProvider\GhostDataProvider;
use Andesite\Codex\Form\Field;
use Andesite\Codex\Interfaces\DataProviderInterface;

/**
 * @label-field id: 
 */
abstract class AnswerGhostCodexHelper extends AdminDescriptor{


	/** @var Field */ protected $id;

	public function __construct(){
		$this->id = new Field('id', 'id');
	}

	protected function createDataProvider(): DataProviderInterface{
		return new GhostDataProvider(\Application\Ghost\Answer::class);
	}

}
