<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class BankModels extends CI_Model {

    var $table_name = "bank";
    var $pk = "id_bank";
    var $order = 'DESC';
    // var $broker_id = $this->session->userdata('broker_id');

    function getAll() {

        if ($this->ion_auth->is_admin()) {
            $this->db->order_by($this->pk, $this->order);
            return $this->db->get_where($this->table_name, array('is_deleted' => 'FALSE'))->result();
        } else {
            //data jika usernya milik bank
            if ($this->session->userdata('bank_id')) {
                $this->db->order_by($this->pk, $this->order);
                return $this->db->get_where($this->table_name, array('id_bank' => $this->session->userdata('bank_id'),'is_deleted' => 'FALSE'))->result();
                
                //data jika usernya milik broker
            }elseif ($this->session->userdata('broker_id')) {
                $this->db->order_by($this->pk,$this->order);
                return $this->db->get_where($this->table_name,array('is_deleted' => 'FALSE'))->result();
            }            
        }
    }
    
    function getAllBy($kondisi) {
        $this->db->order_by($this->pk, $this->order);
        return $this->db->get_where($this->table_name, $kondisi)->result();
    }
    
    function getDetail($id) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_bank',$id);
        return $this->db->get()->row();
    }

    function getDetailArray($id) {
        if ($this->ion_auth->is_admin()) {
            $this->db->select('*');
            $this->db->from($this->table_name);
            $this->db->where(array('id_debitur' => $id, 'is_deleted' => 'FALSE'));
            return $this->db->get()->row_array();
        } else {
            $this->db->select('*');
            $this->db->from($this->table_name);
            $this->db->where(array('id_bank' => $this->session->userdata('bank_id'),'id_debitur' => $id, 'is_deleted' => 'FALSE'));
            return $this->db->get()->row_array();
        }
        
    }

    function add($data) {
        $this->db->insert($this->table_name, $data);
    }
    
    function update($id, $data) {
        $this->db->where($this->pk, $id);
        $this->db->update($this->table_name, $data);
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