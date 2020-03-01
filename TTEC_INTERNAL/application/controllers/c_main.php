<?php
	
	class c_main extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_ttec_internal','',TRUE);
			$this->load->library('template_library');
			$this->load->helper(array('form','url','html'));
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->library('pagination');
               
                        
                       
                          //load mPDF library
                       
		}
                
                function display_homepage()
		{	
		if ($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				
					
			
			$this->load->view('display_homepage.php',$data);
		   }
			else
			{
				$this->load->view('page_login.php');
			}
		}
                
                 function display_upload()
		{	
		if ($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				
					
			
			$this->load->view('tes_upload.php',$data);
		   }
			else
			{
				$this->load->view('page_login.php');
			}
		}
		
		
		function display_kamusdata()
		{	
		if ($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				
					
			$data['list_data']=$this->m_ttec_internal->get_kamus_data();
			$config['base_url']=base_url()."index.php/c_main/display_kamusdata";
			$config['total_rows']=$this->m_ttec_internal->record_kamus();
			$config['per_page']=30;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
 
                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                        $data["results"] = $this->m_ttec_internal->fetch_countries($config["per_page"], $page);
                        $data["links"] = $this->pagination->create_links();
                        if($session_data['user_biasa']==TRUE)
                        {
                            $data['login_user'] = TRUE;
                        }
                        else
                        {
                             $data['login_user'] = FALSE;
                        }
			$this->load->view('display_kamusdata.php',$data);
                        
		   }
			else
			{
				$this->load->view('page_login.php');
			}
		}
                
                 function display_tatabahasa()
		{	
		if ($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
			
                               
                        $data['list_data']=$this->m_ttec_internal->get_lesson1_vocab();
			$config['base_url']=base_url()."index.php/c_main/display_tatabahasa";
			$config['total_rows']=$this->m_ttec_internal->record_lesson1_vocab();
			$config['per_page']=30;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                        
			$data["results"]=$this->m_ttec_internal->fetch_lesson1($config["per_page"], $page);
                        $data["results_2"]=$this->m_ttec_internal->fetch_lesson1_perkenalan($config["per_page"], $page);
                        $data["results_3"]=$this->m_ttec_internal->fetch_lesson1_perkenalan2($config["per_page"], $page);
			$this->load->view('display_tatabahasa.php',$data);
		   }
			else
			{
				$this->load->view('page_login.php');
			}
		}
                
                 public function hasil_tes()
                {
                    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username']= $session_data['username'];
     $this->load->view('display_hasilkuis',$data);
   }
   else
   {
     //If no session, redirect to login page
     $this->load->view('page_login','refresh');
   }
                }
                
                                 public function hasil_tes2()
                {
                    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username']= $session_data['username'];
     $this->load->view('display_hasilkuis2',$data);
   }
   else
   {
     //If no session, redirect to login page
     $this->load->view('page_login','refresh');
   }
                }
                
                 function display_lesson2()
		{	
		if ($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
			
                               
                        $data['list_data']=$this->m_ttec_internal->get_lesson2_vocab();
			$config['base_url']=base_url()."index.php/c_main/display_lesson2";
			$config['total_rows']=$this->m_ttec_internal->record_lesson2_vocab();
			$config['per_page']=30;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                        
			$data["results"]=$this->m_ttec_internal->fetch_lesson2($config["per_page"], $page);
   			$this->load->view('display_lesson2.php',$data);
		   }
			else
			{
				$this->load->view('page_login.php');
			}
		}
                
                public function soal_tes()
	{
		if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username']= $session_data['username'];
      $data['list_data']=$this->m_ttec_internal->get_kuis_1();
			$config['base_url']=base_url()."index.php/c_main/soal_tes";
			$config['total_rows']=$this->m_ttec_internal->record_kuis_1();
                        $config['per_page']=30;
                        $config["uri_segment"] = 3;
			$this->pagination->initialize($config);
                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                        $data["results"]=$this->m_ttec_internal->fetch_kuis_1($config["per_page"], $page);
     $this->load->view('display_kuis_new',$data);
   }
   else
   {
     //If no session, redirect to login page
     $this->load->view('page_login','refresh');
   }
	}
        
                        public function soal_tes2()
	{
		if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username']= $session_data['username'];
     $this->load->view('display_kuis2',$data);
   }
   else
   {
     //If no session, redirect to login page
     $this->load->view('page_login','refresh');
   }
	}
            
                
                function display_kana()
		{	
		if ($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
			
					
			$this->load->view('display_kana.php',$data);
		   }
			else
			{
				$this->load->view('page_login.php');
			}
		}
                
                 public function coba_upload() { 
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 1000; 
        
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            $kambing=$this->input->post('romaji');
            $this->load->view('tes_upload', $error); 
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            $data['path']=$this->upload->data('file_name'); 
         $data['kambing']=$this->input->post('romaji');
            $this->load->view('upload_success', $data); 
         } 
      }  
                
                
		
	
