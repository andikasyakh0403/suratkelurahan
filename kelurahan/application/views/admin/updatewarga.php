
<br><br>


<section >


<center>
<div class="container" style=" box-shadow:  3px 5px 5px 3px rgba(0, 0, 0, 0.2);width: 520px; background-color: white"><br>
<div class="container" style="background-color: white; border-radius: 10px"><br>
      <div class="text-center">
      <?= $this->session->flashdata('pesan'); ?>
                              <h1 class="h4 text-gray-900 mb-4" font="timnes">Update Warga</h1>
                          </div>
                        
                          <form class="user" method="post" action="<?= base_url('admin/updatewarga'); ?>" enctype="multipart/form-data" >
                          <div class="form-group"align="justify">                    
                                  <input type="text" class="form-control" id="namalengkap" name="namalengkap" placeholder="nama lengkap" value="<?= $warga['namalengkap'];?>" required> 
                              </div>
                             
                            
                              <div class="form-group"align="justify">
                         <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK" value="<?= $warga['nik'];?>" maxlength="16" onkeypress="return hanyaAngka(event)"  required
                                  ><?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                  <div class="form-group"align="justify">                    
                                  <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="tempat lahir" value="<?= $warga['tempatlahir'];?>" required> 
                              </div>
                              <div class="form-group"align="justify">  
<label for="tgllahir">tanggal lahir</label>
                                  <input type="date" class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir" value="<?= $warga['tgllahir'];?>" required>
                              </div>
                              <div class="form-group"align="justify">                    
                                  <input type="text" class="form-control" id="rt" name="rt" placeholder="rt" onkeypress="return hanyaAngka(event)" value="<?= $warga['rt'];?>"  required> 
                              </div>
                              <div class="form-group"align="justify">                    
                                  <input type="text" class="form-control" id="rw" name="rw" placeholder="rw" value="<?= $warga['rw'];?>" onkeypress="return hanyaAngka(event)"> 
                              </div>
                                
                              
                              <div class="form-group"align="justify">
                        
                                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat"  value="<?= $warga['alamat'];?>" required>
                           
                              </div>
                              <div class="form-group"align="justify">
                        
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="kelurahan" value="<?= $warga['kelurahan'];?>" required>
                    </div>
                    <div class="form-group"align="justify">
                        
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="kecamatan" value="<?= $warga['kecamatan'];?>" required>
                 
                    </div>
                    <div class="form-group"align="justify"> 
                        <input type="text" class="form-control" id="agama" name="agama" placeholder="agama" value="<?= $warga['agama'];?>" required>
                    </div>
                    <div class="form-group"align="justify">
                        
                        <input type="text" class="form-control" id="status" name="status" placeholder="status" value="<?= $warga['status'];?>" required>
                 
                    </div>
                    <div class="form-group"align="justify">
                        
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="pekerjaan" value="<?= $warga['pekerjaan'];?>" required>
                 
                    </div>
                    <div class="form-group"align="justify">
                        <label for="foto"></label>
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="foto" value="<?= $warga['foto'];?>"  accept="image/*" >
                 
                    </div>
     
                             
                           
                             
                              <button type="submit" class="btn btn-primary btn-block" >
                                 Update
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