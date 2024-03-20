<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Firstentries_teamoff_model');
        $this->load->model('Firstentries_atlit_model');
        $this->load->model('Secondentries_atlit_model');
        $this->load->library('form_validation');
    }

    public function first_entries()
    {
        $firstentries_teamoff = $this->Firstentries_teamoff_model->get_all();
        $firstentries_atlit_cadet_laki = $this->Firstentries_atlit_model->count_cadet_laki();
        $firstentries_atlit_cadet_perempuan = $this->Firstentries_atlit_model->count_cadet_perempuan();
        $data = array(
            'firstentries_teamoff_data' => $firstentries_teamoff,
            'firstentries_atlit_cadet_laki' => $firstentries_atlit_cadet_laki,
            'firstentries_atlit_cadet_perempuan' => $firstentries_atlit_cadet_perempuan
        );
        $this->template->load('template', 'dashboard/first_entries', $data);
    }

    public function second_entries()
    {
        $secondentries_atlit_model = $this->Secondentries_atlit_model->get_all();
        $data = array(
            'secondentries_atlit_model' => $secondentries_atlit_model
        );
        $this->template->load('template', 'dashboard/second_entries', $data);
    }
}
