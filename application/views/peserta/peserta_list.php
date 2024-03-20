<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA PESERTA</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('peserta/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('peserta/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('peserta'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Identitas</th>
		<th>Nama</th>
		<th>Gender</th>
		<th>Tempat Lahir</th>
		<th>Tgl Lahir</th>
		<th>Provinsi</th>
		<th>Kota Kab</th>
		<th>Perguruan</th>
		<th>Tipe Partisipasi</th>
		<th>Foto</th>
		<th>Action</th>
            </tr><?php
            foreach ($peserta_data as $peserta)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $peserta->no_identitas ?></td>
			<td><?php echo $peserta->nama ?></td>
			<td><?php echo $peserta->gender ?></td>
			<td><?php echo $peserta->tempat_lahir ?></td>
			<td><?php echo $peserta->tgl_lahir ?></td>
			<td><?php echo $peserta->provinsi ?></td>
			<td><?php echo $peserta->kota_kab ?></td>
			<td><?php echo $peserta->perguruan ?></td>
			<td><?php echo $peserta->tipe_partisipasi ?></td>
			<td><?php echo $peserta->foto ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('peserta/read/'.$peserta->id),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('peserta/update/'.$peserta->id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('peserta/delete/'.$peserta->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>