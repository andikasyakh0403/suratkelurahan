<!DOCTYPE html>
<html lang="en">

<head>

  

</head>


<body >

<div class="container" style="margin-top: -30px;">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-13 col-md-1">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-gradient-secondary" style="display: flex; background-color: grey "><pre>
                    
                    
                      
                    <center> <img src="<?= base_url('assets/img/upload/kelurahan keagungan.png'); ?>" alt=""><h5 style="color: white; font-Family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-weight: bold">Memberikan Pelayanan dengan baik<br> dan Terpercaya </h5> 
                    </center>
                    </pre> </div>
                    <div class="col-lg-6" >
                                <div class="p-6" >
                                    <br>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Lupa Password</h1>
                                    </div>
                                    <?= $this->session->flashdata('pesan'); ?>
                                <?= $this->session->flashdata('berhasil'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action="<?= base_url('home/lupapassword'); ?>">
                                    <div class="form-group" style="max-width: 425px">
                                        <input type="text" class="form-control " value="<?= set_value('email'); ?>" id="email" placeholder="Masukkan Alamat Email" name="email">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                    <div class="form-group" style="max-width: 425px" >
                                        <input type="text" class="form-control " value="<?= set_value('nik'); ?>" id="nik" placeholder="Masukkan nik" name="nik" onkeypress="hanyaAngka(event)">
                                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group" style="max-width: 425px">
                                        <input type="text" class="form-control " value="<?= set_value('notelepon'); ?>" id="notelepon" placeholder="notelepon" name="notelepon" onkeypress="hanyaAngka(event)">
                                        <?= form_error('notelepon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group row" style="max-width: 425px">
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input type="password" class="form-control " id="password_baru1" name="password_baru1" placeholder="Password">
                                      <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                                  </div>
                                  <div class="col-sm-6">
                                      <input type="password" class="form-control " id="password_baru2" name="password_baru2" placeholder="Ulangi Password">
                                      <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
                                  </div>
                             </div>
                                    <button type="submit" class="btn btn-primary  btn-block" style="max-width: 425px">
                                        Ubah Password
                                    </button>
                                </form>
                                <br>
                          
                          <div class="text-center">
                                        <a class="big" href="<?= base_url('home'); ?>">Kembali Login</a>
                                    </div>
                                    <br> 
</div>
                                
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

    <script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
          return false;
        return true;
      }
  </script>

    <!-- Bootstrap core JavaScript-->
 

</body>

</html>