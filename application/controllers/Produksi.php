<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {
	
    var $kelas = "Produksi";
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
            'data_klaim' => $AJK
        );
        if ($this->ion_auth->is_admin()) {
            $this->template->display('admin/produksi/index', $data);
        } else {
            $this->template->display('produksi/index', $data);
        }
    }

    public function revised()
    {
        $id_ajk = $this->input->post('id_ajk');
        $pengajuan = $this->KlaimJiwaModels->getPengajuanDetail($id_ajk);
        $data = [
            'keterangan' => 'Revisi',
            'sts_kirim' => 'FALSE'
        ];
        $notif = array(
            'pengirim' => $this->session->userdata('user_id'),
            'penerima' => $pengajuan->send_by,
            'keterangan' => $this->input->post('keterangan'),
            'data' => $id_ajk
        );
        $this->KlaimJiwaModels->update($id_ajk,$data);
        $this->NotificationModels->add($notif);
        $this->session->set_flashdata('sucsess', 'Data Berhasil Terkirim');
        redirect('produksi');
        
    }
    
    public function tester($id){

        $pengajuan = $this->KlaimJiwaModels->getPengajuanDetail($id);
        if (!empty($pengajuan->p_spk) AND !empty($pengajuan->p_ep) AND !empty($pengajuan->p_skk) AND !empty($pengajuan->p_ktp) AND !empty($pengajuan->p_ha) AND !empty($pengajuan->p_ak)) {
            echo $this->statusDok = 'Sudah Lengkap';
            echo $this->dokLengkap = date('Y-m-d'); 
        } else {
            echo $this->statusDok = 'Belum Lengkap';
        }
    }

    public function detail($id){
        if ($this->ion_auth->is_admin()) {
            $data["AJK"] = $this->KlaimJiwaModels->getPengajuanDetail($id);
            $this->template->display('admin/produksi/detail',$data);
        } else {
            $data["AJK"] = $this->KlaimJiwaModels->getPengajuanDetail($id);
            $this->template->display('produksi/detail',$data);
        }
        
		// echo json_encode($data);
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
    
    public function approve($id)
    {
        $data = array(
            'is_aproved' => 'TRUE'
        );
        $this->KlaimJiwaModels->update($id,$data);
        $this->session->set_flashdata('sucsess', 'Berhasil Approve');
        redirect($this->kelas);
    }
	
	public function create()
	{
		$this->template->display('produksi/form_create');
	}

	public function detailJson($id){
	    header('Content-Type: application/json');
		$rowData = $this->KlaimJiwaModels->getDetail($id);
	    echo json_encode( $rowData );
	}

	public function add(){
        $id_ajk = $this->input->post("id_ajk");
        $idDebitur = $this->input->post("id_debitur");

        $pengajuan = $this->KlaimJiwaModels->getPengajuanDetail($id_ajk);
        $this->load->helper(['form', 'string', 'notification']);
        
        $p_spk = $_FILES['p_spk']['name'];
        $p_ep = $_FILES['p_ep']['name'];
        $p_skk = $_FILES['p_skk']['name'];
        $p_ktp = $_FILES['p_ktp']['name'];
        $p_ha = $_FILES['p_ha']['name'];
        $p_ak = $_FILES['p_ak']['name'];

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
            $this->session->set_flashdata('failed', 'Gagal Upload Data');
            echo $this->upload->display_errors();
            // redirect('produksi');
            // echo $this->upload->display->errors();

        } else if (!empty($p_ep) && !$this->upload->do_upload('p_ep')) {
            $data['err_ep'] = $this->upload->display_errors();
            //load view disini
            $this->session->set_flashdata('failed', 'Gagal Upload Data');
            // redirect('produksi');
            echo $this->upload->display_errors();
            // $this->template->display('klaimjiwa/pengajuan/',$idDebitur);

        } else if (!empty($p_skk) && !$this->upload->do_upload('p_skk')) {
            $data['err_skk'] = $this->upload->display_errors();
            $this->session->set_flashdata('failed', 'Gagal Upload Data');
            // redirect('produksi');
            echo $this->upload->display_errors();                   
            // $this->template->display('klaimjiwa/pengajuan/',$idDebitur);

        } else if (!empty($p_ktp) && !$this->upload->do_upload('p_ktp')) {
            $data['err_ktp'] = $this->upload->display_errors();
            $this->session->set_flashdata('failed', 'Gagal Upload Data');
            // redirect('produksi');
            echo $this->upload->display_errors();                   
            // $this->template->display('klaimjiwa/pengajuan/',$idDebitur);

        } else if (!empty($p_ha) && !$this->upload->do_upload('p_ha')) {
            $data['err_ha'] = $this->upload->display_errors();
            $this->session->set_flashdata('failed', 'Gagal Upload Data');
            // redirect('produksi');
            echo $this->upload->display_errors();
            // $this->template->display('klaimjiwa/pengajuan/',$idDebitur);

        } else if (!empty($p_ak) && !$this->upload->do_upload('p_ak')) {
            $data['err_ak'] = $this->upload->display_errors();
            $this->session->set_flashdata('failed', 'Gagal Upload Data');
            // redirect('produksi');
            echo $this->upload->display_errors();
            // $this->template->display('klaimjiwa/pengajuan/',$idDebitur);
        } else {

            if (!empty($pengajuan->p_spk) AND !empty($pengajuan->p_ep) AND !empty($pengajuan->p_skk) AND !empty($pengajuan->p_ktp) AND !empty($pengajuan->p_ha) AND !empty($pengajuan->p_ak)) {
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
                'updated_at' => date('Y-m-d'),
                'tgl_dok_lengkap' => $this->dokLengkap,
                'p_spk' => (!empty($spk)) ? $spk : $pengajuan->p_spk,
                'p_ep' => (!empty($ep)) ? $ep : $pengajuan->p_ep,
                'p_skk' => (!empty($skk)) ? $skk : $pengajuan->p_skk,
                'p_ktp' => (!empty($ktp)) ? $ktp : $pengajuan->p_ktp,
                'p_ha' => (!empty($ha)) ? $ha : $pengajuan->p_ha,
                'p_ak' => (!empty($ak)) ? $ak : $pengajuan->p_ak,
                'statusDok' => $this->statusDok,
                'created_by' => $this->session->userdata('user_id')
            ];
            // echo json_encode($data);
            // $this->DebiturModels->update($idDebitur,$datDebitur);
            $this->KlaimJiwaModels->update($id_ajk,$data);
            $this->session->set_flashdata('alert', success('Data siswa berhasil ditambahkan.'));
            redirect('produksi');
            // $this->template->display('klaimjiwa/pengajuan/'.$idDebitur);
        }
    }
    
    public function statusProduksi($sts_kirim = 'FALSE'){
		if ($this->ion_auth->is_admin()) {
			$kondisi = array(
                'is_deleted' => 'FALSE',
                'is_aproved' => 'FALSE',
                // 'statusDok' => $status,
                'sts_kirim' => 'TRUE'
			);
		} else {
			//data jika usernya milik bank
			if ($this->session->userdata('bank_id')) {
				$kondisi = array(
					'id_bank' => $this->session->userdata('bank_id'),
                    'is_deleted' => 'FALSE',
                    'is_aproved' => 'FALSE',
                    // 'statusDok' => $status,
                    'sts_kirim' => $sts_kirim
				);
				//data jika usernya milik broker
			}elseif ($this->session->userdata('broker_id')) {
				$kondisi = array(
                    'is_deleted' => 'FALSE',
                    'is_aproved' => 'FALSE',
                    // 'statusDok' => $status,
                    'sts_kirim' => $sts_kirim
				);
			}            
		}
		$AJK = $this->KlaimJiwaModels->getAllBy($kondisi);
		$data = array(
			'data_klaim' => $AJK,
		);
		echo json_encode($data);
	}

	public function delete($id){		
		$this->KlaimJiwaModels->delete($id);
		// redirect($this->kelas);
		$this->index();
	}

	public function send($id){		
        $pengajuan = $this->KlaimJiwaModels->getPengajuanDetail($id);
        if ($this->ion_auth->is_admin()) {
            # code...
        } else {
            if ($pengajuan->statusDok === 'Belum Lengkap') {
                $this->session->set_flashdata('failed', 'Gagal mengirim, Silahkan update untuk lengkapi dokumen persyaratan terlebih dahulu !');
                redirect('produksi');
            } else {
                $data = array(
                    'sts_kirim' => 'TRUE',
                    'keterangan' => 'Telah dikirim ke admin',
                    'send_by' => $this->session->userdata('user_id')
                );
                $notif = array(
                    'pengirim' => $this->session->userdata('user_id'),
                    'penerima' => 1,
                    'keterangan' => 'Telah mengajukan klaim dengan atas nama '.$pengajuan->nama_debitur,
                    'data' => $id
                );
                $this->KlaimJiwaModels->update($id,$data);
                $this->NotificationModels->add($notif);
                $this->session->set_flashdata('sucsess', 'Data Berhasil Terkirim');
                redirect('produksi');
            }
        }
	}

	public function update($id)
	{
        $data["AJK"] = $this->KlaimJiwaModels->getPengajuanDetail($id);
        if ($data["AJK"]) {
            $this->template->display('produksi/update',$data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada !');
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
