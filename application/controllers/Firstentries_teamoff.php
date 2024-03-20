<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Firstentries_teamoff extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Firstentries_teamoff_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/firstentries_teamoff/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/firstentries_teamoff/index/';
            $config['first_url'] = base_url() . 'index.php/firstentries_teamoff/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Firstentries_teamoff_model->total_rows($q);
        $firstentries_teamoff = $this->Firstentries_teamoff_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'firstentries_teamoff_data' => $firstentries_teamoff,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'firstentries_teamoff/firstentries_teamoff_list', $data);
    }

    public function read($id)
    {
        $row = $this->Firstentries_teamoff_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tipe' => $row->tipe,
                'laki_laki' => $row->laki_laki,
                'perempuan' => $row->perempuan,
            );
            $this->template->load('template', 'firstentries_teamoff/firstentries_teamoff_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('firstentries_teamoff'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('firstentries_teamoff/create_action'),
            'id' => set_value('id'),
            'tipe' => set_value('tipe'),
            'laki_laki' => set_value('laki_laki'),
            'perempuan' => set_value('perempuan'),
        );
        $this->template->load('template', 'firstentries_teamoff/firstentries_teamoff_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tipe' => $this->input->post('tipe', TRUE),
                'laki_laki' => $this->input->post('laki_laki', TRUE),
                'perempuan' => $this->input->post('perempuan', TRUE),
            );

            $this->Firstentries_teamoff_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('firstentries_teamoff'));
        }
    }

    public function update($id)
    {
        $row = $this->Firstentries_teamoff_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('firstentries_teamoff/update_action'),
                'id' => set_value('id', $row->id),
                'tipe' => set_value('tipe', $row->tipe),
                'laki_laki' => set_value('laki_laki', $row->laki_laki),
                'perempuan' => set_value('perempuan', $row->perempuan),
            );
            $this->template->load('template', 'firstentries_teamoff/firstentries_teamoff_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('firstentries_teamoff'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'tipe' => $this->input->post('tipe', TRUE),
                'laki_laki' => $this->input->post('laki_laki', TRUE),
                'perempuan' => $this->input->post('perempuan', TRUE),
            );

            $this->Firstentries_teamoff_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('firstentries_teamoff'));
        }
    }

    public function delete($id)
    {
        $row = $this->Firstentries_teamoff_model->get_by_id($id);

        if ($row) {
            $this->Firstentries_teamoff_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('firstentries_teamoff'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('firstentries_teamoff'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tipe', 'tipe', 'trim|required');
        $this->form_validation->set_rules('laki_laki', 'laki laki', 'trim|required');
        $this->form_validation->set_rules('perempuan', 'perempuan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Firstentries_teamoff.php */
/* Location: ./application/controllers/Firstentries_teamoff.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-03-15 08:39:14 */
/* http://harviacode.com */