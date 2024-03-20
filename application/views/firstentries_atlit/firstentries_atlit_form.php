<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA FIRSTENTRIES_ATLIT</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Kelas <?php echo form_error('kelas') ?></td><td><input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kategori <?php echo form_error('kategori') ?></td><td><input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Peserta <?php echo form_error('peserta') ?></td><td><input type="text" class="form-control" name="peserta" id="peserta" placeholder="Peserta" value="<?php echo $peserta; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Gender <?php echo form_error('gender') ?></td><td><input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" value="<?php echo $gender; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('firstentries_atlit') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>