<html>
 
   <head> 
      <title>Upload Form</title> 
   </head>
	
   <body>  
      <h3>Your file was successfully uploaded!</h3>  
		
      <ul> 
         <?phpforeach ($upload_data as $item => $value):?> 
         <li><?php echo $item;?>: <?php echo $value;?></li> 
         <?phpendforeach; ?>
         <?php echo $path['file_name']; ?>
         <?php
         
         $url_1='uploads/';
         $url_2=$path['file_name'];
         $url_3=$url_1.$url_2;
        
         echo $url_3;
         echo $kambing;
         ?>
      </ul>  
		
      <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>  
   </body>
	
</html>