<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA FIRSTENTRIES_ATLIT</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Kategori</th>
                                    <th>Kelas</th>
                                    <th>Kategori</th>
                                    <th>Gender</th>
                                    <th>Jumlah Peserta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($firstentries_atlit_data as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->id_kategori; ?></td>
                                        <td><?php echo $row->kelas; ?></td>
                                        <td><?php echo $row->kategori; ?></td>
                                        <td><?php echo $row->gender; ?></td>
                                        <td><?php echo $row->jumlah_peserta; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

    </section>
</div>