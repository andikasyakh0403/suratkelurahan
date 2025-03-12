<?php 

class Home extends CI_Controller 

{ 

	public function index()
    {
        //jika statusnya sudah login, maka tidak bisa mengakses halaman login alias dikembalikan ke tampilan user
        if($this->session->userdata('email')){
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus diisi!!',
            'valid_email' => 'Email Tidak Benar!!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Kelurahan Keagungan';
            $data['user'] = '';
            //kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
			$this->load->view('user/aute_header');
			$this->load->view('user/topbar',$data);
			$this->load->view('user/login',$data); 


			$this->load->view('templates/templates-user/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            //jika user sudah aktif
            if ($user['status'] == 'verfikasi' AND $user['idrole']  == 2) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'idrole' => $user['idrole']
                    ];

                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktivasi!!</div>');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('home');
        }
    }


		

			public function registrasi() {

			if ($this->session->userdata('email')) {
				redirect('user');
			}
			//membuat rule untuk inputan nama agar tidak boleh kosong dengan membuat pesan error dengan 
			//bahasa sendiri yaitu 'Nama Belum diisi'
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
				'required' => 'Nama Belum diis!!'
			]);
			//membuat rule untuk inputan email agar tidak boleh kosong, tidak ada spasi, format email harus valid
			//dan email belum pernah dipakai sama user lain dengan membuat pesan error dengan bahasa sendiri 
			//yaitu jika format email tidak benar maka pesannya 'Email Tidak Benar!!'. jika email belum diisi,
			//maka pesannya adalah 'Email Belum diisi', dan jika email yang diinput sudah dipakai user lain,
			//maka pesannya 'Email Sudah dipakai'
			$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]', [
				'valid_email' => 'Email Tidak Benar!!',
				'required' => 'Email Belum diisi!!',
				'is_unique' => 'Email Sudah Terdaftar!'
			]);
			$this->form_validation->set_rules('nik', 'nik', 'required|greater_than_equal_to[16]|is_unique[user.nik]',  [
				'required' => 'Nik Belum diis!!',
				'greater_than_equal_to' => 'Nik Harus 16 karakter!!',
				'is_unique' => 'Nik Sudah Terdaftar!'
			]);
			$this->form_validation->set_rules('notelepon', 'nomor', 'required|min_length[10]',  [
				'required' => 'no Hp Belum diis!!',
				'min_length' => 'no Hp Terlalu Pendek!!'
				
				
			]);
			$this->form_validation->set_rules('alamat', 'alamat', 'required', [
				'required' => 'alamat Belum diisi!!'
			]);

			//membuat rule untuk inputan password agar tidak boleh kosong, tidak ada spasi, tidak boleh kurang dari
			//dari 3 digit, dan password harus sama dengan repeat password dengan membuat pesan error dengan  
			//bahasa sendiri yaitu jika password dan repeat password tidak diinput sama, maka pesannya
			//'Password Tidak Sama'. jika password diisi kurang dari 3 digit, maka pesannya adalah 
			//'Password Terlalu Pendek'.
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
				'matches' => 'Password Tidak Sama!!',
				'min_length' => 'Password Terlalu Pendek'
			]);
			$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
			//jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di
			//tampilan registrasi. tapi jika disubmit kemudian validasi form diatas berjalan, maka data yang 
			//diinput akan disimpan ke dalam tabel user
			if ($this->form_validation->run() == false) {
				$data['judul'] = 'Kelurahan Keagungan';
				$this->load->view('user/aute_header');
				$this->load->view('user/topbar',$data);
				$this->load->view('user/registrasi');
				$this->load->view('templates/aute_footer');
			} else {
				$email = $this->input->post('email', true);
				
			
			
				$data = [
					'namalengkap' => htmlspecialchars($this->input->post('nama', true)),
					'email' => htmlspecialchars($email),
					'nip' => "-",
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'idrole' => 2,
					'status' => "belum verfikasi",
					'nik' => $this->input->post('nik'),
					'alamat' => $this->input->post('alamat'),
					'notelepon' => $this->input->post('notelepon'),

				];

				$this->ModelUser->simpanData($data); //menggunakan model
				

				
				
				$config = [
					'mailtype'  => 'html',
					'charset'   => 'utf-8',
					'protocol'  => 'smtp',
					'smtp_host' => 'smtp.gmail.com', // atau smptp lainnya                
					'smtp_user' => '19220141@bsi.ac.id',  // Email gmail admin aplikasi
					'smtp_pass'   => '2001-03-04',  // Password Gmail atau Sandi Aplikasi Gmail
					'smtp_crypto' => 'ssl',
					'smtp_port'   => 465,
					'crlf'    => "\r\n",
					'newline' => "\r\n"
				];        
				$this->load->library('email', $config); // panggil library email
				$this->email->from('andikasyeikh@gmail.com','Verifikasi Email Dengan Library Email Codeigniter');
				$data = [
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'email' => htmlspecialchars($email),
					'password' => $this->input->post('password1'),
				];
				$data = $this->db->query("SELECT email FROM user WHERE email = '$email'")->row_array();
			   
				$this->email->to($email);            
				$this->email->subject('Email Notifikasi');
				$this->email->message('<a href="http://localhost/kelurahan/home/terererrrererer87878788/'.$data["email"].'">Verifikasi Email</a>');
				if($this->email->send()){
						$this->cekemail();
						
				}else{
					echo 'Error, Gagal melakukan kirim email, cek koneksi jaringan dan lainnya.';
				}
	
				
	
			
			}
		
		}
		public function terererrrererer87878788(){
			$iduser=$this->uri->segment(3);

			$data= $this->db->query("UPDATE user SET status='verfikasi' WHERE email='$iduser'");
			echo"akun anda berhasil diverfikasi silahkan mengakses home";

			
		}
		public function cekemail(){
			echo"cek email anda untuk melakukan verfikasi <br>
			<a href='http://localhost/kelurahan/'>Login</a>";
			
		}
		public function lupapassword(){

			if ($this->session->userdata('email')) {
				redirect('user');
			}
			//membuat rule untuk inputan nama agar tidak boleh kosong dengan membuat pesan error dengan 
			//bahasa sendiri yaitu 'Nama Belum diisi'
			
			
			//membuat rule untuk inputan email agar tidak boleh kosong, tidak ada spasi, format email harus valid
			//dan email belum pernah dipakai sama user lain dengan membuat pesan error dengan bahasa sendiri 
			//yaitu jika format email tidak benar maka pesannya 'Email Tidak Benar!!'. jika email belum diisi,
			//maka pesannya adalah 'Email Belum diisi', dan jika email yang diinput sudah dipakai user lain,
			//maka pesannya 'Email Sudah dipakai'
			

			$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
				'valid_email' => 'Email Tidak Benar!!',
				'required' => 'Email Belum diisi!!',
				
			]);
			
			$this->form_validation->set_rules('nik', 'nik', 'required|greater_than_equal_to[16]',  [
				'required' => 'Nik Belum diis!!',
				'greater_than_equal_to' => 'Nik Harus 16 karakter!!',
				'is_unique' => 'Nik Sudah Terdaftar!'
			]);
			$this->form_validation->set_rules('notelepon', 'nomor', 'required|min_length[10]',  [
				'required' => 'no Hp Belum diis!!',
				'min_length' => 'no Hp Terlalu Pendek!!'
				
				
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
				
				$data['judul'] = 'Kelurahan Keagungan';
				$data['user'] = '';
				//kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
				$this->load->view('user/aute_header');
				$this->load->view('user/topbar',$data); 
	
				$this->load->view('user/lupapassword'); 
	
				$this->load->view('templates/templates-user/modal'); 
	
				$this->load->view('templates/templates-user/footer');
				
				
				//kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
				
			} else{
				$email = $this->input->post('email', true);
				$nik = $this->input->post('nik');
				$notelepon = $this->input->post('notelepon');
			    $baju = $this->db->query("SELECT * FROM user WHERE email = '$email'")->row_array();
				if (isset($baju['email'])) {
					if ($nik==$baju['nik']) {
					
						if ($notelepon==$baju['notelepon']) {
							$config = [
								'mailtype'  => 'html',
								'charset'   => 'utf-8',
								'protocol'  => 'smtp',
								'smtp_host' => 'smtp.gmail.com', // atau smptp lainnya                
								'smtp_user' => 'andikasyeikh@gmail.com',  // Email gmail admin aplikasi
								'smtp_pass'   => 'pmxt xveb jjre dhxi',  // Password Gmail atau Sandi Aplikasi Gmail
								'smtp_crypto' => 'ssl',
								'smtp_port'   => 465,
								'crlf'    => "\r\n",
								'newline' => "\r\n"
							];        
							$this->load->library('email', $config); // panggil library email
							$this->email->from('andikasyeikh@gmail.com','Verifikasi Email Dengan Library Email Codeigniter');
							$passwordbaru =  password_hash($this->input->post('password_baru1'), PASSWORD_DEFAULT);

						   
							$this->email->to($email);            
							$this->email->subject('Email Notifikasi');
							$this->email->message('<form action="http://localhost/kelurahan/home/terererrrererer8787898" method="post">
							<input type="hidden" name="email" value="'.$email.'">
							<input type="hidden" name="password_baru1" value="'.$passwordbaru.'">
							<input type="submit" style="background-color: white; color: Blue; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;" value="Klik Disini Untuk Mengganti Password"></form>');
							if($this->email->send()){
									$this->cekemail();
									
							}else{
								echo 'Error, Gagal melakukan kirim email, cek koneksi jaringan dan lainnya.';
							}
						

						}else{
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">data Tidak Terdaftar</div>');
							$data['judul'] = 'Kelurahan Keagungan';
							$data['user'] = '';
							//kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
							$this->load->view('user/aute_header');
							$this->load->view('user/topbar',$data);
				
							$this->load->view('user/lupapassword'); 
				
							$this->load->view('templates/templates-user/modal'); 
				
							$this->load->view('templates/templates-user/footer');
						}
				
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">data Tidak Terdaftar</div>');
						$data['judul'] = 'Kelurahan Keagungan';
						$data['user'] = '';
						//kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
						$this->load->view('user/aute_header');
						$this->load->view('user/topbar',$data);
			
						$this->load->view('user/lupapassword'); 
			
						$this->load->view('templates/templates-user/modal'); 
			
						$this->load->view('templates/templates-user/footer');
						}
			    
					
				}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">data Tidak Terdaftar</div>');
				$this->load->view('templates/templates-user/header'); 
	
				$this->load->view('user/lupapassword'); 
	
				$this->load->view('templates/templates-user/modal'); 
	
				$this->load->view('templates/templates-user/footer');
				}
				
		
	}
	
}
public function terererrrererer8787898(){
	$email = $this->input->post('email');
	$passwordbaru = $this->input->post('password_baru1');

	$data= $this->db->query("UPDATE user SET password='$passwordbaru' WHERE email='$email'");
	echo"akun anda berhasil di ubah password silahkan mengakses home";

	
}
public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('idrole');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('home');
    }
	public function anggota()
    {
        $data['judul'] = 'Data Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('idrole', 2);
        $data['anggota'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/anggota', $data);
        $this->load->view('templates/footer');
    }
	
}

			