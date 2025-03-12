<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- row ux-->
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2 bg-primary">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah warga</div>
              <div class="h1 mb-0 font-weight-bold text-white"><?= $this->db->query("SELECT * FROM warga")->num_rows(); ?></div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('home/anggota'); ?>"><i class="fas fa-users fa-3x text-warning"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2 bg-warning">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah User Terdaftar</div>
              <div class="h1 mb-0 font-weight-bold text-white"><?= $this->db->query("SELECT * FROM user where idrole='2'")->num_rows(); ?>
              
              </div>
            </div>
            <div class="col-auto">
             <i class="fas fa-user fa-3x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

   
    

  
  </div>
  <!-- end row ux-->

  <!-- Divider -->
  <hr class="sidebar-divider">
  <?=$this->session->flashdata('pesan'); ?>
  <?=$this->session->flashdata('ditambahkan'); ?>
 
  <form class="user" method="post" action="<?= base_url('admin/simpandownloadsurat'); ?>"enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control form-control"name="namasurat"style="max-height: 200px; max-width: 500px; margin-left:15px;"
                id="namasurat" 
                placeholder="nama surat" required>
        </div>
        <div class="form-group">
           <input type="file" name="surat" id="surat" class="form-control form-control" style="max-height: 200px; max-width: 500px; margin-left:15px;" required>
        </div>
        <div class="form-group" style="max-height: 200px; max-width: 400px; margin-left:15px;">
        <button type="submit" class="btn btn-primary  btn-block">
                                     upload
                                    </button>
        </div>
  <table class="table" style="max-height: 200px; max-width: 900px; margin-left:15px;">
  <thead class="thead-dark">
      <th colspan="4"> Surat</th>
     
      
    
  </thead>

  <tbody>
    <tr>
      <td>no</td>
      <td>nama surat</td>
      <td>surat</td>
      <td>hapus</td>
      
    </tr>
    <?php
$a=0;
foreach ($downloadsurat as $downloadsurat){ ?>

    <tr>
      
      <td><?= $a=$a+1; ?></td>
      <td ><?= $downloadsurat['namasurat']; ?></td>
      <td><a download="<?= $downloadsurat['surat']; ?>" href="<?= base_url('assets/img/surat/'.$downloadsurat['surat']); ?>">download</a>
						</td>
      <td><a href="<?= base_url('admin/hapusdownloadsurat/'.$downloadsurat['idsurat']); ?>" class="btn btn-danger">Hapus</td>
    </tr>
    <?php } ?>
  </tbody>
</table>

  <!-- row table-->


</div>
<script>

</script>
<!-- End of Main Content -->