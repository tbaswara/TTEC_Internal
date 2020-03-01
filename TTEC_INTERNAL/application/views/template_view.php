<body background="<?php echo base_url()?>assets/wallpaper/wallpaper.jpeg">
<TABLE BORDER = 1 width = '100%' >
<TR ><TD colspan = 2 height = '100px'><?php echo $header; ?></TD></TR>
<tr>
				<td><center><h4><?php echo anchor('c_mahasiswa/user_area', 'Home'); ?> | <?php echo anchor('c_mahasiswa/display', 'Data Member'); ?> | | <?php echo anchor('c_mahasiswa/display', 'Data Trainer'); ?> | <?php echo anchor('c_login/logout', 'Logout'); ?></h4></center></td>
</tr>
<TR><TD colspan = 2 height = '400px'><?php echo $content; ?></TD></TR>
<TR><TD colspan = 2 height = '100px'><?php echo $footer; ?></TD></TR>
</TABLE>



</BODY>

</HTML>