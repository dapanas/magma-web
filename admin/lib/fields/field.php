<?

abstract class field{
	
	abstract protected function view();
	abstract protected function bake_field();
	abstract protected function exec_add();
	abstract protected function exec_edit();
		
	public $fieldname;
	public $type;
	public $value;
	public $ninjaState;
	public $label;
   protected $db;
   
   public final function __construct($fieldname,$label,$type,$value){
        $this->db = SPDO::singleton();
		$this->config = Config::singleton();
		$this->label = $label;
		$this->fieldname = $fieldname;
		$this->type = $type;
		$this->value = $value;
   
   }
	
	
}
include "disabled.php";
include "hora.php";
include "color.php";
include "combo.php";
include "combo_child.php";
include "email.php";
include "dias_semana.php";
include "fecha.php";
include "file_file.php";
include "file_img.php";
include "float.php";
include "literal.php";

include "mp3.php";
include "multiselect.php";
include "number.php";
include "password.php";
include "percent.php";
include "tags.php";
include "text.php";
include "textarea.php";
include "truefalse.php";
include "url.php";
