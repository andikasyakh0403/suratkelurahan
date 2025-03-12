
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
   
   public function __construct()
   {
        parent::__construct();
    $ci = get_instance();

    if (!$ci->session->userdata('ussername')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');
        redirect('adminsekolah');
   }
   $this->load->model(['ModelUsersekolah', 'ModelBerita','ModelFile']); 
   
}

   public function index()
   {
      $data['judul']="Berita";
      $data['user'] = $this->db->query("SELECT * FROM berita")->result_array();
      $data['angka']=50;
      $this->load->view('projek/admin/header',$data);
      $this->load->view('projek/admin/topbar',$data);
      $this->load->view('projek/admin/admin', $data);

   } 
   public function buatberita()
   {
      $data['judul']="Tambahkan Berita";
      $data['user'] = $this->db->query("SELECT * FROM berita")->result_array();
      $this->load->view('projek/admin/header',$data);
      $this->load->view('projek/admin/topbar',$data);
      $this->load->view('projek/admin/createberita', $data);
      

   }
   public function menambahkanberita()
   {  

      $this->form_validation->set_rules('judulberita', 'judulberita', 
      'required|min_length[3]', [
      'required' => 'Nama Matakuliah Harus diisi',
      'min_length' => 'Nama terlalu pendek'
      ]);
      $this->form_validation->set_rules('tanggal', 'Nama Matakuliah', 
      'required|min_length[3]', [
      'required' => 'tanggal Harus diisi',
      'min_length' => 'Nama terlalu pendek'
      ]);
      $this->form_validation->set_rules('inputberita', 'Nama Matakuliah', 
      'required|max_length[1200]', [
      'required' => 'berita Harus diisi',
      'min_length' => 'Nama terlalu pendek'
      ]);
      if ($this->form_validation->run() == false) {
         $this->buatberita();
      
      } else {
         $Base64Gambar = $_FILES["gambar"]["name"];
         $Path = "Upload/";
         $ImagePath = $Path . $Base64Gambar;
         Move_uploaded_file($Base64Gambar, $ImagePath);
         $data = [
            'idberita' => $this->input->post('id_berita'),
            'judulberita' => $this->input->post('judulberita'),
            'isiberita' => $this->input->post('inputberita'),
            'tanggal' => $this->input->post('tanggal'),
            'gambar' => Base_url() . $ImagePath,
            
         ];
         $this->ModelBerita->simpanBerita($data);
         redirect('home');
   }

   }
   public function hapusberita(){

      $this->db->query("delete from berita");
      
      redirect('home');
   }
   public function file(){

   $data['judul']="File";
   $data['user'] = $this->db->query("SELECT * FROM file")->result_array();
   
    $this->load->view('projek/admin/header',$data);
    $this->load->view('projek/admin/topbar',$data);
    $this->load->view('projek/admin/file', $data);

   }
   public function hapuskolomberita(){
      $data['idberita'] = $this->input->post('idberita');
      $this->ModelBerita->hapusberita($data);
      redirect('home');
   

   }
   public function updateberita(){
      $data['idberita'] = $this->input->post('idberita');
      $data['user'] = $this->ModelBerita->BeritaWhere($data)->result_array();
      $data['judul']="Update Berita";
      $this->load->view('projek/admin/header',$data);
      $this->load->view('projek/admin/topbar',$data);
      $this->load->view('projek/admin/updateberita',$data);

   }
   public function updateberitacek()
   { 
   

         $this->form_validation->set_rules('judulberita', 'judulberita', 
         'required|min_length[3]', [
         'required' => 'Nama Matakuliah Harus diisi',
         'min_length' => 'Nama terlalu pendek'
         ]);
         $this->form_validation->set_rules('tanggal', 'Nama Matakuliah', 
         'required|min_length[3]', [
         'required' => 'tanggal Harus diisi',
         'min_length' => 'Nama terlalu pendek'
         ]);
         $this->form_validation->set_rules('inputberita', 'Nama Matakuliah', 
         'required|max_length[700]', [
         'required' => 'berita Harus diisi',
         'min_length' => 'Nama terlalu pendek'
         ]);
         if ($this->form_validation->run() == false) {
            $this->updateberita();
            
         } else {
            $Base64Gambar = $_FILES["gambar"]["name"];
            $Path = "Upload/";
            $ImagePath = $Path . $Base64Gambar;
            Move_uploaded_file($Base64Gambar, $ImagePath);
            $data['idberita'] = $this->input->post('idberita');
            $this->ModelBerita->hapusberita($data);
            $suka=$this->input->post('id_berita');
            $data = [
               'idberita' => $this->input->post('idberita'),
               'judulberita' => $this->input->post('judulberita'),
               'isiberita' => $this->input->post('inputberita'),
               'tanggal' => $this->input->post('tanggal'),
               'gambar' => Base_url() . $ImagePath,
               
            ];
            
            $this->ModelBerita->simpanBerita($data);
            redirect('home');
      }
 
   }
   public function uploadfile()
   { 
      $data['judul']="Tambahkan file";
      $data['user'] = $this->ModelFile->getFile()->result_array();
$table_name = 'file';
$column_name = 'idfile';


$this->db->select_max($column_name);
$query = $this->db->get($table_name);

$result = $query->row();

// Nilai maksimum
$max_value = $result->$column_name;
$max_value = $result->$column_name;

// Cetak nilai maksimum
     $data['file']= $max_value;
      $this->load->view('projek/admin/header',$data);
      $this->load->view('projek/admin/topbar',$data);
      $this->load->view('projek/admin/uploadfile', $data);    
         
   }
   public function berhasilupload()
   {
      $this->form_validation->set_rules('namafile', 'judulberita', 
      'required|min_length[3]', [
      'required' => 'nama file harus diisi',
      ]);
      
      
      if ($this->form_validation->run() == false) {
         $this->uploadfile();
         
      } else {
               
            $Base64Gambar = $_FILES["file"]["name"];
            $Path = "Upload/";
            $ImagePath = $Path . $Base64Gambar;
            Move_uploaded_file($Base64Gambar, $ImagePath);
         
            if(empty($Base64Gambar)){
               $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">File belum diisi</div>');
               $this->uploadfile();
            }else{
               
            $data = [
               'idfile' => $this->input->post('idfile'),
               'namafile' => $this->input->post('namafile'),
               'file' => Base_url() . $ImagePath,
               
            ];
            $this->ModelFile->simpanFile($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert" style="max-width: 500px;">File berhasil ditambahkan</div>');
            redirect('home/file');}
                  
   } 
   }
                  
   public function hapussemuafile(){

      $this->db->query("delete from file");
      
      $this->file();
   }
   public function hapuskolomfile(){
      $data['idfile'] = $this->input->post('idfile');
      $this->ModelFile->hapusfile($data);
      $this->file();
   

   }
   public function prestasi()
   {
      $data['judul']="Prestasi";
      $data['user'] = $this->db->query("SELECT * FROM prestasi")->result_array();

      $this->load->view('projek/admin/header',$data);
      $this->load->view('projek/admin/topbar',$data);
      $this->load->view('projek/admin/prestasi', $data);

   }
   public function buatprestasi()
   {
      $data['judul']="Tambahkan prestasi";
      $data['user'] = $this->db->query("SELECT * FROM prestasi")->result_array();
$table_name = 'prestasi';
$column_name = 'idprestasi';


$this->db->select_max($column_name);
$query = $this->db->get($table_name);

$result = $query->row();

// Nilai maksimum
$max_value = $result->$column_name;
$max_value = $result->$column_name;
$data['idprestasi']= $max_value;
      $this->load->view('projek/admin/header',$data);
      $this->load->view('projek/admin/topbar',$data);
      $this->load->view('projek/admin/createprestasi', $data);
      

   }
   public function menambahkanprestasi()
   {  

     
      $this->form_validation->set_rules('tanggal', 'Nama Matakuliah', 
      'required|min_length[3]', [
      'required' => 'tanggal Harus diisi',
      'min_length' => 'Nama terlalu pendek'
      ]);
  
     
      if ($this->form_validation->run() == false) {
         $this->buatprestasi();
      
      } else {
         $Base64Gambar = $_FILES["gambar"]["name"];
         $Path = "Upload/";
         $ImagePath = $Path . $Base64Gambar;
         $d=Move_uploaded_file($Base64Gambar, $ImagePath);
         $data = [
            'idprestasi' => $this->input->post('idberita'),
            'judulprestasi' => $this->input->post('judulberita'),
            'tempat' => $this->input->post('tempat'),
            'tanggal' => $this->input->post('tanggal'),
            'isiprestasi' => $this->input->post('inputberita'),
            'gambar' => Base_url() . $d,
            
         ];
         $this->ModelPrestasi->simpanprestasi($data);
         $this->prestasi();
   }

   }
   public function hapusprestasi(){

      $this->db->query("delete from prestasi");
      
      $this->prestasi();
   }
   public function hapuskolomprestasi(){
      $data['idprestasi'] = $this->input->post('idprestasi');
      $this->ModelPrestasi->hapusprestasi($data);
      $this->prestasi();
   

   } public function updateprestasi(){
      $data['idprestasi'] = $this->input->post('idprestasi');
      $data['user'] = $this->ModelPrestasi->PrestasiWhere($data)->result_array();
      $data['judul']="Update Berita";
      $this->load->view('projek/admin/header',$data);
      $this->load->view('projek/admin/topbar',$data);
      $this->load->view('projek/admin/updateprestasi',$data);

   }
   public function updateprestasicek()
   { 
   

         $this->form_validation->set_rules('judulprestasi', 'judulberita', 
         'required|min_length[3]', [
         'required' => 'Nama Matakuliah Harus diisi',
         'min_length' => 'Nama terlalu pendek'
         ]);
         $this->form_validation->set_rules('tanggal', 'Nama Matakuliah', 
         'required|min_length[3]', [
         'required' => 'tanggal Harus diisi',
         'min_length' => 'Nama terlalu pendek'
         ]);
         $this->form_validation->set_rules('isiprestasi', 'Nama Matakuliah', 
         'required|max_length[700]', [
         'required' => 'berita Harus diisi',
         'min_length' => 'Nama terlalu pendek'
         ]);
         if ($this->form_validation->run() == false) {
            $this->updateberita();
            
         } else {
            $Base64Gambar = $_FILES["gambar"]["name"];
            $Path = "Upload/";
            $ImagePath = $Path . $Base64Gambar;
            Move_uploaded_file($Base64Gambar, $ImagePath);
            $where['idprestasi'] = $this->input->post('idprestasi');
            $data = [
               'idprestasi' => $this->input->post('idprestasi'),
               'judulprestasi' => $this->input->post('judulprestasi'),
               'isiprestasi' => $this->input->post('isiprestasi'),
               'tempat' => $this->input->post('tempat'),
               'tanggal' => $this->input->post('tanggal'),
               'gambar' => Base_url() . $ImagePath,
               
            ];
            
            $this->ModelPrestasi->updateprestasi($data,$where);
            $this->prestasi();
      }
 
   }

   
}


