<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminsurat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('dompdf_gen');
        $this->load->model(['ModelUser']);
        cek_login();
        cek_user();
    if ($this->uri->segment(1) =="assets"){
        redirect('adminsurat/index');}
    }
    

    public function index()
    {
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['judul'] = "Admin";
    $data['downloadsurat']= $this->db->get('downloadsurat')->result_array();
    $this->db->where('idrole', 2);
        $data['anggota'] = $this->db->get('user')->result_array();
    
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');

        
    }
    public function suratramai()
    {
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['judul'] = "Admin";
    $data['suratramai']= $this->ModelSuratramai->getSuratramai()->result_array();
    $data['anggota'] = $this->db->get('user')->result_array();
    
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/viewsuratramaiadmin',$data);
        $this->load->view('templates/footer');

        
    }
    public function detailsuratramai()
    {
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $where = ['nosurat' => $this->uri->segment(3)];
    $data['suratramai']= $this->ModelSuratramai->SuratramaiWhere($where)->row_array();
    
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/detailsuratramai',$data);
        $this->load->view('templates/footer');

        
    }
    public function export_excel_suratramai() 

    { 

        $data = array( 'title' => 'Laporan Data Surat Keramaian', 'suratramai' => $this->db->query("select * from suratramai")->result_array()); 

        $this->load->view('admin/export_excel_suratramai', $data); 

    }
    public function cetaksuratramai(){
        { 

            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $this->load->library('dompdf_gen'); 
            $where = ['nosurat' => $this->uri->segment(3)];
            $data['tanggal']=date('d-m-Y');
            $data['suratramai']= $this->ModelSuratramai->SuratramaiWhere($where)->row_array();

 		

 		; 
        $html = $this->load->view('admin/cetaksuratramai', $data, true); // Ambil isi view dan masukkan ke $html

// Generate PDF dan unduh
$this->dompdf_gen->generate($html, 'Laporan.pdf');}

//nama file pdf yang di hasilkan}

 		 

            }

    


public function updatesuratramai(){
    $alasan=$this->input->post('alasan');
    $status=$this->input->post('status');
    $nosurat=$this->input->post('nosurat');
    $data = [
        'alasan' => $alasan,
        'status' => $status,
        
    ];
    $where=['nosurat' => $this->input->post('nosurat')];
    $this->ModelSuratramai->updatesuratramai($data,$where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di update </div>');
redirect('adminsurat/detailsuratramai/'.$nosurat);
}
public function sktm()
{
$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
$data['judul'] = "Admin";
$data['sktm']= $this->ModelSktm->getsktm()->result_array();


    $this->load->view('templates/header');
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/viewsktmadmin',$data);
    $this->load->view('templates/footer');
}
public function detailsktm()
{
$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
$where = ['nosurat' => $this->uri->segment(3)];
$data['sktm']= $this->ModelSktm->sktmWhere($where)->row_array();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/detailsktm',$data);
    $this->load->view('templates/footer');
    
}
public function updatesktm(){
    $alasan=$this->input->post('alasan');
    $status=$this->input->post('status');
    $nosurat=$this->input->post('nosurat');
    $data = [
        'alasan' => $alasan,
        'status' => $status,
        
    ];
    $where=['nosurat' => $this->input->post('nosurat')];
    $this->ModelSktm->updatesktm($data,$where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di update </div>');
redirect('adminsurat/detailsktm/'.$nosurat);
}
public function export_excel_sktm() 

{ 

    $data = array( 'title' => 'Laporan Data Surat Keterangan Tidak Mampu', 'sktm' => $this->db->query("select * from sktm")->result_array()); 

    $this->load->view('admin/export_excel_sktm', $data); 

}
public function kematian()
{
$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
$data['judul'] = "Admin";
$data['kematian']= $this->ModelKematian->getkematian()->result_array();


    $this->load->view('templates/header');
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/viewsuratkematianadmin',$data);
    $this->load->view('templates/footer');
}
public function detailkematian()
{
$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
$where = ['nosurat' => $this->uri->segment(3)];
$data['kematian']= $this->ModelKematian->kematianWhere($where)->row_array();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/detailkematian',$data);
    $this->load->view('templates/footer');
    
}
public function updatekematian(){
    $alasan=$this->input->post('keterangan');
    $status=$this->input->post('status');
    $nosurat=$this->input->post('nosurat');
    $data = [
        'keterangan' => $alasan,
        'status' => $status,
        
    ];
    $where=['nosurat' => $this->input->post('nosurat')];
    $this->ModelKematian->updatekematian($data,$where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di update </div>');
redirect('adminsurat/detailkematian/'.$nosurat);
}
public function export_excel_kematian() 

{ 

    $data = array( 'title' => 'Laporan Data Surat Keterangan Tidak Mampu', 'kematian' => $this->db->query("select * from kematian")->result_array()); 

    $this->load->view('admin/export_excel_kematian', $data); 

}
public function kelahiran()
{
$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
$data['judul'] = "Surat Kelahiran";
$data['suratkelahiran']= $this->ModelKelahiran->getkelahiran()->result_array();


    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/viewkelahiranadmin',$data);
    $this->load->view('templates/footer');
}
public function detailkelahiran()
{
$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
$where = ['nosurat' => $this->uri->segment(3)];
$judul = "surat kematian";
$data['kelahiran']= $this->ModelKelahiran->kelahiranWhere($where)->row_array();

    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/detailkelahiran',$data);
    $this->load->view('templates/footer');
    
}
public function updatekelahiran(){
    $keterangan=$this->input->post('keterangan');
    $status=$this->input->post('status');
    $nosurat=$this->input->post('nosurat');
    $data = [
        'keterangan' => $keterangan,
        'status' => $status,
        
    ];
    $where=['nosurat' => $this->input->post('nosurat')];
    $this->ModelKelahiran->updatekelahiran($data,$where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di update </div>');
redirect('adminsurat/detailkelahiran/'.$nosurat);
}
public function export_excel_kelahiran() 

{ 

    $data = array( 'title' => 'Laporan Data Pengajuan Akte Kelahiran', 'suratkelahiran' => $this->db->query("select * from suratkelahiran")->result_array()); 

    $this->load->view('admin/export_excel_kelahiran', $data); 

}

}