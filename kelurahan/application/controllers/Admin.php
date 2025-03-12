<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(['ModelUser']);
        cek_login();
        cek_user();
    }

    public function index()
    {
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['judul'] = "Admin";
    $data['downloadsurat']= $this->db->get('downloadsurat')->result_array();
    $this->db->where('idrole', 2);
        $data['anggota'] = $this->db->get('user')->result_array();
    
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');

        
    }
    
    public function qanda()
    {
        
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['qanda'] = $this->db->get('q&a')->result_array();
    $data['judul'] = "q&A";

    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/q&a',$data);
     $this->load->view('templates/footer');

        
    }
    public function simpanqanda()
    {
    $data=['pertanyaan'=>$this->input->post('pertanyaan'),
    'jawaban'=>$this->input->post('jawaban')
    ];
    $this->db->insert('q&a',$data);
    $this->session->set_flashdata('ditambahkan', '<div class="alert alert-success alert-message" role="alert">data berhasil ditambahkan!!</div>');
            
    redirect('admin/qanda');

        
    }
    public function hapusqanda()
    {
    $data=['no'=>$this->input->post('no')];
    $this->db->delete('q&a',$data);
    $this->session->set_flashdata('ditambahkan', '<div class="alert alert-danger alert-message" role="alert">data berhasil dihapus!!</div>');
            
    redirect('admin/qanda');

        
    }
    public function carousel()
    {
        
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['carousel'] = $this->db->get('carousel')->result_array();
    $data['judul'] = "Carousel";

    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
        $this->load->view('admin/carousel');
        $this->load->view('templates/footer');

        
    }
    public function simpancarousel()
    {   
        $keterangan = $this->input->post('keterangan');
        $namaFile = $_FILES['berkas']['name'];
        $namaSementara = $_FILES['berkas']['tmp_name'];

        // tentukan lokasi file akan dipindahkan
        $dirUpload = "./assets/img/profile/";
        // pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);


            $data=[
    'foto'=>$namaFile,
    'keterangan'=>$this->input->post('keterangan'),
    ];
    $this->db->insert('carousel',$data);
    
    $this->session->set_flashdata('ditambahkan', '<div class="alert alert-success alert-message" role="alert">data berhasil ditambahkan!!</div>');
            
    redirect('admin/carousel');

        
    }
    public function hapuscarousel()
    {
    $data=['idcarousel'=>$this->uri->segment(3)];
    $this->db->delete('carousel',$data);
    $this->session->set_flashdata('ditambahkan', '<div class="alert alert-danger alert-message" role="alert">data berhasil dihapus!!</div>');
            
    redirect('admin/carousel');

        
    }
    public function Profil()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
       
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/ubah-profile', $data);
        $this->load->view('templates/footer');
           
        }

    
        public function ubahPassword()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('password_sekarang', 'Password Saat ini', 'required|trim', [
            'required' => 'Password saat ini harus diisi'
        ]);

        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[4]|matches[password_baru2]', [
            'required' => 'Password Baru harus diisi',
            'min_length' => 'Password tidak boleh kurang dari 4 digit',
            'matches' => 'Password Baru tidak sama dengan ulangi password'
        ]);

        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[4]|matches[password_baru1]', [
            'required' => 'Ulangi Password harus diisi',
            'min_length' => 'Password tidak boleh kurang dari 4 digit',
            'matches' => 'Ulangi Password tidak sama dengan password baru'
        ]);

        if ($this->form_validation->run() == false) {
          

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/ubah-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $pwd_skrg = $this->input->post('password_sekarang', true);
            $pwd_baru = $this->input->post('password_baru1', true);
            if (!password_verify($pwd_skrg, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat ini Salah!!! </div>');
                redirect('user/ubahPassword');
            } else {
                if ($pwd_skrg == $pwd_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru tidak boleh sama dengan password saat ini!!! </div>');
                    redirect('admin/ubahPassword');
                } else {
                    //password ok
                    $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah</div>');
                    redirect('admin/ubahPassword');
                }
            }
        }
    }
    
    public function simpandownloadsurat()
    {   
        $keterangan = $this->input->post('keterangan');
        $namaFile = $_FILES['surat']['name'];
        $namaSementara = $_FILES['surat']['tmp_name'];

        // tentukan lokasi file akan dipindahkan
        $dirUpload = "./assets/img/surat/";
        // pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);


            $data=[
    'surat'=>$namaFile,
    'namasurat'=>$this->input->post('namasurat'),
    ];
    $this->db->insert('downloadsurat',$data);
    
    $this->session->set_flashdata('ditambahkan', '<div class="alert alert-success alert-message" role="alert">data berhasil ditambahkan!!</div>');
            
    redirect('admin');

        
    }
    public function hapusdownloadsurat()
    {
    $data=['idsurat'=>$this->uri->segment(3)];
    $this->db->delete('downloadsurat',$data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">data berhasil dihapus!!</div>');
            
    redirect('admin');

        
    }

    public function user(){
        
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['user1'] = $this->db->query("SELECT * FROM user where idrole='2'")->result_array();
        $data['judul'] = "Data User";
    
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/viewuseradmin');
        $this->load->view('templates/footer');
}
public function detailuser()
{
$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
$where = ['nik' => $this->uri->segment(3)];
$judul = "update user";
$data['user1']= $this->ModelUser->getUserWhere($where)->row_array();

    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/updateuser',$data);
    $this->load->view('templates/footer');
    
}
public function updateuser(){
    $data = [
        'nik' => $this->input->post('nik'),
        'email' => $this->input->post('email'),
        'alamat' =>$this->input->post('alamat'),
        'namalengkap' =>$this->input->post('namalengkap'),
        'notelepon' =>$this->input->post('notelepon'),
        'status' =>$this->input->post('status'),

        

    ];
    $nik=$this->input->post('nik');
    $where=['nik' => $this->input->post('nik')];
    $this->ModelUser->updateuser($data,$where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">user berhasil di update </div>');
redirect('admin/detailuser/'.$nik);
}
public function hapususer()
{
$data=['nik'=>$this->uri->segment(3)];
$this->db->delete('user',$data);
$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">data berhasil dihapus!!</div>');
        
redirect('admin/user');

    
}
public function warga(){
        
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['warga'] = $this->db->query("SELECT * FROM warga")->result_array();
    $data['judul'] = "Data Warga";

    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/viewargadmin');
    $this->load->view('templates/footer');
}
public function tambahwarga()
{
$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
$judul = "tambah warga";


$this->form_validation->set_rules('nik', 'nik', 'required|greater_than_equal_to[16]|is_unique[warga.nik]',  [
    'required' => 'Nik Belum diis!!',
    'greater_than_equal_to' => 'Nik Harus 16 karakter!!',
    'is_unique' => 'Nik Sudah Terdaftar!'
]);
if ($this->form_validation->run() == false) {

    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/tambahwarga',$data);
    $this->load->view('templates/footer');
    
}else{
    $namaFile = $_FILES['foto']['name'];
    $namaSementara = $_FILES['foto']['tmp_name'];
    // tentukan lokasi file akan dipindahkan
    $dirUpload = "./assets/img/profile/";
    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    $data = [
        'nik' => $this->input->post('nik'),
        'namalengkap' => $this->input->post('namalengkap'),
        'tempatlahir' => $this->input->post('tempatlahir'),
        'tgllahir' => $this->input->post('tgllahir'),
        'alamat'=> $this->input->post('alamat'),
        'rt'=> $this->input->post('rt'),
        'rw'=> $this->input->post('rw'),
        'kelurahan'=>$this->input->post('kelurahan'),
        'kecamatan'=>$this->input->post('kecamatan'),
        'agama'=>$this->input->post('agama'),
        'status'=>$this->input->post('status'),
        'pekerjaan'=>$this->input->post('pekerjaan'),
        'foto'=>$namaFile,

        
        

    ];
    $this->db->insert('warga',$data);
   
    redirect('admin/ganti/'.$this->input->post('nik'));
}
}
public function updatewarga(){
$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
$where = ['nik' => $this->uri->segment(3)];
$judul = "update warga";
$data['warga']= $this->db->get_where('warga',$where)->row_array();

$this->form_validation->set_rules('nik', 'nik', 'required|greater_than_equal_to[16]',  [
    'required' => 'Nik Belum diis!!',
    'greater_than_equal_to' => 'Nik Harus 16 karakter!!',
    'is_unique' => 'Nik Sudah Terdaftar!'
]);
if ($this->form_validation->run() == false) {

    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/updatewarga',$data);
    $this->load->view('templates/footer');
    
}else{
    $namaFile = $_FILES['foto']['name'];
    if ($namaFile == "") {
       
        $data = [
            'nik' => $this->input->post('nik'),
            'namalengkap' => $this->input->post('namalengkap'),
            'tempatlahir' => $this->input->post('tempatlahir'),
            'tgllahir' => $this->input->post('tgllahir'),
            'alamat'=> $this->input->post('alamat'),
            'rt'=> $this->input->post('rt'),
            'rw'=> $this->input->post('rw'),
            'kelurahan'=>$this->input->post('kelurahan'),
            'kecamatan'=>$this->input->post('kecamatan'),
            'agama'=>$this->input->post('agama'),
            'status'=>$this->input->post('status'),
            'pekerjaan'=>$this->input->post('pekerjaan'),

        ];
        $where=['nik' => $this->input->post('nik')];
       $this->db->update('warga',$data,$where);
       $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">warga berhasil di update </div>');
       redirect('admin/updatewarga/'.$this->input->post('nik'));

}else{
$namaSementara = $_FILES['foto']['tmp_name'];


// tentukan lokasi file akan dipindahkan
$dirUpload = "./assets/img/profile/";
// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);


$data = [
    'nik' => $this->input->post('nik'),
    'namalengkap' => $this->input->post('namalengkap'),
    'tempatlahir' => $this->input->post('tempatlahir'),
    'tgllahir' => $this->input->post('tgllahir'),
    'alamat'=> $this->input->post('alamat'),
    'rt'=> $this->input->post('rt'),
    'rw'=> $this->input->post('rw'),
    'kelurahan'=>$this->input->post('kelurahan'),
    'kecamatan'=>$this->input->post('kecamatan'),
    'agama'=>$this->input->post('agama'),
    'status'=>$this->input->post('status'),
    'pekerjaan'=>$this->input->post('pekerjaan'),
    'foto'=> $namaFile,

];
$where=['nik' => $this->input->post('nik')];
$this->db->update('warga',$data,$where);

redirect('admin/ganti/'.$this->input->post('nik'));
}
    
}

}
public function ganti(){
 $where1= $this->uri->segment(3);
$warga =$this->db->query("SELECT * FROM warga WHERE nik = '$where1'")->row_array();
$file=$warga['foto'];
$baru='warga-'.$where1.'-'.time().'.jpg';
$oldDir = FCPATH . 'assets/img/profile/';
$newDir = FCPATH . 'assets/img/profile/';
rename($oldDir.$file, $newDir.$baru);

$data = [
    'foto'=> $baru,];
$where=['nik' => $where1];
$this->db->update('warga',$data,$where);

$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">warga berhasil di update </div>');
redirect('admin/updatewarga/'.$where1);
  
}
public function hapuswarga()
{
$data=['nik'=>$this->uri->segment(3)];
$this->db->delete('warga',$data);
$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">data berhasil dihapus!!</div>');
        
redirect('admin/warga');

    
}
}
   
