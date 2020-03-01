<?php

	class M_model_mahasiswa extends CI_Model
	{
		function get_list_data()
		{
			$query=$this->db->query("select * from data_mahasiswa order by nim");
			return $query;
		}

//===========================================================================================================================================

	// LOGIN MODEL
		
		public function logindata()
		{
			/*  
			
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->get('user')
			
			*/
			if(isset($this->session->set_userdata['username']))
				
				{
					$vusername=$this->session->set_userdata['username'];
				}else
				{
			$vusername=$this->input->post('username');
			$vpassword=$this->input->post('password');
			$query=$this->db->query("SELECT * FROM user where username='$vusername' and password='$vpassword'");
				
			if($query->num_rows() == 1)
			{
				$row=$query->row();
				$data_user=array(
					  'username' => $row->username,
					  'password' => $row->password,
					  'validated' => true);
				
				$this->session->set_userdata($data_user);
				return true;
			}else 
			{
			return false;
			}
			}
			return true;
		}
		
		
		
//===========================================================================================================================================
		
		//CRUDS MODEL
		
		function insertdata()
		{
			$vnama=$this->input->post('nama');
			$valamat=$this->input->post('alamat');
			$vumur=$this->input->post('umur');
			$vjenis_kelamin=$this->input->post('jeniskelamin');
			$vtanggal_pendaftaran=$this->input->post('tanggaldaftar');
			$vprogram_latihan=$this->input->post('programlatihan');
			$query=$this->db->query("INSERT INTO member(Nama_Member,Alamat_Member,Umur,Jenis_Kelamin,Tanggal_Pendaftaran,Program_Latihan) 
			VALUES ('$vnama', '$valamat', '$vumur','$jenis_kelamin','$vtanggal_pendaftaran','$vprogram_latihan')");
		}
		
		function updatedata()
		{
			$vnim=$this->input->post('txtnim');
			$vnama=$this->input->post('txtnama');
			$vkelas=$this->input->post('txtkelas');
			$vnim2=$this->input->post('txtnim2');
			$query=$this->db->query(" UPDATE data_mahasiswa set nim = '".$vnim."', nama = '".$vnama."', kelas = '".$vkelas."' WHERE nim = '".$vnim2."' ");
		}
		
		function get_detail_data($vnim)
		{
			$query = $this->db->query("SELECT * FROM data_mahasiswa WHERE nim='".$vnim."'");
			return $query; //->row();
		}
		
		function keyword()
		{
				$keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from data_mahasiswa where nim like'%$keyword%' or nama like '%$keyword%' or kelas like '%$keyword%'");
			return $result->result();
		}
		
		function hapus_data($vnim)
		{
			$query = $this->db->query("DELETE FROM data_mahasiswa WHERE nim=$vnim");
		}
	}

?>