<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class KlaimJiwaModels extends CI_Model {

    var $table_name = "prod_ajk";
    var $KlaimView = "KlaimView";
    var $pk = "id_ajk";
    var $order = 'DESC';

    function getAll() {
        
        if ($this->ion_auth->is_admin()) {

            $this->db->order_by($this->pk,$this->order);
            $query = $this->db->get($this->KlaimView,array('deleted_at' => NULL));
            return $query->result();

        } else {
            //data jika usernya milik bank
            if ($this->session->userdata('bank_id')) {
                $this->db->order_by($this->pk, $this->order);
                return $this->db->get_where($this->KlaimView, array('id_bank' => $this->session->userdata('bank_id'),'deleted_at' => NULL,'sts_kirim' => 0))->result();
                
                //data jika usernya milik broker
            }elseif ($this->session->userdata('broker_id')) {
                
                $this->db->order_by($this->pk,$this->order);
                $query = $this->db->get($this->KlaimView);
                return $query->result();
            }        
            elseif ($this->session->userdata('asuransi_id')) {
                
                $this->db->order_by($this->pk,$this->order);
                $query = $this->db->get($this->KlaimView);
                return $query->result();
            }    
        }
    }

    public function is_exist($where)
	{
		return $this->db->where($where)->get($this->$KlaimView)->row_array();
	}

    function getDebiturBy($kondisi) {
        $this->db->order_by($this->pk, $this->order);
        return $this->db->get_where($this->table_name,$kondisi)->result();
    }
    
    function getAllBy($kondisi) {
        $query = $this->db->get_where($this->KlaimView, $kondisi);
        return $query->result();
    }

    function getDetail($id) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_ajk',$id,'deleted_at','FALSE');
        return $this->db->get()->row();
    }

    function getPengajuanDetail($id)
    {
        $this->db->select('*');
        $this->db->from($this->KlaimView);
        $this->db->where('id_ajk',$id,'is_deleted','FALSE');
        return $this->db->get()->row();
    }

    function add($data) {
        $this->db->insert($this->table_name, $data);
    }
    
    function update($id, $data) {
        $this->db->where($this->pk, $id);
        $this->db->update($this->table_name, $data);
    }
    
    function delete($id) {

        if ($this->ion_auth->is_admin()) {
            $this->db->where($this->pk, $id);
            $this->db->delete($this->table_name);
        } else {
            $this->db->where($this->pk,$id);
            $this->db->update($this->table_name,array('deleted_at' => date('Y-m-d')));
        }
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