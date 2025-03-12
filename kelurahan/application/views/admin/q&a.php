

<!-- Google Fonts -->

<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
  rel="stylesheet"
/>
<?= $this->session->flashdata('ditambahkan'); ?>
<?php
foreach ($qanda as $qanda){ ?>
<div class="accordion w-100" id="basicAccordion">
  <div class="accordion-item"  style="margin-left:15px; max-width: 700px;margin-top: 10px">
    <h2 class="accordion-header" id="headingOne">
    <form action="<?= base_url('admin/hapusqanda'); ?>" method="post">
<input type="hidden" value="<?= $qanda['no']; ?>" name="no">
  <button type="submit" class="btn btn-danger  btn-block" style="max-width: 100px">hapus</button>
                                    </form>
      <button  data-mdb-collapse-init class="accordion-button collapsed" type="button"
        data-mdb-target="#no<?= $qanda['no']; ?>"  aria-expanded="false" aria-controls="collapseOne">
        <strong><?= $qanda['pertanyaan']; ?>?</strong>
      </button>
    </h2>
    <div id="no<?= $qanda['no']; ?>" class="accordion-collapse collapse" aria-labelledby="<?= $qanda['no']; ?>"
      data-mdb-parent="#basicAccordion" style="">
      <div class="accordion-body">
        <?= $qanda['jawaban']; ?>
      </div>
    </div>
  </div>
  <?php } ?>
  
</div>
<br>

    <form class="user" method="post" action="<?= base_url('admin/simpanqanda'); ?>">
        <div class="form-group">
            <textarea type="email" class="form-control form-control"name="pertanyaan"style="max-height: 200px; max-width: 900px; margin-left:15px;"
                id="pertanyaan" 
                placeholder="pertanyaan" required></textarea>
        </div>
        <div class="form-group">
            <textarea class="form-control form-control" style="max-height: 200px; max-width: 900px; margin-left:15px;" name="jawaban"
                id="jawaban" placeholder="jawaban"required></textarea>
        </div>
        <div class="form-group" style="max-height: 200px; max-width: 400px; margin-left:15px;">
        <button type="submit" class="btn btn-primary  btn-block">
                                     upload
                                    </button>
        </div>
        
     
 
    </form>
    <br>
    
    


  <!-- end of row table-->

</div>
<!-- /.container-fluid -->

    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>