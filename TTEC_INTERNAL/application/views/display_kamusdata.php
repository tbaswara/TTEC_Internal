<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Kamus Data</title>

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
  }
  
        function HandleSelect()
            {
var feedbackEl = document.getElementById('search_kamus');
var commentEl = document.getElementById('keyword');

feedbackEl.addEventListener('change', function(){
    commentEl.disabled = !(this.value === 'classification');
});

}
 function handleSelect_2() {
     if (document.getElementById("regular").checked) {
         document.getElementById('namatrainer').disabled = true;
     } else {
         document.getElementById('namatrainer').disabled = false;
     }
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
                      <?php echo form_open('c_main/search_datakamus'); ?>  
                         Search By Classification
                         <select id="search_kamus" name="search_kamus" onchange="HandleSelect()">
                             <option id="classification" class="classification" value="Production/Engineering">Production/Engineering</option>
                           <option id="classification" class="classification" value="HRGA">HRGA</option>
                             <option id="classification" class="classification" value="Safety" >Safety</option>
                              <option id="classification" class="classification" value="Accounting" >Accounting</option>
                               <option id="classification" class="classification" value="Defect" >Defect</option>
                                <option id="classification" class="classification" value="General" >General</option>


                    </select>
                    <input class="btn btn-default" type="submit" value="Search" >
                    <input type="text" id="keyword" name="keyword" size="20" placeholder="Search by romawi"/>
                   <input class="btn btn-default" type="submit" value="Search" >
                    <?php echo form_close(); ?>
                   
                    </div>
                    
                     <img class="" src="<?php echo base_url()?>assets/wallpaper/cherry.png" style="float:right" height="400" >
                   
                    <table class="table-bordered tabel-kamus" border="1">
		<tr bgcolor="green" ><th>No</th><th>Words</th><th>Furigana</th> <th>Romaji</th> <th>Meaning</th> 
                <th>Picture</th> <th>Remark</th>
                <th>Classification</th>
                <?php if($login_user!=TRUE) { ?>
		<th>Update</th> <th>Delete</th> 
                
                <?php 
                } else
                ?>
                </tr>
		
		<?php
                if (is_array($results) || is_object($results))
        {       
		foreach($results as $data)
		{ 
		?>
		
		<tr><td><?php echo $data->No; ?></td>
		<td ><?php echo $data->Kanji; ?></td>
		<td><?php echo $data->Furigana; ?></td>
		<td><?php echo $data->Romaji ; ?></td>
		<td><?php echo $data->Meaning; ?></td>
		<!--<td><?php echo $data->TTEC_Words; ; ?></td> -->
                <td><?php if($data->Picture!=NULL)
                {?>
                    <a href="<?php echo base_url()?><?php echo $data->Picture;?>">
                    <img  id="" src="<?php echo base_url()?><?php echo $data->Picture;?>" class="img-responsive"  alt="<?php echo $data->Picture;?>"  >
                    </a>
                     <?php }
                else 
                ?>
                </td>
		
                <td><?php echo $data->Remarks; ?></td>
		<td><?php echo $data->Classification; ?></td>
                <?php if($login_user!=TRUE) { ?>
		<td><?php echo anchor('c_main/update1/'.$data->No,'Edit');?></td>
		<td><?php echo anchor('c_main/hapus/'.$data->No,'Hapus');?></td>
                
                <?php
                } else
                ?>
                </tr>
		                
		<?php
		}
        }
		?>

			<tr>
			
	<td colspan=2 class = "halaman"><p><?php echo $links; ?></p></td>
         <?php if($login_user!=TRUE) { ?>
        <td><button style="float:left" type="button" ><?php echo anchor('c_main/tambah_kamusdata/','Insert Kamus');?></button></td>
         <?php
                } else
                ?>
	</tr>
	 </table>
                     
                <!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">×</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>     
                   
                   
                </div>
            </div>
           
        </div>
    </section>

   

   
   
      
  </div>
</div>    

    <script type="text/javascript" language="javascript">
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
</script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
