<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Tata Bahasa</title>

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
  <?php


$jawaban_user=$_GET["favorite"];
$nilai_siswa=0;

$array_jawaban_user=explode(",",$jawaban_user);
$jawaban=["C","A",'C','A','C','A','C','D','A','C'];

$hasil_nilai=array_intersect($array_jawaban_user,$jawaban);
$nilai=count($hasil_nilai);




?>
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
                       <?php echo anchor('c_main/logout', 'Log Out'); ?>
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
            <div class="intro-text">
                <h2>TTEC Internal Dictionary</h2>
            </div>
        </div>
    </header>

    <div class="body-materi" style="margin-left:18%;margin-right:18%;background-color:white">
        
	<div style="margin-top:60px">
        <h1 style="color:#217dbb;margin-bottom:40px" align="left">Hasil Rekapitulasi Tes</h1>
	<div class="textbody_kimia" style="margin-bottom:30px">
         
            
            <table border="1" style="width:70%" bgcolor="wheat">
      
  <tr bgcolor="aqua">
    <th style="color:#217dbb">No Soal</th>
    <th style="color:#217dbb">Jawaban Kamu</th>		
        <th style="color:#217dbb">Hasil</th>
  </tr>
      <?php 
             for ($x = 0; $x <= 9; $x++) {
            
                $jawaban[$x];
                $array_jawaban_user[$x];
                
                if($jawaban[$x]==$array_jawaban_user[$x])
                {
                    $hasil_jawaban[$x]="BENAR";
                    $nilai_siswa++;
                }
                
 else {
     $hasil_jawaban[$x]="SALAH";
 }
                
             ?>   
  <tr bgcolor="#E6E6FA">
    <td style="color:black"> <?php echo $x+1; ?></td>
    <td style="color:black"><?php echo $array_jawaban_user[$x]; ?></td>		
    <td style="color:black"><?php echo $hasil_jawaban[$x]; ?></td>
  </tr>
  <?php
            
             }
            ?>
</table>
            
            <h1 style="text-transform:none">Nilai kamu adalah :<?php echo $nilai_siswa.'0'; ?> </h1>
            <?php 
            
            if($nilai_siswa>9)
            {
            ?>
            
            
            <img src="<?php echo base_url()?>assets/wallpaper/kuis_lulus.jpg" class="img-responsive" alt="Cinque Terre" style="float:left" >
            <img src="<?php echo base_url()?>assets/wallpaper/kuis_lulus2.jpg" class="img-responsive" alt="Cinque Terre" style="float: right" >
            <center>
            <img src="<?php echo base_url()?>assets/wallpaper/kuis_lulus_selamat.png" class="img-responsive" alt="Cinque Terre" style="alignment-adjust:middle">
            <button class=""> <?php echo anchor('c_main/display_lesson2', 'Lanjut ke lesson2'); ?> </button>
            </center>
                <?php } 
            
            else
            {   
                ?>
            
               
            <img src="<?php echo base_url()?>assets/wallpaper/kuis_gagal.jpg" class="img-responsive" alt="Cinque Terre" style="float:left" >
            <img src="<?php echo base_url()?>assets/wallpaper/kuis_gagal2.jpg" class="img-responsive" alt="Cinque Terre" style="float: right" >
            <center>
            <img src="<?php echo base_url()?>assets/wallpaper/kuis_gagal_lagi.png" class="img-responsive" alt="Cinque Terre" style="alignment-adjust:middle">
            <button class=""> <?php echo anchor('c_main/display_tatabahasa', 'Kembali ke Lesson 1'); ?> </button>
            </center>
            <?php
                }
            
            ?>
     
            
            
        </div>        
            
            
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
</html>
