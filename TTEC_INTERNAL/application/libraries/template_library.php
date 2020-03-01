	<?php
	class template_library{		
		function __construct(){
			$this->ci=&get_instance();
			$this->page=$this->ci->uri->segment(2);
			$this->page=($this->page=="")?"home":$this->page;
		}
		
		function display($konten, $data=null)
		{
			$data['header']=$this->ci->load->view('header_view', $data, TRUE);
			$data['content']=$this->ci->load->view($konten, $data, TRUE);
			$data['footer']=$this->ci->load->view('footer_view', $data, TRUE);
			$this->ci->load->view('example04.php', $data);
		}
	}
?>