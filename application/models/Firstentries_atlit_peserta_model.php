<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Firstentries_atlit_peserta_model extends CI_Model
{

    public $table = 'firstentries_atlit_peserta';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    //relasi ke table kategori
    public function get_by_kategori()
    {
        $this->db->select('firstentries_atlit.id as id_kategori, firstentries_atlit.kelas, firstentries_atlit.kategori, firstentries_atlit.gender, firstentries_atlit_peserta.jumlah_peserta');
        $this->db->join('firstentries_atlit', 'firstentries_atlit_peserta.id_kategori = firstentries_atlit.id');
        $this->db->from('firstentries_atlit_peserta');
        $query = $this->db->get();

        return $query->result();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('id_kategori', $q);
        $this->db->or_like('jumlah_peserta', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('id_kategori', $q);
        $this->db->or_like('jumlah_peserta', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Firstentries_atlit_peserta_model.php */
/* Location: ./application/models/Firstentries_atlit_peserta_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-03-20 04:37:06 */
/* http://harviacode.com */