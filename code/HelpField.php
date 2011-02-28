<?php

class HelpField extends DatalessField {
	protected $targetField;
	protected $content;
	
	/**
	 * Create a new HelpField.
	 * @param string $targetField The name of the form field to attach the help text to (eg, "MenuTitle" or "Content")
	 * @param string $content The text/HTML contents of the help box
	 */
	function __construct($targetField, $content) {
		$this->targetField = $targetField;
		$this->content = $content;
		
		parent::__construct($targetField.'_HelpField', $content);
	}
	
	static function include_files() {		
		Requirements::javascript(THIRDPARTY_DIR.'/jquery/jquery.js');
		Requirements::javascript(THIRDPARTY_DIR.'/jquery-livequery/jquery.livequery.js');
	
		Requirements::javascript('helpfield/javascript/helpfield.js');
		Requirements::css('helpfield/css/helpfield.css');
	}
	
	function FieldHolder() {
		HelpField::include_files();
		
		return "<input type='text' value=\"".htmlentities($this->content)."\" id='{$this->targetField}_HelpFieldSeed' class='helpFieldSeed' />";
	}
	
	function Field() {
		return $this->FieldHolder();
	}
}
