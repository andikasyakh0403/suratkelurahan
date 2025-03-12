<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_loginuser();
        cek_useruser();
    }

    public function index()
    {
        $data['judul'] = 'Profil Saya';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['qanda'] = $this->db->get('q&a')->result_array();
        $data['carousel'] = $this->db->get('carousel')->result_array();
        $data['anggota'] = $this->db->get('user')->result_array();
        $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();
        $data['downloadsurat']= $this->db->get('downloadsurat')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('user/topbarlogin', $data);
        $this->load->view('user/beranda');
        $this->load->view('user/q&a', $data);
        $this->load->view('user/footer');
        $this->load->view('templates/footer');
        
       
    }
    


    public function Profil()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();


            $this->load->view('templates/header', $data);
            $this->load->view('user/topbarlogin', $data);
            $this->load->view('user/ubah-profile', $data);
            $this->load->view('user/footer');
            $this->load->view('templates/footer');
            

            //jika ada gambar yang akan diupload
           
        }



     public function ubahprofil(){
        $email=$this->session->userdata('email');
        $namaFile = $_FILES['berkas']['name'];
        $namaSementara = $_FILES['berkas']['tmp_name'];
        
        // tentukan lokasi file akan dipindahkan
        $dirUpload = "./assets/img/profile/";
        // pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

        $this->db->query("UPDATE user SET foto='$namaFile' WHERE email ='$email'");
    

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('user/profil');
        }

    public function ubahPassword()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();


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
          

            $this->load->view('templates/header', $data);
            $this->load->view('user/topbarlogin', $data);
            $this->load->view('user/ubah-profile', $data);
            $this->load->view('user/footer');
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
                    redirect('user/ubahPassword');
                } else {
                    //password ok
                    $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah</div>');
                    redirect('user/ubahPassword');
                }
            }
        }
    }
    public function suratramai(){
        
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();
        $nik=$this->input->post('nik');
        $status= $this->db->query("SELECT * FROM suratramai WHERE nik = '$nik' And status = 'belum disetujui'" )->row_array();

    

        $this->form_validation->set_rules('tgl', 'tgl', 'required', [
            'required' => 'tanggal Belum diis!!'
        ]);

        $this->form_validation->set_rules('hari', 'hari','required',[
            'required' => 'hari Belum diis!!',
       ]);

        $this->form_validation->set_rules('jam', 'jam', 'required', [
            'required' => 'jam Belum diis!!'
        ]);
    
        $this->form_validation->set_rules('acara', 'acara', 'required|min_length[10]',  [
            'required' => 'acara Belum diis!!',
       ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', [
            'required' => 'alamat Belum diisi!!'
        ]);
        $this->form_validation->set_rules('selesai', 'selesai', 'required', [
            'required' => 'jam selesai Belum diisi!!'
        ]);

      
if (isset($status["status"])){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">surat masih dalam tahap verfikasi  </div>') ;    
        $this->load->view('templates/header', $data);
        $this->load->view('user/topbarlogin', $data);
        $this->load->view('user/suratramai');
        $this->load->view('user/footer');
        $this->load->view('templates/footer'); 
 
}else{
    if ($this->form_validation->run() == false) {

        $this->load->view('templates/header', $data);
        $this->load->view('user/topbarlogin', $data);
        $this->load->view('user/suratramai');
        $this->load->view('user/footer');
        $this->load->view('templates/footer');
    } else {
        $email = $this->input->post('email', true);
       $tanggal=date('Y-m-d');
    
    
        $data = [
            'email' => htmlspecialchars($email),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'notelepon' => $this->input->post('notelepon'),
            'hari' =>$this->input->post('hari'),
            'tgl' =>$this->input->post('tgl'),
            'jam'=>$this->input->post('jam'),
            'acara'=>$this->input->post('acara'),
            'selesai'=>$this->input->post('selesai'),
            'tglinput'=> $tanggal,
            'status'=>"belum disetujui",
            'alasan'=>"-",
            'user'=>$this->session->userdata('email'),
            

        ];

        $this->ModelSuratramai->simpanSuratramai($data); //men
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di buat </div>');
        redirect('user/suratramai');
}

    }
}
public function sktm(){
        
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();
    $nik=$this->input->post('nik');
    $status= $this->db->query("SELECT * FROM sktm WHERE nik = '$nik' And status = 'belum disetujui'" )->row_array();





    $this->form_validation->set_rules('keperluan', 'keperluan', 'required', [
        'required' => 'keperluan Belum diis!!'
    ]);

    if ($status["status"]){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">surat masih dalam tahap verfikasi  </div>') ;    
        $this->load->view('templates/header', $data);
        $this->load->view('user/topbarlogin', $data);
        $this->load->view('user/sktm');
        $this->load->view('user/footer');
        $this->load->view('templates/footer'); 
  }else{    if ($this->form_validation->run() == false) {

        $this->load->view('templates/header', $data);
        $this->load->view('user/topbarlogin', $data);
        $this->load->view('user/sktm');
        $this->load->view('user/footer');
        $this->load->view('templates/footer');
    } else {
        $email = $this->input->post('email', true);
       
    
    
        $data = [
            'email' => htmlspecialchars($email),
            'nik' => $this->input->post('nik'),
            'notelepon' => $this->input->post('notelepon'),
            'keperluan' =>$this->input->post('keperluan'),
            'tglinput'=> date('d-m-Y'),
            'status'=>"belum disetujui",
            'alasan'=>"-",
            'user'=>$this->session->userdata('email'),
            

        ];

        $this->ModelSktm->simpansktm($data); //men
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di buat </div>');
        redirect('user/sktm');
}
    }




}
 


