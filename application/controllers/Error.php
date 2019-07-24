<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
    }
    
    function index() {       
        $this->template->display('errors/error_404');
    }

}