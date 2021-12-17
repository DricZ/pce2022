<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'link';
if (!isset($_SESSION['nrpAdmin'])) {
	header("Location: index.php");
}
include 'header.php';
?>
<!DOCTYPE html>
<script>
	$(document).ready(function() {
		$('#jadwalTable').DataTable();
	});
</script>
<div class="container" style="color: #412c27;">
	<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
			<div align="center">
				<h2 style="font-weight: bold;">Daftar Kode Google Meet Wawancara</h2>
				<h3>(click on code to open)</h3>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 20px;overflow-x: auto;">
		<div class="col-12">
			<table class="table table-hovered table-striped" id="jadwalTable" style="color: #412c27;">
				<thead>
					<tr style="font-weight: bold; text-align: center;">
						<td>#</td>
						<td>Jabatan</td>
						<td>Pewawancara</td>
						<td>Kode Google Meet Wawancara</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = "SELECT * FROM pewawancara WHERE link IS NOT NULL";
					$jalan = mysqli_query($conn, $query);
					$num = 1;
					while ($row = mysqli_fetch_array($jalan)) {
						echo '
						<tr style="text-align: center;">
							<td scope="row">' . $num . '</td>
							<td scope="row">' . $row['divisi'] . '</td>
							<td scope="row">' . $row['nama'] . '</td>
							<td scope="row"><a href="https://meet.google.com/lookup/' . $row['link'] . '" style="color: blue; text-decoration: none; font-weight: bold;" target="_blank">' . $row['link'] . '</a></td>
						</tr>';
						$num = $num + 1;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>