
<br><br>


<section >


<center>
<div class="container" style=" box-shadow:  3px 5px 5px 3px rgba(0, 0, 0, 0.2);width: 520px; background-color: white"><br>
<div class="container" style="background-color: white; border-radius: 10px"><br>
      <div class="text-center">
      <?= $this->session->flashdata('pesan'); ?>
                              <h1 class="h4 text-gray-900 mb-4" font="timnes">Surat Permohonan Akte Kelahiran</h1>
                          </div>
                          <form class="user" method="post" action="<?= base_url('user/simpansuratkelahiran'); ?>" enctype="multipart/form-data" >
                          <input type="text" class="form-control" id="user" name="user" 
                                
                                 hidden value="<?= $this->session->userdata('email'); ?>"  required>
                            
                              <div class="form-group"align="justify">
                              
                                  <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK " maxlength="16" onkeypress="return 
                                  hanyaAngka(event)"  
                                   required>
    
                              </div>
                              <div class="form-group"align="justify">
                            
                                  <input type="text" class="form-control" id="namaanak" name="namaanak" 
                                
                                  placeholder="namaanak"  required>
                              </div>
                              <div class="form-group"align="justify">
                            
                                  <input type="text" class="form-control" id="harilahir" name="harilahir" 
                                
                                  placeholder="harilahir"  required>
                              </div>
                              <div class="form-group"align="justify">
                            
                            <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" 
                          
                            placeholder="tempatlahir"  required>
                        </div>
                              <div class="form-group"align="justify">
                              <label for="selesai" >Jam lahir:</label>
                                  <input type="time" class="form-control" required id="jamlahir" name="jamlahir" > 
                                 
                              </div>
                              
                              <div class="form-group"align="justify">
                              <label for="selesai" >Tanggal Kelahiran:</label>
                                  <input type="date" class="form-control" id="tgllahir" name="tgllahir" placeholder="tglkelahiran" required> 
                                  
                              </div>
                              <div class="form-group"align="justify">
                            
                                  <input type="text" class="form-control" id="anakke" name="anakke" 
                                
                                  placeholder="anakke"  required>
                              </div>
                              
                              <div class="form-group"align="justify">
                             
                                  <input type="select" class="form-control" id="namaibu" name="namaibu" placeholder="namaibu" required> 
                                  
                              </div>
                              <div class="form-group"align="justify">
                            
                                  <input type="text" class="form-control" id="namaayah" name="namaayah" 
                                
                                  placeholder="namaayah"  required>
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-9 mb-7 mb-sm-0">   

                             <input type="radio" id="jeniskelamin" name="jeniskelamin" value="perempuan" required/>
                                       <label for="contactChoice3">perempuan</label>                           

                              <input type="radio" id="jeniskelamin" name="jeniskelamin" value="laki-laki" style="margin-left: 100px"/>
                              <label for="contactChoice3" required>laki-laki</label>
                          
                                  </div>
                             </div>
                              <div class="form-group"align="justify">
                              <label for="selesai" >Surat Keterangan (Rt/Rw/Rumah Sakit):</label>
                                  <input type="file" class="form-control" id="suratketerangan" name="suratketerangan" placeholder="suratketerangan" required> 
                                  
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