<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Peserta_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/peserta/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/peserta/index/';
            $config['first_url'] = base_url() . 'index.php/peserta/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Peserta_model->total_rows($q);
        $peserta = $this->Peserta_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'peserta_data' => $peserta,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','peserta/peserta_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'no_identitas' => $row->no_identitas,
		'nama' => $row->nama,
		'gender' => $row->gender,
		'tempat_lahir' => $row->tempat_lahir,
		'tgl_lahir' => $row->tgl_lahir,
		'provinsi' => $row->provinsi,
		'kota_kab' => $row->kota_kab,
		'perguruan' => $row->perguruan,
		'tipe_partisipasi' => $row->tipe_partisipasi,
		'foto' => $row->foto,
	    );
            $this->template->load('template','peserta/peserta_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('peserta/create_action'),
	    'id' => set_value('id'),
	    'no_identitas' => set_value('no_identitas'),
	    'nama' => set_value('nama'),
	    'gender' => set_value('gender'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'provinsi' => set_value('provinsi'),
	    'kota_kab' => set_value('kota_kab'),
	    'perguruan' => set_value('perguruan'),
	    'tipe_partisipasi' => set_value('tipe_partisipasi'),
	    'foto' => set_value('foto'),
	);
        $this->template->load('template','peserta/peserta_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_identitas' => $this->input->post('no_identitas',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kota_kab' => $this->input->post('kota_kab',TRUE),
		'perguruan' => $this->input->post('perguruan',TRUE),
		'tipe_partisipasi' => $this->input->post('tipe_partisipasi',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Peserta_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('peserta'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('peserta/update_action'),
		'id' => set_value('id', $row->id),
		'no_identitas' => set_value('no_identitas', $row->no_identitas),
		'nama' => set_value('nama', $row->nama),
		'gender' => set_value('gender', $row->gender),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kota_kab' => set_value('kota_kab', $row->kota_kab),
		'perguruan' => set_value('perguruan', $row->perguruan),
		'tipe_partisipasi' => set_value('tipe_partisipasi', $row->tipe_partisipasi),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->template->load('template','peserta/peserta_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'no_identitas' => $this->input->post('no_identitas',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kota_kab' => $this->input->post('kota_kab',TRUE),
		'perguruan' => $this->input->post('perguruan',TRUE),
		'tipe_partisipasi' => $this->input->post('tipe_partisipasi',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Peserta_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('peserta'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);

        if ($row) {
            $this->Peserta_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('peserta'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_identitas', 'no identitas', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kota_kab', 'kota kab', 'trim|required');
	$this->form_validation->set_rules('perguruan', 'perguruan', 'trim|required');
	$this->form_validation->set_rules('tipe_partisipasi', 'tipe partisipasi', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Peserta.php */
/* Location: ./application/controllers/Peserta.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-03-19 06:52:31 */
/* http://harviacode.com */