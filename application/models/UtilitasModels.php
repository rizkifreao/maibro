<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UtilitasModels extends CI_Model {

    public $table = 'tb_users';
    public $id = 'userid';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    public function tampiltabel()
    {
       return $this->db->query("show tables")->result();
    }

    
}
