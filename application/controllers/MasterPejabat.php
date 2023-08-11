<?php
class MasterPejabat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_MasterPejabat');
    }

    public function index() {
        $search = $this->input->get('search');
        if (!empty($search)) {
            $data['pejabat'] = $this->M_MasterPejabat->search_data($search);
        }else {
            $data['pejabat'] = $this->M_MasterPejabat->getAllPejabat();
        }
        
        // $data['pejabat'] = $this->M_MasterPejabat->getAllPejabat();
        $this->load->view('master/pejabat_list', $data);
    }

    public function create() {
        $this->load->view('master/pejabat_create');
    }

    public function store() {
        $data = array(
            'nama' => $this->input->post('nama'),
        );

        $result = $this->M_MasterPejabat->insertPejabat($data);

        if ($result) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data');
        }

        // $this->M_MasterPejabat->insertPejabat($data);
        redirect('MasterPejabat');
    }

    public function edit($id) {
        $data['pejabat'] = $this->M_MasterPejabat->getPejabatById($id);
        $this->load->view('master/pejabat_edit', $data);
    }

    public function update($id) {
        $data = array(
            'nama' => $this->input->post('nama'),
        );

        $edit = $this->M_MasterPejabat->updatePejabat($id, $data);

        if ($edit) {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        }else {
            $this->session->set_flashdata('error', 'Gagal mengubah data');
        }
        
        
        redirect('MasterPejabat');
    }

    public function delete($id) {
        
        $deleted = $this->M_MasterPejabat->deletePejabat($id);

        if ($deleted) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }else {
            $this->session->set_flashdata('error', 'Gagal menghapus data');
        }
        redirect('MasterPejabat');
    }
}
?>
