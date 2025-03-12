<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKematian extends CI_Model
{
    //manajemen surat keramaian
    public function getkematian()
    {
        return $this->db->get('kematian');
    }

    public function kematianWhere($where)
    {
        return $this->db->get_where('kematian', $where);
    }

    public function simpankematian($data = null)
    {
        $this->db->insert('kematian',$data);
    }

    public function updatekematian($data = null, $where = null)
    {
        $this->db->update('kematian', $data, $where);
    }

    public function hapuskematian($where = null)
    {
        $this->db->delete('kematian', $where);
    }

    
    //manajemen kategori
   
}