<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class NotificationModels extends CI_Model {

    var $table_name = "notifikasi";
    var $pk = "id_notif";
    var $order = 'DESC';
    // var $broker_id = $this->session->userdata('broker_id');

    function getAll() {
        $penerima = $this->session->userdata('user_id');
        $query = $this->db->query(
            "SELECT * FROM notifikasi WHERE penerima = '$penerima' ORDER BY id_notif DESC LIMIT 5"
        );
        $output = '';
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
            {
                $id_bank = $this->UserModels->getDetail($row['pengirim'])->id_bank;
                $nama_perusahaan = '';
                if ($this->ion_auth->is_admin()) {
                    $nama_perusahaan = $this->BankModels->getDetail($id_bank)->nama_bank;
                }else { $nama_perusahaan = "Maibro"; }
                $output .= '<li>
                            <a href="'.base_url('produksi/detail').'/'.$row['data'].'">
                                <div class="pull-left">
                                <img src="'.base_url('public').'/web/user-profile/'.$this->UserModels->getDetail($row['pengirim'])->avatar.'" class="img-circle" alt="User Image">
                                </div>
                                <h4>
                                '.$this->UserModels->getDetail($row['pengirim'])->first_name.'
                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                </h4>
                                <h5 style="margin-top: 0px; margin-bottom: 5px; font-size: 13px;">
                                '.$nama_perusahaan.'
                                </h5>
                                <p style="white-space: normal">'. $row['keterangan'].'</p>
                            </a>
                        </li>';
                // return $output;
            }
        } else {
            echo '<li>
                    <a href="#">
                        <h4>
                        Tidak ada notifikasi !!
                        </h4>
                    </a>
                </li>';
        }
        return $output;
        // return $query->row_array();
    }

    function countNotif(){
        $penerima = $this->session->userdata('user_id');
        $query = $this->db->query("SELECT * FROM notifikasi WHERE status_notif = 'FALSE' AND penerima = '$penerima' ");
        $count = $query->num_rows();
        return $count;
    }
    
    function add($data) {
        $this->db->insert($this->table_name, $data);
    }

    function getDetail($id) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_debitur',$id);
        return $this->db->get()->row();
        
    }
    
    function update($id) {
        
        $this->db->where('penerima', $id);
        $this->db->update($this->table_name,array('status_notif' => 'TRUE'));
    }

    function upadateNotif(){
        $this->db->where('status','FALSE');
        $this->db->update($this->table_name,array('status' => 'TRUE'));
    }
    
    function delete($id) {
        $this->db->where($this->pk,$id);
        $this->db->update($this->table_name,array('deleted_at' => date('Y-m-d'), 'is_deleted' => 'TRUE'));
    }

    function restoreDelete($id)
    {
        if ($this->ion_auth->is_admin()) {
            $this->db->where($this->pk,$id);
            $this->db->update($this->table_name,array('deleted_at' => NULL));
        }else {
            echo "Maaf hanya admin yang dapat memakai fungsi ini";
        }
    }
}