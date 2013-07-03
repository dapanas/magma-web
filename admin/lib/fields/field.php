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
	public $rid;
	public $table;
	
   protected $db;
   
   public final function __construct($fieldname,$label,$type,$value,$table = -1,$rid = -1){
        $this->db = SPDO::singleton();
		$this->config = Config::singleton();
		$this->label = $label;
		$this->fieldname = $fieldname;
		$this->type = $type;
		$this->value = $value;
		$this->table = $table;
		$this->rid = $rid;
   
   }
	
	
}
include "slug.php";
include "featured.php";
include "visible.php";
include "about_pagesId.php";
include "courses_pages.php";
include "coursestypesId.php";
include "coursesId.php";
include "disabled.php";
include "hora.php";
include "color.php";
include "combo.php";
include "combo_child.php";
include "youtube.php";
include "email.php";
include "dias_semana.php";
include "fecha.php";
include "file_file.php";
include "file_img.php";
include "float.php";
include "literal.php";
include "tinymce.php";
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
