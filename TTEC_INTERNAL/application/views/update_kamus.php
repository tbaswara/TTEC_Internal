<!DOCTYPE html>
<html lang="en">
    <?php echo form_open_multipart('c_main/update2_kamus');?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Update Kamus Data</title>

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
  <script type="text/javascript" language="javascript">
  function search_kamus()
  { 
  if ($_GET['search_kamus'] === "Romaji") {
    $.get('c_main/search_datakamus_romawi',$("#form_inquiry").serialize(),function(data);
  }  
  </script>    
  <body background="<?php echo base_url()?>assets/wallpaper/sayagata-400px.png"><script type='text/javascript' language='javascript' src='/B1D671CF-E532-4481-99AA-19F420D90332/netdefender/hui/ndhui.js?0=0&amp;0=0&amp;0=0'></script>

     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <img    src="<?php echo base_url()?>assets/wallpaper/TTEC_LOGO.gif" width="150" height="55" style="margin-right:10px" >
                <img class="img-centered" src="<?php echo base_url()?>assets/wallpaper/huruf_jepang.gif" style="margin-left:40px"  >
                <ul class="nav navbar-nav navbar-right">
                   
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <?php echo anchor('c_main/display_homepage', 'Home'); ?> 
                    </li>
                    <li>
                        <?php echo anchor('c_main/display_kana', 'Huruf Kana'); ?> 
                    </li>
                    
                    <li>
                        <?php echo anchor('c_main/display_tatabahasa', 'Tata Bahasa'); ?> 
                    </li>
                    <li>
                       <?php echo anchor('c_main/display_kamusdata', 'Kamus TTEC'); ?>
                    </li>
                    <li>
                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text center"  style="margin-top:70px">
                    <center>
                        <h2>TTEC Internal Dictionary</h2>
                </center>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="margin-top:50px">
                    <div class="menu-gambar" >  
                        
                        
                   
                        <img class=""    src="<?php echo base_url()?>assets/wallpaper/Kamus_logo.jpg" style="" >
                    <img class="" src="<?php echo base_url()?>assets/wallpaper/Kamus_logo2.png" >
                       
                    
                    
                   <!--		
                    Search By Nama
					<input type="text" id="keyword" name="keyword" size="20" required>
                                        <input class="btn btn-default" type="submit" value="Search"/>
			-->	
			
		</form>
                    </div>
                   
                    <div class="floating-box_menu ">
                     
                    </div>
                    
                     <img class="" src="<?php echo base_url()?>assets/wallpaper/cherry.png" style="float:right" height="400" >
                   
                    <div class="container">
        <table  Align="center" class="table table-bordered opik">
	 <?php
		foreach($list_data->result()as $row){
			$no=$row->No;
			$word=$row->Kanji;
			$furigana=$row->Furigana;
                        $romaji=$row->Romaji;
                        $meaning=$row->Meaning;
                        $picture=$row->Picture;
                        $remark=$row->Remarks;
                        $classification=$row->Classification;

			
			
		}
		?>		
	
	<tr>
	<th>Word :</th>
	<td><input name = "words" type = "text" placeholder="Isi Kata " value = "<?php echo $word?>" ></td>
	<td style="color:blue;"><?php echo form_error('words');?></td>
        <input name= "no_kamus" type = "text" value = "<?php echo $no?>" hidden >
	</tr>
        
        <tr>
	<th>Furigana :</th>
	<td><input name = "furigana" type = "text" placeholder="Isi Kata furigana " value = "<?php echo $furigana?>" ></td>
	<td style="color:blue;"><?php echo form_error('furigana');?></td>
	</tr>
	
	<tr>
	<th>Romaji :</th>
	<td><input name = "romaji" type = "text" placeholder="Isi romawi" value = "<?php echo $romaji?>" ></td>
	<td style="color:blue;"><?php echo form_error('romaji');?></td>
	</tr>
        
        <tr>
        <th>Meaning :</th>
        <td><input name = "meaning" type = "text" placeholder="Isi Arti" value = "<?php echo $meaning?>" ></td>
	<td style="color:blue;"><?php echo form_error('meaning');?></td>
	</tr>
        
        
        <tr>
            
            <th>Upload Picture :</th>;
            <td>		
                <input type = "file" name = "userfile" value="<?php echo $picture?>"  />
            <?php if($picture!=NULL)
                {?>
                    <img src="<?php echo base_url()?><?php echo $picture;?>" class="img-responsive" alt="Cinque Terre"  >
                <?php }
                else echo $picture;
                ?>    
         <br />
         <!--<input type = "submit" value = "Upload" />  -->
    
            </td>
	</tr>
        
         <tr>
	<th>Remark :</th>
	<td><input name = "remark" type = "text" placeholder="Isi remark" value = "<?php echo $remark?>" ></td>
	<td style="color:blue;"><?php echo form_error('remark');?></td>
	</tr>
        
        <tr>
	<th>Classification :</th>
	<td> <select id="classification" name="classification">
                             <option id="classification" class="classification" value="HRGA">HRGA</option>
                             <option id="classification" class="classification" value="Safety" >Safety</option>
                              <option id="classification" class="classification" value="Accounting" >Accounting</option>
                               <option id="classification" class="classification" value="Defect" >Defect</option>
                                <option id="classification" class="classification" value="General" >General</option>

                    </select></td>
	<td style="color:blue;"><?php echo form_error('classification');?></td>
	</tr>
        
        
	
		<tr>
                    <td> <input class="btn btn-default" type="submit" name="submit"></td>
		</tr>
   </table>
      </div>
                   
                   
                </div>
            </div>
           
        </div>
    </section>

   

   
   
      
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
