<?php
class Pejabat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Pejabat');
        // $this->load->model('M_MasterPejabat');
        // $this->load->database(); // Load database library

    }

    public function index() {

        $this->load->view('pejabat/index');

    }

    public function get_data() {
        $draw = $this->input->post('draw');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search')['value'];

        $recordsTotal = $this->M_Pejabat->get_total_records();
        $recordsFiltered = $this->M_Pejabat->get_filtered_records($search);
        $data = $this->M_Pejabat->get_data($start, $length, $search); 

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        );

        echo json_encode($response);
    }

    //MENAMPILKAN OPTION SELECT DENGAN JUMLAH DATA SESUAI YANG INGIN DITAMPILKAN
    public function select_data() {
        $this->load->model('M_MasterPejabat'); 

        $search = $this->input->get('q');
        $page = $this->input->get('page');
        $page_limit = 10; // JUMLAH DATA YANG TAMPIL

        $data = $this->M_MasterPejabat->get_data_paginated($search, $page, $page_limit);
        $total_count = $this->M_MasterPejabat->get_total_count($search);

        $response = array(
            'results' => array(),
            'pagination' => array(
            'more' => ($page * $page_limit) < $total_count
            )
        );

        foreach ($data as $pejabat) {
            $response['results'][] = array(
                'id' => $pejabat->id, 
                'text' => $pejabat->nama, //KOLOM YANG AKAN DIAMBIL DATANYA
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function create() {
        $this->load->model('M_MasterPejabat');
        $data['pejabat_options'] = $this->M_MasterPejabat->get_pejabat_options();
        $this->load->view('pejabat/create', $data);
    }

    public function store() {
        $data = array(
            'nama_pejabat' => $this->input->post('nama_pejabat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'm_pejabat_id' => $this->input->post('m_pejabat_id'),
        );

        $result = $this->M_Pejabat->insertPejabat($data);

        if ($result) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data');
        }

        
        redirect('Pejabat');
    }

    public function edit($id) {
        $data['pejabat'] = $this->M_Pejabat->getPejabatById($id);
        $this->load->model('M_MasterPejabat');
        $data['pejabat_options'] = $this->M_MasterPejabat->get_pejabat_options();
        $this->load->view('pejabat/edit', $data);
    }

    public function update($id) {
        $data = array(
            'nama_pejabat' => $this->input->post('nama_pejabat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'm_pejabat_id' => $this->input->post('m_pejabat_id'),
        );

        $edit = $this->M_Pejabat->updatePejabat($id, $data);

        if ($edit) {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        }else {
            $this->session->set_flashdata('error', 'Gagal mengubah data');
        }
        
        redirect('Pejabat');
    }

    public function delete($id) {
        $deleted = $this->M_Pejabat->deletePejabat($id);

        if ($deleted) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }else {
            $this->session->set_flashdata('error', 'Gagal menghapus data');
        }
        
        redirect('Pejabat');
    }
}
?>
