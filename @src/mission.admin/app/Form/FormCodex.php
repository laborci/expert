<?php namespace Application\AdminCodex\Form;

use Andesite\Codex\Form\FormDecorator;
use Andesite\Codex\Form\FormHandler\FormHandler;
use Andesite\Codex\Form\ListHandler\ListHandler;
use Application\AdminCodex\GhostHelper\CollectionGhostCodexHelper;
use Application\AdminCodex\GhostHelper\FormGhostCodexHelper;
use Application\Component\Constant\Permission\Role;
use Application\Ghost\Collection;
use Application\Service\ArticleGMark;
use Application\Service\FormGMark;

class FormCodex extends FormGhostCodexHelper{

	protected function decorator(FormDecorator $decorator){
		$decorator->setIcons('fal fa-table');
		$decorator->setTitle('Formok');
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
		$main->input('gmark-big', $this->questions)
		('gmark', FormGMark::Service()->getCommands())
		('hidden', true);
		$main->input('combobox', $this->expertIds)
		('url', '/api/users/')
		('multi', true);
		$main->input('count', $this->collectionIds)
		('options', array_map(function (Collection $item){return ['id'=>$item->id, 'label'=>$item->name." (".$item->images->count.")", 'max'=>$item->images->count];}, Collection::search()->collect()));
	}


}
