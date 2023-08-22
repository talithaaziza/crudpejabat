<?php
class M_Pejabat extends CI_Model {

    public function getAllPejabat() {
        $this->db->select('pejabat.*, master_pejabat.nama as master_pejabat_name');
        $this->db->from('pejabat');
        $this->db->join('master_pejabat', 'pejabat.m_pejabat_id = master_pejabat.id', 'left');
        $query = $this->db->get();
        return $query->result();

        // return $this->db->get('pejabat')->result();
    }

    public function insertPejabat($data) {
        return $this->db->insert('pejabat', $data);
    }

    public function getPejabatById($id) {
        return $this->db->get_where('pejabat', array('id' => $id))->row();
    }

    public function updatePejabat($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pejabat', $data);
    }

    public function deletePejabat($id) {
        $this->db->where('id', $id);
        return $this->db->delete('pejabat');
    }

    public function get_data($start, $length, $search) {
        $this->db->select('pejabat.*, master_pejabat.nama AS nama_master');
        $this->db->from('pejabat');
        $this->db->join('master_pejabat', 'pejabat.m_pejabat_id = master_pejabat.id', 'left');            
        if (!empty($search)) {
            $this->db->like('pejabat.nama_pejabat', $search); // kolom yang ingin dicari
            $this->db->or_like('pejabat.alamat', $search);
            $this->db->or_like('master_pejabat.nama', $search);
        }
        $this->db->order_by('id', 'asc'); //mengurutkan data berdasarkan id
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_total_records() {
        return $this->db->count_all('pejabat'); 
    }

    //pencarian di datatables
    public function get_filtered_records($search) {
        $this->db->join('master_pejabat', 'pejabat.m_pejabat_id = master_pejabat.id', 'left');  

        $this->db->like('pejabat.nama_pejabat', $search); //kolom yang mau dicari
        $this->db->or_like('pejabat.alamat', $search);
        $this->db->or_like('master_pejabat.nama', $search);
        return $this->db->get('pejabat')->num_rows();  
    }

    
}
?>
