<?



final class literal extends field{

	function view(){
		return $this->value;
	}
	function bake_field (){
		return "<input  type=\"text\" class='span5' name=\"".$this->fieldname."\" id=\"".$this->fieldname."\" value=\"".trim($this->value)."\">";

		

						
	}
		
	function exec_add () {
		return addslashes(stripslashes($this->value));

	}
	function exec_edit () {
		return addslashes(stripslashes($this->value));
	}

}

