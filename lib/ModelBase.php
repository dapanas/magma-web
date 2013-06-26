<?php
abstract class ModelBase
{
	protected $db;


	public function __construct()
	{
		$this->db = SPDO::singleton();
		$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	
	}
}
?>