public function kematian(){
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();
   
    $this->load->view('templates/header', $data);
    $this->load->view('user/topbarlogin', $data);
    $this->load->view('user/kematian');
    $this->load->view('user/footer');
    $this->load->view('templates/footer');

   
  
}
public function simpankematian() {
    $nik=$this->input->post('nik');
    $status= $this->db->query("SELECT * FROM kematian WHERE nik = '$nik' And status = 'belum disetujui'" )->row_array();
    if ($status["status"]){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">surat masih dalam tahap verfikasi  </div>') ;    
        redirect('user/kematian');
    }else{$namaFile = $_FILES['suratketerangan']['name'];
        $namaSementara = $_FILES['suratketerangan']['tmp_name'];
        
        // tentukan lokasi file akan dipindahkan
        $dirUpload = "./assets/img/file/";
        // pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
    
        $data = [
            'nik' => $this->input->post('nik'),
            'hari' => $this->input->post('hari'),
            'jam' =>$this->input->post('jam'),
            'tglkematian' =>$this->input->post('tglkematian'),
            'alasan' =>$this->input->post('alasan'),
            'suratketerangan' =>$namaFile,
            'tempatkubur' =>$this->input->post('tempatkubur'),
            'tglinput'=> date('d-m-Y'),
            'status'=>"belum disetujui",
            'keterangan'=>"-",
            'user'=>$this->session->userdata('email'),
            
    
        ];
    
        $this->ModelKematian->simpankematian($data); //men
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di buat </div>');
        redirect('user/kematian');}

    
}
public function suratkelahiran(){
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('user/topbarlogin', $data);
        $this->load->view('user/suratkelahiran');
        $this->load->view('user/footer');
        $this->load->view('templates/footer');

 
       
    
    
}
public function simpansuratkelahiran() {
    $nik=$this->input->post('nik');
    $status= $this->db->query("SELECT * FROM suratkelahiran WHERE nik = '$nik' And status = 'belum disetujui'" )->row_array();
    if ($status["status"]){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">surat masih dalam tahap verfikasi  </div>') ;    
        redirect('user/suratkelahiran');
    }else{ $namaFile = $_FILES['suratketerangan']['name'];
        $namaSementara = $_FILES['suratketerangan']['tmp_name'];
        
        // tentukan lokasi file akan dipindahkan
        $dirUpload = "./assets/img/file/";
        // pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
        
        $data = [
            'nik' => $this->input->post('nik'),
            'namaanak' => $this->input->post('namaanak'),
            'harilahir' =>$this->input->post('harilahir'),
            'tgllahir' =>$this->input->post('tgllahir'),
            'jamlahir' =>$this->input->post('jamlahir'),
            'tempatlahir' =>$this->input->post('tempatlahir'),
            'anakke' =>$this->input->post('anakke'),
            'namaibu' =>$this->input->post('namaibu'),
            'namaayah' =>$this->input->post('namaayah'),
            'tglinput'=> date('d-m-Y'),
            'jeniskelamin'=> $this->input->post('jeniskelamin'),
            'suratketerangan'=> $namaFile,
            'status'=>"belum disetujui",
            'keterangan'=>"-",
            'user'=>$this->session->userdata('email'),
    
    
        ];
    
        $this->ModelKelahiran->simpankelahiran($data); //men
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di buat </div>');
        redirect('user/suratkelahiran');}
   
}
public function lihatsurat(){
   
    $surat=$this->input->post('surat');
    $hasil=$this->uri->segment(3);
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $email=$no['email'];
    $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();
    
    
    
    if ($surat=="sktm" OR $hasil=="sktm") {
        $data['sktm']= $this->db->query("SELECT * FROM sktm WHERE user = '$email' ")->result_array();;
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/topbarlogin', $data);
        $this->load->view('user/viewsktm', $data);
        $this->load->view('user/footer');
        $this->load->view('templates/footer');

        

} elseif($surat=="kematian" OR $hasil=="kematian") {
    $data['kematian']= $this->db->query("SELECT * FROM kematian WHERE user = '$email' ")->result_array();
        
    $this->load->view('templates/header', $data);
    $this->load->view('user/topbarlogin', $data);
    $this->load->view('user/viewkematian', $data);
    $this->load->view('user/footer');
    $this->load->view('templates/footer');
}
  elseif($surat=="suratramai" OR $hasil=="suratramai") {
    $data['suratramai']= $this->db->query("SELECT * FROM suratramai WHERE user = '$email' ")->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/topbarlogin', $data);
        $this->load->view('user/viewsuratramai', $data);
        $this->load->view('user/footer');
        $this->load->view('templates/footer');
}

elseif($surat=="suratkelahiran" OR $hasil=="suratkelahiran") {
    $data['suratkelahiran']= $this->db->query("SELECT * FROM suratkelahiran WHERE user = '$email' ")->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('user/topbarlogin', $data);
    $this->load->view('user/viewsuratkelahiran', $data);
    $this->load->view('user/footer');
    $this->load->view('templates/footer');
}else{
    echo"maaf tidak ada surat pastikan data yang anda masukkan benar";
    echo"$hasil";
}
}
public function updatesktm(){
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();
    $nosurat=$this->uri->segment(3);
    $data['sktm']= $this->db->query("SELECT * FROM sktm WHERE nosurat = '$nosurat'")->row_array();




    $this->form_validation->set_rules('keperluan', 'keperluan', 'required', [
        'required' => 'keperluan Belum diis!!',
    ]);

  
  
    if ($this->form_validation->run() == false) {

        $this->load->view('templates/header', $data);
        $this->load->view('user/topbarlogin', $data);
        $this->load->view('user/updatesktm',$data);
        $this->load->view('user/footer');
        $this->load->view('templates/footer');
    } else {
        $email=$this->input->post('email',true);
        $nik=$this->input->post('nik');
        $data = [
            'email' => htmlspecialchars($email),
            'nik' => $nik,
            'notelepon' => $this->input->post('notelepon'),
            'keperluan' =>$this->input->post('keperluan'),
            'status'=>"belum disetujui",
        ];
        $where=['nosurat' => $this->input->post('nosurat')];
        $this->ModelSktm->updatesktm($data,$where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di update </div>');
    redirect('user/lihatsurat/sktm/'.$nik);
        }

}
public function hapussktm()
{
$where=['nosurat' => $this->uri->segment(3)];
$nik=$this->uri->segment(4);
$this->ModelSktm->hapussktm($where);
$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">data berhasil dihapus!!</div>');
        
redirect('user/lihatsurat/sktm/'.$nik);

    
}
public function updatesuratramai(){
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();
    $nosurat=$this->uri->segment(3);
    $data['suratramai']= $this->db->query("SELECT * FROM suratramai WHERE nosurat = '$nosurat'")->row_array();




    $this->form_validation->set_rules('hari', 'hari', 'required', [
        'required' => 'hari Belum diis!!',
    ]);

  
  
    if ($this->form_validation->run() == false) {

        $this->load->view('templates/header', $data);
        $this->load->view('user/topbarlogin', $data);
        $this->load->view('user/updatesuratramai',$data);
        $this->load->view('user/footer');
        $this->load->view('templates/footer');
    } else {
        $email=$this->input->post('email',true);
        $nik=$this->input->post('nik');
       
        $data = [
            'email' => htmlspecialchars($email),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'notelepon' => $this->input->post('notelepon'),
            'hari' =>$this->input->post('hari'),
            'tgl' =>$this->input->post('tgl'),
            'jam'=>$this->input->post('jam'),
            'acara'=>$this->input->post('acara'),
            'selesai'=>$this->input->post('selesai'),
            'status'=>"belum disetujui",
          
            

        ];
        $where=['nosurat' => $this->input->post('nosurat')];
        $this->ModelSuratramai->updateSuratramai($data,$where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di update </div>');
    redirect('user/lihatsurat/suratramai/'.$nik);
        }

}
public function hapussuratramai()
{
$where=['nosurat' => $this->uri->segment(3)];
$nik=$this->uri->segment(4);
$this->ModelSuratramai->hapusSuratramai($where);
$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">data berhasil dihapus!!</div>');
        
redirect('user/lihatsurat/suratramai/'.$nik);

    
}
public function updatekematian(){
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();
    $nosurat=$this->uri->segment(3);
    $data['kematian']= $this->db->query("SELECT * FROM kematian WHERE nosurat = '$nosurat'")->row_array();



       
    $this->load->view('templates/header', $data);
    $this->load->view('user/topbarlogin', $data);
    $this->load->view('user/updatekematian',$data);
    $this->load->view('user/footer');
    $this->load->view('templates/footer');
    

}
public function updatekematian1(){
    
        $email=$this->input->post('email',true);
        $nik=$this->input->post('nik');
        $file=$this->input->post('suratketerangan');

        $namaFile = $_FILES['suratketerangan']['name'];
        if ($namaFile == "") {
           
            $data = [
                'nik' => $this->input->post('nik'),
                'hari' => $this->input->post('hari'),
                'jam' =>$this->input->post('jam'),
                'tglkematian' =>$this->input->post('tglkematian'),
                'alasan' =>$this->input->post('alasan'),
                'tempatkubur' =>$this->input->post('tempatkubur'),
                'status'=>"belum disetujui",
                
                
        
            ];
            $where=['nosurat' => $this->input->post('nosurat')];
            $this->ModelKematian->updatekematian($data,$where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di update </div>');
        redirect('user/lihatsurat/kematian/'.$nik);

 }else{
    $namaSementara = $_FILES['suratketerangan']['tmp_name'];
    
    // tentukan lokasi file akan dipindahkan
    $dirUpload = "./assets/img/file/";
    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    $data = [
        'nik' => $this->input->post('nik'),
        'hari' => $this->input->post('hari'),
        'jam' =>$this->input->post('jam'),
        'tglkematian' =>$this->input->post('tglkematian'),
        'alasan' =>$this->input->post('alasan'),
        'suratketerangan' =>$namaFile,
        'tempatkubur' =>$this->input->post('tempatkubur'),
        'status'=>"belum disetujui",
        
        

    ];
    $where=['nosurat' => $this->input->post('nosurat')];
    $this->ModelKematian->updatekematian($data,$where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di update </div>');
redirect('user/lihatsurat/kematian/'.$nik);
 }
}
public function hapusKematian()
{
$where=['nosurat' => $this->uri->segment(3)];
$nik=$this->uri->segment(4);
$this->ModelKematian->hapuskematian($where);
$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">data berhasil dihapus!!</div>');
        
redirect('user/lihatsurat/kematian/'.$nik);

    
}
public function updatesuratkelahiran(){
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $no = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['warga']= $this->db->query("SELECT * FROM warga WHERE nik = ". $no["nik"])->row_array();
    $nosurat=$this->uri->segment(3);
    $data['suratkelahiran']= $this->db->query("SELECT * FROM suratkelahiran WHERE nosurat = '$nosurat'")->row_array();



       
    $this->load->view('templates/header', $data);
    $this->load->view('user/topbarlogin', $data);
    $this->load->view('user/updatesuratkelahiran',$data);
    $this->load->view('user/footer');
    $this->load->view('templates/footer');
}
public function updatesuratkelahiran1(){
    
    $email=$this->input->post('email',true);
    $nik=$this->input->post('nik');
    $file=$this->input->post('suratketerangan');

    $namaFile = $_FILES['suratketerangan']['name'];
    if ($namaFile == "") {
       
        $data = [
            'nik' => $this->input->post('nik'),
            'namaanak' => $this->input->post('namaanak'),
            'harilahir' =>$this->input->post('harilahir'),
            'tgllahir' =>$this->input->post('tgllahir'),
            'jamlahir' =>$this->input->post('jamlahir'),
            'tempatlahir' =>$this->input->post('tempatlahir'),
            'anakke' =>$this->input->post('anakke'),
            'namaibu' =>$this->input->post('namaibu'),
            'namaayah' =>$this->input->post('namaayah'),
            'jeniskelamin'=> $this->input->post('jeniskelamin'),
            'status'=>"belum disetujui",
            
            
    
        ];
        $where=['nosurat' => $this->input->post('nosurat')];
        $this->ModelKelahiran->updatekelahiran($data,$where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di update </div>');
    redirect('user/lihatsurat/suratkelahiran/'.$nik);

}else{
$namaSementara = $_FILES['suratketerangan']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "./assets/img/file/";
// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

$data = ['nik' => $this->input->post('nik'),
'namaanak' => $this->input->post('namaanak'),
'harilahir' =>$this->input->post('harilahir'),
'tgllahir' =>$this->input->post('tgllahir'),
'jamlahir' =>$this->input->post('jamlahir'),
'tempatlahir' =>$this->input->post('tempatlahir'),
'anakke' =>$this->input->post('anakke'),
'namaibu' =>$this->input->post('namaibu'),
'namaayah' =>$this->input->post('namaayah'),
'jeniskelamin'=> $this->input->post('jeniskelamin'),
'suratketerangan'=> $namaFile,
'status'=>"belum disetujui",

];
$where=['nosurat' => $this->input->post('nosurat')];
$this->ModelKelahiran->updatekelahiran($data,$where);
$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">surat berhasil di update </div>');
redirect('user/lihatsurat/suratkelahiran/'.$nik);
}
}
public function hapussuratkelahiran()
{
$where=['nosurat' => $this->uri->segment(3)];
$nik=$this->uri->segment(4);
$this->ModelKelahiran->hapuskelahiran($where);
$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">data berhasil dihapus!!</div>');
        
redirect('user/lihatsurat/suratkelahiran/'.$nik);

    
}

}
