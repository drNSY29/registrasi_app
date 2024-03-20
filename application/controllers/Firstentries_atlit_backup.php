<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Firstentries_atlit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Firstentries_atlit_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/firstentries_atlit/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/firstentries_atlit/index/';
            $config['first_url'] = base_url() . 'index.php/firstentries_atlit/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Firstentries_atlit_model->total_rows($q);
        $firstentries_atlit = $this->Firstentries_atlit_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'firstentries_atlit_data' => $firstentries_atlit,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'firstentries_atlit/firstentries_atlit_list', $data);
    }

    public function read($id)
    {
        $row = $this->Firstentries_atlit_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'kelas' => $row->kelas,
                'kategori' => $row->kategori,
                'gender' => $row->gender,
            );
            $this->template->load('template', 'firstentries_atlit/firstentries_atlit_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('firstentries_atlit'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('firstentries_atlit/create_action'),
            'id' => set_value('id'),
            'kelas' => set_value('kelas'),
            'kategori' => set_value('kategori'),
            'gender' => set_value('gender'),
        );
        $this->template->load('template', 'firstentries_atlit/firstentries_atlit_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kelas' => $this->input->post('kelas', TRUE),
                'kategori' => $this->input->post('kategori', TRUE),
                'gender' => $this->input->post('gender', TRUE),
            );

            $this->Firstentries_atlit_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('firstentries_atlit'));
        }
    }

    public function update($id)
    {
        $row = $this->Firstentries_atlit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('firstentries_atlit/update_action'),
                'id' => set_value('id', $row->id),
                'kelas' => set_value('kelas', $row->kelas),
                'kategori' => set_value('kategori', $row->kategori),
                'gender' => set_value('gender', $row->gender),
            );
            $this->template->load('template', 'firstentries_atlit/firstentries_atlit_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('firstentries_atlit'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'kelas' => $this->input->post('kelas', TRUE),
                'kategori' => $this->input->post('kategori', TRUE),
                'gender' => $this->input->post('gender', TRUE),
            );

            $this->Firstentries_atlit_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('firstentries_atlit'));
        }
    }

    public function delete($id)
    {
        $row = $this->Firstentries_atlit_model->get_by_id($id);

        if ($row) {
            $this->Firstentries_atlit_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('firstentries_atlit'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('firstentries_atlit'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
        $this->form_validation->set_rules('gender', 'gender', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Firstentries_atlit.php */
/* Location: ./application/controllers/Firstentries_atlit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-03-20 04:19:45 */
/* http://harviacode.com */