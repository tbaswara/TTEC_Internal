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
			window.location.href = "<?php echo site_url("c_main/hasil_tes");?>?favorite=" + favorite;	
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
            <h1 style="color:#217dbb;margin-bottom:40px" align="center">Kuis</h1>
	<div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <span id="countdown" class="timer"></span>
            <p id="countdown"></p>
            <p>   
            1.Aira san (…) kaisha wa TTEC desu.
            </p>
            <form>        
    <input type="radio" name="materi" value="A" >A. ka<br>
    <input type="radio" name="materi" value="B" >B. mo<br>
    <input type="radio" name="materi" value="C" >C. no<br>
    <input type="radio" name="materi" value="D" >D. wa<br>
    
            </form>
        </div>
        
        <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
           2.Yamada (…) Ohayou Gozaimasu.
            </p>
             <form>   
            <input type="radio" name="materi" value="A" >A. san<br>
    <input type="radio" name="materi" value="B" >B. no<br>
	<input type="radio" name="materi" value="C" >C. wa<br>
    <input type="radio" name="materi" value="D" >D. ka<br>
    
         </form>   
    </div>
        
       <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>  
           3.           A : Anata wa Nihon jin desu(…)                          
            </p>
            <p>
                         B : Hai, watashi wa nihon jin desu.
            </p>
           
             <form>   
            <input type="radio" name="materi" value="A" >A. wa<br>
    <input type="radio" name="materi" value="B" >B. mo<br>
	<input type="radio" name="materi" value="C" >C. ka<br>
    <input type="radio" name="materi" value="D" >D. san<br>
    
         </form>   
    </div>
        <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
           4.	Watashi wa opere-ta- desu.
            </p>
            <p>
                    Dadan san (…) opere-ta- desu.
            </p>
            
             <form>   
            <input type="radio" name="materi" value="A" >A.mo<br>
    <input type="radio" name="materi" value="B" >B. no<br>
	<input type="radio" name="materi" value="C" >C. ka<br>
    <input type="radio" name="materi" value="D" >D. wa<br>
    
         </form>   
    </div>
        <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
           5.	 A : Sumimasenga, Anata wa Hayashi san desuka?
            </p>
            <p>
                     B : iie, Hayashi (…..)
            </p>
                <p>
                               Yamada desu.
            </p>
             <form>   
            <input type="radio" name="materi" value="A" >A. wa<br>
    <input type="radio" name="materi" value="B" >B. ka<br>
	<input type="radio" name="materi" value="C" >C. jya arimasen <br>
    <input type="radio" name="materi" value="D" >D. desu<br>
    
         </form>   
    </div>
            
        <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
           6.	Pensil = Enpitsu
            </p>
            <p>
                 Saya = Watashi   
            </p>
            <p>
                    Pensil Saya = ….
            </p>
             <form>   
            <input type="radio" name="materi" value="A" >A. watashi no enpitsu<br>
            <input type="radio" name="materi" value="B" >B. enpitsu no watashi <br>
	<input type="radio" name="materi" value="C" >C. watashi wa enpitsu <br>
    <input type="radio" name="materi" value="D" >D. Enpitsu wa watashi<br>
    
        </form>   
    </div>
            
        <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>  
           7.    Sepatu = Kutsu
            </p>
            <p>
                     Anda = Anata
            </p>
            <p>
                         Sepatu Anda = ….
            </p>
             <form>   
            <input type="radio" name="materi" value="A" >A. kutsu mo anata<br>
            <input type="radio" name="materi" value="B" >B. kutsu no anata<br>
	<input type="radio" name="materi" value="C" >C.anata no kutsu<br>
    <input type="radio" name="materi" value="D" >D.anata mo kutsu<br>
    
         </form>   
    </div>
       
      <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
           8.	Ano hito (…) dare desuka
            </p>
             <form>   
            <input type="radio" name="materi" value="A" >A. ka<br>
    <input type="radio" name="materi" value="B" >B. mo<br>
	<input type="radio" name="materi" value="C" >C. no<br>
    <input type="radio" name="materi" value="D" >D. wa<br>
    
         </form>   
    </div>
     <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
                9.	<li>
                <p>A: Hajimemashite.</p>
                <p>
                Watashi wa Rama desu.    
            </p>
            <p>
               (…) yoroshiku onegaishimasu.
            </p>
                </li>
            </p>
            
            <li>
            <p>
             B: Novi desu. Yoroshiku onegaishimasu       
            </p>
            </li>
             <form>   
            <input type="radio" name="materi" value="A" >A. Douzo<br>
    <input type="radio" name="materi" value="B" >B. Doumo<br>
	<input type="radio" name="materi" value="C" >C. Doko<br>
    <input type="radio" name="materi" value="D" >D. Dore<br>
    
         </form>   
    </div>
    
    <div class="textbody_kimia" style="clear:both;margin-bottom:30px">
            <p>   
           10.  Watashi wa Indonesia (…) desu. 
            </p>
             <form>
			
            <input type="radio" name="materi" value="A" >A. mo<br>
            <input type="radio" name="materi" value="B" >B. ka<br>
	<input type="radio" name="materi" value="C" >C. jin<br>
    <input type="radio" name="materi" value="D" >D. wa<br>
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