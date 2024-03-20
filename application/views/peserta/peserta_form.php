<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PESERTA</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>No Identitas <?php echo form_error('no_identitas') ?></td><td><input type="text" class="form-control" name="no_identitas" id="no_identitas" placeholder="No Identitas" value="<?php echo $no_identitas; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama <?php echo form_error('nama') ?></td><td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Gender <?php echo form_error('gender') ?></td><td><input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" value="<?php echo $gender; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tempat Lahir <?php echo form_error('tempat_lahir') ?></td><td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Lahir <?php echo form_error('tgl_lahir') ?></td>
						<td><input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Provinsi <?php echo form_error('provinsi') ?></td><td><input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kota Kab <?php echo form_error('kota_kab') ?></td><td><input type="text" class="form-control" name="kota_kab" id="kota_kab" placeholder="Kota Kab" value="<?php echo $kota_kab; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Perguruan <?php echo form_error('perguruan') ?></td><td><input type="text" class="form-control" name="perguruan" id="perguruan" placeholder="Perguruan" value="<?php echo $perguruan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tipe Partisipasi <?php echo form_error('tipe_partisipasi') ?></td><td><input type="text" class="form-control" name="tipe_partisipasi" id="tipe_partisipasi" placeholder="Tipe Partisipasi" value="<?php echo $tipe_partisipasi; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Foto <?php echo form_error('foto') ?></td>
						<td> <textarea class="form-control" rows="3" name="foto" id="foto" placeholder="Foto"><?php echo $foto; ?></textarea></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('peserta') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>