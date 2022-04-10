<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title float-left">Rekap Data Customer</h4>
                <div class="d-inline ml-auto float-right">
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal1"><i class="fa fa-plus"></i> Tambah Rekap Data</a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped" id="mydata">
                    <thead>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach($data_rekap as $j => $l): ?>
                            <tr>
                                <td><?php echo ($j+1) ?></td>
                                <td><?php echo $l->nama_tertanggung ?></td>
                                <td>
                                    <?php   
                                        if($l->status == "Konfirmasi"){
                                            echo "<span style='color:green;font-weight:bold'>".$l->status."</span>"; 
                                        }else if($l->status == "Belum Konfirmasi"){
                                            echo "<span style='font-weight:bold'>".$l->status."</span>"; 
                                        }else if($l->status == "Tolak"){
                                            echo "<span style='color:red;font-weight:bold'>".$l->status."</span>"; 
                                        }
                                        else{
                                            echo "<span style='font-weight:bold'>Belum Konfirmasi</span>";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('admin/Rekap_data/detail/' . $l->id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Detail</a>
                                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/Rekap_data/hapus/' . $l->id) ?>">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div style="margin-left:17px">
                <?php echo $cek?>
            </div>
        </div>
    </div>
</div>


<!-- Rekap Data -->
<!-- ============ MODAL ADD =============== -->
<div class="modal fade" id="largeModal1" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="<?php echo base_url().'admin/Rekap_data/tambah_data'?>">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Tambah Rekap Data</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_tertanggung">Nama Tertanggung : </label>
                        <input type="text" name="nama_tertanggung" id="nama_tertanggung" value="" class="form-control"/>
                    </div>                 
                    <div class="form-group">
                        <label for="no_hp">No. Hp : </label>
                        <input type="tel" name="no_hp" id="no_hp" value="" class="form-control" placeholder="Masukan Nomor Handphone"/>
                    </div>
                    <div class="form-group">
                        <label for="no_sim">No. SIM : </label>
                        <input type="text" name="no_sim" id="no_sim" value="" class="form-control" placeholder="Masukan Nomor SIM"/>
                    </div>
                    <div class="form-group">
                        <label for="no_polisi">No. Polisi : </label>
                        <input type="text" name="no_polisi" id="no_polisi" value="" class="form-control" placeholder="Masukan Nomor Polisi" />
                    </div> 
                    <div class="form-group">
                        <label for="merk_kendaraan">Merk Kendaraan : </label>
                        <input type="text" name="merk_kendaraan" id="merk_kendaraan" value="" class="form-control" placeholder="Masukan Merek Kendaraan" />
                    </div>
                    
                    <div class="form-group">
                        <label for="warna">Warna Kendaraan : </label>
                        <input type="text" name="warna" id="warna" value="" class="form-control" placeholder="Masukan Warna Kendaraan" />
                    </div>
                    <div class="form-group">
                        <label for="Tahun">Tahun : </label>
                        <input type="number" name="tahun" id="tahun" value="" class="form-control" placeholder="Masukan Tahun" />
                    </div>
                    <div class="form-group">
                        <label for="no_rangka">No. Rangka : </label>
                        <input type="text" name="no_rangka" id="no_rangka" value="" class="form-control" placeholder="Masukan Nomor Rangka"/>
                    </div> 
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" >Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>  