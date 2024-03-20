<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Firstentries_atlit_peserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Firstentries_atlit_peserta_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/firstentries_atlit_peserta/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/firstentries_atlit_peserta/index/';
            $config['first_url'] = base_url() . 'index.php/firstentries_atlit_peserta/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Firstentries_atlit_peserta_model->total_rows($q);
        $firstentries_atlit_peserta = $this->Firstentries_atlit_peserta_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'firstentries_atlit_peserta_data' => $firstentries_atlit_peserta,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','firstentries_atlit_peserta/firstentries_atlit_peserta_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Firstentries_atlit_peserta_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_kategori' => $row->id_kategori,
		'jumlah_peserta' => $row->jumlah_peserta,
	    );
            $this->template->load('template','firstentries_atlit_peserta/firstentries_atlit_peserta_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('firstentries_atlit_peserta'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('firstentries_atlit_peserta/create_action'),
	    'id' => set_value('id'),
	    'id_kategori' => set_value('id_kategori'),
	    'jumlah_peserta' => set_value('jumlah_peserta'),
	);
        $this->template->load('template','firstentries_atlit_peserta/firstentries_atlit_peserta_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'jumlah_peserta' => $this->input->post('jumlah_peserta',TRUE),
	    );

            $this->Firstentries_atlit_peserta_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('firstentries_atlit_peserta'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Firstentries_atlit_peserta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('firstentries_atlit_peserta/update_action'),
		'id' => set_value('id', $row->id),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'jumlah_peserta' => set_value('jumlah_peserta', $row->jumlah_peserta),
	    );
            $this->template->load('template','firstentries_atlit_peserta/firstentries_atlit_peserta_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('firstentries_atlit_peserta'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'jumlah_peserta' => $this->input->post('jumlah_peserta',TRUE),
	    );

            $this->Firstentries_atlit_peserta_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('firstentries_atlit_peserta'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Firstentries_atlit_peserta_model->get_by_id($id);

        if ($row) {
            $this->Firstentries_atlit_peserta_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('firstentries_atlit_peserta'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('firstentries_atlit_peserta'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('jumlah_peserta', 'jumlah peserta', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Firstentries_atlit_peserta.php */
/* Location: ./application/controllers/Firstentries_atlit_peserta.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-03-20 04:37:06 */
/* http://harviacode.com */