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
                <h2>Lesson 1</h2>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="margin-top:50px">
                    <div class="menu-gambar" >  
                        
                        
                   
		</form>
                    </div>
                   

                    <h2>Lesson 1</h2>
                    <br>
                    <br>
                    <table class="table-striped" >
                        <caption class="caption_tabel">Vocabulary</caption>
		
		
		<?php
                if (is_array($results) || is_object($results))
        {       
		foreach($results as $data)
		{ 
		?>
		
		<tr>
		<td ><?php echo $data->Words; ?></td>
	
		<td><?php echo $data->Romaji ; ?></td>
		<td><?php echo $data->Meaning; ?></td>
		</tr>
		
		<?php
		}
        }
		?>

			<tr>
			
	<!--<td colspan=2 class = "halaman"><p><?php echo $links; ?></p></td> -->
	</tr>
	 </table>
                    <br>
                    <br>
                    <img src="<?php echo base_url()?>assets/wallpaper/perkenalan1.png" class="img-responsive" alt="Cinque Terre" style="float:left">
                    <table class="" >
                        <caption class="caption_tabel">Perkenalan</caption>
                        
		
		
		<?php
                if (is_array($results_2) || is_object($results_2))
        {       
		foreach($results_2 as $data)
		{ 
		?>
                        <tr>
                            <td>    
                        </tr>    
		<tr>
		<td ><?php echo $data->Words; ?></td>
	
		<td><?php echo $data->Romaji ; ?></td>
		<td><?php echo $data->Meaning; ?></td>
		</tr>
		
		<?php
		}
        }
		?>

	 </table>
                    <br>
                    <br>
                    <div class="" style="">
                    <img src="<?php echo base_url()?>assets/wallpaper/perkenalan2.png" class="img-responsive" alt="Cinque Terre" >
                    <img src="<?php echo base_url()?>assets/wallpaper/perkenalan3.png" class="img-responsive" alt="Cinque Terre" >
                     <br>
                    </div> 
                    
                      <table class="table-striped tabel-perkenalan" >
                        <caption class="caption_tabel">Memperkenalkan orang lain</caption>
                        
		
		
		<?php
                if (is_array($results_3) || is_object($results_3))
        {       
		foreach($results_3 as $data)
		{ 
		?>
		
		<tr>
		<td ><?php echo $data->Kanji; ?></td>
	
		<td><?php echo $data->Hiragana ; ?></td>
		<td><?php echo $data->Meaning; ?></td>
                <td><?php echo $data->Arti; ?></td>
		</tr>
		
		<?php
		}
        }
		?>

			<tr>
			
	<!--<td colspan=2 class = "halaman"><p><?php echo $links; ?></p></td> -->
	</tr>
	 </table>
                    <br>
                    
                  
                    
                    <h1>Grammar</h1>
                    <div class="text-left">
                    <h2 class="section-heading">1.    N1 wa N2 desu.</h2>
                    <p class="text-center">
                        Dalam bahasa Jepang wa adalah partikel. Noun atau kata benda sebelum wa (N1) adalah yang menjadi topik dari kalimat atau merupakan subjek kalimat dan N2 merupakan penjelasan dari subjek tersebut. Dalam pola kalimat ini desu merupakan sebuah predikat dan adalah ungkapan untuk mengakhiri sebuah kalimat. Desu juga menunjukkan kesopanan kita terhadap pasangan bicara.
                    </p>
                    <ul style="list-style-type:disc">
                        <p>Contoh :</p>                      
  <li>Watashi wa Yamada desu.</li>
  <p>     Saya adalah Yamada.</p>
  <li> Watashi wa enjinia desu.</li>
  <p>     Saya adalah seorang engineering.</p>
  
</ul>
                    <br>
                    <h2 class="section-heading">
                    2.    N1 wa N2 Jya arimasen/dewa arimasen.
                    </h2>
                        <p class="text-center">
                            Jya Arimasen  adalah bentuk negative dari desu. Biasanya digunakan dalam bahasa percakapan sehari-hari, sedangkan untuk ragam tulis atau formal menggunakan dewa arimasen.
                    </p>
                    <ul style="list-style-type:disc">
  <li>Dadan san wa gaukusei jya arimasen.</li>
  <p>    Dadan bukanlah seorang pelajar.</p>
  <li>Watashi wa nihon jin jya arimasen.</li>
  <p>    Saya bukanlah orang Jepang.</p>
  
