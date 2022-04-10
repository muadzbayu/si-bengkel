<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title float-left">Data Customer</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped" id="mydata">
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>No. HP</th>
                        <th>Merek Kendaraan</th>
                        <th>Aksi</th>
                    </tr>
                <?php foreach($data as $i => $k): ?>
                    <tr class="header expand">
                        <td><?php echo ($i+1) ?></td>
                        <td><?php echo $k->nama_tertanggung ?></td>
                        <td><?php echo $k->no_hp ?></td>
                        <td><?php echo $k->merk_kendaraan ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm sign" href="#" >
                                Detail
                            </a>
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url('admin/Rekap_data/tambah_instant/' . $k->id_customer) ?>" >
                                Rekap Data
                            </a>
                            <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/Rekap_data/hapus_data/' . $k->id_customer) ?>" >
                                    Hapus
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=5>
                            <table class="table table-striped">
                                <thead>
                                        <th>Alamat</th>
                                        <th>No SIM</th>
                                        <th>No Rangka</th>
                                        <th>Warna</th>
                                        <th>Tahun</th>
                                        <th>No Polisi</th>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td><?php echo $k->alamat ?></td>  
                                    <td><?php echo $k->no_sim ?></td>  
                                    <td><?php echo $k->no_rangka ?></td>  
                                    <td><?php echo $k->warna ?></td>  
                                    <td><?php echo $k->tahun ?></td>  
                                    <td><?php echo $k->no_polisi ?></td>                                    
                                </tr>  
                                </tbody>
                                
                            </table>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>