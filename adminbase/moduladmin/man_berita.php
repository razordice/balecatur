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

     var validator = $("#add-news").submit(function() {
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
      <div class="font-sizerheading">
        <h1 class="page-header">Manajemen Berita</h1>                
      </div>                
    </div>                
   	<div class="col-lg-12">
      <button class="btn btn-small btn-success tambah">Tambah Berita</button> 
      <div class="tambah-content" style="display:none;">
        <div class="panel-body" style="width:80%;">
          <form role="form" action="proses.php?act=addBerita" method="post" id="add-news" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="Judul Berita" name="judul_berita" type="text" autofocus required>
                </div>
                <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea name="isi_berita" placeholder="Isi Berita" cols="20" rows="7"  class="form-control" required></textarea>
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
   					<th>Waktu Posting</th>
            <th>Judul Berita</th>
   					<th>Isi Berita</th>
   					<th>Action</th>
   				</tr>
   			</thead>
   			<tbody>
   				<?php
           
    			   $no=1;
   					 $query = mysqli_query($konek,"select * from berita");
					   while ($result = mysqli_fetch_array($query)) { ?>

					<tr>
            <td><?php echo $no;?></td>
            <td><?php echo $result['waktu'];?></td>
						<td><?php echo $result['isi_berita'];?></td>
						<td><?php echo $result['judul_berita'];?></td>
						<td>
							<a href="<?php echo "homeadmin.php?modul=man_berita_edit&id=$result[id_berita]"?>"><i class="fa fa-edit"></i> Edit</a> | 
							<a href="<?php echo "proses.php?act=hapusberita&id=$result[id_berita]";?>" onclick="return confirm('Anda yakin menghapus ?');">
							   <i class="fa fa-close"></i> Delete
							</a> 
						</td>
					</tr>
				<?php $no++; } ?>
   			</tbody>
   		</table>
   	</div>              
</div>                