<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title?></title>

    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.css') ?>">
</head>
<body>
<div class="row">
        <div class="col-12">
            <h2>SPK</h2>
            <div style="width:60px;height:2px;background:#6c757d"></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <table class="table border-0">
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
                    </table>
                </div>
            </div>                    
        </div>
    </div>
</body>
</html>




