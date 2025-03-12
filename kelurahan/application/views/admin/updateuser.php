
<br><br>


<section >


<center>
<div class="container" style=" box-shadow:  3px 5px 5px 3px rgba(0, 0, 0, 0.2);width: 520px; background-color: white"><br>
<div class="container" style="background-color: white; border-radius: 10px"><br>
      <div class="text-center">
      <?= $this->session->flashdata('pesan'); ?>
                              <h1 class="h4 text-gray-900 mb-4" font="timnes">Update user</h1>
                          </div>
                        
                          <form class="user" method="post" action="<?= base_url('admin/updateuser'); ?>" enctype="multipart/form-data" >
                          <div class="form-group"align="justify">
                              <label for="selesai" >nama lengkap</label>
                                  <input type="text" class="form-control" id="namalengkap" name="namalengkap" placeholder="nama lengkap" value="<?=$user1['namalengkap'];?>"> 
                                  
                              </div>
                          <div class="form-group"align="justify">
                              <label for="selesai" >Email:</label>
                    
                                  <input type="" class="form-control" id="email" name="email" placeholder="email" value="<?= $user1['email']; ?>" h> 
                             
                              </div>    
                            
                              <div class="form-group"align="justify">
                              <label for="selesai" >Nik:</label>
                                  <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK" maxlength="16" onkeypress="return 
                                  hanyaAngka(event)"  
                                  value="<?= $user1["nik"]; ?>">
                                
                              </div>
                              <div class="form-group"align="justify">
                              <label for="selesai" >No Telepon:</label>
                                  <input type="text" class="form-control" id="notelepon" name="notelepon" 
                                
                                  placeholder="nohp"  onkeypress="return hanyaAngka(event)" value="<?= $user1['notelepon']; ?>">
                              </div>
                              <div class="form-group"align="justify">
                              <label for="selesai" >alamat:</label>
                                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?=$user1['alamat'];?> ">
                           
                              </div>
                              <select name="status" id="status"class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
 <?php $status=$user1['status'];
 if($status=='belum verfikasi'){?>
                        <option value="<?=$user1['status']?>" required> Belum verfikasi</option>
                        <option value="verfikasi" required> verfikasi</option>
                        <?php }else{?>
                            <option value="<?=$user1['status']?>" required> verfikasi</option>
                        <option value="belum verfikasi" required> belum verfiksi</option>
                        <?php } ?>
                        
                    </select>
        
                                         
                              <div class="form-group">
                             
                           
                             
                              <button type="submit" class="btn btn-primary btn-block" >
                                 Update User
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