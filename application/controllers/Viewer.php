<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewer extends CI_Controller {
	
    var $kelas = "Viewer";
    var $statusDok = null;
    var $dokLengkap = null;

	function __construct(){
		parent::__construct();
		$this->load->database();
		chek_session();
    }
    
    public function prossesklaim()
    {
        $AJK = $this->KlaimJiwaModels->getAll();

        $data = array(
            'data_klaim' => $AJK
        );

        $this->template->display('produksi/prod_ajk', $data);
    }

	public function test(){
			$this->statusProduksi();
    }

	public function index(){
		$AJK = $this->KlaimJiwaModels->getAll();
        $data = array(
            'klaim' => $AJK
        );
        if ($this->ion_auth->is_admin()) {
            $this->template->display('admin/viewer/index', $data);
        } else {
            $this->template->display('viewer/index', $data);
        }
    }

    public function statusProduksi(){
		if ($this->ion_auth->is_admin()) {
			$kondisi = array(
                'is_deleted' => 'FALSE',
                'is_aproved' => 'TRUE',
                // 'statusDok' => $status,
			);
		} else {
			//data jika usernya milik bank
			if ($this->session->userdata('bank_id')) {
				$kondisi = array(
					'id_bank' => $this->session->userdata('bank_id'),
					'is_deleted' => 'FALSE',
                    // 'statusDok' => $status,
                    'is_aproved' => 'TRUE',
				);
				//data jika usernya milik broker
			}elseif ($this->session->userdata('broker_id')) {
				$kondisi = array(
					'is_deleted' => 'FALSE',
                    // 'statusDok' => $status,
                    'is_aproved' => 'TRUE',
				);
			}            
		}
		$AJK = $this->KlaimJiwaModels->getAllBy($kondisi);
		$data = array(
			'data_klaim' => $AJK,
		);
		echo json_encode($data);
    }
    
    public function detail($id){
        if ($this->ion_auth->is_admin()) {
            $data["AJK"] = $this->KlaimJiwaModels->getPengajuanDetail($id);
            $this->template->display('admin/viewer/detail',$data);
        } else {
            $data["AJK"] = $this->KlaimJiwaModels->getPengajuanDetail($id);
            $this->template->display('viewer/detail',$data);
        }
        
		// echo json_encode($data);
    }
}