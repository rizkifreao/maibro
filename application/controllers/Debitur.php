<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debitur extends CI_Controller {
	
	var $kelas = "Debitur";

	function __construct(){
		parent::__construct();
		$this->load->database();
		chek_session();
	}

	public function test($id)
	{
		var_dump($this->DebiturModels->getDebitur($id));
	}

	public function index()
	{
		if ($this->ion_auth->is_admin()) {
			$debitur = $this->DebiturModels->getAll();
			$data = array(
				'data_debitur' => $debitur
			);
			$this->template->display('admin/debitur/index', $data);
		} else if($this->session->userdata('bank_id')) {
			$debitur = $this->DebiturModels->getAll();
			$data = array(
				'data_debitur' => $debitur
			);
			$this->template->display('debitur/index', $data);
		}else if ($this->session->userdata('broker_id')) {
			$debitur = $this->DebiturModels->getAllBy(array('id_broker' => $this->session->userdata('broker_id'),'is_deleted' => 'FALSE'));
			$data = array(
				'data_debitur' => $debitur
			);
			$this->template->display('debitur/index', $data);
		}
	}

	public function getNama($id)
	{
		echo $this->DebiturModels->getDetail($id)->nama_debitur;
	}

	//memngambil data debitur dalam bentuk ajax untuk datatable di file debitur/index.php
	public function getAjaxDebitur(){
		$debitur = $this->DebiturModels->getAll();
		$data = array(
			'data_debitur' => $debitur,
		);
		echo json_encode($data);
	}

	//untuk tabel debitur yang belum diajukan
	public function statusPengajuan($status){
		if ($this->ion_auth->is_admin()) {
			$kondisi = array(
				'is_deleted' => 'FALSE',
				'status_prod' => $status
			);
		} else {
			//data jika usernya milik bank
			if ($this->session->userdata('bank_id')) {
				$kondisi = array(
					'id_bank' => $this->session->userdata('bank_id'),
					'is_deleted' => 'FALSE',
					'status_prod' => $status
				);
				//data jika usernya milik broker
			}elseif ($this->session->userdata('broker_id')) {
				$kondisi = array(
					'is_deleted' => 'FALSE',
					'status_prod' => $status
				);
			}            
		}
		$debitur = $this->DebiturModels->getAllBy($kondisi);
		$data = array(
			'data_debitur' => $debitur,
		);
		echo json_encode($data);
	}
	
	public function create()
	{
		$data = array(
			'KTP' => set_value('KTP'),
            'id_debitur' => set_value('id_debitur'),
			'nama_debitur' => set_value('nama_debitur'),
			'alamat' => set_value('alamat'),
			'tlp' => set_value('tlp'),
			'jk' => set_value('jk'),
			'tglLahir' => set_value('tglLahir'),
			'tmp_lahir' => set_value('tmp_lahir'),
			'email' => set_value('email'),
			'umur' => set_value('umur'),
        );
		$this->template->display('debitur/form_create',$data);
	}

	public function detailJson($id){
	    header('Content-Type: application/json');
		$rowData = $this->DebiturModels->getDetail($id);
	    echo json_encode( $rowData );
	}

	public function add(){

		if ($this->validation())
        {	
			$id_debitur = $this->input->post("id_debitur");
			$data["KTP"] = strtoupper($this->input->post("KTP"));
			$data["nama_debitur"] = strtoupper($this->input->post("debitur"));
			$data["alamat"] = $this->input->post("alamat");
			$data["jenis_kelamin"] = $this->input->post("jk");
			$data["tgl_lahir"] = $this->input->post("tglLahir");
			$data["email_debitur"] = $this->input->post("email");
			$data["tmp_lahir"] = $this->input->post("tmp_lahir");
			$data["umur"] = $this->input->post("umur");
			$data["tlp"] = $this->input->post("tlp");
			$data["created_by"] = $this->session->userdata('user_id');
			$data["id_bank"] = $this->session->userdata('bank_id');
			$data["id_broker"] = $this->session->userdata('broker_id');
			$data["id_asuransi"] = $this->session->userdata('asuransi_id');

			// echo json_encode($data);

			if ($id_debitur) {
				$data["updated_at"] = date('Y-m-d');
				$this->DebiturModels->update($id_debitur,$data);
				$this->session->set_flashdata('sucsess','Berhasil Memperbaharui Data !!');
				redirect($this->kelas);
			} else {
				$data["created_at"] = date('Y-m-d');
				$this->DebiturModels->add($data);
				$this->session->set_flashdata('sucsess','Berhasil Menyimpan Data !!');
				redirect($this->kelas);
			}
			
        }
        else
        {
            $this->create();
        }		
	}

	public function delete($id){
			$this->DebiturModels->delete($id);
			$this->session->set_flashdata('sucsess','Berhasil Dihapus !!');
			redirect('debitur');
	}

	public function restoreDelete($id){		
		$this->DebiturModels->restoreDelete($id);
		redirect($this->kelas);
	}

	public function edit($id)
	{
		$row = $this->DebiturModels->getDetail($id);

        if ($row) {
            $data = array(
				'KTP' => set_value('KTP', $row->KTP),
                'id_debitur' => set_value('id_debitur', $row->id_debitur),
                'nama_debitur' => set_value('nama_debitur', $row->nama_debitur),
                'alamat' => set_value('alamat', $row->alamat),
				'tlp' => set_value('tlp', $row->tlp),
				'jk' => set_value('jk', $row->jenis_kelamin),
				'tglLahir' => set_value('tglLahir', $row->tgl_lahir),
				'tmp_lahir' => set_value('tmp_lahir', $row->tmp_lahir),
				'email' => set_value('email', $row->email_debitur),
				'umur' => set_value('umur', $row->umur),
				
            );
            $this->template->display('debitur/form_edit', $data);
        } else {
            $this->session->set_flashdata('failed', 'Data tidak ada !');
            redirect(site_url('debitur'));
        }
	}

	public function validation() {
		$this->form_validation->set_rules('KTP', 'KTP', 'trim|required|numeric|max_length[13]',
			array('required'=>'* Wajib diisi','numeric'=>'Hanya boleh berisi angka !!','max_length'=>'Minimal 13 digit !!'));
		$this->form_validation->set_rules('tlp', 'Nomor Telepon', 'trim|required|numeric|max_length[13]',
			array('required'=>'* Wajib diisi','numeric'=>'Hanya boleh berisi angka !!','max_length'=>'Minimal 13 digit !!'));
		$this->form_validation->set_rules('debitur', 'Debitur', 'trim|required',
			array('required'=>'* Wajib diisi'));
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required|alpha',
			array('required'=>'* Wajib dipilih','alpha'=>' Jenis kelamin wajib dipilih'));
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Kelahiran', 'trim|required',
			array('required'=>'* Wajib diisi'));
		$this->form_validation->set_rules('tglLahir', 'Tanggal Lahir', 'trim|required|date',
			array('required'=>'* Wajib diisi','date'=>' Hanya format tanggal yang diperbolehkan !!'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',
			array('required'=>'* Wajib diisi','valid_email'=>' Hanya format email yang diperbolehkan !!'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',
			array('required'=>'* Wajib diisi'));
		$this->form_validation->set_rules('umur', 'Umur', 'trim|required|numeric|max_length[3]',
			array('required'=>'* Wajib diisi','numeric'=>' Hanya boleh berisi angka !!','max_length'=>'Maksimal 3 angka !!'));
		return $this->form_validation->run();
	}
	
	public function exportExcel() {
        $this->load->helper('exportexcel');
        $namaFile = "Tabel Debitur.xls";
        $judul = "Daftar Debitur";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Debitur");
		xlsWriteLabel($tablehead, $kolomhead++, "Email Debitur");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "Umur");
		xlsWriteLabel($tablehead, $kolomhead++, "Telepon");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");

        foreach ($this->DebiturModels->getAll() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_debitur);
			xlsWriteLabel($tablebody, $kolombody++, $data->email_debitur);
			xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
			xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
			xlsWriteNumber($tablebody, $kolombody++, $data->umur);
			xlsWriteNumber($tablebody, $kolombody++, $data->tlp);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}
