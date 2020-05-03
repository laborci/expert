<?php namespace Application\Ghost;

use Andesite\Attachment\AttachmentCategoryManager;
use Andesite\DBAccess\Connection\Filter\Filter;
use Andesite\DBAccess\Connection\Filter\Comparison;
use Andesite\DBAccess\Connection\Finder;
use Andesite\Ghost\Field;
use Andesite\Ghost\Ghost;
use Andesite\Ghost\Model;

/**
 * @method static GhostAnswerFinder search(Filter $filter = null)
 * @property-read $id
 */
abstract class AnswerGhost extends Ghost{

	/** @var Model */
	public static $model;
	const Table = "answer";
	const ConnectionName = "default";

		public static function f_id(){return new Comparison('id');}



	const F_id = "id";



	/** @var int id */
	protected $id;



	final static protected function createModel(): Model{
		$model = new Model(get_called_class());
		$model->addField("id", Field::TYPE_ID,NULL);
		$model->protectField("id");
		return $model;
	}
}

/**
 * Nobody uses this class, it exists only to help the code completion
 * @method \Application\Ghost\Answer[] collect($limit = null, $offset = null)
 * @method \Application\Ghost\Answer[] collectPage($pageSize, $page, &$count = 0)
 * @method \Application\Ghost\Answer pick()
 */
abstract class GhostAnswerFinder extends Finder {}