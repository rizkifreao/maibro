<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilitas extends CI_Controller {
	
    var $kelas = "Utilitas";

	function __construct(){
		parent::__construct();
		$this->load->database();
		chek_session();
    }
    
    public function index()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('UtilitasModels');
            $data['tabel'] = $this->UtilitasModels->tampiltabel(); //AMBIL DATA TABEL-TABEL
            $this->template->display('admin/backup-restore/index', $data);
        } else {
            $this->session->set_flashdata('failed', 'Maaf hanya admin yang boleh melakukan ini');
            redirect('dashboard','refresh');
        }
    }

    public function backupTable()
    {

      $tabel = $this->input->post('tabel');
      $this->load->dbutil();
      $prefs = array(     
              'tables'      => array($tabel),
                    'format'      => 'zip',             
                    'filename'    => 'table_'.$tabel.date("d-m-Y_H:i:s").'_backup.sql'
                  );
      $backup =& $this->dbutil->backup($prefs); 
      $db_name = 'backup-table-'. $tabel . '_' . date("d-m-Y_H:i:s") .'.zip'; //NAMAFILENYA
      $save = 'backup/db/'.$db_name;
      $this->load->helper('file');
      write_file($save, $backup); 
      $this->load->helper('download');
      force_download($db_name, $backup);
    }

    public function backupDB()
    {
        $this->load->dbutil();
   
        $prefs = array(
          'format' => 'zip',
          'filename' => 'maibro_db_backup.sql'
        );
      
        $backup =& $this->dbutil->backup($prefs);
      
        $db_name = 'backup-db-maibro_' . date("d-m-Y_H:i:s") . '.zip'; // file name
        $save  = 'backup/db/' . $db_name; // dir name backup output destination
      
        $this->load->helper('file');
        write_file($save, $backup);
      
        $this->load->helper('download');
        force_download($db_name, $backup);
    }

    public function test()
    {
        $opt = array(
            'src' => '../maibro', // dir name to backup
            'dst' => 'backup/files' // dir name backup output destination
          );
          
          // Codeigniter v3x
          $this->load->library('recurseZip_lib', $opt);
          echo $this->recursezip_lib->compress();

    }

    public function backupSistem()
    {
        ini_set('max_execution_time', 300);
        $opt = array(
            'src' => '../maibro', // dir name to backup
            'dst' => 'backup/files' // dir name backup output destination
          );
          
          // Codeigniter v3x
          $this->load->library('recurseZip_lib', $opt);
          $download = $this->recursezip_lib->compress();
          
          /* Codeigniter v2x
          $zip    = $this->load->library('recurseZip_lib', $opt);     
          $download = $zip->compress();
          */
          
          redirect(base_url($download));
    }

    public function restore()    
    {
        ini_set('max_execution_time', 300);
        $this->load->helper('file');
        // $this->load->model('sismas_m');
        $config['upload_path']="./backup/db/";
        $config['allowed_types']="jpg|png|gif|jpeg|bmp|sql|x-sql";
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload("datafile")){
         $error = array('error' => $this->upload->display_errors());
        //  echo "GAGAL UPLOAD";
         $this->session->set_flashdata('failed', 'Restore Gagal !!');
         var_dump($error);
         exit();
        }

        $file = $this->upload->data();  //DIUPLOAD DULU KE DIREKTORI assets/database/
        $fotoupload=$file['file_name'];
                    
          $isi_file = file_get_contents('./backup/db/' . $fotoupload); //PANGGIL FILE YANG TERUPLOAD
          $string_query = rtrim( $isi_file, "\n;" );
          $array_query = explode(";", $string_query);   //JALANKAN QUERY MERESTORE KEDATABASE
              foreach($array_query as $query)
              {
                    $this->db->query($query);
              }

          $path_to_file = './backup/db/' . $fotoupload;
            if(unlink($path_to_file)) {   // HAPUS FILE YANG TERUPLOAD
                 redirect('utilitas');
            }
            else {
                //  echo 'errors occured';
                $this->session->set_flashdata('failed', 'Errors Occured');
            }
        
    }
}