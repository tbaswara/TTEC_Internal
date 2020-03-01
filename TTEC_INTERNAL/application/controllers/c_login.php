<?php
	
	class C_login extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('session');
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-cek=0, pre-cek=0");
			$this->output->set_header("Pragma : no-cache");
		}
		
		function index()
		{
			if ($this->islogin())
			{
				redirect('c_main/user_area');
			}
			else
			{
				$this->load->view('page_login');
			}
		}
	
		function login_process()
		{	
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if ($username != '' && $password != '')
			{
				$this->load->model('m_login','',TRUE);
				$dt = $this->m_login->cek_user($username, $password);
				if ($dt != FALSE)
				{
					$data = array(
						'username' => $this->input->post('username'),
						'is_logged_in' => true,
                                                'user_biasa' => false
					);
					$this->session->set_userdata('logged_in',$data);
					redirect('c_main/user_area');
				}
				else
				{
					echo "<script type=\"text/javascript\">alert('Wrong username or password'); history.go(-1);</script>";
				}
			}
                        
                        else if($this->input->post('login_user'))
                        {
                            $data = array(
						'username' => $this->input->post('username'),
						'is_logged_in' => true,
                                                'user_biasa' => true
					);
					$this->session->set_userdata('logged_in',$data);
					redirect('c_main/user_area');
                        }
                        
			else
			{
				echo "<script type=\"text/javascript\">alert('Username atau Password anda salah. Tolong isi dengan tepat.'); history.go(-1);</script>";
			}
		}
		
	function islogin()
		{
			if ($this->session->userdata('logged_in') != null)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		function logout()
		{
			$this->session->unset_userdata('logged_in');
			$this->session->sess_destroy();
			redirect('c_login');
		}

		
	}
	
?>