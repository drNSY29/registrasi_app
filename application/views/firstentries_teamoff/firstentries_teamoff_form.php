<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA FIRSTENTRIES_TEAMOFF</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tipe <?php echo form_error('tipe') ?></td><td><input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe" value="<?php echo $tipe; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Laki Laki <?php echo form_error('laki_laki') ?></td><td><input type="text" class="form-control" name="laki_laki" id="laki_laki" placeholder="Laki Laki" value="<?php echo $laki_laki; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Perempuan <?php echo form_error('perempuan') ?></td><td><input type="text" class="form-control" name="perempuan" id="perempuan" placeholder="Perempuan" value="<?php echo $perempuan; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('firstentries_teamoff') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>