<div class="row">
<!-- ambil data paket-->
<?php

/*  $getdatapaket ="SELECT * FROM paket WHERE harga_paket";
    $saving = mysqli_query($konek,$getdatapaket);

    $array_datapaket =array();
        while ($rows =mysqli_fetch_assoc($saving)) {
        $array_datapaket [$rows ['id_paket'] ] = $rows['harga_paket'];
    }*/

    //action get mapel
    if(isset($_GET['action']) && $_GET['action'] == "getprice") {
     $id_paket = $_GET['id_paket'];
     
     //ambil data paket
     $query = "SELECT j.kd_mapel, c.mapel 
               FROM jadwalharian j JOIN mapel c ON c.kd_mapel=j.kd_mapel
               WHERE j.kd_kelas='$kd_kelas' and j.nip='$_SESSION[username]' ORDER BY c.mapel";

     $sql = mysqli_query($con,$query);
     $arrmap = array();
     while ($row = mysqli_fetch_assoc($sql)) {
         array_push($arrmap, $row);
     }
         echo json_encode($arrmap);
    exit;
    }

?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.tambah').click(function() {
            $('.tambah-content').slideToggle();
        });

        $('#kelas').change(function(){
            $.getJSON('man_datamenu.php',{action:'getprice', kd_kelas:$(this).val()}, function(json){
                $('#mapel').html('');
                    $.each(json, function(index, row) {
                        $('#mapel').append('<option value='+row.kd_mapel+'>'+row.mapel+'</option>');
                    });
            });
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

        var validator = $("#tambah_menu").submit(function() {
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
            <h1 class="page-header">Manajemen Data Menu </h1>                 
        </div>               
    </div>                
    <div class="col-lg-12">
    	<button class="btn btn-small btn-success tambah">Tambah Menu</button> 
    	<div class="tambah-content" style="display:none;">
            <div class="panel-body" style="width:80%;">

    		 <form role="form" action="proses.php?act=tambah_menu" method="post" id="tambah_menu" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                        <div style="margin-bottom:10px;">
                        <select name="id_paket" class="form-control">
                            <option value="">- Pilih Paket -</option>
                            <?php
                                $get_datakatemu = mysqli_query($konek,"SELECT * FROM paket");
                                while ($data = mysqli_fetch_array($get_datakatemu)) {
                                  $select =($data['id_paket']==$id_paket)? 'select="selected"': '';
                                    echo "<option value='".$data['id_paket']."'$selected>".$data['nama_paket']."</option>";
                                }

                            ?>
                        </select>
                        </div>
                        <select name='id_paket' class="form-control">
                            <option value=''></option>
                            <?php
                                foreach ($array_datapaket as $id_paket => $harga_paket) {
                              
                                }

                            ?>
                        </select>
                        <!-- <input class="form-control" placeholder="harga menu" name="harga_menu" type="text" autofocus required> -->
                    </div>
                    <div class="form-group">
                    
                        <label>Menu</label>
                        <textarea name="nama_menu" placeholder="menu" cols="20" rows="7"  class="form-control" required></textarea>
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
                    <th>Menu</th>
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
                        <td><?php echo $result['keterangan_menunya'];?></td>
                        <td>
                            <a href="<?php echo "homeadmin.php?modul=man_menuedit&id=$result[id_menu]"?>">
                                <i class="fa fa-edit"></i> Edit
                            </a> | 
                            <a href="<?php echo "proses.php?act=hapus_manmenu&id=$result[id_menu]";?>" onclick="return confirm('Anda ingin menghapus ?');">
                                <i class="fa fa-close"></i> Delete
                            </a> 
                        </td>
                    </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>                
</div>                