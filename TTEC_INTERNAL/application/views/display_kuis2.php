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
  <script>
var seconds = 1800;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;  
    }
    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
    $(document).ready(function() {
        $("button").click(function(){
            var favorite = [];
            $.each($("input[name='materi']:checked"), function(){            
                favorite.push($(this).val());
                        if(favorite.length==10)
                        {
			window.location.href = "<?php echo site_url("c_main/hasil_tes2");?>?favorite=" + favorite;	
                    }
                    
                    else
                    {
                        $('#target').toggle();
                    }
            });
            
			
        });
    });
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Waktu Habis";
    } else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);




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
                <h2>TTEC Internal Dictionary</h2>
            </div>
        </div>
    </header>
<div class="body-materi" style="margin-left:18%;margin-right:18%;background-color:white">
        
	<div style="margin-top:60px;">
            <h1 style="color:#217dbb;margin-bottom:40px" align="center">Kuis Lesson 2</h1>
	<div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <span id="countdown" class="timer"></span>
            <p id="countdown"></p>
            <p>   
            1. (…) wa nan desuka.

            </p>
                <p>
                    Lihatlah gambar dibawah ini dan berilah kata tunjuk yang tepat
            </p>
            <img class="TextWrap" src="<?php echo base_url("assets/img/latihan/soal_no1.jpg");?>"  align="top">
            <form>        
    <input type="radio" name="materi" value="A" >A. ano<br>
    <input type="radio" name="materi" value="B" >B. sore<br>
    <input type="radio" name="materi" value="C" >C. kore<br>
    <input type="radio" name="materi" value="D" >D. kono<br>
    
            </form>
        </div>
        
        <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
           2. (…) wa bo-rupen desu.
            </p>
            <p>
                    Lihatlah gambar dibawah ini dan berilah kata tunjuk yang tepat
            </p>
            <img class="TextWrap" src="<?php echo base_url("assets/img/latihan/soal_no2.jpg");?>"  align="top">
             <form>   
            <input type="radio" name="materi" value="A" >A. kore<br>
    <input type="radio" name="materi" value="B" >B. sore<br>
	<input type="radio" name="materi" value="C" >C. doko<br>
    <input type="radio" name="materi" value="D" >D. dore<br>
    
         </form>   
    </div>
        
       <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>  
           3. (…) wa bo-rupen desu.                          
            </p>
            <p>
                          Lihatlah gambar dibawah ini dan berilah kata tunjuk yang tepat
            </p>
            </p>
           
            <img class="TextWrap" src="<?php echo base_url("assets/img/latihan/soal_no3.jpg");?>"  align="top"> 
            <form>   
            <input type="radio" name="materi" value="A" >A. are<br>
    <input type="radio" name="materi" value="B" >B. ano<br>
	<input type="radio" name="materi" value="C" >C. kon<br>
    <input type="radio" name="materi" value="D" >D. sore<br>
    
         </form>   
    </div>
        <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
           4. Sore wa no-to desu (..), jisho desu(…)
            </p>
          
            
             <form>   
            <input type="radio" name="materi" value="A" >A.no<br>
    <input type="radio" name="materi" value="B" >B. wa<br>
	<input type="radio" name="materi" value="C" >C. ga<br>
    <input type="radio" name="materi" value="D" >D. ka<br>
    
         </form>   
    </div>
        <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
          5. A: (…) kasa wa dare no desuka.
            </p>
            <p>
                        B: Sono kasa wa watashi no desu.
            </p>
                <p>
                                   C: Sou desuka.
            </p>
             <form>   
            <input type="radio" name="materi" value="A" >A. ano<br>
    <input type="radio" name="materi" value="B" >B. kono<br>
	<input type="radio" name="materi" value="C" >C. dono <br>
    <input type="radio" name="materi" value="D" >D. sono<br>
    
         </form>   
    </div>
            
        <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
           6. A: Ano jisho wa nihongo no jisho desuka.
            </p>
            <p>
                     B: Hai, (…)   
            </p>
             <form>   
            <input type="radio" name="materi" value="A" >a. sou desu<br>
            <input type="radio" name="materi" value="B" >b. sou jya arimasen <br>
	<input type="radio" name="materi" value="C" >c. soudesuka <br>
    <input type="radio" name="materi" value="D" >d. soudesune<br>
    
        </form>   
    </div>
            
        <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>  
           7. A: Anata no kaban wa kore desuka.
            </p>
            <p>
                       B: Iie, (…)
            </p>
             <form>   
            <input type="radio" name="materi" value="A" >a. chigaimasu<br>
            <input type="radio" name="materi" value="B" >b. sou desu<br>
	<input type="radio" name="materi" value="C" >c. sou desuka<br>
    <input type="radio" name="materi" value="D" >d. sou desune<br>
    
         </form>   
    </div>
       
      <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
          8. A: (…) chokore-to wa oishii desuka.
            </p>
                <p>
                           B: Hai, sou desu. Sono chokore-to wa Oishii desuyo.
            </p>
             <form>   
            <input type="radio" name="materi" value="A" >A. kore<br>
    <input type="radio" name="materi" value="B" >B. sono<br>
	<input type="radio" name="materi" value="C" >C. kono<br>
    <input type="radio" name="materi" value="D" >D. ano<br>
    
         </form>   
    </div>
     <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
               9. A: Kore wa anata no kaban desuka.
            </p>   
                <p>
                   B: Hai sou desu.
            </p>
            <p>
                   A: Hontou ni kirei kaban desune
            </p>
            <p>
            </p>
            <p>
                B: Sou desuka.    
            </p>
             <p>
                        (…) Arigatou Gozaimasu.   
            </p>

             <form>   
            <input type="radio" name="materi" value="A" >A. Doumo<br>
    <input type="radio" name="materi" value="B" >B. Douzo<br>
	<input type="radio" name="materi" value="C" >C. Doko<br>
    <input type="radio" name="materi" value="D" >D. Dono<br>
    
         </form>   
    </div>
    
    <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
           10. A: Sumimasen, kore o kudasai 
            </p>
                <p>
                          B: Hai, (…)
            </p>
             <form>
			
            <input type="radio" name="materi" value="A" >A. Doumo<br>
            <input type="radio" name="materi" value="B" >B. Douzo<br>
	<input type="radio" name="materi" value="C" >C. Dono<br>
    <input type="radio" name="materi" value="D" >D. Kono<br>
        <p id="demo"></p>
    
           </form>   
    </div>        
            
            
	</div>
        <button type="button" style="color:#217dbb" onclick="Rekap()">Selesai</button>
    </div>  
    
   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  </body>
</html>    