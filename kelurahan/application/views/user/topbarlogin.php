<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
    <div class="container " >
        <button onclick='tomboluser()' class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="#my-nav" aria-expanded="false" aria-label="Toggle navigation" align="right">
        <span class="navbar-toggler-icon" ></span>
    </button>
        <div id="my-nav" class=" collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a  class="nav-link active" href="<?=base_url('index.php/projekuas')?>"style="color:white;">Beranda<span class="sr-only">(current)</span></a>
            </li>
            <div class="dropdown">
                <a  href="" class=" nav-link dropdown-togler
                    " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="color:white;">Pembuatan Surat</a>
                    <li class="dropdown-menu">
                        <a class="dropdown-item"href="<?php echo base_url().'user/suratramai'?>">Surat Izin Keramaian</a>
                        <a class="dropdown-item"href="<?php echo base_url().'user/kematian/'?>"> Pembuatan Akte Kematian</a>
                        <a class="dropdown-item"href="<?php echo base_url().'user/sktm'?>">Surat Tidak Mampu</a>
                        <a class="dropdown-item"href="<?php echo base_url().'user/suratkelahiran'?>">Pembuatan Akte Kelahiran</a>
                        
                    </li>
            </div>
            
        <li class="nav-item  ">
            <a  class=" nav-link "href="#suratdownload" style="color:white;"> Download Surat</a>
        </li>

        <li class="nav-item  ">
        <a class="nav-item nav-link" data-toggle="modal" data-target="#login" href="#"style="color:white;">  Status Surat</a>
</li>
     
       
            </ul>
            
            
        </div>
       
        <li class="nav-item dropdown no-arrow" style="list-style: none;">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <font color="White"><?= $user['namalengkap']; ?></font>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $warga['foto']; ?>" style="width: 40px; height: 40px">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('user/profil/')?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"  href="<?= base_url('home/logout'); ?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
    </div>
 
</nav>
<div class="modal fade" tabindex="-1" id="login" role="dialog"> 

	<div class="modal-dialog" role="document"> 

		<div class="modal-content"> 

			<div class="modal-header">

				<h5 class="modal-title">Cek Status Surat</h5> 

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 

					<span aria-hidden="true">&times;</span> 

				</button> 

			</div> 

			<form action="<?= base_url('user/lihatsurat'); ?>" method="post"> 

				<div class="modal-body"> 

					<div class="form-group row"> 

						

					

					</div> 

					<div class="form-group row">
                    

                    <div class="col-sm-10">
                    <select name="surat" id="surat"class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                        
						 
  <option selected >pilih surat</option>
                        <option value="kematian" required> surat Kematian</option>
                        <option value="suratramai" required> surat ramai</option>
                        <option value="suratkelahiran"required> pengajuan Akte kelahiran</option>
                        <option value="sktm"required> Surat Keterngan tidak Mampu</option>
                    </select>
                    </div>

						</div> 

                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-outline-primary" align="right">lihat</button> 
    
				</div> 


			</form> 

		</div> 

	</div> 

</div> 
<script>
   function tomboluser(){
    x=document.getElementById('userDropdown');
    if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
   }
</script>
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
          return false;
        return true;
      }
  </script>
<br><br><br>
        <!-- End of Topbar -->