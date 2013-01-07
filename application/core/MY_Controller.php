<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	//Page info
	public $data = Array();
	protected $pageName = FALSE;
	protected $template = "main";
	protected $hasNav = TRUE;
	protected $hasFooter = TRUE;
	//Page contents
	protected $javascript = array();
	protected $css = array();
	protected $fonts = array();
	//Page Meta
	protected $title = FALSE;
	protected $description = FALSE;
	protected $keywords = FALSE;
	protected $author = FALSE;
	protected $CI;

	function __construct() {

		parent::__construct();
		$this -> auth = new stdClass;
		$this -> load -> library('flexi_auth');
		if (ENVIRONMENT == 'development') {
			$this -> load -> helper('ChromePhp');
		}
		//$this -> data = null;
		// To load the CI benchmark and memory usage profiler - set 1==1.
		if (1 == 2) {
			$sections = array('benchmarks' => TRUE, 'memory_usage' => TRUE, 'config' => FALSE, 'controller_info' => FALSE, 'get' => FALSE, 'post' => FALSE, 'queries' => FALSE, 'uri_string' => FALSE, 'http_headers' => FALSE, 'session_data' => FALSE);
			$this -> output -> set_profiler_sections($sections);
			$this -> output -> enable_profiler(TRUE);
		}

		// Example flexi auth library call within extended controller.
		$this -> data['login_status'] = $this -> flexi_auth -> is_logged_in();
		$this -> title = $this -> config -> item('site_title');
		$this -> description = $this -> config -> item('site_description');
		$this -> keywords = $this -> config -> item('site_keywords');
		$this -> author = $this -> config -> item('site_author');
		// Example flexi auth library call within extended controller.
		$this -> data['login_status'] = $this -> flexi_auth -> is_logged_in();

		// Load required CI libraries and helpers.
		$this -> load -> database();
		$this -> load -> library('session');
		$this -> load -> helper('url');
		$this -> load -> helper('form');

		// Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
		$this -> load -> vars('base_url', '/');
		$this -> load -> vars('includes_dir', '/includes/');
		$this -> load -> vars('current_url', $this -> uri -> uri_to_assoc(1));

		//$this -> pageName = strToLower(get_class($this));
		$this -> pageName = strToLower(uri_string());

	}

	protected function _render($view) {
		$this -> data["uri_segment_1"] = $this -> uri -> segment(1);
		$this -> data["uri_segment_2"] = $this -> uri -> segment(2);

		//static
		$toTpl["javascript"] = $this -> javascript;
		$toTpl["css"] = $this -> css;
		$toTpl["fonts"] = $this -> fonts;

		//meta
		$toTpl["title"] = $this -> title;
		$toTpl["description"] = $this -> description;
		$toTpl["keywords"] = $this -> keywords;
		$toTpl["author"] = $this -> author;

		//data
		$toBody["content_body"] = $this -> load -> view($view, array_merge($this -> data, $toTpl), true);

		//nav menu
		if ($this -> hasNav) {
			$this -> load -> helper("nav");
			$toMenu["pageName"] = $this -> pageName;
			$toHeader["nav"] = $this -> load -> view("template/nav", $toMenu, true);
			$toBody["pageNmae"] = $this -> pageName;
		}

		$toHeader["basejs"] = $this -> load -> view("template/basejs", $this -> data, true);
		$toBody["header"] = $this -> load -> view("template/header", $toHeader, true);

		if ($this -> hasFooter) {
			$toBody["footer"] = $this -> load -> view("template/footer", '', true);
		}
		$toTpl["body"] = $this -> load -> view("template/" . $this -> template, $toBody, true);

		//render view
		$this -> load -> view("template/skeleton", $toTpl);

	}

}
