<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

    var $kelas = 'bank';

    function __construct(){
		parent::__construct();
        chek_session();
        if (!$this->ion_auth->is_admin()){
            $this->session->set_flashdata('info', 'Maaf hanya admin yang dapat mengakses halaman ini');
            redirect ('dashboard');
            
        }
	}

    public function index()
    {
        if ($this->ion_auth->is_admin()) {
            $banks = $this->BankModels->getAll();
            $data = array(

            );
            $this->template->display('admin/bank/index');
        } else {
            $this->session->set_flashdata('failed', 'Maaf hanya admin yang diperbolehkan !!');
            redirect('dashboard');
        }
    }

    public function getData(){
		$bank = $this->BankModels->getAll();
		$data = array(
			'data_bank' => $bank,
		);
		echo json_encode($data);
    }
    
    public function create()
	{
		$data = array(
            'id_bank' => set_value('id_bank'),
			'nama_bank' => set_value('nama_bank'),
            'email' => set_value('email'),
        );
		$this->template->display('admin/bank/form_create',$data);
    }
    
    public function validation() {
		$this->form_validation->set_rules('nama_bank', 'Nama Debitur', 'trim|required',
			array('required'=>'* Wajib diisi'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',
			array('required'=>'* Wajib diisi','valid_email'=>' Hanya format email yang diperbolehkan !!'));
		return $this->form_validation->run();
    }
    
    public function add(){

		if ($this->validation())
        {	
			$id_bank = $this->input->post("id_bank");
			$data["nama_bank"] = $this->input->post("nama_bank");
            $data["email_bank"] = $this->input->post("email");
            
			if ($id_bank) {
				$data["updated_at"] = date('Y-m-d');
				$this->BankModels->update($id_bank,$data);
				$this->session->set_flashdata('sucsess','Berhasil Memperbaharui Data !!');
                redirect($this->kelas);
			} else {
				$data["created_at"] = date('Y-m-d');
				$this->BankModels->add($data);
				$this->session->set_flashdata('sucsess','Berhasil Menyimpan Data !!');
                redirect($this->kelas);
			}
        }
        else
        {
            $this->create();
        }		
    }

    public function edit($id)
	{
		$row = $this->BankModels->getDetail($id);

        if ($row) {
            $data = array(
                'id_bank' => set_value('id_bank', $row->id_bank),
                'nama_bank' => set_value('nama_bank', $row->nama_bank),
				'email' => set_value('email', $row->email_bank),
            );
            $this->template->display('admin/bank/form_edit', $data);
        } else {
            $this->session->set_flashdata('failed', 'Data tidak ada !');
            redirect(site_url('bank'));
        }
    }
    
    public function getNama($id)
	{
		echo $this->BankModels->getDetail($id)->nama_bank;
	}
    
    public function delete($id){
        $this->BankModels->delete($id);
        $this->session->set_flashdata('sucsess','Berhasil Dihapus !!');
        redirect('debitur');
}

}