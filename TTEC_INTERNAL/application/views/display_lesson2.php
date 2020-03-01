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
                <h2>Lesson 2</h2>
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
                   

                    <h2>Lesson 2</h2>
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
		<td ><?php echo $data->Kanji; ?></td>
	
		<td><?php echo $data->Furigana ; ?></td>
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
                    
                    
                    
                    <div class="text-left">
                    <h2 class="section-heading">1.   Kore/Sore/Are</h2>
                    <p class="text-center">
                        Kore/Sore/Are adalah kata tunjuk dalam bahasa Jepang. Apabila dalam bahasa Indonesia hanya ada "ini" dan "itu", dalam bahasa Jepang ada 3. Mengapa 3? Yuk kita bahas :)
                    </p>
                   <img src="<?php echo base_url()?>assets/wallpaper/lesson2_bab1.jpg" class="img-responsive" alt="Cinque Terre" >
                    <br>
                    <ul style="list-style-type:disc">
                        <p> Kore = Ini. Atau menunjuk <span style="text-decoration:underline">benda yang dekat dengan</span> <span style="text-decoration:underline;color:palevioletred;"> pembicara </span> </p> 
                        <p>    Sore = Itu. Menunjuk <span style="text-decoration:underline"> benda yang dekat dengan </span> <span style="text-decoration:underline;color:palevioletred;">lawan bicara </span></p>
                        <p>    Are = Itu. Menunjuk <span style="text-decoration:underline"> benda yang jauh dari <span style="color:palevioletred;"> pembicara </span> maupun <span style="color:palevioletred;">lawan bicara </span> </span></p>
                        <h3 style="color:orange">Sampai sini sudah mengerti teman-teman?? ^^</h3>
                        <h3>Kalau belum mengerti lihat gambar yaa ….</h3>
                        <p>Sekarang, gimana sih cara masukkin kore/sore/are ini kedalam kalimat??</p>
                        <p> yuk kita belajar :D </p>
                        <br>
                        <h2>KORE/SORE/ARE WA (Kata Benda) Desu.</h2>
                        <div class="caption_gambar">
                        <img src="<?php echo base_url()?>assets/wallpaper/lesson2_bab1_lanjut.jpg" class="img-responsive" alt="Cinque Terre" >
          
                        <br>
                        <img src="<?php echo base_url()?>assets/wallpaper/lesson2_bab1_lanjutlagi.jpg" class="img-responsive" alt="Cinque Terre" >
                        </div>
                        <h3>A: Apakah itu?</h3>
                        <h3>B : Ini adalah pisang.</h3>
                        <h3>C: Yang manakah?</h3>
                        </ul>
                    <p class="text_transparent">This text is transparent</p>
                    <p class="text_transparent">This text is transparent</p>
                    
                    <h3>Kore o kudasai</h3>
                    <p style="font-style:italic">Saya mau yang ini</p>
                    <ul style="list-style-type:disc">
                        <p class="text_transparent" >Dadan san wa gaukusei jya arimasen.</p>
                        <p class="text_transparent">    Dadan bukanlah seorang pelajar.</p>
                        <p class="text_transparent">Watashi wa nihon jin jya arimasen.</p>
                        <p class="text_transparent">    Saya bukanlah orang Jepang.</p>
  
</ul>
                    
                    <h2 class="section-heading">
                    2.   Kono N/ Sono N/Ano N
                    </h2>
                    <p class="text-left">
                            Kono/sono/ano adalah kata tunjuk yang tidak bisa berdiri sendiri. Harus selalu disertai kata benda
                    <p class="text-left">
                    Contoh :
                    </p>
               
                    
                    <ul style="list-style-type:disc">
  <li>Kono zasshi   Majalah ini</li>
  
  <li>Sono hon   Buku itu</li>
  <li> Ano onna no hito      Anak perempuan itu</li>
  
