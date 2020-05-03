<?php namespace Application\Ghost;

use Andesite\Attachment\AttachmentCategoryManager;
use Andesite\DBAccess\Connection\Filter\Filter;
use Andesite\DBAccess\Connection\Filter\Comparison;
use Andesite\DBAccess\Connection\Finder;
use Andesite\Ghost\Field;
use Andesite\Ghost\Ghost;
use Andesite\Ghost\Model;

/**
 * @method static GhostCollectionFinder search(Filter $filter = null)
 * @property-read $id
 * @property-read AttachmentCategoryManager $images
 */
abstract class CollectionGhost extends Ghost{

	/** @var Model */
	public static $model;
	const Table = "collection";
	const ConnectionName = "default";

		public static function f_id(){return new Comparison('id');}
		public static function f_name(){return new Comparison('name');}



	const F_id = "id";
	const F_name = "name";

	const A_images = "images";

	/** @var int id */
	protected $id;
	/** @var string name */
	public $name;



	final static protected function createModel(): Model{
		$model = new Model(get_called_class());
		$model->addField("id", Field::TYPE_ID,NULL);
		$model->addField("name", Field::TYPE_STRING,NULL);
		$model->protectField("id");
		return $model;
	}
}

/**
 * Nobody uses this class, it exists only to help the code completion
 * @method \Application\Ghost\Collection[] collect($limit = null, $offset = null)
 * @method \Application\Ghost\Collection[] collectPage($pageSize, $page, &$count = 0)
 * @method \Application\Ghost\Collection pick()
 */
abstract class GhostCollectionFinder extends Finder {}