</ul>
                    
                    <h2 class="section-heading">
                    3.   S ka
                    </h2>
                    <p class="text-left">
                            1) Partikel ka  dipakai untuk mengungkapkan keraguan, pertanyaan atau ketidakpastian yang dirasakan pembicara. Bentuk kalimat pertanyaan dalam bahasa jepang adalah tinggal menambahkan partikel ka pada akhir kalimat. Dan partikel ka untuk kalimat pertanyaan tersebut dibaca dengan intonasi yang meninggi. Partikel ka merupakan pengganti tanda tanya (?) dalam bahasa Jepang. Sehingga apabila sudah ada partikel ka  maka tidak perlu dibubuhkan tanda tanya lagi.
                    <p class="text-left">
                    2)Kalimat pertanyaan selalu menuntut untuk jawaban iya atau tidak/benar atau salah. Maka untuk menjawab kalimat tersebut dimulai dengan jawaban hai  atau iie.
                    </p>
                    </p>
                    
                    <ul style="list-style-type:disc">
  <li>Anatawa Amerika jin desuka?.   Apakah anda orang Amerika?</li>
  
  <li>(+) Hai, Amerika Jin desu.   (+) Iya, Saya adalah orang Amerika</li>
  <li> (-) Iie, Amerika jin jya arimasen.      (-) Tidak, saya bukan orang Amerika</li>
  
</ul>
                     <h2 class="section-heading">
                    4. N Mo
                    </h2>
                    <p class="text-left">
                           Mo merupakan partikel yang digunakan sebagai tambahan setelah topik pada partikel wa, ketika topik tersebut sama dengan topik sebelumnya atau dalam bahasa Indonesia disebut "Juga"
                   
                    </p>
                    
                    <ul style="list-style-type:disc">
  <li> Aira san wa kaishain desu.            Aira adalah seorang karyawan.</li>
  
  <li> Hari san mo kaishain desu.   Hari juga adalah seorang karyawan.</li>
  
</ul>
                    
                     <h2 class="section-heading">
                    5. N1 NO N2
                    </h2>
                    <p class="text-left">
                           No digunakan untuk menghubungkan dua kata benda. Bisa juga digunakan untuk menunjukkan kepemilikan. untuk penerjemahannya adalah 
                    <p class="text-left">
                    A no B = BA
                    </p>
                    <p class="text-left">
                   C no D = DC
                    </p>
                    </p>
                    
                    <ul style="list-style-type:disc">
  <li> 
      <p class="text-left">Watashi no kutsu.           Note: Watashi= saya (A) no kutsu= sepatu (B) </p>
      <p class="text-left">   Sepatu saya.             maka penerjamahannya adalah BA atau Sepatu saya  </p>
  </li>
  
  <li>  Anata no kaban</li>
  <p> Tas Anda</p>
  <li> 
      <p class="text-left"> watashi wa TTEC no kaishain desu.</p>
      <p class="text-left">      Saya adalah karyawan TTEC  </p>
  </li>
  
</ul>
                    
                    <h2 class="section-heading">
                    5. ~San
                    </h2>
                    <p class="text-left">
                           San  dipakai untuk menyebutkan nama seseorang untuk menghormati orang tersebut.
                    <p class="text-left">
                    San tidak dipakai untuk penyebutan nama sendiri.
                    </p>
                    <p class="text-left">
                  Penggunaan kata anata yang berarti "anda/kamu" jarang digunakan apabila anda telah mengetahui nama dari lawan bicara anda tersebut. Cukup sebutkan namanya dan ditambahkan kata ~san
                    </p>
                    </p>
                    
                    <ul style="list-style-type:disc">
  <li> 
      <p class="text-left">Aira : Hari san gakusei desuka          Aira : Apakah saudara Hari adalah seorang pelajar? </p>
      <p class="text-left">   Hari : iie, kaishain desu             Hari : Bukan, saya adalah seorang karyawan  </p>
      <p class="text-left">            Aira san mo kaishain desuka             Apakah saudari Aira juga seorang karyawan?</p>
      <p class="text-left">Aira : Hai, watashi mo kaishain desu.        Aira : Iya, saya juga seorang karyawan</p>
      <p class="text-left">            TTEC no kaishain desu.             Karyawan TTEC </p>
  </li>
  
  <li>  <img src="<?php echo base_url()?>assets/wallpaper/tatabahasa_final.png" class="img-responsive" alt="Cinque Terre" >
  <img src="<?php echo base_url()?>assets/wallpaper/tatabahasa_final2.jpg" class="img-responsive" alt="Cinque Terre" ></li>
  <button class=""> <?php echo anchor('c_main/soal_tes', 'Kuis Lesson 1'); ?> </button>
  
</ul>
                    
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
</html>
