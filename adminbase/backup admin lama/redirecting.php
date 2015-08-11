<?php

	include '../config/koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function redirect() {
			self.location.href="<?php echo $site ?>adminbase/";
		}
	</script>
</head>
<body onload="setTimeout('redirect()', 1000);">
</body>
</html>

