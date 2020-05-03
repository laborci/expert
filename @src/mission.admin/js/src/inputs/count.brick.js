import AbstractInputBrick from "zengular-codex/admin/inputs/~abstract-input-brick";
import {Brick}            from "zengular";
import twig               from "./count.twig";
import "./count.less";

@Brick.register('codex-input-count', twig)
@Brick.registerSubBricksOnRender()
@Brick.renderOnConstruct(false)

export default class InputCheckboxes extends AbstractInputBrick {

	getValue() {
		let values = {};
		this.$$('input-element').each(input => { values[input.dataset.id] = input.value });
		return values;
	}

	checkInput(input, array) {
		if (input.checked === true) {
			array.push(input.value);
		}
	}

	setValue(data) {
		if (data instanceof Object) {
			Object.keys(data).forEach(key => {
				this.$$("input-element").filter('[data-id="' + key + '"]').node.value = data[key];
				this.$$("counter").filter('[data-id="' + key + '"]').node.innerHTML = this.$$("input-element").filter('[data-id="' + key + '"]').node.value;
			});
		}
	}

	checkValue(input, line) {if (line.value === input) line.checked = true; }

	onRender() {
		this.$$("input-element").listen('input', (event, target)=>{
			this.$$("counter").filter('[data-id="' + target.dataset.id + '"]').node.innerHTML = target.value;
		});
	}


}