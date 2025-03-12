
<!-- Google Fonts -->


<br>
 <a href="<?= base_url('admin/tambahwarga'); ?>" class="btn btn-primary"style="color:white;margin-left:15px; border-radius: 0,0,10px,10px; margin-bottom: 10px">+ Warga</a>

<?= $this->session->flashdata('pesan'); ?>
<div class="suka" style='height: 0vh;' >
      <div class="container" style="height: 100%;
      overflow: auto;">
     </div>
<pre>
<table class="table" style="max-height: 200px; max-width: 900px; margin-left:15px; color:black;">
  <thead class="thead-dark">
      <th colspan="6" align="center"> Data Warga</th>
      <th colspan="10" > <input type="text" name="" id="cariKat" onkeyup="prosesMenu()" placeholder="Cari Disini..."></th>
      <tr>
      <td>no</td>
      <td>nik</td>
       <td>nama lengkap</td> 
       <td>tempat lahir</td>
      <td>tanggal lahir</td>
      <td>alamat</td>
      <td>rt</td>
      <td>rw</td> 
      <td>kelurahan</td>
      <td>kecamatan</td>
      <td>agama</td>
      <td>status</td>
      <td>pekerjaan</td>
      <td>foto</td>
    </tr>
     
      
    
  </thead>

  <tbody>

    <?php

    $i=1; foreach ($warga as $warga){
       ?>
    <tr >
    <td><?=$i++?></td>
    <td><?= $warga['nik']; ?></td>
    <td><?= $warga['namalengkap']; ?></td>
    <td><?= $warga['tempatlahir']; ?></td>
    <td><?= $warga['tgllahir']; ?></td>
    <td><?= $warga['alamat']; ?></td>
    <td><?= $warga['rt']; ?></td>
    <td><?= $warga['rw']; ?></td>
    <td><?= $warga['kelurahan']; ?></td>
    <td><?= $warga['kecamatan']; ?></td>
    <td><?= $warga['agama']; ?></td>
    <td><?= $warga['status']; ?></td>
    <td><?= $warga['pekerjaan']; ?></td>
    <td><img src="<?= base_url('assets/img/profile/'.$warga['foto']); ?>" alt="" srcset="" height="50px" width="50px"></td>
      
    <td><a href="<?= base_url('admin/updatewarga/'.$warga['nik']); ?>" class="btn btn-warning"style="color:white;">update</td>
    <td><a href="<?= base_url('admin/hapuswarga/'.$warga['nik']); ?>" class="btn btn-danger">Hapus</td>
    </tr>
    <?php } ?>


  </tbody>
</table>
</pre>

</div>



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


<br>

  
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>