<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title float-left">Cetak Innvoice</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Nama Tertanggung</th>
                        <th>No. Polisi</th>
                        <th>Biaya Perbaikan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach($data->result() as $i => $k): ?>
                            <tr>
                                <td><?php echo ($i+1) ?></td>
                                <td><?php echo $k->nama_tertanggung ?></td>
                                <td><?php echo $k->no_polisi ?></td>
                                <td><?php echo "Rp. ".number_format($k->biaya); ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" target="_blank" href="<?= base_url('admin/Cetak_data/export_innvoice_pdf/' . $k->id) ?>" >
                                        Cetak
                                    </a>
                                    <a class="btn btn-sm btn-warning" href="#modalEditInnvoice<?php echo $k->id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
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
            <div id="modalEditInnvoice<?php echo $a->id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/Cetak_data/edit_innvoice'?>">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Edit Data Innvoice</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama_tertanggung">Nama Tertanggung : </label>
                                    <input type="hidden" name="id" value="<?php echo $a->id ?>">
                                    <input type="text" name="nama_tertanggung" id="nama_tertanggung" value="<?php echo $a->nama_tertanggung ?>" class="form-control" placeholder="Masukan Nama Tertanggung" />
                                </div>
                                <div class="form-group">
                                    <label for="no_polisi">No. Polisi : </label>
                                    <input type="text" name="no_polisi" id="no_polisi" value="<?php echo $a->no_polisi ?>" class="form-control" placeholder="Masukan Nomor Polisi" />
                                </div>  
                                <div class="form-group">
                                    <label for="merk_kendaraan">Merk Kendaraan : </label>
                                    <input type="text" name="merk_kendaraan" id="merk_kendaraan" value="<?php echo $a->merk_kendaraan ?>" class="form-control" placeholder="Masukan Merek Kendaraan" />
                                </div> 
                                <div class="form-group">
                                    <label for="biaya">Biaya Jasa Perbaikan : </label>
                                    <input type="text" name="biaya" id="biaya" value="<?php echo $a->biaya?>" class="form-control" placeholder="Masukan Nomor Rangka"/>
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