</ul>
                    <img src="<?php echo base_url()?>assets/wallpaper/kaban_desu.png" class="img-responsive" alt="Cinque Terre" >
                    
                     <h2 class="section-heading">
                    3.  Sou desu/Sou jya Arimasen
                    </h2>
                    <p class="text-left">
                        <span style="font-weight:bold"> Sou </span>
                        biasa digunakan untuk menjawab pertanyaan untuk postif maupun negatif. 
                    <p class="text-left">
                        Untuk jawaban yang positif menggunakan <span style="text-decoration:underline;color:palevioletred;"> Hai, Sou Desu </span>
                    </p>
                    <p class="text-left">
                        Sedangkan untuk jawaban negatif menggunakan <span style="text-decoration:underline;color:palevioletred;"> Hai, Sou jya arimasen </spa
                    </p>
                    <ul style="list-style-type:disc">
                    
                        <li> Sore wa nihongo no jisho desuka.            <span style="font-style:italic">Apakah itu kamus Bahasa Jepang?</span> </li>
  
                        <p> …. Hai, <span style="font-weight:bold"> sou desu </span>  … Iya <span style="font-weight:bold"> betul </span></p>
                        <p> … Iie, <span style="font-weight:bold">  sou jya arimasen </span>  … Tidak <span style="font-weight:bold"> Bukan </span></p>
  
                    
                    <p>Untuk menyangkal ataupun menyatakan jawaban yang negatif bisa juga menggunakan </p>
                    <h3 style="color:palevioletred;">Chigaimasu</h3>
                    
                    <li> <p >Are wa anata no enpitsu desuka    <span style="font-style:italic"> Apakah itu pensil anda?</span>     .</p> </li>
                    <p> … iie, <span style="font-weight:bold;text-decoration:underline">  chigaimasu           .....Bukan, <span style="font-style:italic"> bukan itu</span>  </p>
                    
                    </ul>
                     <h2 class="section-heading">
                    4. S1 Ka, S2 Ka
                    </h2>
                    <p class="text-left">
                           Pola kalimat ini digunakan untuk menanyakan kepada pendengar untuk memilih suatu alternatif atau sesuatu yang lebih dari satu.
                    <p class="text-left">
                   Untuk menjawab kalimat seperti ini tidak perlu memakai Hai atau Iie, cukup jawab dengan memilih salah satu saja.
                    </p>
                    <p class="text-left">
                   C no D = DC
                    </p>
                    </p>
                    
                    <ul style="list-style-type:disc">
  <li> 
      <p class="text-left">Kore wa <span style="font-weight:bold;"> borupen desuka, sha-pu penshiru desuka. </span>     <span style="font-style:italic">  Apakah ini adalah Ballpoint atau pensil mekanik? </span></p>
      <p class="text-left">   …. Borupen desu.      <span style="font-style:italic">       …itu ballpoint </span>  </p>
  </li>

</ul>
                    
                    <h2 class="section-heading">
                    5. Sou desuka
                    </h2>
                    <p class="text-left">
                        <span style="font-weight:bold">  Sou desuka </span> adalah ekspresi yang digunakan ketika menerima informasi baru dan menunjukkan bahwa dia telah mengerti
                    <p class="text-left">
                    San tidak dipakai untuk penyebutan nama sendiri.
                    </p>
                    <p class="text-left">
                  Penggunaan kata anata yang berarti "anda/kamu" jarang digunakan apabila anda telah mengetahui nama dari lawan bicara anda tersebut. Cukup sebutkan namanya dan ditambahkan kata ~san
                    </p>
                    </p>
                    
                    <ul style="list-style-type:disc">
  <li> 
      <p class="text-left">Kono kasa wa anata no desuka.     <span style="font-style:italic">     Apakah payung ini punya anda? </span></p>
      <p class="text-left">   … Iie chigaimasu. Yamada san no desu.        <span style="font-style:italic">     ..Bukan, itu punya Yamada san. </span> </p>
      <p class="text-left">    <span style="font-weight:bold">        Sou desuka.           <span style="font-style:italic">  Oh begitu. </span> </span></p>
      </li>
  
  <li>  <img src="<?php echo base_url()?>assets/wallpaper/tatabahasa_final.png" class="img-responsive" alt="Cinque Terre" >
  <img src="<?php echo base_url()?>assets/wallpaper/tatabahasa_final2.jpg" class="img-responsive" alt="Cinque Terre" ></li>
  <button class=""> <?php echo anchor('c_main/soal_tes2', 'Kuis Lesson 2'); ?> </button>
  
  
  
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
