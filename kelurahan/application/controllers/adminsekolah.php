<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Adminsekolah extends CI_Controller
{
 public function index()
 {
 //jika statusnya sudah login, maka tidak bisa mengakses
//halaman login alias dikembalikan ke tampilan user
 if($this->session->userdata('email')){
 redirect('adminbaru');
 }
 $this->form_validation->set_rules('email', 'nama', 
 'required|trim', [
  'required' => '<script>alert("Username Harus diisi");</script>',
  'valid_email' => 'ussername Tidak Benar!!'
  ]);
  $this->form_validation->set_rules('password', 'Password', 
 'required|trim', [
  'required' => '<script>alert("password Harus diisi");</script>'
  ]);
  if ($this->form_validation->run() == false) {

    $data['judul'] = 'Login';
    $data['user'] = '';
    //kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
    $this->load->view('templates/aute_header', $data);
    $this->load->view('autentifikasi/login');
    $this->load->view('templates/aute_footer');
  } else {
  $this->_login();
  }
  }
 private function _login()
  {
  $email = htmlspecialchars($this->input->post('email', 
 true));
  $password = $this->input->post('password', true);
  $user = $this->ModelUser->cekData(['email' => $email])->row_array();
  //jika usernya ada
  if ($user) {
  //jika user sudah aktif
 {
  //cek password
  if (password_verify($password, $user['password'])){
      $data = array(
      'email' => $user['email'],
      );
      $this->session->set_userdata($data);
      redirect('adminbaru');
      } else {
      $this->session->set_flashdata('pesan', '<div 
    class="alert alert-danger alert-message" role="alert">Password 
    salah!!</div>');
      redirect('adminsekolah');
 
    }
   
 }
 
}else {
$this->session->set_flashdata('pesan', '<div 
class="alert alert-danger alert-message" role="alert">Username tidak ditemukan!!</div>');
redirect('adminsekolah');

}
}
public function blok()
{
$this->load->view('projek/blok');
}
public function gagal()
{
$this->load->view('projek/gagal');
}
public function logout(){
$this->session->unset_userdata('email');
redirect('adminsekolah');
}

}
