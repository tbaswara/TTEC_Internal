<!DOCTYPE html>
<html lang="en">
<?php echo form_open('c_main/tambah_transaksi');?>
  <head>
     <script>
function myFunction() {
    var x;
    if (confirm("Press a button!") == true) {
        x = "You pressed OK!";
    } else {
        x = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = x;
}
</script>
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
                <li class="active"><?php echo anchor('c_main/display_transaksi', 'Data Transaksi'); ?></li>
                
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
		<h3>Insert Data Transaksi </h3>		
	
	<tr>
	<th>Nama Transaksi :</th>
	<td><input name = "nama" type = "text" placeholder="Isi Nama " value = "" ></td>
	<td style="color:blue;"><?php echo form_error('nama');?></td>
	</tr>
	
	<tr>
	<th>Tanggal Transaksi :</th>
	<td><input name = "tanggal_transaksi" type = "date" placeholder="Isi tahun alat" value = "" ></td>
	<td style="color:blue;"><?php echo form_error('tanggal_transaksi');?></td>
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
	<th>Jumlah Transaksi :</th>
	<td><input name = "jumlah_transaksi" type = "numeric" placeholder="Isi jumlah transaksi" value = "" ></td>
	<td style="color:blue;"><?php echo form_error('jumlah_transaksi');?></td>
	</tr>
        
        <tr>
	<th>Kuantitas :</th>
	<td><input name = "kuantitas" type = "numeric" placeholder="Isi kuantitas transaksi" value = "" >
        <input name = "satuan" type = "text" placeholder="Isi satuan kuantitas" value = "" ></td>
	<td style="color:blue;"><?php echo form_error('kuantitas');?></td>
	</tr>
        
        <tr>
	<th>Keterangan :</th>
	<td><input name = "keterangan" type = "text" placeholder="Isi Keterangan" value = "" ></td>
	<td style="color:blue;"><?php echo form_error('jumlah_transaksi');?></td>
	</tr>
        
         <tr>
	<th>Nama Toko :</th>
	<td><input name = "nama_toko" type = "text" placeholder="Isi nama toko" value = "" ></td>
	<td style="color:blue;"><?php echo form_error('nama_toko');?></td>
	</tr>
        
        <tr>
	<th>Nama Proyek :</th>
	<td><input name = "nama_proyek" type = "text" placeholder="Isi nama proyek" value = "" ></td>
	<td style="color:blue;"><?php echo form_error('nama_proyek');?></td>
	</tr>
        
        <input name = "author" type = "hidden" placeholder="Isi Keterangan" value = "<?php echo $username?>" >
	
		<tr>
                    <td> <input class="btn btn-default" type="submit" name="submit"></td>
		</tr>
   </table>
      </div>
    </div>
    
    <div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:150px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Respon</h4>
      </div>
      <div class="modal-body">
        <p class="modal-body">
		Ketika kelebihan glukosa dengan memakan makanan yang kaya akan karbohidrat maka glukosa akan tersimpan didalam hati dan otot dalam bentuk glikogen. Pertanyaan yang Anda pilih sudah baik namun sayangnya, pertanyaan tersebut kurang tepat untuk pembelajaran kita kali ini. Mungkin Anda memiliki pertanyaan lainnya, Anda dapat memilih pertanyaan lain.
		
		</p>
      </div>

    </div>
      
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
