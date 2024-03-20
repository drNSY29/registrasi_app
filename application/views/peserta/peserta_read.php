
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PESERTA</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>No Identitas</td>
				<td><?php echo $no_identitas; ?></td>
			</tr>
	
			<tr>
				<td>Nama</td>
				<td><?php echo $nama; ?></td>
			</tr>
	
			<tr>
				<td>Gender</td>
				<td><?php echo $gender; ?></td>
			</tr>
	
			<tr>
				<td>Tempat Lahir</td>
				<td><?php echo $tempat_lahir; ?></td>
			</tr>
	
			<tr>
				<td>Tgl Lahir</td>
				<td><?php echo $tgl_lahir; ?></td>
			</tr>
	
			<tr>
				<td>Provinsi</td>
				<td><?php echo $provinsi; ?></td>
			</tr>
	
			<tr>
				<td>Kota Kab</td>
				<td><?php echo $kota_kab; ?></td>
			</tr>
	
			<tr>
				<td>Perguruan</td>
				<td><?php echo $perguruan; ?></td>
			</tr>
	
			<tr>
				<td>Tipe Partisipasi</td>
				<td><?php echo $tipe_partisipasi; ?></td>
			</tr>
	
			<tr>
				<td>Foto</td>
				<td><?php echo $foto; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('peserta') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>