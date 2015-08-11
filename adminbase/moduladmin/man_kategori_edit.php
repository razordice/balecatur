<script type="text/javascript">
    $(document).ready(function() {
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
      
            var validator = $("#edit-kategori").submit(function() {
                tinyMCE.triggerSave();
             }).validate({ 
                ignore: "",
                messages: {
                    type_kamar: "Kolom type kamar tidak boleh kosong!",
                    tarif: "Kolom tarif kamar tidak boleh kosong!",
                    jumlah_kamar: "Kolom jumlah kamar tidak boleh kosong!",
                    fasilitas: "Kolom fasilitas kamar tidak boleh kosong!"
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
<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Manajemen Edit Kategori</h1>                
    </div>                
  	<div class="col-lg-12">
<?php 
$aksi="proses.php";

    $edit=mysqli_query($konek,"select * from kategori_kamar where id_kategori_kamar='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
echo "
<img src='$site"."image/kamar/$r[foto_kamar]' width='100' height='100'>

<form method=POST enctype='multipart/form-data' id='edit-kategori' action='$aksi?modul=man_kategori_edit&act=updateKategori'>
          <input type=hidden name=foto_lama value='$r[foto_kamar]'>
          <input type=hidden name=id value='$r[id_kategori_kamar]'>
          <table>
          <tr>
            <td>Type Kamar </td>
          	<td>:</td>
          	<td> <input type=text name='type_kamar' class='form-control' required value='$r[type_kamar]'></td>
      	  </tr>
          <tr>
            <td>Jumlah Kamar</td>
            <td>:</td>
            <td> <input type=text name='jumlah_kamar' class='form-control' required value='$r[jumlah_kamar]'></td>
          </tr>
          <tr>
            <td>Tarif Kamar </td>
            <td>:</td>
            <td> <input type=text name='tarif' class='form-control' value='$r[tarif]' required></td>
          </tr>
          <tr>
            <td>Fasilitas Kamar </td>
            <td>:</td>
            <td> <textarea name='fasilitas' class='form-control' required>$r[fasilitas]</textarea></td>
          </tr>
          <tr>
            <td>Foto </td>
            <td>: </td>
            <td> <input type=file name='foto' class='form-control'></td>
          </tr>
      	  <tr></tr>
          <tr><td colspan=2><input type=submit value=Update class='btn btn-small btn-success'>
                            <input type=button value=Batal class='btn btn-small' onclick=self.history.back()></td></tr>
          </table></form>";
?>

	</div>
</div>