//===========================================================================================================================================
		
		function tambah()
		{	
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('umur', 'Umur', 'required|numeric');
			$this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('tanggalpendaftaran', 'Tanggal Pendaftaran', 'required');
			$this->form_validation->set_rules('programlatihan', 'Program Latihan', 'required');
                        $this->form_validation->set_rules('namatrainer', 'Nama Trainer', 'required');

			
			if ($this->form_validation->run() == FALSE)
			{
			$this->load->view('insert_member');
			}
			
			else
			{
			
			
			if($this->input->post('submit'))
			{
				
				$this->m_ttec_internal->insertdata();
                                echo "<script type=\"text/javascript\">alert('Data telah berhasil diinput'); history.go(-1);</script>";
				//redirect ('c_main/display_member');
			}
			
			$this->load->view('display_member.php');
			
			}
		}
                
                function tambah_kamusdata()
		{	
			$this->form_validation->set_rules('words', 'Word', 'required');
                      	$this->form_validation->set_rules('romaji', 'Romaji', 'required');
			$this->form_validation->set_rules('meaning', 'Meaning', 'required');
                        $this->form_validation->set_rules('classification', 'Classification', 'required');

			
			if ($this->form_validation->run() == FALSE)
			{
			$this->load->view('insert_kamusdata');
			}
			
			else
			{
			
			
			if($this->input->post('submit'))
			{
                            
                           $config['upload_path']   = './uploads/'; 
                            $config['allowed_types'] = 'gif|jpg|png'; 
                            $config['max_size']      = 1000; 
        
                            $this->load->library('upload', $config);
			
             if ( ! $this->upload->do_upload('userfile')) {
               $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('insert_kamusdata', $error); 
                                                }
			
                    else { 
                     $file_data= $this->upload->data();   
                     $data = array(
                         'upload_data' => $this->upload->data(),
                         'nama_gambar' => $file_data['file_name']
                             );
                     $tes=$file_data['file_name'];
                     $data['nama_file'] = $this->input->post('userfile');
                     $this->m_ttec_internal->insert_kamus($tes);
                                echo "<script type=\"text/javascript\">alert('Data telah berhasil diinput'); history.go(-1);</script>";
                              } 
				
				
				//redirect ('c_main/display_member');
			}
			
			//$this->load->view('display_kana.php');
			
			}
		}
		
		
		function view_detail()
		{	
			$vnim = $this->uri->segment(3);
			$data['list_data'] = $this->m_ttec_internal->get_detail_data($vnim);
			$this->load->view('display_detail_member.php',$data);
		}
		
		function update1_teuing()
		{	
			$vnim = $this->uri->segment(3);
			$data['list_data'] = $this->m_ttec_internal->get_detail_data($vnim);
			$this->load->view('update_member.php',$data);
			
		}
		
		function update2()
		{	
			
			if($this->input->post('submit'))
			{
				$this->m_ttec_internal->updatedata();
				redirect ('c_main/display_member');
			}
			
			$this->load->view('insert_member.php');
		}
                
                	function update1()
		{	
			$vnim = $this->uri->segment(3);
			$data['list_data'] = $this->m_ttec_internal->get_detail_kamus($vnim);
			$this->load->view('update_kamus',$data);
			
		}
		
		function update2_kamus()
		{	
			
			if($this->input->post('submit'))
			{
                                  $config['upload_path']   = './uploads/'; 
                            $config['allowed_types'] = 'gif|jpg|png'; 
                            $config['max_size']      = 1000; 
        
                            $this->load->library('upload', $config);
			
             if ( ! $this->upload->do_upload('userfile')) {
               $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('update_kamus', $error); 
                                                }
			
                    else { 
                     $file_data= $this->upload->data();   
                     $data = array(
                         'upload_data' => $this->upload->data(),
                         'nama_gambar' => $file_data['file_name']
                             );
                     $tes=$file_data['file_name']; 
                            
				$this->m_ttec_internal->updatekamus($tes);
                                echo "<script type=\"text/javascript\">alert('Data telah berhasil diupdate'); history.go(-1);</script>";
				redirect ('c_main/display_kamusdata');
			}
                        }
			
		}
                
                
		function search()
		{
			$data['search'] = $this->m_ttec_internal->keyword();
			$this->load->view('display_search', $data);
		}
                
                
                
                function search_datakamus()
		{      
                    $session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];     
                    $data['tipe_datakamus']=  $this->input->post('search_kamus');
                        if($this->input->post('keyword')!=NULL)
                        {        
                            
                
                        $data['search'] = $this->m_ttec_internal->keyword_romawi();
                        $keyword_romawi=  $this->input->post('keyword');
                        //$keyword_romawi=$this->m_ttec_internal->keyword_romawi();
                        
                        $config['total_rows']=$this->m_ttec_internal->record_search_romawi($keyword_romawi);
			$config['per_page']=10;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                        $data["results"] = $this->m_ttec_internal->fetch_search_romawi($config["per_page"],$page,$keyword_romawi);
                        $data["links"] = $this->pagination->create_links();
                               if($session_data['user_biasa']==TRUE)
                        {
                            $data['login_user'] = TRUE;
                        }
                        else
                        {
                             $data['login_user'] = FALSE;
                        }
                        $this->load->view('display_search_romawi', $data);
                        }
                        else 
                        {
                             $data['tipe_datakamus']=  $this->input->post('search_kamus');
                            $data['search'] = $this->m_ttec_internal->keyword_classification();
                        $keyword_classification=$this->input->post('search_kamus');
			
                        $config['total_rows']=$this->m_ttec_internal->record_search_classification($keyword_classification);
			$config['per_page']=10;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                        $data["results"] = $this->m_ttec_internal->fetch_search_classification($config["per_page"],$page,$keyword_classification);
                        $data["links"] = $this->pagination->create_links();
                        if($session_data['user_biasa']==TRUE)
                        {
                            $data['login_user'] = TRUE;
                        }
                        else
                        {
                             $data['login_user'] = FALSE;
                        }
                        $this->load->view('display_search_classification', $data);
                        }
		}
       
                function search_datakamus_romawi()
		{      
                    
                       
		}
                
                 function search_datakamus_classification()
		{
			
		}
                
                 function search_transaksi()
		{
                        $data['pencarian']=$this->input->post('keyword');
			$data['results'] = $this->m_ttec_internal->keyword_transaksi();
                        $data["links"] = $this->pagination->create_links();
			$this->load->view('display_search_transaksi', $data);
		}
                
                 function search_transaksi_by_proyek()
		{
                        $data['proyek_key']=$this->input->post('keyword_proyek');
			$data['results'] = $this->m_ttec_internal->keyword_transaksi_proyek();
                        $data["links"] = $this->pagination->create_links();
			$this->load->view('display_proyek_transaksi', $data);
		}
                
                 function search_alat()
		{
			$data['results'] = $this->m_ttec_internal->keyword_alat();
			$this->load->view('display_search_alat', $data);
		}
                
                
		
		function hapus()
		{	
			
			$vnim = $this->uri->segment(3);
			$data['list_data'] = $this->m_ttec_internal->hapus_data($vnim);
			redirect ('c_main/display_kamusdata');
			$this->load->view('display_kamusdata.php',$data);
			
		}
		
		
		
		
		function user_area()
		{
			if ($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				redirect ('c_main/display_homepage');
			}
			
			else
			{
				$this->load->view('page_login.php');
			}
		}
		
		function is_logged_in()
		{
			$is_logged_in = $this->session->userdata('logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true)
			{
				echo "<script type=\"text/javascript\">alert('You don\'t have permission to access this page.'); location.href='../c_login';</script>";
			}		
		}
                
                         function logout()
 {
   $this->session->unset_userdata('logged_in');
  
   $this->load->view('page_login.php');
 }
          
	}
	
?>