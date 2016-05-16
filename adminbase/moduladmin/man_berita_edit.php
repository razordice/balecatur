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
      
            var validator = $("#edit-berita").submit(function() {
                tinyMCE.triggerSave();
             }).validate({ 
                ignore: "",
                messages: {
                    judul_berita: "Kolom judul berita tidak boleh kosong!",
                    isi_berita: "Kolom isi berita tidak boleh kosong!"
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
        <h1 class="page-header">Manajemen Edit Berita</h1>                
    </div>                
  	<div class="col-lg-12">
<?php 

    $aksi="proses.php";
    
    $edit=mysqli_query($konek,"select * from berita where id_berita='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
echo "
    <form method=POST enctype='multipart/form-data' id='edit-berita' action='$aksi?modul=man_berita_edit&act=updateBerita'>
      <input type=hidden name=id value='$r[id_berita]'>
        <table>
          <tr>
            <td>Judul Berita </td>
          	<td>:</td>
          	<td> <input type=text name='judul_berita' class='form-control' required value='$r[judul_berita]'></td>
      	  </tr>
          <tr>
            <td>Isi Berita </td>
            <td>:</td>
            <td><textarea name='isi_berita' class='form-control' required>$r[isi_berita]</textarea></td>
          </tr>
      	  <tr></tr>
          <tr>
            <td colspan=2>
            <input type=submit value=Update class='btn btn-small btn-success'>
            <input type=button value=Batal class='btn btn-small' onclick=self.history.back()>
            </td>
          </tr>
        </table></form>";
?>

	</div>
</div>