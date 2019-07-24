<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KlaimJiwa extends CI_Controller {
	
    var $kelas = "KlaimJiwa";
    var $statusDok = null;
    var $dokLengkap = null;

	function __construct(){
		parent::__construct();
		$this->load->database();
		chek_session();
    }

    public function index(){
		$AJK = $this->KlaimJiwaModels->getAll();
        $data = array(
            'data_klaim' => $AJK
        );
        if ($this->ion_auth->is_admin()) {
            $this->template->display('admin/klaim-jiwa/index', $data);
        } else {
            $this->template->display('klaim-jiwa/index', $data);
        }
    }
    
    
    public function prossesklaim()
    {
        $AJK = $this->KlaimJiwaModels->getAll();

        $data = array(
            'data_klaim' => $AJK
        );

        $this->template->display('klaim-jiwa/prod_ajk', $data);
    }

    public function downloadArchive($id)
    {
        $ajk = $this->KlaimJiwaModels->getDetail($id);

        $p_spk = $ajk->p_spk;
        $p_ep = $ajk->p_ep;
        $p_skk = $ajk->p_skk;
        $p_ktp = $ajk->p_ktp;
        $p_ha = $ajk->p_ha;
        $p_ak = $ajk->p_ak;

        if (!empty($p_spk)) {
            $this->zip->read_file(FCPATH.'public\/documents/spk/'.$p_spk);
        } 
        if (!empty($p_ep)) {
            $this->zip->read_file(FCPATH.'public\/documents/e-policy/'.$p_ep);
        }
        if (!empty($p_skk)) {
            $this->zip->read_file(FCPATH.'public\/documents/suratKematian/'.$p_skk);
        }
        if (!empty($p_ktp)) {
            $this->zip->read_file(FCPATH.'public\/documents/ktp/'.$p_ktp);
        }
        if (!empty($p_ha)) {
            $this->zip->read_file(FCPATH.'public\/documents/historical/'.$p_ha);
        }
        if (!empty($p_ak)) {
            $this->zip->read_file(FCPATH.'public\/documents/photokredit/'.$p_ak);
        }
        if (empty($p_spk) && empty($p_ep) && empty($p_skk) && empty($p_ktp) && empty($p_ha) && empty($p_ak) ) {
            $this->session->set_flashdata('failed', 'Tidak ada file !!');
        } else {
            $this->zip->download('AJK-'.$id.'_doc-persyaratan');
        }        
    }

    public function pengajuan($id){
        $data["debitur"] = $this->DebiturModels->getDetail($id);
		// $data["rowData"] = $this->M_workorder_detail->getAllBy("workorderid = ".$id);
        // $data["rowCust"] = $this->M_pelanggan->getDetail($wo->pelangganid);
        $data['klaim'] = array(
                'jns_kredit' => set_value('jns_kredit'),
                'nokredit' => set_value('nokredit'),
                'plafon' => set_value('plafon'),
				'tenor' => set_value('tenor'),
				'premi' => set_value('premi'),
				'nilai_klaim' => set_value('nilai_klaim'),
				'jns_klaim' => set_value('jns_klaim'),
                'tgl_akad' => set_value('tgl_akad'),
                'tgl_lapor' => set_value('tgl_lapor'),
                'tgl_kejadian' => set_value('tgl_kejadian'),
                'tgl_upload' => set_value('tgl_upload'),
        );
        $this->template->display('klaim-jiwa/pengajuan',$data);
    }

    public function formPengajuan()
    {
        $id_ajk = $this->input->post("id_ajk");
        $data["nokredit"] = $this->input->post("nokredit");
        $data["jns_kredit"] = $this->input->post("jns_kredit");
        $data["plafon"] = $this->input->post("plafon");
        $data["tenor"] = $this->input->post("tenor");
        $data["premi"] = $this->input->post("premi");
        $data["nilai_klaim"] = $this->input->post("nilai_klaim");
        $data["jns_klaim"] = $this->input->post("jns_klaim");
        $data["tgl_akad"] = $this->input->post("tgl_akad");
        $data["tgl_lapor"] = $this->input->post("tgl_lapor");
        $data["tgl_kejadian"] = $this->input->post("tgl_kejadian");
        $data["tgl_upload"] = $this->input->post("tgl_upload");
        $data["debitur"] = $this->input->post("id_debitur");

        $data["created_by"] = $this->session->userdata('user_id');
        $data["id_bank"] = $this->session->userdata('bank_id');
        $data["id_broker"] = $this->session->userdata('broker_id');
        $data["id_asuransi"] = $this->session->userdata('asuransi_id');
        echo json_encode($data);
    }

	public function getAjaxKlaim(){
        $debitur = $this->DebiturModels->getAll();
        $AJK = $this->KlaimJiwaModels->getAll();
        $data = array(
            'data_debitur' => $debitur,
            'data_klaim' => $AJK
		);
		echo json_encode($data);
	}
	
	public function create()
	{
		$this->template->display('klaim-jiwa/form_create');
	}

	public function detailJson($id){
	    header('Content-Type: application/json');
		$rowData = $this->KlaimJiwaModels->getDetail($id);
	    echo json_encode( $rowData );
    }
    
    public function downloadPersyaratan()
    {
            
    }

	public function add(){

        $idDebitur = $this->input->post("id_debitur");

        $this->load->helper(['form', 'string', 'notification']);

            $id_ajk = $this->input->post("id_ajk");
			$data["nama_debitur"] = strtoupper($this->input->post("debitur"));
			$data["alamat"] = $this->input->post("alamat");
			$data["jenis_kelamin"] = $this->input->post("jk");
			$data["tgl_lahir"] = $this->input->post("tglLahir");
			$data["email_debitur"] = $this->input->post("email");
			$data["umur"] = $this->input->post("umur");
			$data["tlp"] = $this->input->post("tlp");
			$data["created_by"] = $this->session->userdata('user_id');
			$data["id_bank"] = $this->session->userdata('bank_id');
			$data["id_broker"] = $this->session->userdata('broker_id');
			$data["id_asuransi"] = $this->session->userdata('asuransi_id');

                $id_ajk = "";
                $p_spk = $_FILES['p_spk']['name'];
                $p_ep = $_FILES['p_ep']['name'];
                $p_skk = $_FILES['p_skk']['name'];
                $p_ktp = $_FILES['p_ktp']['name'];
                $p_ha = $_FILES['p_ha']['name'];
                $p_ak = $_FILES['p_ak']['name'];
                // $s_ijazah = $_FILES['s_ijazah']['name'];
                // $s_skhun = $_FILES['s_skhun']['name'];
                $this->load->library('upload');

                if (!empty($p_spk)) {
                    $config['upload_path'] = './public/documents/spk/';
                    $config['file_types'] = array('image/jpeg','application/pdf','image/png','image/jpeg','application/x-download');
                    $config['allowed_types'] = array("pdf","doc","docx","png","jpg","jpeg","gif");
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '20971520';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $p_spk);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $idDebitur."-surat_pengajuan_klaim.".$ext;
                    $spk = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('p_spk');
                }

                if (!empty($p_ep)) {
                    $config['upload_path'] = './public/documents/e-policy/';
                    $config['file_types'] = array('image/jpeg','application/pdf','image/png','image/jpeg','application/x-download');
                    $config['allowed_types'] = array("pdf","doc","docx","png","jpg","jpeg","gif");
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '20971520';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $p_ep);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $idDebitur."-e_policy.".$ext;
                    $ep = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('p_ep');
                }

                if (!empty($p_skk)) {
                    $config['upload_path'] = './public/documents/suratKematian/';
                    $config['file_types'] = array('image/jpeg','application/pdf','image/png','image/jpeg','application/x-download');
                    $config['allowed_types'] = array("pdf","doc","docx","png","jpg","jpeg","gif");
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '20971520';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $p_skk);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $idDebitur."-surat-ket-kematian.".$ext;
                    $skk = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('p_skk');
                }

                if (!empty($p_ktp)) {
                    $config['upload_path'] = './public/documents/ktp/';
                    $config['file_types'] = array('image/jpeg','application/pdf','image/png','image/jpeg','application/x-download');
                    $config['allowed_types'] = array("pdf","doc","docx","png","jpg","jpeg","gif");
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '20971520';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $p_ktp);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $idDebitur."-KTP.".$ext;
                    $ktp = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('p_ktp');
                }

                if (!empty($p_ha)) {
                    $config['upload_path'] = './public/documents/historical/';
                    $config['file_types'] = array('image/jpeg','application/pdf','image/png','image/jpeg','application/x-download');
                    $config['allowed_types'] = array("pdf","doc","docx","png","jpg","jpeg","gif");
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '20971520';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $p_ha);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $idDebitur."-historical.".$ext;
                    $ha = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('p_ha');
                }

                if (!empty($p_ak)) {
                    $config['upload_path'] = './public/documents/photokredit/';
                    $config['file_types'] = array('image/jpeg','application/pdf','image/png','image/jpeg','application/x-download');
                    $config['allowed_types'] = array("pdf","doc","docx","png","jpg","jpeg","gif");
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '20971520';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $p_ak);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $idDebitur."-photo-akad-kredit.".$ext;
                    $ak = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('p_ak');
                }

                if (!empty($p_spk) && !$this->upload->do_upload('p_spk')) {
                    $data['err_spk'] = $this->upload->display_errors();
                    //load view disini
                    // $this->template->display('klaimjiwa/pengajuan/',$idDebitur);
                    redirect('klaimjiwa');

                } else if (!empty($p_ep) && !$this->upload->do_upload('p_ep')) {
                    $data['err_ep'] = $this->upload->display_errors();
                    //load view disini
                    redirect('klaimjiwa');
                    // $this->template->display('klaimjiwa/pengajuan/',$idDebitur);

                } else if (!empty($p_skk) && !$this->upload->do_upload('p_skk')) {
                    $data['err_skk'] = $this->upload->display_errors();
                    redirect('klaimjiwa');                   
                    // $this->template->display('klaimjiwa/pengajuan/',$idDebitur);

                } else if (!empty($p_ktp) && !$this->upload->do_upload('p_ktp')) {
                    $data['err_ktp'] = $this->upload->display_errors();
                    redirect('klaimjiwa');                   
                    // $this->template->display('klaimjiwa/pengajuan/',$idDebitur);

                } else if (!empty($p_ha) && !$this->upload->do_upload('p_ha')) {
                    $data['err_ha'] = $this->upload->display_errors();
                    redirect('klaimjiwa');
                    // $this->template->display('klaimjiwa/pengajuan/',$idDebitur);

                } else if (!empty($p_ak) && !$this->upload->do_upload('p_ak')) {
                    $data['err_ak'] = $this->upload->display_errors();
                    redirect('klaimjiwa');
                    // $this->template->display('klaimjiwa/pengajuan/',$idDebitur);
                } else {

                    if (!empty($p_spk) AND !empty($p_ep) AND !empty($p_skk) AND !empty($p_ktp) AND !empty($p_ha) AND !empty($p_ak)) {
                        $this->statusDok = 'Sudah Lengkap';
                        $this->dokLengkap = date('Y-m-d'); 
                    } else {
                        $this->statusDok = 'Belum Lengkap';
                    }

                    $data = [
                        'id_ajk' => $id_ajk,
                        'id_bank' => $this->session->userdata('bank_id'),
                        'debitur' => $this->input->post('id_debitur', TRUE),
                        'nokredit' => $this->input->post('nokredit', TRUE),
                        'plafon' => $this->input->post('plafon', TRUE),
                        'tenor' => $this->input->post('tenor', TRUE),
                        'tgl_akad' => $this->input->post('tgl_akad', TRUE),
                        'tgl_lapor' => $this->input->post('tgl_lapor', TRUE),
                        'tgl_kejadian' => $this->input->post('tgl_kejadian', TRUE),
                        'jns_kredit' => $this->input->post('jns_kredit', TRUE),
                        'jns_klaim' => $this->input->post('jns_klaim', TRUE),
                        'nilai_klaim' => $this->input->post('nilai_klaim', TRUE),
                        'premi' => $this->input->post('premi', TRUE),
                        'created_at' => date('Y-m-d'),
                        'tgl_dok_lengkap' => $this->dokLengkap,
                        'p_spk' => (!empty($spk)) ? $spk : NULL,
                        'p_ep' => (!empty($ep)) ? $ep : NULL,
                        'p_skk' => (!empty($skk)) ? $skk : NULL,
                        'p_ktp' => (!empty($ktp)) ? $ktp : NULL,
                        'p_ha' => (!empty($ha)) ? $ha : NULL,
                        'p_ak' => (!empty($ak)) ? $ak : NULL,
                        'statusDok' => $this->statusDok,
                        'created_by' => $this->session->userdata('user_id')
                    ];
                    $datDebitur['status_prod'] = "SUDAH";
                    $this->DebiturModels->update($idDebitur,$datDebitur);
                    $this->KlaimJiwaModels->add($data);
                    $this->session->set_flashdata('sucess', 'Berhasil disimpan, Silahkan lihat di menu Proses Data');
                    redirect('klaimjiwa');
                }
            
    }

	public function delete($id){		
		$this->KlaimJiwaModels->delete($id);
		// redirect($this->kelas);
		$this->index();
	}

	public function restoreDelete($id){		
		$this->KlaimJiwaModels->restoreDelete($id);
		redirect($this->kelas);
	}

	public function edit($id)
	{
		$row = $this->KlaimJiwaModels->getDetail($id);

        if ($row) {
            $data = array(
                'id_ajk' => set_value('id_debitur', $row->id_ajk),
                'nama_debitur' => set_value('nama_debitur', $row->nama_debitur),
                'alamat' => set_value('alamat', $row->alamat),
				'tlp' => set_value('tlp', $row->tlp),
				'jk' => set_value('jk', $row->jenis_kelamin),
				'tglLahir' => set_value('tglLahir', $row->tgl_lahir),
				'tmpLahir' => set_value('tmpLahir', $row->tmp_lahir),
				'email' => set_value('email', $row->email_debitur),
				'umur' => set_value('umur', $row->umur),
				
            );
            $this->template->display('klaim-jiwa/form_create', $data);
        } else {
            $this->session->set_flashdata('failed', 'Data tidak ada !');
            redirect(site_url('debitur'));
        }
	}

	public function validation() {
  
		$this->form_validation->set_rules('nomorKredit', 'Nomor Kredit', 'required|numeric|min_length[16]',
		    array('required'=>'Nomor Kredit Harap Diisi','numeric'=>'Hanya boleh berisi angka !!','min_length'=>'Minimal 16 digit !!'));
		$this->form_validation->set_rules('debitur', 'Debitur', 'required',
		    array('required'=>'Debitur Harap Diisi','alpha'=>' Hanya boleh berisi huruf !!'));
		$this->form_validation->set_rules('jenis_asuransi', 'Jenis Asuransi', 'required',
		    array('required'=>'Debitur Harap Dipilih','alpha'=>' Hanya boleh berisi huruf !!'));
		$this->form_validation->set_rules('tglLahir', 'Nomor Kredit', 'required|date',
		    array('required'=>'Tanggal lahir harap di isi !','date'=>' Hanya format tanggal yang diperbolehkan !!'));
		$this->form_validation->set_rules('tglRegis', 'TANGGAL REGRISTRASI', 'required|date',
		    array('required'=>'Tanggal registrasi harap di isi !','date'=>' Hanya format tanggal yang diperbolehkan !!'));
		$this->form_validation->set_rules('tglAkad', 'TANGGAL AKAD', 'required|date',
		    array('required'=>'Tanggal akad harap di isi !','date'=>' Hanya format tanggal yang diperbolehkan !!'));
		$this->form_validation->set_rules('masaKredit', 'MASA KREDIT', 'required|numeric|max_length[3]',
		    array('required'=>'Masa kredit Harap Diisi','numeric'=>' Hanya boleh berisi angka !!','max_length'=>'Maksimal 3 angka !!'));
		$this->form_validation->set_rules('plafon', 'PLAFON', 'required|numeric|max_length[11]',
		    array('required'=>'Plafon Harap Diisi','numeric'=>' Hanya boleh berisi angka !!','max_length'=>'Maksimal 11 angka !!'));
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

        foreach ($this->KlaimJiwaModels->getAll() as $data) {
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
