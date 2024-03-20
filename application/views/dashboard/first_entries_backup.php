<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Team Official</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <th></th>
                                <th>Laki - Laki</th>
                                <th>Perempuan</th>
                            </tr>
                            <?php
                            foreach ($firstentries_teamoff_data as $firstentries_teamoff) {
                            ?><tr>
                                    <td><?php echo $firstentries_teamoff->tipe ?></td>
                                    <td><?php echo $firstentries_teamoff->laki_laki ?></td>
                                    <td><?php echo $firstentries_teamoff->perempuan ?></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </table>
                        <hr>
                        <a href="<?= site_url('firstentries_teamoff') ?>" class="btn btn-block btn-info">Detail</a>
                    </div><!-- /.box-body -->
                </div>
            </div>
            <div class="col-xs-6">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Atlit</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <th></th>
                                <th>Laki - Laki</th>
                                <th>Perempuan</th>
                            </tr>
                            <tr>
                                <td>Cadet</td>
                                <td><?= $firstentries_atlit_cadet_laki ?></td>
                                <td><?= $firstentries_atlit_cadet_perempuan ?></td>
                            </tr>
                            <tr>
                                <td>Junior</td>
                                <td><?= $firstentries_atlit_cadet_laki ?></td>
                                <td><?= $firstentries_atlit_cadet_perempuan ?></td>
                            </tr>
                            <tr>
                                <td>Under 21</td>
                                <td><?= $firstentries_atlit_cadet_laki ?></td>
                                <td><?= $firstentries_atlit_cadet_perempuan ?></td>
                            </tr>
                            <tr>
                                <td>Senior</td>
                                <td><?= $firstentries_atlit_cadet_laki ?></td>
                                <td><?= $firstentries_atlit_cadet_perempuan ?></td>
                            </tr>

                        </table>
                        <a href="<?= site_url('firstentries_atlit') ?>" class="btn btn-block btn-info">Detail</a>
                    </div><!-- /.box-body -->
                </div>

            </div>
        </div>



    </section>
</div>