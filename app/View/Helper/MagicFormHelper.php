<?php

App::uses('FormHelper', 'View/Helper');

class MagicFormHelper extends FormHelper {

	public function create($model = null, $options = array()) {
		$options = array(
			'novalidate' => true,
		) + $options;
		return parent::create($model, $options);
	}

	public function select($fieldName, $options = array(), $attributes = array()) {
		
		$styledControl = !empty($attributes['styledControl']);
		$attributes['styledControl'] = null;
		
		$labelAttributes = array();
		if (!empty($attributes['class'])) {
			$labelAttributes['class'] = $attributes['class'];
			$attributes['class'] = null; 
		}

		$select = parent::select($fieldName, $options, $attributes);

		if ($styledControl) {
			$select = $this->styledControlWrapLabel($select, $labelAttributes);
			$select = $this->styledControlApplyLabelClasses($select);
		}

		return $select;
	}

	public function radio($fieldName, $options = array(), $attributes = array()) {
		
		$styledControl = !empty($attributes['styledControl']);
		$attributes['styledControl'] = null;

		$radio = parent::radio($fieldName, $options, $attributes);

		if ($styledControl) {
			$radio = $this->styledControlWrapLabel($radio);
			$radio = $this->styledControlApplyLabelClasses($radio);
		}

		return $radio;
	}

	public function input($fieldName, $options = array()) {

		$this->setEntity($fieldName);
		$parsedOptions = $this->_parseOptions($options);

		$styledControl = false;
		
		if (in_array($parsedOptions['type'], array('checkbox', 'select')) && !empty($parsedOptions['styledControl'])) {
			$styledControl = true;
		}
		
		if ($parsedOptions['type'] != 'radio') {
			$options['styledControl'] = null;
		}

		$labelAttributes = array();
		if ($styledControl && $parsedOptions['type'] == 'select' && !empty($parsedOptions['class'])) {
			$labelAttributes['class'] = $parsedOptions['class'];
			$options['class'] = null; 
		}
		
		$input = parent::input($fieldName, $options);

		if ($styledControl) {
			$input = $this->styledControlWrapLabel($input, $labelAttributes);
			$input = $this->styledControlApplyLabelClasses($input);	
		}

		return $input;
	}

	public function styledControlWrapLabel($input, $labelAttributes = array()) {
		
		// checkbox and radio buttons
		$input = preg_replace(
			'/(<input type="(checkbox|radio)" .+?)(<label .+?>)([^<>]+?)(<\/label>)/',
			'$3$1<span class="control-indicator"></span><span class="control-label">$4</span>$5',
			$input
		);

		// create label class for select
		$labelClass = 'select';
		if (!empty($labelAttributes['class'])) {
			$labelClass .= ' ' . $labelAttributes['class'];
		}

		// selects
		$input = preg_replace(
			'/(<select\b.+?<\/select>)/is',
			'<label class="' . $labelClass . '">$1</label>',
			$input
		);

		return $input;
	}

	public function styledControlApplyLabelClasses($input) {

		// only apply to checkboxes/radio buttons
		if (!preg_match('/type="(checkbox|radio)"/i', $input, $matches)) {
			return $input;
		}
		
		$type = $matches[1];

		return preg_replace_callback(
			'/(<label for=".+?")( class="(.+?)")?></i',
			function ($matches) use ($type) {
				$className = !empty($matches[3]) ? ' ' . $matches[3] : '';
				return $matches[1] . ' class="control ' . $type . $className . '"><';
			}, 
			$input
		);
	}

	public function dateTime($fieldName, $dateFormat = 'DMY', $timeFormat = '12', $attributes = array()) {
		
		if (!strpos($fieldName, '.')) {
			$fieldName = $this->defaultModel . '.' . $fieldName;
		}
		
		$out = '';
		if (!empty($attributes['value'])) {
			$selected = $attributes['value'];
		} else {
			$selected = $this->value($fieldName);
		}
		if (!empty($dateFormat)) {
			if (is_array($selected)) {
				$value = $selected['date'];
			} elseif (is_string($selected) && !empty($selected) && !preg_match('/^[0\-\s:]*$/', $selected)) {
				$value = date('d/m/Y', strtotime($selected));
			} else {
				$value = '';
			}
			$out .= $this->text($fieldName . '.date', array('value' => $value, 'class' => 'text-input date') + $attributes);
		}
		if (!empty($timeFormat)) {
			if (is_array($selected)) {
				$value = $selected['time'];
			} elseif (is_string($selected) && !empty($selected) && !preg_match('/^[0\-\s:]*$/', $selected)) {
				$value = date('g:ia', strtotime($selected));
			} else {
				$value = '';
			}
			$out .= $this->text($fieldName . '.time', array('value' => $value, 'class' => 'text-input time') + $attributes);
		}
		return $out;
	}

	public function text($fieldName, $options = array()) {
		if (isset($options['tags'])) {
			$tags = (!empty($options['tags']) && is_array($options['tags'])) ? 
					$options['tags'] :
					array();
			$options['data-tags'] = json_encode($tags);
			unset($options['tags']);
			if (empty($options['style'])) {
				$options['style'] = 'width:245px;';
			} else {
				$options['style'] .= ';width:245px;';
			}
		}
		return parent::text($fieldName, $options);
	}
	
	public function textarea($fieldName, $options = array()) {
		if (!empty($options['ckeditor'])) {
			$options['data-ckeditor'] = json_encode($options['ckeditor']);
			unset($options['ckeditor']);
		}
		return parent::textarea($fieldName, $options);
	}

	public function submit($caption = null, $options = array()) {
		if (strpos($caption, '://') !== false || preg_match('/\.(jpg|jpe|jpeg|gif|png|ico)$/', $caption)) {
			if (array_key_exists('div', $options)) {
				if (is_array($options['div'])) {
					$options = array_merge($options['div'], array('class' => 'submit image'));
				}
			} else {
				$options['div']['class'] = 'submit image';
			}
		}
		return parent::submit($caption, $options);
	}

/**
 * Append characters to domId - MagicUpload uses this. When MagicUpload dies this will no longer be required.
 */
	public function domId($options = null, $id = 'id') {
		$domId = parent::domId($options, $id);
		if (!empty($this->domIdAppend) && is_array($options) & !empty($domId[$id])) {
			$domId[$id] .= $this->domIdAppend;
		} else if (!empty($this->domIdAppend) && !is_array($options) && !empty($domId)) {
			$domId .= $this->domIdAppend;
		}
		return $domId;
	}

/**
 * We override this method for two reasons.
 *	1) To handle data structure created by HabtmFixer component.
 *  2) To properly handle HABTM in our format.
 */
	protected function _selectedArray($data, $key = 'id') {
		if (!is_array($data)) {
			$model = $data;
			if (!empty($this->data[$model][$model])) {
				return $this->data[$model][$model];
			}
			if (!empty($this->data[$model])) {
				$data = $this->data[$model];
			}
		}
		$array = array();
		if (!empty($data)) {
			foreach ($data as $var) {
				if (!empty($var[$key])) {
					$array[$var[$key]] = $var[$key];
				} else {
					$subvar = reset($var);
					if (!isset($subvar[$key])) {
						$key = Inflector::underscore(key($var)) . '_id';
					}
					$array[$subvar[$key]] = $subvar[$key];
				}
			}
		}
		return $array;	
	}

}