<!-- Projects Row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Akun Pengguna</h4>
                <center><?php echo $this->session->flashdata('msg');?></center>
                <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Pengguna</a></div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped"  id="mydata">
                    <thead>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                    <?php 
                        $no=0;
                        foreach ($data->result() as $a){
                            $no++;
                    ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $a->username;?></td>
                            <td><?php echo $a->password;?></td>
                            <td><?php if($a->status == '1'){echo "admin";}else if($a->status == '2'){echo "customer";}  ?></td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="#modalEditPelanggan<?php echo $a->id_user?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                <a class="btn btn-sm btn-danger" href="#modalHapusPelanggan<?php echo $a->id_user?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Nonaktifkan</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>            
    </div>
</div>
<!-- /.row -->
<!-- ============ MODAL ADD =============== -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="<?php echo base_url().'admin/pengguna/tambah_pengguna'?>">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Tambah Pengguna</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" class="form-control" type="text" placeholder="Input Username..." required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" class="form-control" type="password" placeholder="Input Password..." required>
                    </div>
            
                    <div class="form-group">
                        <label for="password2">Ulangi Password</label>
                        <input name="password2" class="form-control" type="password" placeholder="Ulangi Password..." required>
                    </div> 

                    <div class="form-group">
                        <label for="status" >Status</label>
                        <select name="status" class="form-control" required>
                            <option value="1">Admin</option>
                            <option value="2">Customer</option>
                        </select>
                    </div>   
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>  

    <!-- ============ MODAL EDIT =============== -->
    <?php
        foreach ($data->result() as $a) {
    ?>
            <div id="modalEditPelanggan<?php echo $a->id_user?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/edit_pengguna'?>">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Edit Pengguna</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input name="username" class="form-control" type="text" value="<?php echo $a->username;?>" placeholder="Input Username..." required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" class="form-control" type="password" placeholder="Input Password..." required>
                                </div>
                        
                                <div class="form-group">
                                    <label for="password2">Ulangi Password</label>
                                    <input name="password2" class="form-control" type="password" placeholder="Ulangi Password..." required>
                                </div> 

                                <div class="form-group">
                                    <label for="status" >Status</label>
                                    <select name="status" class="form-control" required>
                                    <?php if ($a->status=='1'):?>
                                        <option value="1" selected>Admin</option>
                                        <option value="2">Customer</option>
                                    <?php else:?>
                                        <option value="1">Admin</option>
                                        <option value="2" selected>Customer</option>
                                    <?php endif;?>
                                    </select>
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

    <!-- ============ MODAL HAPUS =============== -->
    <?php
        foreach ($data->result() as $a) {
    ?>
            <div id="modalHapusPelanggan<?php echo $a->id_user?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/nonaktifkan'?>">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">NonAktifkan Pengguna</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
                    <div class="modal-body">
                        <p>Yakin mau menonaktifkan pengguna <b><?php echo $a->username;?></b>..?</p>
                        <input name="id" type="hidden" value="<?php echo $a->id_user; ?>">
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button type="submit" class="btn btn-primary">Nonaktifkan</button>
                    </div>
                </form>
            </div>
            </div>
            </div>
        <?php
    }
    ?>

    <!--END MODAL-->

    <hr>

</div>
<!-- /.container -->

    
