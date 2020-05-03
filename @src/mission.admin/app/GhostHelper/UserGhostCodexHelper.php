<?php namespace Application\AdminCodex\GhostHelper;

use Andesite\Codex\Form\AdminDescriptor;
use Andesite\Codex\Form\DataProvider\GhostDataProvider;
use Andesite\Codex\Form\Field;
use Andesite\Codex\Interfaces\DataProviderInterface;

/**
 * @label-field id: 
 * @label-field name: név
 * @label-field email: e-mail
 * @label-field password: jelszó
 * @label-field groups: csoportok
 * @label-field groups.admin: 
 * @label-attachment avatar: 
 */
abstract class UserGhostCodexHelper extends AdminDescriptor{


	/** @var Field */ protected $id;
	/** @var Field */ protected $name;
	/** @var Field */ protected $email;
	/** @var Field */ protected $password;
	/** @var Field */ protected $groups;
	/** @var Field */ protected $avatar;

	public function __construct(){
		$this->id = new Field('id', 'id');
		$this->name = new Field('name', 'név');
		$this->email = new Field('email', 'e-mail');
		$this->password = new Field('password', 'jelszó');
		$this->groups = new Field('groups', 'csoportok', ['admin'=>'admin']);
		$this->avatar = new Field('avatar', 'avatar');
	}

	protected function createDataProvider(): DataProviderInterface{
		return new GhostDataProvider(\Application\Ghost\User::class);
	}

}
