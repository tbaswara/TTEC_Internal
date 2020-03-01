<?php

	class M_ttec_internal extends CI_Model
	{
		function get_kamus_data()
		{
			$query=$this->db->query("select * from data_kamus order by No");
			return $query;
		}
                
                function get_lesson1_vocab()
		{
			$query=$this->db->query("select * from lesson1_vocab order by No_Vocabulary ");
			return $query;
		}
                
                  function get_lesson2_vocab()
		{
			$query=$this->db->query("select * from lesson2_vocab order by No_Vocabulary ");
			return $query;
		}
                
                       function get_kuis_1()
		{
			$query=$this->db->query("select * from kuis_1 order by No_Kuis ");
			return $query;
		}
                
                
                  
                function record_lesson1_vocab()
		{
			 return $this->db->count_all("lesson1_vocab");
		}
                
                   function record_lesson2_vocab()
		{
			 return $this->db->count_all("lesson2_vocab");
		}
                
                     function record_kuis_1()
		{
			 return $this->db->count_all("kuis_1");
		}
		
		public function record_kamus() 
		{
        return $this->db->count_all("data_kamus");
		}
                
                public function record_search_romawi($keyword) 
		{
                    $keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from data_kamus where  Romaji like '%$keyword%' ");
			return $this->db->count_all_results();;
		}
                public function record_search_classification($keyword) 
		{
                    $keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from data_kamus where  Classification like '%$keyword%' ");
			return $this->db->count_all_results();;
		}
                
		
		
		
		public function fetch_countries($limit, $start) 
		{
                $this->db->limit($limit, $start);
                 $query = $this->db->get("data_kamus");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                return false;
		}
                
                public function fetch_lesson1($limit, $start) 
		{
                $this->db->limit($limit, $start);
                 $query=$this->db->query("select * from lesson1_vocab order by No_Vocabulary Limit 20 ");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                 
                return false;
		}
                
                   public function fetch_lesson2($limit, $start) 
		{
                $this->db->limit($limit, $start);
                 $query=$this->db->query("select * from lesson2_vocab order by No_Vocabulary");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                 
                return false;
		}
                
                public function fetch_lesson1_perkenalan2($limit, $start) 
		{
                $this->db->limit($limit, $start);
                 $query=$this->db->query("select * from lesson1_perkenalan order by No_Perkenalan  ");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                 
                return false;
		}
                
                 public function fetch_lesson1_perkenalan($limit, $start) 
		{
                $this->db->limit($limit, $start);
                 $query=$this->db->query("select * from lesson1_vocab order by No_Vocabulary Limit 8 offset 20 ");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                 
                 
                 
                return false;
		}
                
                       
                public function fetch_kuis_1($limit, $start) 
		{
                $this->db->limit($limit, $start);
                 $query=$this->db->query("select * from kuis_1 order by No_Kuis ");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                 
                return false;
		}
                
                
                
                public function fetch_search_romawi($limit, $start,$keyword) 
		{
                $this->db->limit($limit, $start);
                 $query = $this->db->query("select * from data_kamus where  Romaji like '%$keyword%'");;
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                return false;
		}
                
                 public function fetch_search_classification($limit, $start,$keyword) 
		{
                $this->db->limit($limit, $start);
                 $query = $this->db->query("select * from data_kamus where  Classification like '%$keyword%'");;
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                return false;
		}
                
                public function fetch_laporan_kehadiran_by_date($limit, $start,$vdate) 
		{
                $this->db->limit($limit, $start);
                 $query = $this->db->query("SELECT * FROM kehadiran WHERE Hari='".$vdate."'");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                return false;
		}
                
                 public function fetch_laporan_kehadiran_by_month($limit, $start,$vbulan,$vyear) 
		{
                $this->db->limit($limit, $start);
                 $query = $this->db->query("SELECT * FROM kehadiran WHERE Month(Hari)='".$vbulan."' AND Year(Hari)='".$vyear."'");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                return false;
		}
                
                public function fetch_transaksi_by_date($limit, $start,$vdate) 
		{
                $this->db->limit($limit, $start);
                 $query = $this->db->query("SELECT * FROM transaksi WHERE Tanggal_Transaksi='".$vdate."'");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                return false;
		}
                
                public function fetch_transaksi_by_month($limit, $start,$vbulan,$vyear) 
		{
                $this->db->limit($limit, $start);
                 $query = $this->db->query("SELECT * FROM transaksi WHERE Month(Tanggal_Transaksi)='".$vbulan."' AND Year(Tanggal_Transaksi)='".$vyear."'");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                return false;
		}
                
                
                public function fetch_member_by_month_paid($limit, $start,$vbulan,$vyear) 
		{
                $this->db->limit($limit, $start);
                 $query = $this->db->query("SELECT * FROM member WHERE Month(Tanggal_Pembayaran)='".$vbulan."' AND Year(Tanggal_Pembayaran)='".$vyear."'");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                return false;
		}
                
                 public function fetch_member_by_age($limit, $start,$batas_umur,$batas_umur2) 
		{
                $this->db->limit($limit, $start);
                 $query = $this->db->query("select * from member where  Umur between '".$batas_umur."' AND  '".$batas_umur2."' ");
 
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
                 }
                return false;
		}
                
		
		public function fetch_kehadiran($limit, $start) 
		{
        $this->db->limit($limit, $start);
        $query = $this->db->get("kehadiran");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		}
                
                public function fetch_alat_latihan($limit, $start) 
		{
        $this->db->limit($limit, $start);
        $query = $this->db->get("alat_latihan");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		}
                
                 public function fetch_transaksi($limit, $start) 
		{
                 $this->db->limit($limit, $start);
                   $query=$this->db->query("select * from transaksi order by Tanggal_Transaksi  Asc");
 
                 if ($query->num_rows() > 0) {
                 foreach ($query->result() as $row) {
                $data[] = $row;
                    }
                    return $data;
                 }
                    return false;
		}
                
                public function fetch_jadwal_latihan($limit, $start) 
		{
                $this->db->limit($limit, $start);
                $query = $this->db->get("jadwal_latihan");
 
             if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
                }
                return $data;
                  }
        return false;
		}
		
		function get_data_trainer()
		{
			$query=$this->db->query("select * from trainer order by ID_Trainer");
			return $query;
		}
                
                function get_data_latihan()
		{
			$query=$this->db->query("SELECT trainer.`Nama_Trainer` AS Nama_pelatih,
                                                    jadwal_latihan.`Jadwal_1`,
                                                    jadwal_latihan.`Jadwal_2`,
                                                    jadwal_latihan.`Jadwal_3`,
                                                    jadwal_latihan.`Jadwal_4`,
                                                    jadwal_latihan.`Jadwal_5`,
                                                    jadwal_latihan.`Jadwal_6`
                                                    FROM jadwal_latihan
                                                    INNER JOIN trainer
                                                    ON jadwal_latihan.`Nama_Trainer`=trainer.`Nama_Trainer`;
");
			return $query;
		}
                
                  function get_data_alat_latihan()
		{
			$query=$this->db->query("select * from alat_latihan order by ID_Alat");
			return $query;
		}
                
                function get_data_transaksi()
		{
			$query=$this->db->query("select * from transaksi order by ID_Transaksi");
			return $query;
		}
		
		function get_data_kehadiran()
		{
			$query=$this->db->query("select * from kehadiran order by No_Kehadiran");
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
			if(isset($this->session->set_userdata['Username']))
				
				{
					$vusername=$this->session->set_userdata['Username'];
				}else
				{
			$vusername=$this->input->post('username');
			$vpassword=$this->input->post('password');
			$query=$this->db->query("SELECT * FROM admin where Username='$vusername' and Password='$vpassword'");
				
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
			$vtanggal_pendaftaran=$this->input->post('tanggalpendaftaran');
                        $vtanggal_pembayaran=$date = new DateTime($vtanggal_pendaftaran);
                        $vtanggal_pembayaran->add(new DateInterval('P1M'));
                        $vtanggal_bayar=$vtanggal_pembayaran->format('Y-m-d');
                        $vstatuspembayaran='Belum Lunas';
			$vprogram_latihan=$this->input->post('programlatihan');
			$vnama_trainer=$this->input->post('namatrainer');
                        
                        if($vprogram_latihan=="Regular")
                        {
                            $vnama_trainer=null;
                            $vjumlah_pembayaran=150000;
                        }
                        
                        else
                        {
                        $query=$this->db->query("SELECT Biaya_Trainer FROM trainer WHERE Nama_Trainer='".$vnama_trainer."' LIMIT 1 ");
                        $row=$query->row();
                        $vjumlah_pembayaran=$row->Biaya_Trainer;
                        }
                        
			$query=$this->db->query("INSERT INTO member(Nama_Member,Alamat_Member,Umur,Jenis_Kelamin,Tanggal_Pendaftaran,Tanggal_Pembayaran,Status_Pembayaran,Jumlah_Pembayaran,Program_Latihan,Nama_Trainer) 
			VALUES ('$vnama','$valamat','$vumur','$vjenis_kelamin','$vtanggal_pendaftaran','$vtanggal_bayar','$vstatuspembayaran','$vjumlah_pembayaran','$vprogram_latihan','$vnama_trainer')");
                       
                        
		}
		
		function insert_kamus($tes)
		{
                    
			$vwords=$this->input->post('words');
                        $vfurigana=$this->input->post('furigana');
			$vromaji=$this->input->post('romaji');
			$vmeaning=$this->input->post('meaning');
			$vttec_words=$this->input->post('TTEC_Words');
                        $url_gambar=$this->upload->data('file_name');
                        $url_asli='uploads/';
                        $url_fix=$tes;
                        $vpicture=$url_asli.$url_fix;
                       $vremark=$this->input->post('remark');
                        $vclassification=$this->input->post('classification');
			$query=$this->db->query("INSERT INTO data_kamus(Kanji,Furigana,Romaji,Meaning,TTEC_Words,Picture,Remarks,Classification) 
			VALUES ('$vwords','$vfurigana','$vromaji','$vmeaning','$vttec_words','$vpicture','$vremark','$vclassification')");
		}
                
               
		function updatedata()
		{
			$id=$this->input->post('id_member');
			$vnama=$this->input->post('nama');
			$valamat=$this->input->post('alamat');
			$vumur=$this->input->post('umur');
			$vjenis_kelamin=$this->input->post('jeniskelamin');
			$vnama_trainer=$this->input->post('nama_trainer');
                        $query=$this->db->query("SELECT Biaya_Trainer FROM trainer WHERE Nama_Trainer='".$vnama_trainer."' LIMIT 1 ");
                        $row=$query->row();
                        $vjumlah_pembayaran=$row->Biaya_Trainer;
			$query=$this->db->query(" UPDATE member set Nama_Member = '".$vnama."',Alamat_Member= '".$valamat."',
			Umur='".$vumur."',Jenis_Kelamin='".$vjenis_kelamin."',Jumlah_Pembayaran = '".$vjumlah_pembayaran."',Nama_Trainer = '".$vnama_trainer."' WHERE ID_Member = '".$id."' ");
		}
                
                function updatekamus($url_gambar)
		{
			$id=$this->input->post('no_kamus');
			$vwords=$this->input->post('words');
			$vfurigana=$this->input->post('furigana');
			$vromaji=$this->input->post('romaji');
			$vmeaning=$this->input->post('meaning');
			$vremarks=$this->input->post('remark');
                        $url_asli='uploads/';
                        $vpicture=$url_asli.$url_gambar;
                        $vclassification=$this->input->post('classification');
			$query=$this->db->query(" UPDATE data_kamus set Kanji = '".$vwords."',Furigana= '".$vfurigana."',
			Romaji='".$vromaji."',Meaning='".$vmeaning."',Remarks = '".$vremarks."',Picture = '".$vpicture."',Classification = '".$vclassification."' WHERE No = '".$id."' ");
		}
                
                function updatedata_transaksi()
		{
			$id=$this->input->post('id_transaksi');
			$vnama=$this->input->post('nama');
			$vtanggal=$this->input->post('tanggal_transaksi');
			$vjumlah_transaksi=$this->input->post('jumlah_transaksi');
			$vtipe_transaksi=$this->input->post('tipe_transaksi');
			$vketerangan=$this->input->post('keterangan');
                        $vnama_toko=$this->input->post('nama_toko');
                        $vnama_proyek=$this->input->post('nama_proyek');
                        $vkuantitas=$this->input->post('kuantitas');
                        $vsatuan=$this->input->post('satuan');
                 	$query=$this->db->query(" UPDATE transaksi set Nama_Transaksi = '".$vnama."',Tanggal_Transaksi= '".$vtanggal."',
			Jumlah_Transaksi='".$vjumlah_transaksi."',Tipe_Transaksi='".$vtipe_transaksi."' ,Kuantitas = '".$vkuantitas."' ,Satuan = '".$vsatuan."' ,Keterangan = '".$vketerangan."' ,Nama_Toko = '".$vnama_toko."' ,Nama_Proyek = '".$vnama_proyek."'  WHERE ID_Transaksi = '".$id."' ");
		}
		
		function updatedata_trainer()
		{
			$id=$this->input->post('id_trainer');
			$vnama=$this->input->post('nama');
			$vumur=$this->input->post('umur');
			$vjenis_kelamin=$this->input->post('jeniskelamin');
			$vbiayalatihan=$this->input->post('biayalatihan');
			$query=$this->db->query(" UPDATE trainer set Nama_Trainer = '".$vnama."',
			Umur='".$vumur."',Jenis_Kelamin='".$vjenis_kelamin."',Biaya_Trainer='".$vbiayalatihan."' 
			 WHERE ID_Trainer = '".$id."' ");
		}
                
                function updatedata_pembayaran()
		{
                        $id=$this->input->post('id_member');
                        $vtanggal_pendaftaran=$this->input->post('tanggal_pendaftaran');
                        $vtanggal_dibayar=  $this->input->post('tanggal_pembayaran');
			$jumlah_bulan=$this->input->post('bulan_pembayaran');
                        $vtanggal_pembayaran= new DateTime($vtanggal_dibayar);
                        $vtanggal_pembayaran->add(new DateInterval('P1M'));
                        $vtanggal_bayar=$vtanggal_pembayaran->format('Y-m-d');
			//$vbiayalatihan=$this->input->post('biaya_latihan');
                        //$total_biaya=$vbiayalatihan*$jumlah_bulan;
			$query=$this->db->query(" UPDATE member set Status_Pembayaran = 'Lunas',Status_Pembayaran2='Belum Lunas',Tanggal_Pembayaran='".$vtanggal_bayar."'
			 WHERE ID_Member = '".$id."' ");
                        
                        //Insert data transaksi
                        
                       
                        $vtanggal_transaksi=$this->input->post('hari');
                        $vtipe_transaksi='Pemasukan';
                        $vnama_member=$this->input->post('nama_member');
                        $vjumlah_transaksi=$this->input->post('biaya_latihan');
                        $vnama='Pembayaran oleh member '.$vnama_member.' pada tanggal '.$vtanggal_bayar.' Sebesar '.$vjumlah_transaksi;
                        $vketerangan=$vnama;
                        $vauthor=$this->input->post('author');
			$query=$this->db->query("INSERT INTO transaksi(Nama_Transaksi,Tanggal_Transaksi,Tipe_Transaksi,Jumlah_Transaksi,Keterangan,Author) 
			VALUES ('$vnama','$vtanggal_transaksi','$vtipe_transaksi','$vjumlah_transaksi','$vketerangan','$vauthor')");
		}
                
                function updatedata_alatlatihan()
		{
                        $id=$this->input->post('id_alat');
			$vnama=$this->input->post('nama');
			$vtahun_produk=$this->input->post('tahunproduk');
                        $vstatus=$this->input->post('status');
			$query=$this->db->query(" UPDATE alat_latihan set Nama_Alat = '".$vnama."',
			Tahun_Produk='".$vtahun_produk."',Status='".$vstatus."' 
			 WHERE ID_Alat = '".$id."' ");
		}
                
                function updatedata_jadwallatihan()
		{
                        $vid_trainer=$this->input->post('id_trainer');
                        $vnama=$this->input->post('nama_trainer');
                        $jam_masuk_senin=$this->input->post('jam_masuk_senin');
                        $jam_keluar_senin=$this->input->post('jam_keluar_senin');
                        $vjadwal_senin=$jam_masuk_senin.'-'.$jam_keluar_senin;
                        $jam_masuk_selasa=$this->input->post('jam_masuk_selasa');
                        $jam_keluar_selasa=$this->input->post('jam_keluar_selasa');
                        $vjadwal_selasa=$jam_masuk_selasa.'-'.$jam_keluar_selasa;
                        $jam_masuk_rabu=$this->input->post('jam_masuk_rabu');
                        $jam_keluar_rabu=$this->input->post('jam_keluar_rabu');
                        $vjadwal_rabu=$jam_masuk_rabu.'-'.$jam_keluar_rabu;
                        $jam_masuk_kamis=$this->input->post('jam_masuk_kamis');
                        $jam_keluar_kamis=$this->input->post('jam_keluar_kamis');
                        $vjadwal_kamis=$jam_masuk_kamis.'-'.$jam_keluar_kamis;
                        $jam_masuk_jumat=$this->input->post('jam_masuk_jumat');
                        $jam_keluar_jumat=$this->input->post('jam_keluar_jumat');
                        $vjadwal_jumat=$jam_masuk_jumat.'-'.$jam_keluar_jumat;
                        $jam_masuk_sabtu=$this->input->post('jam_masuk_sabtu');
                        $jam_keluar_sabtu=$this->input->post('jam_keluar_sabtu');
                        $vjadwal_sabtu=$jam_masuk_sabtu.'-'.$jam_keluar_sabtu;
			$query=$this->db->query(" UPDATE jadwal_latihan set Nama_Trainer= '".$vnama."', Jadwal_1= '".$vjadwal_senin."',
			Jadwal_2='".$vjadwal_selasa."',Jadwal_3='".$vjadwal_rabu."',Jadwal_4='".$vjadwal_kamis."',
                            Jadwal_5='".$vjadwal_jumat."',Jadwal_6='".$vjadwal_sabtu."'
			 WHERE Nama_Trainer = '".$vid_trainer."' ");
		}
                
                 function updatedata_kehadiran($vnim)
		{
                         date_default_timezone_set("asia/Jakarta");
                         date("h:i:sa");
                        $id=$vnim;
			$vjam_keluar=date("H:i:s");
			$query=$this->db->query(" UPDATE kehadiran set Jam_Keluar = '".$vjam_keluar."'
			 WHERE No_Kehadiran = '".$id."' ");
		}
		
		
		function get_detail_data($vnim)
		{
			$query = $this->db->query("SELECT * FROM member WHERE ID_Member='".$vnim."'");
			return $query; //->row();
		}
                
                function get_detail_kamus($vnim)
		{
			$query = $this->db->query("SELECT * FROM data_kamus WHERE No='".$vnim."'");
			return $query; //->row();
		}
                
                 function get_kehadiran_by_date($vdate)
                {
                    $query = $this->db->query("SELECT * FROM kehadiran WHERE Hari='".$vdate."'");
			return $query; //->row();
                }
                
                function get_kehadiran_by_month($vbulan,$vyear)
                {
                    $query = $this->db->query("SELECT * FROM kehadiran WHERE Month(Hari)='".$vbulan."' AND Year(Hari)='".$vyear."'");
			return $query; //->row();
                }
                
                function get_transaksi_by_date($vdate)
                {
                    $query = $this->db->query("SELECT * FROM transaksi WHERE Tanggal_Transaksi='".$vdate."'");
			return $query; //->row();
                }
                
                function get_transaksi_by_month($vbulan,$vyear)
                {
                    $query = $this->db->query("SELECT * FROM transaksi WHERE Month(Tanggal_Transaksi)='".$vbulan."' AND Year(Tanggal_Transaksi)='".$vyear."'");
			return $query; //->row();
                }
                
                  function get_member_by_month_paid($vbulan,$vyear)
                {
                    $query = $this->db->query("SELECT * FROM member WHERE Month(Tanggal_Pembayaran)='".$vbulan."' AND Year(Tanggal_Pembayaran)='".$vyear."'");
			return $query; //->row();
                }
                
                  function get_member_by_age($batas_umur,$batas_umur2)
                {
                    $result = $this->db->query("select * from member where  Umur between '".$batas_umur."' AND  '".$batas_umur2."' ");
			return $query; //->row();
                }
                
                function get_detail_data_alat_latihan($vnim)
		{
			$query = $this->db->query("SELECT * FROM alat_latihan WHERE ID_Alat='".$vnim."'");
			return $query; //->row();
		}
                
                function get_detail_data_jadwal_latihan($vnim)
		{
			$query = $this->db->query("SELECT * FROM jadwal_latihan WHERE Nama_Trainer='".$vnim."'");
			return $query; //->row();
		}
		
		function get_detail_data_trainer($vnim)
		{
			$query = $this->db->query("SELECT * FROM trainer WHERE ID_Trainer='".$vnim."'");
			return $query; //->row();
		}
                
                function get_detail_data_transaksi($vnim)
		{
			$query = $this->db->query("SELECT * FROM transaksi WHERE ID_Transaksi='".$vnim."'");
			return $query; //->row();
		}
		
		function keyword()
		{
				$keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from member where  Nama_Member like '%$keyword%' ");
			return $result->result();
		}
                
                function keyword_kamus()
		{
			
                        if($tipe_datakamus=="Romaji")
                        {    
                        $keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from data_kamus where  Romaji like '%$keyword%' ");
			return $result->result();
                        }
                        else if($tipe_datakamus=="Classification")
                             {    
                        $keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from data_kamus where  Classification like '%$keyword%' ");
			return $result->result();
                        }
		}
                
                function keyword_romawi()
		{
				$keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from data_kamus where  Romaji like '%$keyword%' ");
			return $result->result();
		}
                
                 function keyword_classification()
		{
				$keyword = $this->input->post('search_kamus');
			$result = $this->db->query("select * from data_kamus where  classification like '%$keyword%' ");
			return $result->result();
		}
                
                function keyword_kehadiran_by_nama()
		{
				$keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from kehadiran where  Nama like '%$keyword%' ");
			return $result->result();
		}
                
                function keyword_umur_member()
		{
				$batas_umur = $this->input->post('batas_umur');
                                $batas_umur2 = $this->input->post('batas_umur2');
			$result = $this->db->query("select * from member where  Umur between '".$batas_umur."' AND  '".$batas_umur2."' ");
			return $result->result();
		}
                
                function keyword_trainer()
		{
			$keyword = $this->input->post('namatrainer');
			$result = $this->db->query("select * from member where  Nama_Trainer like '%$keyword%' ");
			return $result->result();
		}
                
                
		function keyword_pembayaran()
		{
				$keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from member where  Nama_Member like '%$keyword%' ");
			return $result->result();
		}
                
                function keyword_transaksi()
		{
				$keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from transaksi where  Nama_Transaksi like '%$keyword%' ");
			return $result->result();
		}
                
                 function keyword_transaksi_proyek()
		{
				$keyword = $this->input->post('keyword_proyek');
			$result = $this->db->query("select * from transaksi where  Nama_Proyek like '%$keyword%' ");
			return $result->result();
		}
                
                function keyword_alat()
		{
				$keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from alat_latihan where  Nama_Alat like '%$keyword%' ");
			return $result->result();
		}
                
                function keyword_jadwal()
		{
				$keyword = $this->input->post('keyword');
			$result = $this->db->query("select * from jadwal_latihan where  Nama_Trainer like '%$keyword%' ");
			return $result->result();
		}
		
		function hapus_data($vnim)
		{
			$query =$this->db->query("DELETE FROM data_kamus WHERE No=$vnim");
		}
		
		function hapus_data_trainer($vnim)
		{
			$query =$this->db->query("DELETE FROM trainer WHERE ID_Trainer=$vnim");
		}
                
                function hapus_alat_latihan($vnim)
		{
			$query =$this->db->query("DELETE FROM trainer WHERE ID_Alat=$vnim");
		}
                
                function hapus_data_transaksi($vnim)
		{
			$query =$this->db->query("DELETE FROM transaksi WHERE ID_Transaksi=$vnim");
		}
                
                function hapus_jadwal_latihan($vnim)
		{
			$query =$this->db->query("DELETE FROM jadwal_latihan WHERE jadwal_latihan.Nama_Trainer like '%$vnim%' ");
		}
	}

?>