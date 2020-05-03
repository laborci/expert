<?php namespace Application\AdminCodex\GhostHelper;

use Andesite\Codex\Form\AdminDescriptor;
use Andesite\Codex\Form\DataProvider\GhostDataProvider;
use Andesite\Codex\Form\Field;
use Andesite\Codex\Interfaces\DataProviderInterface;

/**
 * @label-field id: 
 * @label-field name: megnevezés
 * @label-field questions: kérdések
 * @label-field expertIds: szakértők
 * @label-field images: képek
 * @label-field collectionIds: kapcsolódó képek
 */
abstract class FormGhostCodexHelper extends AdminDescriptor{


	/** @var Field */ protected $id;
	/** @var Field */ protected $name;
	/** @var Field */ protected $questions;
	/** @var Field */ protected $expertIds;
	/** @var Field */ protected $images;
	/** @var Field */ protected $collectionIds;

	public function __construct(){
		$this->id = new Field('id', 'id');
		$this->name = new Field('name', 'megnevezés');
		$this->questions = new Field('questions', 'kérdések');
		$this->expertIds = new Field('expertIds', 'szakértők');
		$this->images = new Field('images', 'képek');
		$this->collectionIds = new Field('collectionIds', 'kapcsolódó képek');
	}

	protected function createDataProvider(): DataProviderInterface{
		return new GhostDataProvider(\Application\Ghost\Form::class);
	}

}
