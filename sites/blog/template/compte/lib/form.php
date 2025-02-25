<?php 
	function input($id)
	{
		$value = isset($_POST[$id]) ? $_POST[$id] : '';
		return '<input type="text" name="'.$id.'" class="form-control" id="'.$id.'" value="'.$value.'">';
	}

	function inputSpe($id, $type)
	{
		$value = isset($_POST[$id]) ? $_POST[$id] : '';
		return '<input type="'.$type.'" name="'.$id.'" class="form-control" id="'.$id.'" value="'.$value.'">';
	}

	function textarea($id)
	{
		$value = isset($_POST[$id]) ? $_POST[$id] : '';
		return "<textarea type='text' name='$id' class='form-control' id='$id'>$value</textarea>";
	}

	function select($id, $options = array())
	{
		$return = "<select class='form-control' name='$id' id='$id'>";
		/**
				 * ***************************
				 */

		foreach ($options as $k => $v) {
			$selected = null;
			if (isset($_POST[$id]) && $k == $_POST[$id]) {
				$selected = 'selected="selected"';
			}
			$return .= "<option value='$k' $selected>$v</option>";
		}
		$return .= '</select>';
		return $return;
	}
 ?>