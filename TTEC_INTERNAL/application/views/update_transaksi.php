<!DOCTYPE html>
<html lang="en">
<?php echo form_open('c_main/update2_transaksi');?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Aplikasi Pencatatan Transaksi</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  <script type="text/javascript"></script><link rel='stylesheet' type='text/css' href='/B1D671CF-E532-4481-99AA-19F420D90332/netdefender/hui/ndhui.css' /></head>

  <body background="<?php echo base_url()?>assets/wallpaper/wallpaper05.jpg"><script type='text/javascript' language='javascript' src='/B1D671CF-E532-4481-99AA-19F420D90332/netdefender/hui/ndhui.js?0=0&amp;0=0&amp;0=0'></script>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		              <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
		  <li><?php echo anchor('c_main/user_area', 'Home'); ?> </li>
                <li> <?php echo anchor('c_main/display_member', 'Data Member'); ?> </li>
                <li><?php echo anchor('c_main/display_trainer', 'Data Trainer'); ?></li>
                <li class="active"><?php echo anchor('c_main/display_transaksi', 'Data Transaksi'); ?></li>
                <li><?php echo anchor('c_main/display_pembayaran_member', 'Data Pembayaran'); ?></li>
                <li><?php echo anchor('c_main/display_alat_latihan', 'Data Alat Latihan'); ?></li>
                <li><?php echo anchor('c_main/display_jadwal_latihan', 'Jadwal Latihan'); ?></li>
		<li><?php echo anchor('c_main/display_kehadiran', 'Kehadiran'); ?> </li> 		<li><?php echo anchor('c_main/display_laporan', 'Laporan'); ?></li>
				
		<li><?php echo anchor('c_login/logout', 'Logout'); ?></li>
				 </ul>
            </div>
        </div>
        <div class="navbar-collapse collapse">
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <table  Align="center" class="table table-bordered opik">
		<h3>Data Member </h3>	
      <?php
		foreach($list_data->result()as $row){
			$id_transaksi=$row->ID_Transaksi;
			$nama=$row->Nama_Transaksi;
			$tanggal_transaksi=$row->Tanggal_Transaksi;
                        $jumlah_transaksi=$row->Jumlah_Transaksi;
                        $tipe_transaksi=$row->Tipe_Transaksi;
                        $kuantitas=$row->Kuantitas;
                        $satuan=$row->Satuan;
                        $keterangan=$row->Keterangan;
                        $nama_toko=$row->Nama_Toko;
                        $nama_proyek=$row->Nama_Proyek;
			
			
		}
		?>		
	<tr>
	<th>Nama :</th>
	<td><input name = "nama" type = "text" placeholder="Isi Nama Member" value = "<?php echo $nama?>" ></td>
	<input name= "id_transaksi" type = "text" value = "<?php echo $id_transaksi?>" hidden >
	</tr>
	
	<tr>
	<th>Tanggal :</th>
	<td><input name = "tanggal_transaksi" type = "date" placeholder="Isi Alamat Member" value = "<?php echo $tanggal_transaksi?>" ></td>
	</tr>
	
	<tr>
	<th>Jumlah Transaksi :</th>
	<td><input name = "jumlah_transaksi" type = "number" placeholder="Isi Umur Member" value = "<?php echo $jumlah_transaksi?>" ></td>
	</tr>
	
	<tr>
        <th>Tipe Transaksi :</th>
        <td><select id="tipe_transaksi" name="tipe_transaksi">
            <option>Pemasukan</option>
            <option>Pengeluaran</option>
            </select></td>
	<td style="color:blue;"><?php echo form_error('tipe_transaksi');?></td>
	</tr>
        
        <tr>
	<th>Kuantitas :</th>
	<td><input name = "kuantitas" type = "text" placeholder="Isi Kuantitas" value = "<?php echo $kuantitas?>" >
            <input name = "satuan" type = "text" placeholder="Isi satuan" value = "<?php echo $satuan?>" >
        </td>
	</tr>
        
        
	<tr>
	<th>Keterangan :</th>
	<td><input name = "keterangan" type = "text" placeholder="Isi Keterangan" value = "<?php echo $keterangan?>" ></td>
	</tr>
        
        <tr>
	<th>Nama Toko :</th>
	<td><input name = "nama_toko" type = "text" placeholder="Isi Nama Toko" value = "<?php echo $nama_toko?>" ></td>
	</tr>
        
        <tr>
	<th>Nama Proyek :</th>
	<td><input name = "nama_proyek" type = "text" placeholder="Isi Nama Proyek" value = "<?php echo $nama_proyek?>" ></td>
	</tr>
        
        
	
	
	<tr>
            <td> <input class="btn btn-default" type="submit" name="submit" ></td>
	</tr>
	 </table>
      </div>
    </div>

    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  </body>
  <?php echo form_close();?>
</html>
