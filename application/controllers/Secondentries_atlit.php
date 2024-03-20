<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Secondentries_atlit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Secondentries_atlit_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/secondentries_atlit/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/secondentries_atlit/index/';
            $config['first_url'] = base_url() . 'index.php/secondentries_atlit/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Secondentries_atlit_model->total_rows($q);
        $secondentries_atlit = $this->Secondentries_atlit_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'secondentries_atlit_data' => $secondentries_atlit,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','secondentries_atlit/secondentries_atlit_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Secondentries_atlit_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_peserta' => $row->id_peserta,
		'kategori' => $row->kategori,
	    );
            $this->template->load('template','secondentries_atlit/secondentries_atlit_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('secondentries_atlit'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('secondentries_atlit/create_action'),
	    'id' => set_value('id'),
	    'id_peserta' => set_value('id_peserta'),
	    'kategori' => set_value('kategori'),
	);
        $this->template->load('template','secondentries_atlit/secondentries_atlit_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_peserta' => $this->input->post('id_peserta',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Secondentries_atlit_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('secondentries_atlit'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Secondentries_atlit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('secondentries_atlit/update_action'),
		'id' => set_value('id', $row->id),
		'id_peserta' => set_value('id_peserta', $row->id_peserta),
		'kategori' => set_value('kategori', $row->kategori),
	    );
            $this->template->load('template','secondentries_atlit/secondentries_atlit_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('secondentries_atlit'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_peserta' => $this->input->post('id_peserta',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Secondentries_atlit_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('secondentries_atlit'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Secondentries_atlit_model->get_by_id($id);

        if ($row) {
            $this->Secondentries_atlit_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('secondentries_atlit'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('secondentries_atlit'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_peserta', 'id peserta', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Secondentries_atlit.php */
/* Location: ./application/controllers/Secondentries_atlit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-03-19 07:32:22 */
/* http://harviacode.com */