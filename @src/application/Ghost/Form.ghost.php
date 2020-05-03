<?php namespace Application\Ghost;

use Andesite\Attachment\AttachmentCategoryManager;
use Andesite\DBAccess\Connection\Filter\Filter;
use Andesite\DBAccess\Connection\Filter\Comparison;
use Andesite\DBAccess\Connection\Finder;
use Andesite\Ghost\Field;
use Andesite\Ghost\Ghost;
use Andesite\Ghost\Model;

/**
 * @method static GhostFormFinder search(Filter $filter = null)
 * @property-read $id
 */
abstract class FormGhost extends Ghost{

	/** @var Model */
	public static $model;
	const Table = "form";
	const ConnectionName = "default";

		public static function f_id(){return new Comparison('id');}
		public static function f_name(){return new Comparison('name');}
		public static function f_questions(){return new Comparison('questions');}
		public static function f_expertIds(){return new Comparison('expertIds');}
		public static function f_images(){return new Comparison('images');}
		public static function f_collectionIds(){return new Comparison('collectionIds');}



	const F_id = "id";
	const F_name = "name";
	const F_questions = "questions";
	const F_expertIds = "expertIds";
	const F_images = "images";
	const F_collectionIds = "collectionIds";



	/** @var int id */
	protected $id;
	/** @var string name */
	public $name;
	/** @var string questions */
	public $questions;
	/** @var  expertIds */
	public $expertIds;
	/** @var int images */
	public $images;
	/** @var  collectionIds */
	public $collectionIds;



	final static protected function createModel(): Model{
		$model = new Model(get_called_class());
		$model->addField("id", Field::TYPE_ID,NULL);
		$model->addField("name", Field::TYPE_STRING,NULL);
		$model->addField("questions", Field::TYPE_STRING,NULL);
		$model->addField("expertIds", Field::TYPE_JSON,NULL);
		$model->addField("images", Field::TYPE_ID,NULL);
		$model->addField("collectionIds", Field::TYPE_JSON,NULL);
		$model->protectField("id");
		return $model;
	}
}

/**
 * Nobody uses this class, it exists only to help the code completion
 * @method \Application\Ghost\Form[] collect($limit = null, $offset = null)
 * @method \Application\Ghost\Form[] collectPage($pageSize, $page, &$count = 0)
 * @method \Application\Ghost\Form pick()
 */
abstract class GhostFormFinder extends Finder {}