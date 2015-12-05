<div class="row">
<script type="text/javascript">
	$(document).ready(function() {
		$('.tambah').click(function() {
			$('.tambah-content').slideToggle();
		});

        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
            onchange_callback: function(editor) {
              tinyMCE.triggerSave();
              $("#" + editor.id).valid();
            }
        });
  
        var validator = $("#add-kategori").submit(function() {
            tinyMCE.triggerSave();
         }).validate({ 
            ignore: "",
            messages: {
                type_kamar: "Kolom type kamar tidak boleh kosong!",
                tarif: "Kolom tarif kamar tidak boleh kosong!",
                jumlah_kamar: "Kolom jumlah kamar tidak boleh kosong!",
                fasilitas: "Kolom fasilitas kamar tidak boleh kosong!",
                foto: "Kolom foto tidak boleh kosong!"
            }
        });
        validator.focusInvalid = function() {
        // put focus on tinymce on submit validation
        if (this.settings.focusInvalid) {
          try {
            var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
            if (toFocus.is("textarea")) {
              tinyMCE.get(toFocus.attr("id")).focus();
            } else {
              toFocus.filter(":visible").focus();
            }
          } catch (e) {
            // ignore IE throwing errors when focusing hidden elements
          }
        }
      }
    });
</script>
    <div class="col-lg-12">     
        <div class="font-sizerheading">
            <h1 class="page-header">Manajemen Kategori Kamar</h1>                
        </div>           
    </div>                
    <div class="col-lg-12">
    	<button class="btn btn-small btn-success tambah">Tambah Kategori</button> 
    	<div class="tambah-content" style="display:none;">
            <div class="panel-body" style="width:80%;">

    		 <form role="form" action="proses.php?act=addKategori" method="post" id="add-kategori" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Tipe Kamar" name="type_kamar" type="text" autofocus required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Jumlah Kamar" name="jumlah_kamar" type="text" autofocus required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Tarif Kamar" name="tarif" type="text" autofocus required>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Fasilitas Kamar</label>
                        <textarea name="fasilitas" placeholder="Fasilitas Kamar" cols="20" rows="7"  class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        Foto : <input class="form-control" name="foto" type="file" required>
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <input type="submit" value="Submit" class="btn btn-small btn-success">
                </fieldset>
            </form>
    		</div>
    	</div>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                    $no=1;
                    $query = mysqli_query($konek,"select * from kategori_kamar");

                    while ($result = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $result['type_kamar'];?></td>
                        <td>
                            <a href="<?php echo "homeadmin.php?modul=man_kategorikamar_edit&id=$result[id_kategori_kamar]"?>">
                                <i class="fa fa-edit"></i> Edit
                            </a> | 
                            <a href="<?php echo "proses.php?act=hapusKategori&id=$result[id_kategori_kamar]";?>" onclick="return confirm('Hapus data ini ?');">
                                <i class="fa fa-close"></i> Delete
                            </a> 
                        </td>
                    </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>                
</div>                