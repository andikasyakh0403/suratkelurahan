<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKelahiran extends CI_Model
{
    //manajemen surat keramaian
    public function getkelahiran()
    {
        return $this->db->get('suratkelahiran');
    }

    public function kelahiranWhere($where)
    {
        return $this->db->get_where('suratkelahiran', $where);
    }

    public function simpankelahiran($data = null)
    {
        $this->db->insert('suratkelahiran',$data);
    }

    public function updatekelahiran($data = null, $where = null)
    {
        $this->db->update('suratkelahiran', $data, $where);
    }

    public function hapuskelahiran($where = null)
    {
        $this->db->delete('suratkelahiran', $where);
    }

    
    //manajemen kategori
   
}