<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSuratramai extends CI_Model
{
    //manajemen surat keramaian
    public function getSuratramai()
    {
        return $this->db->get('suratramai');
    }

    public function suratramaiWhere($where)
    {
        return $this->db->get_where('suratramai', $where);
    }

    public function simpanSuratramai($data = null)
    {
        $this->db->insert('suratramai',$data);
    }

    public function updateSuratramai($data = null, $where = null)
    {
        $this->db->update('suratramai', $data, $where);
    }

    public function hapusSuratramai($where = null)
    {
        $this->db->delete('suratramai', $where);
    }

    
    //manajemen kategori
   
}