<?php
 
	include "config/koneksi.php";

?>
<div class="cnt-reserve">
	<div class="post-rulefontreserve">
		<h1 class="fnt-style">TESTIMONIAL HOTEL BALECATUR INN</h1>
		<hr width="389"></hr>
		<div class="heading-breadcumb">
			<ul>
				<li>Home >> Testimonial</li>
			</ul>
		</div>
	<div class="wrapper-testimoni">
		<div class="inner-containertesti">
			<div class="tgl-headertesti">
				<ul>
					<li><b>Tanggal Posting : 29 Oktober 2015</b></li>
					<li><b>Email : xxxxxx@gmail.com</b></li>
				</ul>
				<article>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
					standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
					a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
					remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
					Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</article>
			</div>
		</div>
	</div>

	<form action="<?php echo $site;?>modulpage/proses/reservation-proses.php" method="post" enctype="multipartformdata">
		<table>
			<tr>
				<td><input type="text" name="emailtesti" class="form-box box-input" placeholder="Email" required></td>
			</tr>
			<tr>
				<td><input type="text" name="namatesti" class="form-box box-input" placeholder="Nama Lengkap" required></td>
			</tr>
			<tr>
				<td><textarea style="width: 172%; height: 200px; border-radius:3px;" cols="8" rows="6" required></textarea></td>
			</tr>
		</table>		
		<input type="submit" class="btn btn-reserve" value="Kirim Testimonial">
	</form>

	</div>
</div>