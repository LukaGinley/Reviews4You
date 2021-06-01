<?php

// Include our HTML Page Class
require_once ("oo_page.inc.php");
class MasterPage {
	// -------FIELD MEMBERS----------------------------------------
	private $_htmlpage; // Holds our Custom Instance of an HTML Page
	private $_dynamic_1; // Field Representing our Dynamic Content #1
	private $_dynamic_2; // Field Representing our Dynamic Content #2
	private $_dynamic_3; // Field Representing our Dynamic Content #3
	private $_review_ids;
	
	// -------CONSTRUCTORS-----------------------------------------
	function __construct($ptitle) {
		$this->_htmlpage = new HTMLPage ( $ptitle );
		$this->setPageDefaults ();
		$this->setDynamicDefaults ();
		$this->_review_ids = [ 
				1,
				2,
				3,
				4,
				5,
				6,
				7,
		        8,
		        9,
		        10 
		];
	}
	
	// -------GETTER/SETTER FUNCTIONS------------------------------
	public function getDynamic1() {
		return $this->_dynamic_1;
	}
	public function getDynamic2() {
		return $this->_dynamic_2;
	}
	public function getDynamic3() {
		return $this->_dynamic_3;
	}
	public function setDynamic1($phtml) {
		$this->_dynamic_1 = $phtml;
	}
	public function setDynamic2($phtml) {
		$this->_dynamic_2 = $phtml;
	}
	public function setDynamic3($phtml) {
		$this->_dynamic_3 = $phtml;
	}
	public function getPage(): HTMLPage {
		return $this->_htmlpage;
	}
	
	// -------PUBLIC FUNCTIONS-------------------------------------
	public function createPage() {
		// Create our Dynamic Injected Master Page
		$this->setMasterContent ();
		// Return the HTML Page..
		return $this->_htmlpage->createPage ();
	}
	public function renderPage() {
		// Create our Dynamic Injected Master Page
		$this->setMasterContent ();
		// Echo the page immediately.
		$this->_htmlpage->renderPage ();
	}
	public function addCSSFile($pcssfile) {
		$this->_htmlpage->addCSSFile ( $pcssfile );
	}
	public function addScriptFile($pjsfile) {
		$this->_htmlpage->addScriptFile ( $pjsfile );
	}
	
	// -------PRIVATE FUNCTIONS-----------------------------------
	private function setPageDefaults() {
		$this->_htmlpage->setMediaDirectory ( "css", "js", "fonts", "img", "data" );
		$this->addCSSFile ( "bootstrap.css" );
		$this->addCSSFile ( "site.css" );
		$this->addScriptFile ( "" );
		$this->addScriptFile ( "" );
		$this->addScriptFile ( "" );
	}
	private function setDynamicDefaults() {
		$tcurryear = date ( "Y" );
		// Set the Three Dynamic Points to Empty By Default.
		$this->_dynamic_1 = "";
		$this->_dynamic_2 = "";
		$this->_dynamic_3 = "";
	}
	private function setMasterContent() {
		$tid = $this->_review_ids [array_rand ( $this->_review_ids, 1 )];
		$tmasterpage = <<<MASTER
<!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <div class="container">
                <a class="navbar-brand" href="index.php">Reviews4You!</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">
                                Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="review.php?id={$tid}">Reviews</a></li>
                        <li class="nav-item"><a class="nav-link" href="ranking.php">Ranking</a></li>
                        <li class="nav-item"><a class="nav-link" href="consoleoverview.php?id=1">Console Overview</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        {$this->_dynamic_1}
		{$this->_dynamic_2}
		{$this->_dynamic_3}
MASTER;
		$this->_htmlpage->setBodyContent ( $tmasterpage );
	}
}

?>