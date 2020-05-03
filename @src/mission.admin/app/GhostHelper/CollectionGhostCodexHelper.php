<?php namespace Application\AdminCodex\GhostHelper;

use Andesite\Codex\Form\AdminDescriptor;
use Andesite\Codex\Form\DataProvider\GhostDataProvider;
use Andesite\Codex\Form\Field;
use Andesite\Codex\Interfaces\DataProviderInterface;

/**
 * @label-field id: 
 * @label-field name: megnevezés
 * @label-attachment images: képek
 */
abstract class CollectionGhostCodexHelper extends AdminDescriptor{


	/** @var Field */ protected $id;
	/** @var Field */ protected $name;
	/** @var Field */ protected $images;

	public function __construct(){
		$this->id = new Field('id', 'id');
		$this->name = new Field('name', 'megnevezés');
		$this->images = new Field('images', 'képek');
	}

	protected function createDataProvider(): DataProviderInterface{
		return new GhostDataProvider(\Application\Ghost\Collection::class);
	}

}
