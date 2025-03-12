<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSktm extends CI_Model
{
    //manajemen surat keramaian
    public function getsktm()
    {
        return $this->db->get('sktm');
    }

    public function sktmWhere($where)
    {
        return $this->db->get_where('sktm', $where);
    }

    public function simpansktm($data = null)
    {
        $this->db->insert('sktm',$data);
    }

    public function updatesktm($data = null, $where = null)
    {
        $this->db->update('sktm', $data, $where);
    }

    public function hapussktm($where = null)
    {
        $this->db->delete('sktm',$where);
    }

    
    //manajemen kategori
   
}