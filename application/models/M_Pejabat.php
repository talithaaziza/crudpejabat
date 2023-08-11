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

    public function search_data($search) {
        $this->db->select('pejabat.*, master_pejabat.nama as master_pejabat_name');
        $this->db->from('pejabat');
        $this->db->join('master_pejabat', 'pejabat.m_pejabat_id = master_pejabat.id', 'left');
        $this->db->like('pejabat.nama_pejabat', $search); // Ganti 'field_name' dengan nama kolom yang ingin Anda cari
        $query = $this->db->get(); // Ganti 'table_name' dengan nama tabel yang ingin Anda cari
        return $query->result();
    }
}
?>
