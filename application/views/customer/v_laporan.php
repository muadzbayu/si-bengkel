<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 table-responsive">
                        <table class="table border-0">
                            <tr>
                                <th class="border-0 py-0">Nama Tertanggung</th>
                                <th class="border-0 py-0">:</th>
                                <th class="border-0 py-0"><?php echo $data->nama_tertanggung ?></th>
                            </tr>
                            <tr>
                                <th class="border-0 py-0">No. Hp</th>
                                <th class="border-0 py-0">:</th>
                                <th class="border-0 py-0"><?php echo $data->no_hp ?></th>
                            </tr>
                            <tr>
                                <th class="border-0 py-0">No. Polisi</th>
                                <th class="border-0 py-0">:</th>
                                <th class="border-0 py-0"><?php echo $data->no_polisi ?></th>
                            </tr>
                            <tr>
                                <th class="border-0 py-0">Merek Kendaraan</th>
                                <th class="border-0 py-0">:</th>
                                <th class="border-0 py-0"><?php echo $data->merk_kendaraan ?></th>
                            </tr>
                            <tr>
                                <th class="border-0 py-0">Kerusakan</th>
                                <th class="border-0 py-0">:</th>
                                <th class="border-0 py-0"><?php echo $data->kerusakan ?></th>
                            </tr>
                            <tr>
                                <th class="border-0 py-0">Status Konfirmasi</th>
                                <th class="border-0 py-0">:</th>
                                <th class="border-0 py-0"><?php echo $data->status ?></th>
                            </tr>
                            <tr>
                                <th class="border-0 py-0">Biaya</th>
                                <th class="border-0 py-0">:</th>
                                <th class="border-0 py-0"><?php echo "Rp. ".number_format($data->biaya) ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
