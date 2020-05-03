<?php namespace Application\AdminCodex\Form;

use Andesite\Codex\Form\FormDecorator;
use Andesite\Codex\Form\FormHandler\FormHandler;
use Andesite\Codex\Form\ListHandler\ListHandler;
use Application\AdminCodex\GhostHelper\CollectionGhostCodexHelper;
use Application\Component\Constant\Permission\Role;

class CollectionCodex extends CollectionGhostCodexHelper{

	protected function decorator(FormDecorator $decorator){
		$decorator->setIcons('fal fa-images');
		$decorator->setTitle('Képek');
		$decorator->setRole(Role::Admin);
	}

	protected function listHandler(ListHandler $list){
		$list->addJSPlugin('ListButtonAddNew');
		$list->add($this->id)->visible(false);
		$list->add($this->name);
	}

	protected function formHandler(FormHandler $form){
		$form->setLabelField($this->name);
		$form->addJSPlugin('FormButtonSave');
		$form->addJSPlugin('FormButtonDelete', 'FormButtonReload', 'FormButtonFiles');

		$form->addAttachmentCategory($this->images);

		$main = $form->section('Adatok');
		$main->input('string', $this->name);
	}


}
