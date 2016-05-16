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

        var validator = $("#tambah_katemenu").submit(function() {
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
        <h1 class="page-header">Manajemen kategori menu </h1>                
    </div>             
    </div>                
    <div class="col-lg-12">
    	<button class="btn btn-small btn-success tambah">Tambah Kategori menu</button> 
    	<div class="tambah-content" style="display:none;">
            <div class="panel-body" style="width:80%;">

    		 <form role="form" action="proses.php?act=tambah_katemenu" method="post" id="tambah_katemenu" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                        <div style="margin-bottom:10px;">
                            <select name="nama_paket" class="form-control">
                                <option>- Nama paket -</option>
                                <option>A1</option>
                                <option>A2</option>
                                <option>A3</option>
                                <option>A4</option>
                                <option>A5</option>
                                <option>B1</option>
                                <option>B2</option>
                                <option>B3</option>
                                <option>B4</option>
                                <option>B5</option>
                            </select>
                        </div>
                        <input class="form-control" placeholder="harga menu" name="harga_paket" type="text" autofocus required>
                    </div>
                   <!--  <div class="form-group">
                        Foto : <input class="form-control" name="foto" type="file" required>
                    </div> -->
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
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                    $no=1;

                    $query = mysqli_query($konek,"SELECT * FROM detail_paket JOIN paket ON detail_paket.id_paket=paket.id_paket");

                    while ($result = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $result['nama_paket'];?></td>
                        <td><?php echo $result['harga_paket'];?></td>
                        <td>
                            <a href="<?php echo "homeadmin.php?modul=man_datamenuedit&id=$result[id_menu]"?>">
                                <i class="fa fa-edit"></i> Edit
                            </a> | 
                            <a href="<?php echo "proses.php?act=hapus_manmenu&id=$result[id_menu]";?>" onclick="return confirm('Delete?');">
                                <i class="fa fa-close"></i> Delete
                            </a> 
                        </td>
                    </tr>
                <?php
                    $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>                
</div>               

