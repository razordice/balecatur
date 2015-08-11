<!DOCTYPE html>
<html lang="eng">
<head>
<!-- include flder css-->  
<link href="css/guestbook.css" type="text/css" rel="stylesheet">
<!-- jquery validate -->
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="js/jquery.validate.pack.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
    $("#datadiri").validate({
      messages: {
        email: {
          required: "E-mail harus diisi",
          email: "Email tidak valid"
        }
      },
    errorPlacement: function(error,element){
      error.appendTo(element.parent("td"));
    }
  });
})
</script>
</head>  
<body>
  <div id="content">
    <h1>GUEST BOOK</h1>
        <p class="style">Silahkan lengkapi form buku tamu dibawah ini: </p>
            <form action="bukutamu_proses.php" method="post" id="datadiri">
              <table>
                  <tr>
                      <td>Nama Lengkap</td>
                      <td>
                          <input type="text"  name="nama" class="required" title="Nama lengkap harus diisi" placeholder="Nama lengkap"/>
                      </td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>
                          <input type="text" name="email" id="email" class="required email" placeholder="example@gmail.com"/>
                      </td>
                  </tr>
                  <tr>
                      <td>Komentar</td>
                      <td>
                          <textarea name="komentar" class="required" title="komentar harus diisi" placeholder="Isikan komentar anda disini"/></textarea>
                      </td>
                  </tr>
              </table>

           <p class="ketentuan">*Ketentuan memberi komentar pada buku tamu :<br> 1. Perhatikan form yang di contohkan <br> 2. Cek kembali data yang anda masukan 
              <br>3. Jika hasil data yg dimasukkan tidak valid maka sistem akan otomatis memvalidasi data yg dimasukan. <br> 4. Berikan komentar anda demi meningkatkan mutu pelayanan kami</p>

            <input type="submit" name="kirim" value="Kirim Komentar!" class="submitbtn"/>
        </form>
    </div>
</body>
</html>
<!--- html 5 sample 
            <label>Nama Depan : </label>
                <input type="text" name="nama_depan" class="required" title="Nama depan harus diisi"/>
            <label>Nama Belakang : </label>
                <input type="text" name="nama_belakang" class="required" title="Nama belakang harus diisi"/>
            <label>Email :</label>
                <input type="text" name="email" class="required" title="Email Harus Valid"/>  
            <label>Contact :</label>
                <input type="text" name="contact" class="required" title="Contact maximal 12 karakter"/>
            <label>Alamat :</label>
                <textarea name="alamat" class="required" title="Alamat Harus diisi lengkap dan berisi data yang valid"/></textarea>-->