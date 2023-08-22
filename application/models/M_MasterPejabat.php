<?php
class M_MasterPejabat extends CI_Model {

    public function getAllPejabat() {
        return $this->db->get('master_pejabat')->result();
    }


    public function get_data($start, $length, $search) {
        $this->db->select('*');
        $this->db->from('master_pejabat');
        if (!empty($search)) {
            $this->db->like('nama', $search); 
        }
            $this->db->order_by('id', 'asc'); 
            $this->db->limit($length, $start);
            return $this->db->get()->result();
    }


    public function get_total_records() {
        return $this->db->count_all('master_pejabat');
    }

    public function get_filtered_records($search) {
        $this->db->like('nama', $search); // kolom yang ingin Anda cari
        return $this->db->get('master_pejabat')->num_rows();
    }


    public function insertPejabat($data) {
        return $this->db->insert('master_pejabat', $data);
    }

    public function getPejabatById($id) {
        return $this->db->get_where('master_pejabat', array('id' => $id))->row();
    }

    public function updatePejabat($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('master_pejabat', $data);
    }

    public function deletePejabat($id) {
        $this->db->where('id', $id);
        return $this->db->delete('master_pejabat');
    }

    public function get_pejabat_options() {
        $this->db->select('id, nama'); // Kolom yang ingin Anda tampilkan sebagai pilihan
        $query = $this->db->get('master_pejabat');
        return $query->result();
    }

     //buat select2
     public function search_pejabat($search_query) {
        $this->db->select('id, nama');
        $this->db->like('nama', $search_query); 
        $this->db->limit(10);//menampilkan 10data saat load awal dan search
        $query = $this->db->get('master_pejabat'); 

        return $query->result(); 
    }
}
?>