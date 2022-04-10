<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title float-left">Cetak SPK</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Nama Tertanggung</th>
                        <th>No. Polisi</th>
                        <th>Merek Kendaraan</th>
                        <th>Kerusakan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach($data->result() as $i => $k): ?>
                            <tr>
                                <td><?php echo ($i+1) ?></td>
                                <td><?php echo $k->nama_tertanggung ?></td>
                                <td><?php echo $k->no_polisi ?></td>
                                <td><?php echo $k->merk_kendaraan ?></td>
                                <td><?php echo $k->kerusakan ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" target="_blank" href="<?php echo base_url('admin/Cetak_data/export_spk_pdf/' . $k->id) ?>" >
                                        Cetak
                                    </a>
                                    <a class="btn btn-sm btn-warning" href="#modalEditSpk<?php echo $k->id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- ============ MODAL EDIT =============== -->
<?php
        foreach ($data->result() as $a) {
    ?>
            <div id="modalEditSpk<?php echo $a->id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/Cetak_data/edit_spk'?>">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Edit Data SPK</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="no_polisi">No. Polisi : </label>
                                    <input type="hidden" name="id" value="<?php echo $a->id ?>">
                                    <input type="text" name="no_polisi" id="no_polisi" value="<?php echo $a->no_polisi ?>" class="form-control" placeholder="Masukan Nomor Polisi" />
                                </div> 
                                <div class="form-group">
                                    <label for="merk_kendaraan">Merk Kendaraan : </label>
                                    <input type="text" name="merk_kendaraan" id="merk_kendaraan" value="<?php echo $a->merk_kendaraan ?>" class="form-control" placeholder="Masukan Merek Kendaraan" />
                                </div> 
                                <div class="form-group">
                                    <label for="kerusakan">Kerusakan : </label>
                                    <input type="text" name="kerusakan" id="kerusakan" value="<?php echo $a->kerusakan?>" class="form-control" placeholder="Masukan Nomor Rangka"/>
                                </div>  
                            </div>
                            
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
    }
    ?>

