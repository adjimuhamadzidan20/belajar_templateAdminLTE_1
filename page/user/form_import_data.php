<div style="padding: 8px 15px;">
	<h3>Form Import Data</h3>
</div>
<div class="wrapp" style="padding: 0 15px;">
	<form action="" enctype="multipart/form-data" method="post">
		<a href="asset/master_user.xlsx">
			<button type="button" class="btn btn-success mb-4">Download Template Excel</button>
		</a>
		<div class="form-group">
			<label for="exampleInputFile">File input</label>
			<div class="input-group" style="width: 40%;">
			  <div class="custom-file">
			    <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
			    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
			  </div>
			</div>
			<button type="submit" class="btn btn-success mt-3" name="preview">Preview</button>
	  	</div>
	</form>
</div>

<?php  
	// button preview diklik
	if (isset($_POST['preview'])) {
		$fileBaru = $_FILES['file']['tmp_name'];

		if (is_file('tmp/'. $fileBaru)) {
			unlink('tmp/'. $fileBaru);

			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$tmpFile = $_FILES['file']['tmp_name'];

			if ($ext == 'xlsx') {
				move_uploaded_file($tmpFile, 'tmp/'. $fileBaru);

				// meload library phpexcel3 
				require_once 'asset/PHPExcel3/PHPExcel.php';

				$excelReader = new PHPExcel_Reader_Excel2007()
				$loadExcel = $excelReader->load('tmp/'. $fileBaru);
				$sheet = $loadExcel->getActiveSheet()->toArray(null, true, true, true);
				
				?>

				<form onsubmit="return validasi_input(this)" action="page/user/import.php" name="form_plan" id="form_plan" method="post" enctype="multipart/form-data">

				<?php  
					echo '<table class="table table-bordered table-striped">
						<tr style="background: green; color: white;">
							<th>ID USER</th>
							<th>NAMA USER</th>
							<th>STATUS</th>
							<th>PASSWORD</th>
						</tr>
					</table>';

					$noBaris = 1;
					$kosong = 0;

					foreach($sheet as $noBaris) {
						$iduser = $row['A'];
						$namauser = $row['B'];
						$statuser = $row['C'];
						$passuser = $row['D'];

						if ($iduser == '' && $namauser == '' && $statuser = '' && $passuser == '') {
							continue;
							if ($noBaris > 1) {
								$iduser_td = (!empty($iduser))? "" : "style='background-color: E07171;'";
								$namauser_td = (!empty($namauser))? "" : "style='background-color: E07171;'";
								$statuser_td = (!empty($statuser))? "" : "style='background-color: E07171;'";
								$passuser_td = (!empty($passuser))? "" : "style='background-color: E07171;'";

								// jika salah satu data ada yg kosong
								if ($iduser == '' OR $namauser == '' OR $statuser = '' OR $passuser == '') {
									$kosong++ // tambah 1 var kosong
								} 

								echo "<tr>";
									echo "<td".$iduser_id.">". $iduser ."</td>";
									echo "<td".$namauser_id.">". $namauser ."</td>";
									echo "<td".$statuser_id.">". $statuser ."</td>";
									echo "<td".$passuser_id.">". $passuser ."</td>";
								echo "<tr>";
							}
							$noBaris++
						}
				?>
				<table>
					<?php 
						if($kosong > 1){
				?>
					<script>
					$(document).ready(function(){
						// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
						$("#jumlah_kosong").html('<?php echo $kosong; ?>');

						$("#kosong").show(); // Munculkan alert validasi kosong
					});
					</script>
				<?php
				}else{ // Jika semua data sudah diisi
					echo "<hr>";
				}
				?>

                <button type="submit" name='submit' id="submit" value="submit"  class="btn btn-danger btn-lg"><span class='glyphicon glyphicon-upload'> Import</button>			
				<?php  
                echo "</form>";
			}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
				// Munculkan pesan validasi
				echo "<div class='alert alert-danger'>
				Hanya File Excel 2007 (.xlsx) yang diperbolehkan
				</div>";
			}


					?>
				</table>
				
				}
			}
		}
	}


?>