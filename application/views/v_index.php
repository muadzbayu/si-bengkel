<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $title ?></title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url() . 'assets/vendor/bootstrap/css/bootstrap.css' ?>" rel="stylesheet">
  
  <link rel="stylesheet" href="<?php echo base_url('assets/style.css')?>">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() . 'assets/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url() . 'assets/vendor/datatables/dataTables.bootstrap4.css' ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() . 'assets/css/sb-admin.css' ?>" rel="stylesheet">

  <!-- Bootstrap Datepicker-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-datepicker.css')?>">
  </head>

<body id="page-top" style="padding-right:0 !important">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="">Sistem Informasi Bengkel Mobil</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="class=" nav-link" href="<?php echo base_url() . 'Home/logout' ?>">
      <i class="fas fa-bars"></i>
    </button>
    

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <!--         <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div> -->
    </form>

    <!-- Navbar -->
    

  </nav>


  <div id="wrapper">
    <?php $h = $this->session->userdata('status_user'); ?>
    <?php $u = $this->session->userdata('user'); ?>

    
    <!-- sidebar -->
    <ul class="sidebar navbar-nav">
      <?php if($pil == 1){?>
        <li class="nav-item  active ">
      <?php }else{?>
        <li class="nav-item">
      <?php }?>
        <?php if($h == "admin"){?>
          <a class="nav-link" href="<?php echo base_url() . 'admin/Data_order' ?>">
          <?php }else if($h == "customer"){?>  
            <a class="nav-link" href="<?php echo base_url() . 'customer/Registrasi_data' ?>">
            <?php }?>    
            <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <?php if($h == "customer"){
                  if($pil == 2){?>
                    <li class="nav-item  active ">
                    <?php }else{?>
                      <li class="nav-item">
                    <?php }?>
              <a class="nav-link" href="<?php echo base_url(). 'customer/Laporan' ?>">
              <i class="fas fa-fw fa-clipboard"></i>
              <span>History</span></a>
            </li>
          <?php } ?>
          <?php if($h == "admin"){
            if($pil == 2){?>
              <li class="nav-item  active ">
              <?php }else{?>
                <li class="nav-item">
              <?php }?>
          <a class="nav-link" href="<?php echo base_url() . 'admin/Rekap_data' ?>">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Rekap</span></a>
        </li>
        
        <?php if($pil == 3){?>
          <li class="nav-item  active ">
        <?php }else{?>
          <li class="nav-item">
        <?php }?>
           <a class="nav-link" href="<?php echo base_url() . 'admin/pengguna' ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengguna</span></a>
        </li>

        <?php if($pil == 4){?>
          <li class="nav-item dropdown active ">
        <?php }else{?>
          <li class="nav-item dropdown">
        <?php }?>
           <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
              <i class="fas fa-fw fa-print"></i>
              <span>Cetak</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url() . 'admin/Cetak_data' ?>">Cetak Spk</a>            
            <a class="dropdown-item" href="<?php echo base_url() . 'admin/Cetak_data/innvoice' ?>">Innvoice</a>
          </div>
        </li>    
        <?php }?>  

          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url() . 'Home/logout' ?>">
              <i class="fas fa-fw fa-cog"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      
            <div id="content-wrapper">
              <div class="container-fluid">

                

              
                  