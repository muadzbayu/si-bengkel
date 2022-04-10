
<center><?php echo $this->session->flashdata('msg');?></center>
<div class="row">
    
    <div class="col-12">
        <div class="card">
            <form action="<?php echo base_url('customer/Registrasi_data/daftar'); ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title">Registrasi Data</h4>
                </div>
                <div class="card-body py-0 my-3">
                    <!--<h4 class="text-muted my-3">Nama Tertanggung</h4>-->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <!-- $user (user & admin sama)-->
                                <label for="nama_tertanggun">Nama Tertanggung : </label>
                                <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                                <input type="text" name="nama_tertanggung" id="nama_tertanggung" value="<?php echo $data->nama_tertanggung ?>" class="form-control" placeholder="Masukan Nama Lengkap"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="alamat">Alamat : </label>
                                <textarea name="alamat" id="alamat" class="form-control"  rows="5"><?php echo $data->alamat ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="no_hp">No. Hp : </label>
                                <input type="tel" name="no_hp" id="no_hp" value="<?php echo $data->no_hp ?>" class="form-control" placeholder="Masukan Nomor Handphone"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5">
                            <div class="form-group">
                                <label for="no_sim">No. SIM : </label>
                                <input type="text" name="no_sim" id="no_sim" value="<?php echo $data->no_sim ?>" class="form-control" placeholder="Masukan Nomor SIM"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="no_rangka">No. Rangka : </label>
                                <input type="text" name="no_rangka" id="no_rangka" value="<?php echo $data->no_rangka?>" class="form-control" placeholder="Masukan Nomor Rangka"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="merk_kendaraan">Merk Kendaraan : </label>
                                <input type="text" name="merk_kendaraan" id="merk_kendaraan" value="<?php echo $data->merk_kendaraan ?>" class="form-control" placeholder="Masukan Merek Kendaraan" />
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="warna">Warna Kendaraan : </label>
                                <input type="text" name="warna" id="warna" value="<?php echo $data->warna ?>" class="form-control" placeholder="Masukan Warna Kendaraan" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="Tahun">Tahun : </label>
                                <input type="number" name="tahun" id="tahun" value="<?php echo $data->tahun ?>" class="form-control" placeholder="Masukan Tahun" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="no_polisi">No. Polisi : </label>
                                <input type="text" name="no_polisi" id="no_polisi" value="<?php echo $data->no_polisi ?>" class="form-control" placeholder="Masukan Nomor Polisi" />
                            </div>
                        </div>
                    </div>                    
                    
                
                <div class="card-footer">
                    <div class="row w-100">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <button type="submit" class="btn btn-primary btn-block">Simpan <i class="fa fa-save"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
       
       
      
