<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA FIRSTENTRIES_ATLIT_PESERTA</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Id Kategori <?php echo form_error('id_kategori') ?></td><td><input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Jumlah Peserta <?php echo form_error('jumlah_peserta') ?></td><td><input type="text" class="form-control" name="jumlah_peserta" id="jumlah_peserta" placeholder="Jumlah Peserta" value="<?php echo $jumlah_peserta; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('firstentries_atlit_peserta') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>