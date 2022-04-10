<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 table-responsive">
                        <table class="table border-0 ">
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
                        </table>
                    </div>
                    
                </div>
            </div>            
            <div class="card-body table-responsive">
                <h4 class="card-title mb-4">Status : <?php   
                                        if($data->status == "Konfirmasi"){
                                            echo "<span style='color:green'>".$data->status."</span>"; 
                                        }else{
                                            echo "<span style='color:red'>".$data->status."</span>";
                                        }
                                    ?></h4>
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>No. SIM</th>
                        <th>Warna Kendaraan</th>
                        <th>Tahun</th>
                        <th>No. Rangka</th>
                        <th>Kerusakan</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $data->no_sim ?></td>
                            <td><?php echo $data->warna_kendaraan ?></td>
                            <td><?php echo $data->tahun ?></td>
                            <td><?php echo $data->no_rangka ?></td>
                            <td><?php echo $data->kerusakan ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-2 ml-auto text-right ">
                        <button type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-edit-data-order">Edit <i class="fa fa-edit"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============ MODAL EDIT =============== -->
<div class="modal fade" id="modal-edit-data-order" tabindex="-1" role="dialog" aria-labelledby="modal-edit-data-order-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-edit-data-order" action="<?php echo base_url('admin/Rekap_data/edit');?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-edit-data-order-label">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_tertanggung" style="font-weight:bold">Nama Tertanggung : </label>
                        <input type="hidden" name="id" value="<?php echo $data->id ?>">
                        <input type="text" name="nama_tertanggung" id="nama_tertanggung" value="<?php echo $data->nama_tertanggung ?>" class="form-control"/>
                    </div>                 
                    <div class="form-group">
                        <label for="no_hp" style="font-weight:bold">No. Hp : </label>
                        <input type="tel" name="no_hp" id="no_hp" value="<?php echo $data->no_hp ?>" class="form-control" placeholder="Masukan Nomor Handphone"/>
                    </div>
                    <div class="form-group">
                        <label for="no_polisi" style="font-weight:bold">No. Polisi : </label>
                        <input type="text" name="no_polisi" id="no_polisi" value="<?php echo $data->no_polisi ?>" class="form-control" placeholder="Masukan Nomor Polisi" />
                    </div> 
                    <div class="form-group">
                        <label for="merk_kendaraan" style="font-weight:bold">Merk Kendaraan : </label>
                        <input type="text" name="merk_kendaraan" id="merk_kendaraan" value="<?php echo $data->merk_kendaraan ?>" class="form-control" placeholder="Masukan Merek Kendaraan" />
                    </div>    
                    <div class="form-group">
                        <label for="status" style="font-weight:bold">Status</label>
                        <select name="status" class="form-control"  required>
                            <?php if($data->status == "Tolak"){?>
                                <option value="Belum Konfirmasi">Belum Konfirmasi</option>
                                <option value="Konfirmasi">Konfirmasi</option>
                                <option value="Tolak" selected>Tolak</option>
                            <?php }
                                else if($data->status == "Konfirmasi"){?>
                                    <option value="Belum Konfirmasi" >Belum Konfirmasi</option>
                                    <option value="Konfirmasi" selected>Konfirmasi</option>
                                    <option value="Tolak">Tolak</option>
                            <?php } else{?>
                                <option value="Belum Konfirmasi" selected>Belum Konfirmasi</option>
                                <option value="Konfirmasi">Konfirmasi</option>
                                <option value="Tolak">Tolak</option>
                            <?php }?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="no_sim" style="font-weight:bold">No. SIM : </label>
                        <input type="text" name="no_sim" id="no_sim" value="<?php echo $data->no_sim ?>" class="form-control" placeholder="Masukan Nomor SIM"/>
                    </div>
                    <div class="form-group">
                        <label for="warna" style="font-weight:bold">Warna Kendaraan : </label>
                        <input type="text" name="warna" id="warna" value="<?php echo $data->warna_kendaraan ?>" class="form-control" placeholder="Masukan Warna Kendaraan" />
                    </div>
                    <div class="form-group">
                        <label for="Tahun" style="font-weight:bold">Tahun : </label>
                        <input type="number" name="tahun" id="tahun" value="<?php echo $data->tahun ?>" class="form-control" placeholder="Masukan Tahun" />
                    </div>
                    <div class="form-group">
                        <label for="no_rangka" style="font-weight:bold">No. Rangka : </label>
                        <input type="text" name="no_rangka" id="no_rangka" value="<?php echo $data->no_rangka?>" class="form-control" placeholder="Masukan Nomor Rangka"/>
                    </div> 
                    <div class="form-group">
                        <label for="kerusakan" style="font-weight:bold">Kerusakan : </label>
                        <input type="text" name="kerusakan" id="kerusakan" value="<?php echo $data->kerusakan?>" class="form-control" placeholder="Masukan Kerusakan"/>
                    </div>  
                    <div class="form-group">
                        <label for="biaya" style="font-weight:bold">biaya : </label>
                        <input type="number" name="biaya" id="biaya" value="<?php echo $data->biaya?>" class="form-control" placeholder="Masukan Biaya Kerusakan"/>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
