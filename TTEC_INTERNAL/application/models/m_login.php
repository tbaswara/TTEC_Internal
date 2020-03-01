<?php
	class M_login extends CI_Model
	{
		function cek_user($username, $password)
		{		
			$query = $this->db->query("select * from admin where Username='$username' and Password='$password'");
			if ($query->num_rows > 0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	}
?>