<div class="row">
    <div class="col-lg-12">   
      <div class="font-sizerheading">
        <h1 class="page-header">Manajemen Edit Member</h1>                
      </div>             
    </div>                
  	<div class="col-lg-12">

<?php 

    $aksi="proses.php";

    $edit =mysqli_query($konek,"select * from member where id_member='$_GET[id]'");
    $r    =mysqli_fetch_array($edit);
        
echo "<form method=POST action=$aksi?modul=man_user_edit&act=updateUser>
        <input type=hidden name=id value='$r[id_member]'>
        <div class='wrapp-manmember'>
          <div class='container-manmember'>
            <div class='wrapp-fotomember'>
                <div class='box-fotomember'>
                  <div class='bingkai-member'>
                    <a href='".$site."image/user/$r[foto]' data-lightbox='$r[foto]'>
                      <img class='resizer-foto' src='".$site."image/user/$r[foto]'>
                    </a>
                  </div>
                  <label> Foto Member  </label>
                </div>
            </div>

            <fieldset>
               <div class='form-group'>
                Nama Member : $r[nama_lengkap]
              </div>
               <div class='form-group'>
                Email Member : $r[email]
              </div>
              <div>
                Jenis Kelamin : $r[jenis_kelamin]
              </div>
               <div class='form-group'>
                Tlp Member : $r[no_telp]
              </div>
               <div class='form-group'>
                <td>Alamat Member : $r[alamat]
              </div>
               <div class='form-group'>
               
                <label>Foto Identitas : </label>
                <div>
                  <a href='".$site."image/identitas/$r[foto_identitas]' data-lightbox='$r[foto_identitas]'>
                    <img src='".$site."image/identitas/$r[foto_identitas]' width='70' height='50'>
                  </a>
                </div>
              </div>
            </fieldset>
          </div>
          <input type=button value='Kembali' class='btn btn-small' onclick='self.history.back()'>
      </form>";
?>

        </div>
  </div>
</div>