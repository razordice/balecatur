<script type="text/javascript">
	$(document).ready(function() {
		$('#dpd1').datepicker();
	});
</script>
<style type="text/css">
.thumbnail {
	margin-bottom:0; 
	height:100px;
	line-height: 85px;
}
</style>
<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Avaibility Room / Check Ketersediaan Kamar</h1>                
    </div>                
    <div class="col-xs-6">
    </div>   
    <div class="col-xs-6 ">
    <form class="form-inline pull-right" action="proses.php?act=cekKamarTanggal" method="post" id="add-produk">
	  <div class="form-group">
	    <div class="input-group">
			<input type="text" data-date-format="dd/mm/yyyy" id="dpd1" class="form-control" placeholder="Pilih Tanggal">
	    </div>
	  </div>
	  <input type="submit" value="Submit" class="btn btn-small btn-success">
	</form>
    </div> 
                   <!-- /.col-lg-12 -->
</div>    
<div class="clearfix" style="margin-top:2%;"></div>
<div class="col-lg-12">Ketersediaan kamar tanggal <?php echo date('d-m-Y');?></div>
<?php 
$cek = mysqli_query($konek, "select * from kategori_kamar order by type_kamar");
while ($cekKategori = mysqli_fetch_array($cek)) {
?>           
<div class="row"> 
	<div class="col-lg-12">                
        <h3 class="page-header">Type Kamar : <?php echo $cekKategori['type_kamar']; ?></h3>         
    </div>
    <?php 
		$cekKamar = mysqli_query($konek, "select * from kamar where id_kategori_kamar='$cekKategori[id_kategori_kamar]'");
		while ($cekKamar2 = mysqli_fetch_array($cekKamar)) {

    ?>
 	<div class="col-xs-6 col-md-2" style="text-align:center;">
    	<a href="#" class="thumbnail alert-success">Kamar No <?php echo $cekKamar2['no_kamar']?></a>
  	</div>
	<?php } ?>

</div>             
<?php } ?>
<div class="clearfix" style="margin-bottom:5%;"></div>


	