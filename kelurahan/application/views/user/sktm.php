
<br><br>


<section >


<center>
<div class="container" style=" box-shadow:  3px 5px 5px 3px rgba(0, 0, 0, 0.2);width: 520px; background-color: white"><br>
<div class="container" style="background-color: white; border-radius: 10px"><br>
      <div class="text-center">
      <?= $this->session->flashdata('pesan'); ?>
                              <h1 class="h4 text-gray-900 mb-4" font="timnes">Surat Keterangan Tidak Mampu</h1>
                          </div>
                          <form class="user" method="post" action="<?= base_url('user/sktm'); ?>" enctype="multipart/form-data" >
                        
                          <input type="text" class="form-control" id="user" name="user" 
                                
                                hidden value="<?= $this->session->userdata('email'); ?>"  required>
                              <div class="form-group"align="justify">
                              <label for="selesai" >Nik:</label>
                                  <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK" maxlength="16" onkeypress="return hanyaAngka(event)"
                                  value="<?= $user["nik"]; ?>">
    
                              </div>
                              <div class="form-group"align="justify">
                              <label for="selesai" >No Telepon:</label>
                                  <input type="text" class="form-control" id="notelepon" name="notelepon" 
                                
                                  placeholder="nohp"  onkeypress="return hanyaAngka(event)" value="<?= $user['notelepon']; ?>">
                              </div>
                              <div class="form-group"align="justify">
                                  <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="keperluan"> 
                                  <?= form_error('keperluan', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group"align="justify">
                              <label for="selesai" >Email</label>
                                  <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?=$user['email'];?> "> 
                                  
                              </div>
                          <p style="font-size: 14px">*jika pengaju tidak memiliki no telepon atau email maka bisa menggunakan akun yang mewakilinya</p>
                           
                           
                              <div class="form-group">
                             
                           
                             
                              <button type="submit" class="btn btn-primary btn-block" >
                                  buat surat 
                              </button>
                          </form>
                 <br>
            <br>
    </div>

</div>

</section>


<br>
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
          return false;
        return true;
      }
  </script>

 
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>