

<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
  rel="stylesheet"
/>

<br><br>


<section >

<center>
<div class="container" style=" box-shadow:  3px 5px 5px 3px rgba(0, 0, 0, 0.2);width: 520px;">
    
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >
  <div class="carousel-inner">
    <div class="carousel-item active"style="width:475px;height:600px;" >
      <img class="d-block w-100" src="<?= base_url('assets/img/pungli.jpg'); ?> "style="width:475px;height:500px;"  >
      <p>kami menolak penerimaan pungli,semua pelayanan Bersifat <b>Gratiss</b> <br>
      jika ada yang memungut biaya segera hubungi yang ada di bawah</p>

    </div>
    <?php
foreach ($carousel as $carousel){ ?>
    <div class="carousel-item" style="width:475px;height:600px;">
      <img class="d-block w-100" src="<?= base_url('assets/img/profile/'.$carousel['foto']);?>" style="width:475px;height:500px;" >
      <p><?= $carousel['keterangan']; ?></p>
    </div>
    <?php } ?>
    
   
  </div>
  
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" st>
    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color:blue;border-radius:30px"></span>

  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color:blue;border-radius:30px"></span>
  </a>
</div>
</div>

  <br>
  <?php
foreach ($qanda as $qanda){ ?>
<div class="accordion w-100" id="basicAccordion">
  <div class="accordion-item"  style="max-width:600px;margin-top:5px">
    <h2 class="accordion-header" id="headingOne">
   
      <button  data-mdb-collapse-init class="accordion-button collapsed" type="button"
        data-mdb-target="#no<?= $qanda['no']; ?>"  aria-expanded="false" aria-controls="collapseOne">
        <strong><?= $qanda['pertanyaan']; ?>?</strong>
      </button>
    </h2>
    <div id="no<?= $qanda['no']; ?>" class="accordion-collapse collapse" aria-labelledby="<?= $qanda['no']; ?>"
      data-mdb-parent="#basicAccordion">
      <div class="accordion-body">
        <p align="left"><?= $qanda['jawaban']; ?></p>
      </div>
    </div>
  </div>
  <?php } ?>
  <br>


  
</div>
 <div class="container" id='suratdownload'>
 <table class="table" style="max-height: 200px; max-width: 600px; margin-left:15px;" >
  <thead class="thead-dark">
      <th > Surat</th>
      <th > </th>
      <th><input type="text" name="" id="cariKat" onkeyup="prosesMenu()" placeholder="Cari Disini..."></th>
     
      
    
  </thead>

  <tbody>
    <tr>
      <td>no</td>
      <td>nama surat</td>
      <td>surat</td>

      
    </tr>
  <tbody>
    <?php
$a=0;
foreach ($downloadsurat as $downloadsurat){ ?>

    <tr>
      
      <td><?= $a=$a+1; ?></td>
      <td ><?= $downloadsurat['namasurat']; ?></td>
      <td><a download="<?= $downloadsurat['surat']; ?>" href="<?= base_url('assets/img/surat/'.$downloadsurat['surat']); ?>">download</a>
						</td>
     
    </tr>
    <?php } ?>
  </tbody>
</table>
 </div>

  </div>
  </center>

</section>



<br>

<script>
function prosesMenu()
{
	var input = document.getElementById("cariKat");
	var filter = input.value.toLowerCase("");
	var ul = document.getElementsByClassName("left");
	var li = document.querySelectorAll("tbody tr");
	console.log(li)
	for(var i = 0; i<li.length; i++){
		var ahref = document.querySelectorAll("tbody tr")[i];
		if(ahref.innerHTML.toLowerCase().indexOf(filter) > -1){
			li[i].style.display = "";
		}else{
			li[i].style.display = "none";
		}
	}
    
}
</script>
 
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>