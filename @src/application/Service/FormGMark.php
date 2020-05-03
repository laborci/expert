<?php

namespace Application\Service;

use Andesite\Core\ServiceManager\Service;
use Andesite\Util\GMark\GMark;

class FormGMark extends GMark{

	use Service;
	/**
	 * @GMark "!"
	 * @description "Select"
	 * @icon "fas fa-arrow-alt-square-down"
	 */
	protected function select($cmd, $body, $name, $label){
		$body = strip_tags($body);
		$options = [];
		$lines = explode("\n", $body);
		foreach ($lines as $line){
			[$value, $optlabel] = explode(':', $line, 2);
			$options[] = [
				'value' => trim($value),
				'label' => trim($optlabel),
			];
		}
		$value = [
			'name'    => trim($name),
			'label'   => trim($label),
			'options' => $options,
		];
		return $value;
	}

	protected function joinBlocks($blocks){ return $blocks; }

}