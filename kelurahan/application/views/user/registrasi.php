  <div class="container"style="max-width: 600px;" style="background-color: white;">

      <div class="container" style="background-color: white; border-radius: 10px"><br>
      <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-4" font="timnes">Registrasi Akun</h1>
                          </div>
                          <form class="user" method="post" action="<?= base_url('home/registrasi'); ?>" enctype="multipart/form-data" >
                              <div class="form-group" >
                                  <input type="text" class="form-control " id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                            
                              <div class="form-group">
                                  <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK" maxlength="16" onkeypress="return hanyaAngka(event)"  value="<?= set_value('nik'); ?>">
                                  <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" id="notelepon" name="notelepon" placeholder="nohp"  onkeypress="return hanyaAngka(event)" value="<?= set_value('notelepon'); ?>">
                                  <?= form_error('notelepon', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              
                              <div class="form-group">
                                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukan Alamat"></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input type="password" class="form-control " id="password1" name="password1" placeholder="Password">
                                      <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                  </div>
                                  <div class="col-sm-6">
                                      <input type="password" class="form-control " id="password2" name="password2" placeholder="Ulangi Password">
                                      <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                  </div>
                             </div>
                             
                              <button type="submit" class="btn btn-primary btn-block" >
                                  Daftar 
                              </button>
                          </form>
                          <br>
                          
                          <div class="text-center">
                                        <a class="big" href="<?= base_url('home'); ?>">Sudah Punya Akun</a>
                                    </div>
                                    <br>
    </div>
                          <br><br>
                         
                 

  </div>
  <script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
          return false;
        return true;
      }
  </script>