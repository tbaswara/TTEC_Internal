<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_login')!='pg' && $this->session->userdata('is_login')!='mg'){
			redirect('');
		}
	}

	public function index()
	{	
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['title']='Dashboard';
		$data['manage_page'] = 'manage-dashboard';
		$data['data_a'] = $this->logistik->view_all('pengeluaran');
		$data['data_b'] = $this->logistik->view_all('material_masuk');
		$data['data_c'] = $this->logistik->view_all('pindah_gudang');
		$this->db->select('sum(stok) as stok');
		$data['data_d'] = $this->logistik->view_all('stok_material');
		$data['data_e'] = $this->logistik->view_all('material');
		$data['data_f'] = $this->logistik->view_all('supplier');
		$data['data_g'] = $this->logistik->view_all('gudang');
		$data['data_h'] = $this->logistik->view_all('mitra');
		$this->load->view('manage/main-page',$data);
	}
	function whois()
	{
		return $this->session->userdata('user');
	}
	function profile()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['datax']= $this->logistik->lihat_profil('pegawai');
		$data['datay']= $this->logistik->get_user_for_message($this->whois());
		$data['dataw']= $this->logistik->get_pesan_peruser($this->whois());
		$data['tab']= $this->uri->segment(3);
		$data['title']='Profile';
		$data['manage_page'] = 'manage-profile';
		$this->load->view('manage/main-page',$data);
	}
	function ubah_password()
	{
		$this->logistik->edit_all('user', 'username', $this->whois(), array('password'=>$this->input->post('password')));
		$this->session->set_flashdata('save_pass','true');
		redirect('manage/profile/akun');
	}
	function edit_profile()
	{
		$set = array(
			"nama" => $this->input->post('nama'),
			"email" => $this->input->post('email'),
			"jabatan" => $this->input->post('jabatan'),
			"telepon" => $this->input->post('telepon'),
			"alamat" => $this->input->post('alamat')
			//"foto" => $this->input->post('foto'),
		);		
		$this->logistik->edit_all('pegawai','username', $this->whois(), $set);
	}
	function import()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['title']='Import Data';
		$data['manage_page'] = 'fimport';
		$data['errorupload']=$this->session->flashdata('errorupload');
		$this->db->order_by('tanggal_upload','desc');
		$data['datax']=$this->db->get('upload',4);
		if($this->uri->segment(3) !=''){
			$data['datay'] = $this->logistik->view_where('upload',array('nama_file'=>$this->uri->segment(3)));
		}
		$this->load->view('manage/main-page',$data);
	}
	function upload(){
		$config['upload_path'] = './file/excel/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['max_size']	= '10000';
		$config['max_width']  = '2048';
		$config['max_height']  = '2048';
		$u = sprintf("%010s-%s", time(), uniqid(true));
		$config['file_name']  = 'TA_'.$u;

		$this->load->library('upload', $config);
		$sheet=$this->input->post('options');
		if ($this->upload->do_upload()){
			$file=$this->upload->data();
			$this->logistik->insert_table('upload', array('username'=>$this->whois(),'nama_file'=>$file['file_name'],'x'=>'0','y'=>'0','z'=>'0'));
			redirect('manage/import/'.$file['file_name']);
		}else {		
			$this->session->set_flashdata('errorupload',$this->upload->display_errors());
			redirect('manage/import');
		}
	}
	function do_import()
	{
		$fn=$this->input->post('fn');
		$sheet=$this->input->post('options');
		if($sheet ==''){
			$this->session->set_flashdata('errorupload','Pilih sheet');
			redirect('manage/import/'.$fn);
			die;
		}
		if (isset($fn)){
			error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
			include_once ( APPPATH."libraries/excel_reader2.php");
			$data = new Spreadsheet_Excel_Reader("file/excel/".$fn);
			if($sheet==0){
				$this->logistik->edit_all('upload', 'nama_file', $fn, array('x'=>'1'));
				if($data->rowcount($sheet_index=$sheet)>600){
					$this->session->set_flashdata('err_row','Jumlah baris per sheet maksimal 600 baris');
					redirect('manage/import');
				}
				for ($i=2; $i <= ($data->rowcount($sheet_index=$sheet)); $i++){ 
				  $datax=array(
						'kode_material'=>$data->val($i, 1,$sheet),
						'nama_material'=>$data->val($i, 2,$sheet),
						'spesifikasi_material'=>$data->val($i, 3,$sheet)
				  );
				  $cek_mat = $this->logistik->view_where('material',array('kode_material'=>$data->val($i, 1,$sheet)));
				  if($cek_mat->num_rows()==1){
					$this->logistik->edit_all('material', 'kode_material', $data->val($i, 1,$sheet), $datax);
					$id_material = $cek_mat->row('id_material');
				  }else{
					$this->logistik->insert_table('material', $datax);
					$id_material = $this->logistik->get_max('material','id_material')->row('max_id');
				  }
				  
					$get_gud = $this->logistik->view_all('gudang');
					foreach($get_gud->result() as $dgud){
						$cek_stok_gud = $this->logistik->view_where('stok_material',array('id_gudang'=>$dgud->id_gudang,'id_material'=>$id_material));
						if($cek_stok_gud->num_rows() ==0){
							$data_sm = array(
								'id_gudang'=>$dgud->id_gudang,
								'id_material'=>$id_material,
								'stok'=>0
							);
							$this->logistik->insert_table('stok_material',$data_sm);
						}
					}
				  
				}
				// redirect('manage/import');
			}else if($sheet==1){
				// if($data->rowcount($sheet_index=$sheet)>600){
					// $this->session->set_flashdata('err_row','Jumlah baris per sheet maksimal 600 baris');
					// redirect('manage/import');
				// }
				for ($i=4; $i <= ($data->rowcount($sheet_index=$sheet)); $i++){
					if($data->val($i, 2,$sheet) !=''){
						//cek material baru
						$cek_mat = $this->logistik->view_where('material',array('kode_material'=>$data->val($i, 8,$sheet)));
						if($cek_mat->num_rows() == 0){
							$datam = array(
								'kode_material'=>$data->val($i, 8,$sheet),
								'nama_material'=>$data->val($i, 9,$sheet),
								'satuan'=>$data->val($i, 11,$sheet),
								'spesifikasi_material'=>$data->val($i, 9,$sheet)								
							);
							$this->logistik->insert_table('material', $datam);
							$id_material = $this->logistik->get_max('material','id_material')->row('max_id');
						}else{
							$dataem = array(
								'nama_material'=>$data->val($i, 9,$sheet),
								'satuan'=>$data->val($i, 11,$sheet),
								'spesifikasi_material'=>$data->val($i, 9,$sheet)								
							);
							$this->logistik->edit_all('material', 'id_material', $cek_mat->row('id_material'), $dataem);
							$id_material = $cek_mat->row('id_material');
						}
						//cek supplier baru
						$cek_sup = $this->logistik->view_where('supplier',array('nama_supplier'=>$data->val($i, 10,$sheet)));
						if($cek_sup->num_rows() == 0){
							$datas = array(
								'nama_supplier'=>$data->val($i, 10,$sheet)
							);
							$this->logistik->insert_table('supplier', $datas);
							$id_supplier = $this->logistik->get_max('supplier','id_supplier')->row('max_id');
						}else{
							$id_supplier = $cek_sup->row('id_supplier');
						}
						//cek gudang baru
						$cek_gud = $this->logistik->view_where('gudang',array('nama_gudang'=>$data->val($i, 17,$sheet)));
						if($cek_gud->num_rows() == 0){
							$datag = array(
								'nama_gudang'=>$data->val($i, 17,$sheet)
							);
							$this->logistik->insert_table('gudang', $datag);
							$id_gudang = $this->logistik->get_max('gudang','id_gudang')->row('max_id');
						}else{
							$id_gudang = $cek_gud->row('id_gudang');
						}
						//import suplai
						
							$datamm = array(
								'id_material'=>$id_material,
								'id_supplier'=>$id_supplier,
								'id_gudang'=>$id_gudang,
								'volume_BAPPB'=>str_replace(',','',str_replace('* ','',$data->val($i, 12,1))),
								'satuan_suplai'=>$data->val($i, 11,$sheet),
								'harga_satuan'=>str_replace(',','',str_replace('* ','',$data->val($i, 13,1))),
								'tanggal_faktur'=>$data->val($i, 2,$sheet),
								'tanggal_masuk_barang'=>$data->val($i, 4,$sheet),
								'ekspedisi'=>$data->val($i, 14,$sheet),
								'kondisi'=>$data->val($i, 15,$sheet),
								'penerima'=>mysql_real_escape_string($data->val($i, 16,$sheet)),
								'no_surat_jalan'=>$data->val($i, 18,$sheet),
								'no_PO'=>$data->val($i, 22,$sheet),
								'tanggal_PO'=>$data->val($i, 21,$sheet),
								'keterangan'=>$data->val($i, 23,$sheet).' (import)',
								'material_masuk_input_oleh'=>$data->val($i, 6,$sheet),
								'tanggal_input_material_masuk'=>$data->val($i, 5,$sheet)
							);
							$this->logistik->import_suplai($datamm);	
							
							// manage stok material
							$cek_stok_mat = $this->logistik->view_where('stok_material',array('id_gudang'=>$id_gudang,'id_material'=>$id_material));
							$d_stok = array(
								'id_gudang'=>$id_gudang,
								'id_material'=>$id_material,
								'stok'=>str_replace(',','',str_replace('* ','',$data->val($i, 12,1)))
							);	
							if($cek_stok_mat->num_rows() > 0){
								$this->trigger_stok_material('tambah', str_replace(',','',str_replace('* ','',$data->val($i, 12,1))), $id_material, $id_gudang);
								// $this->logistik->edit_stok_gudang($cek_stok_mat->row('id_stok_material'), str_replace(',','',str_replace('* ','',$data->val($i, 12,1))));
							}else{
								$this->logistik->insert_table('stok_material', $d_stok);
							}
							
					}
				}
				$this->logistik->edit_all('upload', 'nama_file', $fn, array('y'=>'1'));
			}else{
				// if($data->rowcount($sheet_index=$sheet)>600){
					// $this->session->set_flashdata('err_row','Jumlah baris per sheet maksimal 600 baris');
					// redirect('manage/import');
				// }
				for ($i=4; $i <= ($data->rowcount($sheet_index=$sheet)); $i++){
					if($data->val($i, 2,$sheet) !=''){
						//echo $data->val($i, 2,$sheet).' - '.$data->val($i,4,$sheet).'<br>';
						if($data->val($i, 21,$sheet) == 'PAG' || $data->val($i, 21,$sheet) == 'Perpindahan Antar Gudang'){
							//upload PAG
							if($data->val($i, 22,$sheet)==0){ $no_s_j = '0'; }else{ $no_s_j=$data->val($i, 22,$sheet); }
							$cek_pingud = $this->logistik->view_where('pindah_gudang',array('no_surat_jalan'=>$no_s_j));
							if($cek_pingud->num_rows() == 0){
								$data_stokgud = array(
									'no_surat_jalan'=>$data->val($i, 22,$sheet),
									'tanggal_surat_jalan'=>date('Y-m-d', strtotime($data->val($i, 2,$sheet))),
									'gudang_tujuan'=>$data->val($i, 15,$sheet),
									'pemberi'=>$data->val($i, 16,$sheet),
									'penerima'=>$data->val($i, 17,$sheet),
									'keterangan_pindah_gudang'=>'Import From Excel',
									'pindah_gudang_input_oleh'=>$this->whois(),
									'tanggal_input_pindah_gudang'=>date('Y-m-d h:i:s')
								);
								$this->logistik->insert_table('pindah_gudang', $data_stokgud);
								$id_pindah_gudang = $this->logistik->get_max('pindah_gudang','id_pindah_gudang')->row('max_id');
							}else{
								$id_pindah_gudang = $cek_pingud->row('id_pindah_gudang');
							}
							
							//cek gudang
							$cek_gud = $this->logistik->view_where('gudang',array('nama_gudang'=>explode('-',$data->val($i, 4,$sheet))[0]));
							if($cek_gud->num_rows() == 0){
								$datag = array(
									'nama_gudang'=>explode('-',$data->val($i, 4,$sheet))[0]
								);
								$this->logistik->insert_table('gudang', $datag);
								$id_gudang = $this->logistik->get_max('gudang','id_gudang')->row('max_id');
							}else{
								$id_gudang = $cek_gud->row('id_gudang');
							}
							
							//cek material baru
							$cek_mat = $this->logistik->view_where('material',array('kode_material'=>$data->val($i, 8,$sheet)));
							if($cek_mat->num_rows() == 0){
								if($data->val($i, 10,$sheet)=='Mtr'){ $sat = 'Meter'; }else{ $sat = $data->val($i, 10,$sheet); }
								$datam = array(
									'kode_material'=>$data->val($i, 8,$sheet),
									'nama_material'=>$data->val($i, 9,$sheet),
									'satuan'=>$sat,
									'spesifikasi_material'=>$data->val($i, 9,$sheet)								
								);
								$this->logistik->insert_table('material', $datam);
								$id_material = $this->logistik->get_max('material','id_material')->row('max_id');
							}else{
								$id_material = $cek_mat->row('id_material');
							}
							//cek stok gudang
							$cek_stokgud = $this->logistik->view_where('stok_material',array('id_material'=>$id_material,'id_gudang'=>$id_gudang));
							if($cek_stokgud->num_rows() == 0){
								$data_stokgud = array(
									'id_gudang'=>$id_gudang,
									'id_material'=>$id_material,
									'stok'=>'0',
									'keterangan_stok'=>'Import From Excel'
								);
								$this->logistik->insert_table('stok_material', $data_stokgud);
								$id_stok_material = $this->logistik->get_max('stok_material','id_stok_material')->row('max_id');
							}else{
								$this->trigger_stok_material('hapus', str_replace(',','',str_replace('* ','',$data->val($i, 12,$sheet))), $id_material, $id_gudang);
								$id_stok_material = $cek_stokgud->row('id_stok_material');
							}
							
							$data_dpg = array(
								'id_pindah_gudang'=>$id_pindah_gudang,
								'id_stok_material'=>$id_stok_material,
								'volume_pindah'=>str_replace(',','',str_replace('* ','',$data->val($i, 12,$sheet)))
							);
							$this->logistik->insert_table('detail_pindah_gudang',$data_dpg);
						}else{
							$cek_gud = $this->logistik->view_where('gudang',array('nama_gudang'=>explode('-',$data->val($i, 4,$sheet))[0]));
							if($cek_gud->num_rows() == 0){
								$datag = array(
									'nama_gudang'=>explode('-',$data->val($i, 4,$sheet))[0]
								);
								$this->logistik->insert_table('gudang', $datag);
								$id_gudang = $this->logistik->get_max('gudang','id_gudang')->row('max_id');
							}else{
								$id_gudang = $cek_gud->row('id_gudang');
							}
							
							$cek_pro = $this->logistik->view_where('project',array('kode_project'=>$data->val($i, 21,$sheet)));
							if($cek_pro->num_rows() == 0){
								$datap = array(
									'kode_project'=>$data->val($i, 21,$sheet),
									'nama_project'=>$data->val($i, 18,$sheet),
									'lokasi'=>$data->val($i, 5,$sheet),
									'keterangan_project'=>'Import From Excel',
									'project_input_oleh'=>$this->whois(),
									'status'=>'telah Dieksekusi',
									'tanggal_input_project'=>date('Y-m-d h:i:s'),
									'tanggal_baca_pegawai'=>date('Y-m-d h:i:s')
								);
								$this->logistik->insert_table('project', $datap);
								$id_project = $this->logistik->get_max('project','id_project')->row('max_id');
							}else{
								$id_project = $cek_pro->row('id_project');
							}
							
							//cek material baru
							$cek_mat = $this->logistik->view_where('material',array('kode_material'=>$data->val($i, 8,$sheet)));
							if($cek_mat->num_rows() == 0){
								if($data->val($i, 10,$sheet)=='Mtr'){ $sat = 'Meter'; }else{ $sat = $data->val($i, 10,$sheet); }
								$datam = array(
									'kode_material'=>$data->val($i, 8,$sheet),
									'nama_material'=>$data->val($i, 9,$sheet),
									'satuan'=>$sat,
									'spesifikasi_material'=>$data->val($i, 9,$sheet)								
								);
								$this->logistik->insert_table('material', $datam);
								$id_material = $this->logistik->get_max('material','id_material')->row('max_id');
							}else{
								$dataem = array(
									'satuan'=>$data->val($i, 10,$sheet)
								);
								$this->logistik->edit_all('material', 'id_material', $cek_mat->row('id_material'), $dataem);
								$id_material = $cek_mat->row('id_material');
							}
							
							//cek mitra baru
							$this->db->like('username', 'mitra');
							$cek_mit = $this->logistik->view_all('user');
							if($cek_mit->num_rows() == 0){
								$dataus = array(
									'username'=>'mitra1',
									'password'=>'mitra1'								
								);
								$this->logistik->insert_table('user', $dataus);
								$datami = array(
									'username'=>'mitra1',
									'nama_mitra'=>$data->val($i, 15,$sheet),								
									'keterangan_mitra'=>'Import From Excel'							
								);
								$this->logistik->insert_table('mitra', $datami);
								$mitra = $datami['username'];
							}else{
								$cek_mit2 = $this->logistik->view_where('mitra',array('nama_mitra'=>$data->val($i, 15,$sheet)));
								if($cek_mit2->num_rows() == 0){
									
									$max_id_mitra = $this->logistik->max_mitra();
									$dataus = array(
										'username'=>'mitra'.($max_id_mitra->row('max_id_mitra')),
										'password'=>'mitra'.($max_id_mitra->row('max_id_mitra'))								
									);
									$this->logistik->insert_table('user', $dataus);
									$datami = array(
										'username'=>'mitra'.($max_id_mitra->row('max_id_mitra')),
										'nama_mitra'=>$data->val($i, 15,$sheet),								
										'keterangan_mitra'=>'Import From Excel'							
									);
									$this->logistik->insert_table('mitra', $datami);
									$mitra = $datami['username'];	
								}else{
									$mitra = $cek_mit2->row('username');
								}
							}
							
							//cek project_mitra
							$data_pro_ma = array(
								'mitra'=>$mitra,
								'id_project'=>$id_project
							);
							$cek_promi = $this->logistik->view_where('project_mitra',$data_pro_ma);
							if($cek_promi->num_rows() == 0){
								$datapromi = array(
									'id_project'=>$id_project,
									'mitra'=>$mitra,
									'pesan_singkat'=>'Import From Excel',
									'tanggal_baca_mitra'=>date('Y-m-d h:i:s')								
								);
								$this->logistik->insert_table('project_mitra', $datapromi);
								$id_project_mitra = $this->logistik->get_max('project_mitra','id_project_mitra')->row('max_id');
							}else{
								$id_project_mitra = $cek_promi->row('id_project_mitra');
							}
							
							//cek permintaan
							$no_rfc = $data->val($i, 22,$sheet);
							$cek_perm = $this->logistik->view_where('permintaan',array('id_project_mitra'=>$id_project_mitra,'keterangan'=>'Import From Excel<>'.$no_rfc));
							if($cek_perm->num_rows() == 0){
								$dataperm = array(
									'id_project_mitra'=>$id_project_mitra,
									'keterangan'=>'Import From Excel<>'.$no_rfc,
									'status_permintaan'=>'Telah Diproses, Telah Diproses',
									'tanggal_baca_pegawai_permintaan'=>date('Y-m-d h:i:s'),								
									'tanggal_baca_mitra'=>date('Y-m-d h:i:s')								
								);
								$this->logistik->insert_table('permintaan', $dataperm);
								$id_permintaan = $this->logistik->get_max('permintaan','id_permintaan')->row('max_id');
							}else{
								$id_permintaan = $cek_perm->row('id_permintaan');
							}
							
							//insert detail permintaan
							$data_detperm = array(
								'id_permintaan'=>$id_permintaan,
								'id_material'=>$id_material,
								'volume_minta'=>str_replace(',','',str_replace('* ','',$data->val($i, 11,$sheet))),
								'detail_permintaan_tanggal_baca_pegawai'=>date('Y-m-d h:i:s')
							);
							$this->logistik->insert_table('detail_permintaan', $data_detperm);						
							
							//cek pegeluaran
							$no_rfc2 = $data->val($i, 22,$sheet);
							$cek_peng = $this->logistik->view_where('pengeluaran',array('id_permintaan'=>$id_permintaan));
							if($cek_peng->num_rows() == 0){
								$datapeng = array(
									'id_permintaan'=>$id_permintaan,
									'no_MRFC'=>$no_rfc2,
									'tanggal_MRFC'=>date('Y-m-d', strtotime($data->val($i, 2,$sheet))),
									'pemberi'=>$data->val($i, 16,$sheet),						
									'penerima'=>$data->val($i, 17,$sheet),						
									'keterangan_pengeluaran'=>'Import From Excel ( Admin Excel '.$data->val($i, 6,$sheet).')',						
									'pengeluaran_input_oleh'=>$this->whois(),
									'tanggal_input_pengeluaran'=>date('Y-m-d h:i:s')								
								);
								$this->logistik->insert_table('pengeluaran', $datapeng);
								$id_pengeluaran = $this->logistik->get_max('pengeluaran','id_pengeluaran')->row('max_id');
							}else{
								$id_pengeluaran = $cek_peng->row('id_pengeluaran');
							}
							
							//cek stok gudang
							$cek_stokgud = $this->logistik->view_where('stok_material',array('id_material'=>$id_material,'id_gudang'=>$id_gudang));
							if($cek_stokgud->num_rows() == 0){
								$data_stokgud = array(
									'id_gudang'=>$id_gudang,
									'id_material'=>$id_material,
									'stok'=>'0',
									'keterangan_stok'=>'Import From Excel'
								);
								$this->logistik->insert_table('stok_material', $data_stokgud);
								$id_stok_material = $this->logistik->get_max('stok_material','id_stok_material')->row('max_id');
							}else{
								$va =str_replace(',','',str_replace('* ','',$data->val($i, 12,$sheet)));
								if($va==''){ $va=0; }else{ $va=$va; }
								$vb =str_replace(',','',str_replace('* ','',$data->val($i, 13,$sheet)));
								if($vb==''){ $vb=0; }else{ $vb=$vb; }
								$vv = $va-$vb;
								$this->trigger_stok_material('hapus', $vv, $id_material, $id_gudang);
								$id_stok_material = $cek_stokgud->row('id_stok_material');
							}
							
							//insert material keluar
							$data_matkel = array(
								'id_pengeluaran'=>$id_pengeluaran,
								'id_stok_material'=>$id_stok_material,
								'id_pengeluaran'=>$id_pengeluaran,
								'volume_keluar'=>str_replace(',','',str_replace('* ','',$data->val($i, 12,$sheet))),
								'volume_kembali'=>str_replace(',','',str_replace('* ','',$data->val($i, 13,$sheet))),
								'status_import'=>'import',
								'keterangan_import'=>'Import From Excel'
							);
							$this->logistik->insert_table('material_keluar', $data_matkel);
						}										
						
					}
				}
			}
			$this->logistik->edit_all('upload', 'nama_file', $fn, array('z'=>'1'));
		} else {		
			echo 'ada err';			
		}
		$this->session->set_flashdata('errorupload','<font color="green">Data berhasil dimasukkan ke database</font>');
		redirect('manage/import/'.$fn);
	}
	function redd(){
		// echo date('Y-m-d', strtotime('1 June 2014'));die;
		error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
		include_once ( APPPATH."libraries/excel_reader2.php");
		$data = new Spreadsheet_Excel_Reader("file/excel/TA_.xls");
		$xx = 0;
		for ($i=4; $i <= ($data->rowcount($sheet=2)); $i++){ 
		  $j++;
			
			$isi = str_replace(',','',str_replace('* ','',$data->val($i, 13,$sheet)));
			$isi1 = str_replace(',','',str_replace('* ','',$data->val($i, 12,$sheet)));
			if($isi ==''){ $isi = 0; }else{ $isi; }
				$hsl = $isi1-$isi;
				if($data->val($i, 8,$sheet)=='AC-OF-SM-24-SC'){
				echo  $i.'. '.$isi1.'-'.$isi.' = '.$hsl.'<br>';
				$xx = $xx+$hsl;	
				echo $xx.'<br>';
				}	
		  
		}
		echo $xx;
	}
	function trigger_send_email($to, $title, $content){
		$this->load->library('email');
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user'] = 'telkomaksesbandung@gmail.com';
		$config['smtp_pass'] = 'dinareka';
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not
		$this->email->initialize($config);
		$this->email->from('telkomaksesbandung@gmail.com', 'Telkom Akses Bandung');
		$this->email->to($to);
		$this->email->subject($title);
		$this->email->message($content);
		$this->email->send();
	}
	function trigger_stok_material($aksi, $stok, $idm, $idg){
		if($aksi=='hapus'){
			$this->logistik->kurang_stok($stok, $idm, $idg);
		}else{
			$this->logistik->tambah_stok($stok, $idm, $idg);
		}
	}
	function category($cat)
	{	
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		//start of paging
		$config['base_url'] = site_url().'/manage/category/'.$cat; //menentuka controller untuk data yang ingin dipaging
		$config['total_rows'] = $this->logistik->view_all($cat)->num_rows(); //mengambil total jumlah yang ingin di-paging
		$config['per_page'] = 2000; //menentukan maksimal data per halaman
		$config['num_links'] = 3;
		$config['uri_segment'] = 4;		
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		
		$config['cur_tag_open'] = '<li class="class="active""><a href="#" style="background-color: #ccc; color:white; cursor:default;">';
		$config['cur_tag_close'] = '</a></li>';		
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';		
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';		
		$this->pagination->initialize($config); //memasukkan setting yang telah dibuat ke library
		$data['page_link'] = $this->pagination->create_links(); //membuat tampilan pagingnya
		$data['datax'] = $this->logistik->view_paging($cat, $config['per_page'], $this->uri->segment(4)); //mengambil data berdasarkan max data per page dan offset yang didapat
		// end paging
		$data['datay'] = $this->logistik->persentase_supplier();
		$data['columns'] = $this->logistik->get_columns($cat);
		$data['title']=$cat;
		$data['manage_page'] = 'manage-category';		
		$this->load->view('manage/main-page',$data);
	}
	function insert()
	{
		$data['cat']=$this->input->post('cat');
		$data['title']=$this->input->post('cat');
		$data['columns'] = $this->logistik->get_columns($data['cat']);
		$this->load->view('manage/manage-category-insert',$data);
	}
	function category_insert()
	{
		//echo $this->input->post('coba');die;
		$cat = $this->input->post('cat');
		$col = $this->logistik->get_columns($cat);
		$tmp='';
		foreach($col->result() as $colm){
			$arr[$colm->column_name]=$this->input->post($colm->column_name);
		}		
		$this->logistik->insert_table($cat,$arr);
		if($cat == 'project'){ 
			$content = 'hai';
			$dm = $this->logistik->view_where('mitra',array('username'=>$this->input->post('mitra')));
			$this->trigger_send_email($dm->row('email_mitra'), 'Tugas Eksekusi Project', $content); 
		}else if($cat == 'Material'){
			$id_mat = $this->logistik->get_max('material','id_material');
			$d_gud = $this->logistik->view_all('gudang');
			foreach($d_gud->result() as $d_g){
				$data_sg = array(
					'id_gudang'=>$d_g->id_gudang,
					'id_material'=>$id_mat->row('max_id'),
					'stok'=>0,
				);
				$this->logistik->insert_table('stok_material', $data_sg);
			}			
		}
	}
	function category_delete()
	{
		$column = $this->input->post('c');
		$table = $this->input->post('t');
		$this->logistik->delete_all($table,$column,$this->input->post('f'));
	}
	function category_edit()
	{		
		$cat = $this->input->post('cat');
		$val = $this->input->post('val');
		$cols = $this->input->post('cols');		
		$col = $this->logistik->get_columns_without_pk($cat);
		//echo $val.'-'.$cols.'-'.$cat;die;
		foreach($col->result() as $colm){
			//echo $colm->column_name;
			$arr[$colm->column_name]=$this->input->post($colm->column_name);
		}//die;
		$this->logistik->edit_all($cat, $cols, $val, $arr);		
	}
	
	/* Start new era */
	function trigger_tanggal_baca_pegawai($table,$data,$where)
	{
		$this->logistik->edit_query($table,$data,$where);
	}
	function project()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['title']='Project';
		$data['hal']='Data-Data project';
		$data['manage_page'] = 'project';
		$this->db->select('*');
		$this->db->select('(SELECT COUNT(*) FROM permintaan JOIN project_mitra USING(id_project_mitra)WHERE project_mitra.id_project = project.id_project) AS jumlah_permintaan');
		$this->db->order_by('tanggal_input_project','desc');
		// $this->db->join('project_mitra','project_mitra.id_project=project.id_project');
		$data['datax']=$this->logistik->view_all('project');
		$data['dataa']=$this->logistik->for_autocomplete('project', 'lokasi');		
		$data['mitra']=$this->logistik->view_all('mitra');	
		//$data['column'] = $this->logistik->get_custom_column('project');
		$this->load->view('manage/main-page',$data);
		if($this->session->userdata('is_login')=='pg'){
		$this->trigger_tanggal_baca_pegawai('project',"tanggal_baca_pegawai='".date('Y-m-d h:i:s')."'","status !='Belum Dieksekusi' and tanggal_baca_pegawai is null or status !='Belum Dieksekusi' and tanggal_baca_pegawai = '0000-00-00 00:00:00'");	
		}
	}
	function simpan_project()
	{
		$kop = $this->logistik->view_all('project');
		$kdp = $this->logistik->ambil_max_kode_project();
		if($kop->num_rows()==0){ $tmpx ='1'; }
		else{ $tmpx=$kdp->row('nilai'); }	
		
		
		$data_p = array(
				'kode_project'=>'T'.$tmpx,
				'nama_project' => $this->input->post('nama_project'),
				'perihal' => $this->input->post('perihal'),
				'keterangan_project' => $this->input->post('keterangan_project'),
				'lokasi' => $this->input->post('lokasi'),
				'PIC' => $this->input->post('PIC'),
				'tanggal_project' => $this->input->post('tanggal_project'),
				'status' => 'Belum Dieksekusi',
				'tanggal_input_project' => date('Y-m-d h:i:s'),
				'project_input_oleh' => $this->whois()
		);

		
		$this->logistik->insert_table('project', $data_p);
		
		$max_pro = $this->logistik->get_max('project','id_project');
		$data_pm = array(
				'id_project'=>$max_pro->row('max_id'),
				'mitra'=>$this->input->post('mitra'),
				'pesan_singkat' => $this->input->post('pesan_singkat')
		);
		$this->logistik->insert_table('project_mitra', $data_pm);
		
		
		//mail
		// $content = 'Anda memiliki tugas eksekusi project (ID PROJECT = '.$data_p['kode_project'].') dari <b>Telkom Akses Bandung</b>. <a href="http://localhost/logistik">Selengkapnya</a>';
		// $dm = $this->logistik->view_where('mitra',array('username'=>$this->input->post('mitra')));
		// if( $dm->row('email_mitra') != '' ){
			// $this->trigger_send_email($dm->row('email_mitra'), 'Tugas Eksekusi Project', $content); 
		// }
		echo $data_p['kode_project'];
	}
	function upload_lampiran()
	{
		// echo 'sampai';die;
		//revisi lampiran project
		$config['upload_path'] = './file/lampiran/';
		$config['allowed_types'] = 'xlsx|xls|gif|jpg|png|docx|pdf|exe|pptx';
		$config['max_size']	= '10000';
		$config['max_width']  = '2048';
		$config['max_height']  = '2048';
		// $config['file_name']  = 'Lampiran_'.$this->input->post('kdprojk');
		$this->load->library('upload', $config);
		if ($this->upload->do_upload()){
			$file=$this->upload->data();
			$this->logistik->edit_all('project', 'kode_project', $this->input->post('kdprojk'), array('lampiran'=>$file['file_name']));
			echo '<script>alert("Berhasil menyimpan data project"); document.location="http://localhost/logistik/manage/project.html";</script>';
		} else{
			echo $this->upload->display_errors();
		}
		
	}
	function download_lampiran($nm)
	{
		$this->load->helper('download');
		$data = file_get_contents("./file/lampiran/".$nm);
		force_download($nm, $data);
		echo 'Sedang memproses......';
	}
	function delete_project($data)
	{
		$this->logistik->delete_all('project', 'id_project', $data);
		redirect('manage/project');
	}
	function form_edit_project()
	{
		$idp = $this->input->post('idp');
		$data['datax']=$this->logistik->view_where('project',array('id_project'=>$idp));
		$this->load->view('manage/form_edit_project',$data);
	}
	function edit_project()
	{
		$idp = $this->input->post('idp');
		$data = array(
			'nama_project'=>$this->input->post('nama_project'),
			'perihal'=>$this->input->post('perihal'),
			'lokasi'=>$this->input->post('lokasi'),
			'PIC'=>$this->input->post('PIC'),
			'tanggal_project'=>$this->input->post('tanggal_project')
		);
		$this->logistik->edit_all('project', 'id_project', $idp, $data);
		redirect('manage/project');
	}
	function batalkan_project($id)
	{
		$data = array(
			'status'=>'Dibatalkan'
		);
		$this->logistik->edit_all('project', 'id_project', $id, $data);
		redirect('manage/project');
	}
	function permintaan($idp)
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		// $data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['title']='Permintaan';
		$data['manage_page'] = 'permintaan';
		$this->db->join('project_mitra','permintaan.id_project_mitra=project_mitra.id_project_mitra');
		$this->db->join('mitra','mitra.username=project_mitra.mitra');
		$this->db->join('project','project.id_project=project_mitra.id_project');
		$data['datax']=$this->logistik->view_where('permintaan',array('project.id_project'=>$idp));
		$this->load->view('manage/main-page',$data);
		if($this->session->userdata('is_login')=='pg'){
		$this->trigger_tanggal_baca_pegawai('permintaan',"tanggal_baca_pegawai_permintaan='".date('Y-m-d h:i:s')."'","tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan = '0000-00-00 00:00:00'");
		$this->trigger_tanggal_baca_pegawai('detail_permintaan',"detail_permintaan_tanggal_baca_pegawai='".date('Y-m-d h:i:s')."'","detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai = '0000-00-00 00:00:00'");
		}
	}
	function detailpermintaan()
	{
		$idper = $this->input->post('id_permintaan');
		$this->db->join('project_mitra','permintaan.id_project_mitra=project_mitra.id_project_mitra');
		$this->db->join('mitra','mitra.username=project_mitra.mitra');
		$this->db->join('project','project.id_project=project_mitra.id_project');
		$data['datax'] = $this->logistik->view_where('permintaan',array('id_permintaan'=>$idper));
		$this->load->view('manage/popup-permintaan',$data);
	}
	function edit_status_permintaan()
	{
		$data = array(
			'status_permintaan'=>$this->input->post('status'),
			'permintaan_edit_terakhir_oleh'=>$this->whois(),
			'tanggal_baca_mitra'=>'',
			'tanggal_edit_terakhir_permintaan'=>date('Y-m-d h:i:s')
			);
		$this->logistik->edit_all('permintaan', 'id_permintaan', $this->input->post('id_permintaan'), $data);
		echo 'Berhasil edit status';
	}
	function edit_jkm_permintaan()
	{
		$data = array(
			'NO_JKM'=>$this->input->post('NO_JKM'),
			'permintaan_edit_terakhir_oleh'=>$this->whois(),
			'tanggal_baca_mitra'=>'',
			'tanggal_edit_terakhir_permintaan'=>date('Y-m-d h:i:s')
			);
		$this->logistik->edit_all('permintaan', 'id_permintaan', $this->input->post('id_permintaan'), $data);
		echo 'Berhasil edit status';	
	}
	function detail_permintaan($idp)
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['title']='Detail Permintaan Material'; 
		$data['manage_page'] = 'detail_permintaan';
		// old
		// $this->db->join('permintaan','permintaan.id_permintaan=detail_permintaan.id_permintaan');
		// $this->db->join('material','material.id_material=detail_permintaan.id_material');
		// $data['datax']=$this->logistik->view_where('detail_permintaan',array('detail_permintaan.id_permintaan'=>$idp));
		$data['datax']=$this->logistik->for_detail_permintaan($idp);
		$this->load->view('manage/main-page',$data);
		if($this->session->userdata('is_login')=='pg'){
		$this->trigger_tanggal_baca_pegawai('detail_permintaan',"detail_permintaan_tanggal_baca_pegawai='".date('Y-m-d h:i:s')."'","detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai = '0000-00-00 00:00:00'");
		}
	}
	function suplai()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		//start of paging
		$config['base_url'] = site_url().'/manage/suplai/';
		$config['total_rows'] = $this->logistik->view_all('material_masuk')->num_rows(); 
		$config['per_page'] = 20; 
		$config['num_links'] = 3;
		$config['uri_segment'] = 3;		
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		
		$config['cur_tag_open'] = '<li class="class="active""><a href="#" style="background-color: #ccc; color:white; cursor:default;">';
		$config['cur_tag_close'] = '</a></li>';		
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';		
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';		
		$this->pagination->initialize($config);
		$data['page_link'] = $this->pagination->create_links(); 
		$this->db->join('supplier','material_masuk.id_supplier=supplier.id_supplier');
		$this->db->join('material','material_masuk.id_material=material.id_material');
		$this->db->join('gudang','material_masuk.id_gudang=gudang.id_gudang');
		$this->db->order_by('tanggal_input_material_masuk','desc');
		$data['datax'] = $this->logistik->view_paging('material_masuk', $config['per_page'], $this->uri->segment(3));
		// end paging
		
		$data['title']='Data Suplai'; 
		$data['manage_page'] = 'suplai';
		$data['datay']=$this->logistik->view_all('gudang');
		$data['dataz']=$this->logistik->view_all('material');
		$data['dataw']=$this->logistik->view_all('supplier');
		$data['dataa']=$this->logistik->for_autocomplete('material_masuk', 'penerima');
		$data['datab']=$this->logistik->for_autocomplete('material_masuk', 'ekspedisi');
		
		$this->load->view('manage/main-page',$data);
	}
	function simpan_suplai()
	{
		$dm = explode(',',$this->input->post('matpil'));
		$data = array(
				'id_material'=>$dm[0],
				'volume_BAPPB'=>$dm[1],
				'satuan_suplai'=>$dm[2],
				'kondisi'=>$dm[3],
				'harga_satuan'=>$dm[4],
				'id_supplier'=>$this->input->post('id_supplier'),
				'id_gudang'=>$this->input->post('id_gudang'),
				'tanggal_faktur'=>$this->input->post('tanggal_faktur'),
				'tanggal_masuk_barang'=>$this->input->post('tanggal_masuk_barang'),
				'ekspedisi'=>$this->input->post('ekspedisi'),
				'penerima'=>$this->input->post('penerima'),
				'no_surat_jalan'=>$this->input->post('no_surat_jalan'),
				'no_PO'=>$this->input->post('no_PO'),
				'tanggal_PO'=>$this->input->post('tanggal_PO'),
				'keterangan'=>$this->input->post('keterangan'),
				'material_masuk_input_oleh'=>$this->whois(),
				'tanggal_input_material_masuk'=>date('Y-m-d h:i:s')
		);
		$this->logistik->insert_table('material_masuk', $data);
		$this->trigger_stok_material('tambah', $dm[1], $dm[0], $this->input->post('id_gudang'));
		echo $this->input->post('persen');
	}
	function hapus_suplai($data)
	{
		$dmm = $this->logistik->view_where('material_masuk',array('id_material_masuk'=>$data));
		$this->trigger_stok_material('hapus', $dmm->row('volume_BAPPB'), $dmm->row('id_material'), $dmm->row('id_gudang'));
		$this->logistik->delete_where('material_masuk', 'id_material_masuk', $data);
		redirect('manage/suplai');
	}
	function edit_supplai()
	{
		$this->logistik->edit_all('material_masuk', 'id_material_masuk', $this->input->post('id_material_masuk'), $this->input->post());
		redirect('manage/suplai');
	}
	function detail_suplai()
	{
		$id = $this->input->post('id_material_masuk');
		$this->db->join('supplier','material_masuk.id_supplier=supplier.id_supplier');
		$this->db->join('material','material_masuk.id_material=material.id_material');
		$this->db->join('gudang','material_masuk.id_gudang=gudang.id_gudang');
		$data['datax']=$this->logistik->view_where('material_masuk',array('id_material_masuk'=>$id));
		$data['datay']=$this->logistik->view_all('supplier');
		$this->load->view('manage/detail_suplai',$data);
	}
	function ambil_tipe_satuan()
	{
		$get_satuan = $this->logistik->view_where('material',array('id_material'=>$this->input->post('id_material')));
		if($get_satuan->num_rows()>0){
			$f = $get_satuan->row('satuan');	
		}else{
			$f = 0;
		}
		echo $f;
	}
	function distribusi()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		//start of paging
		$config['base_url'] = site_url().'/manage/distribusi/';
		$config['total_rows'] = $this->logistik->view_all('pengeluaran')->num_rows(); 
		$config['per_page'] = 20; 
		$config['num_links'] = 3;
		$config['uri_segment'] = 3;		
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		
		$config['cur_tag_open'] = '<li class="class="active""><a href="#" style="background-color: #ccc; color:white; cursor:default;">';
		$config['cur_tag_close'] = '</a></li>';		
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';		
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';		
		$this->pagination->initialize($config);
		$data['page_link'] = $this->pagination->create_links(); 
		$this->db->join('permintaan','permintaan.id_permintaan=pengeluaran.id_permintaan');
		$this->db->join('project_mitra','project_mitra.id_project_mitra=permintaan.id_project_mitra');
		$this->db->join('project','project.id_project=project_mitra.id_project');
		$this->db->join('mitra','project_mitra.mitra=mitra.username');
		$this->db->order_by('tanggal_input_pengeluaran','desc');
		$data['datax'] = $this->logistik->view_paging('pengeluaran', $config['per_page'], $this->uri->segment(3));
		// end paging
		
		$data['title']='Data Distribusi'; 
		$data['manage_page'] = 'distribusi';
		$data['dataw'] = $this->logistik->view_all('material');
		$data['dataz'] = $this->logistik->view_all('gudang');
		$data['datay']=$this->logistik->view_all('mitra');
		$data['dataa']=$this->logistik->for_autocomplete('pengeluaran', 'pemberi');	
		$data['datab']=$this->logistik->for_autocomplete('pindah_gudang', 'pemberi');	
		$data['datac']=$this->logistik->for_autocomplete('pindah_gudang', 'gudang_tujuan');	
		$this->load->view('manage/main-page',$data);
	}
	function select_mitra()
	{
		$var = $this->input->post('var');
		$this->db->join('project','project.id_project=project_mitra.id_project');
		$this->db->join('mitra','project_mitra.mitra=mitra.username');
		$ambil = $this->logistik->view_where('project_mitra',array('mitra'=>$var,'status !='=>'telah Dieksekusi'));
		if($ambil->num_rows() > 0){
			echo '<select id="id_project" class="selectpicker show-tick form-control" data-live-search="true">';
			echo '<option value="">Pilih Project</option>';
			foreach($ambil->result() as $dp){
				echo '<option value="'.$dp->id_project.'">'.$dp->kode_project.' - '.$dp->nama_project.'</option>';
			}
			echo '</select>
			<script>
				$("#id_project").change(function(){ return select_project(); });
			</script>';
		}else{
			echo '<div class="alert alert-dismissable alert-warning">Mitra yang dipilih belum ada data eksekusi project</div>';
		}
	}
	function select_project()
	{
		$var = $this->input->post('var');
		$mit = $this->input->post('mitra');
		// $this->db->join('project_mitra','project_mitra.id_project_mitra=permintaan.id_project_mitra');
		// $ambil = $this->logistik->view_where('permintaan',array('id_project'=>$var));
		$ambil = $this->logistik->for_select_project($var,$mit);
		if($ambil->num_rows() > 0){
			echo '<select id="id_permintaan" class="selectpicker show-tick form-control" data-live-search="true">';
			echo '<option value="">Pilih Permintaan</option>';
			foreach($ambil->result() as $dp){
				echo '<option value="'.$dp->id_permintaan.'">PRM-'.$dp->id_permintaan.' (diinput tanggal '.$dp->tanggal_permintaan.')</option>';
			}
			echo '</select><script>
				$("#id_permintaan").change(function(){ return select_permintaan(); });
			</script>';
		}else{
			echo '<div class="alert alert-dismissable alert-warning">Untuk project ini belum ada data permintaan dari mitra</div>';
		}
	}
	function select_permintaan()
	{
		$this->db->join('material','material.id_material=detail_permintaan.id_material');
		$data['datax']=$this->logistik->view_where('detail_permintaan',array('id_permintaan'=>$this->input->post('var')));
		$data['datay'] = $this->logistik->view_all('gudang');
		$this->load->view('manage/select_permintaan',$data);
	}
	function simpan_pengeluaran()
	{
		$data = array(
			'id_permintaan'=>$this->input->post('id_permintaan'),
			'no_MRFC'=>$this->input->post('no_MRFC'),
			'tanggal_MRFC'=>$this->input->post('tanggal_MRFC'),
			'pemberi'=>$this->input->post('pemberi'),
			'penerima'=>$this->input->post('penerima'),
			'tanggal_kirim_pengeluaran'=>$this->input->post('tanggal_kirim_pengeluaran'),
			'keterangan_pengeluaran'=>$this->input->post('keterangan_pengeluaran'),
			'pengeluaran_input_oleh'=>$this->whois(),
		);
		$this->logistik->insert_table('pengeluaran', $data);
		$data_update = array('status_permintaan'=>'Telah Diproses, Telah Diproses');
		$this->logistik->edit_all('permintaan', 'id_permintaan', $this->input->post('id_permintaan'), $data_update);
		echo $this->logistik->get_max_id('pengeluaran')->row('max_id');
	}
	function simpan_material_keluar()
	{
		$get_id_stok_material = $this->logistik->view_where('stok_material',array('id_material'=>$this->input->post('id_material'),'id_gudang'=>$this->input->post('id_gudang')));
		$data = array(
			'id_pengeluaran'=>$this->input->post('id_pengeluaran'),
			'id_stok_material'=>$get_id_stok_material->row('id_stok_material'),
			'volume_keluar'=>$this->input->post('volume_keluar'),
			'satuan_keluar'=>$this->input->post('satuan_keluar'),
			'volume_kembali'=>0
		);
		$this->logistik->insert_table('material_keluar', $data);
		$this->trigger_stok_material('hapus', $data['volume_keluar'], $this->input->post('id_material'), $this->input->post('id_gudang'));
		$this->logistik->edit_all_in('permintaan', 'id_permintaan', $this->input->post('id_permintaan'), array('tanggal_baca_mitra'=>''));
		//mail
		$content = 'Permintaan material (PRM-'.$this->input->post('id_permintaan').') <b>telah diproses</b>. <a href="http://localhost/logistik">Selengkapnya</a>';
		$dm = $this->logistik->view_where('mitra',array('username'=>$this->input->post('mitra')));
		// if( $dm->row('email_mitra') != '' ){
			// $this->trigger_send_email($dm->row('email_mitra'), 'Respon Permintaan Material', $content); 
		// }
		echo $this->input->post('persen');
	}
	function detail_pengeluaran()
	{
		$idp = $this->input->post('id_pengeluaran');
		$data['datax'] = $this->logistik->view_where('pengeluaran',array('id_pengeluaran'=>$idp));
		$this->db->join('stok_material','material_keluar.id_stok_material=stok_material.id_stok_material');
		$this->db->join('material','stok_material.id_material=material.id_material');
		$this->db->join('gudang','stok_material.id_gudang=gudang.id_gudang');
		$data['datay'] = $this->logistik->view_where('material_keluar',array('id_pengeluaran'=>$idp));
		$this->load->view('manage/detail_pengeluaran',$data);
	}
	function hapus_pengeluaran($idp)
	{
		$get_mat_kel = $this->logistik->view_where('material_keluar',array('id_pengeluaran'=>$idp));
		foreach($get_mat_kel->result() as $gmk){
			$this->logistik->edit_stok_gudang($gmk->id_stok_material, $gmk->volume_keluar);
		}
		$this->logistik->delete_where('pengeluaran', 'id_pengeluaran', $idp);
		redirect('manage/distribusi');
	}
	function edit_pengeluaran()
	{
		//echo $this->input->post('no_MRFC');die;
		$value = $this->input->post('id_pengeluaran');
		$data = array(
			'no_MRFC'=>$this->input->post('no_MRFC'),
			'tanggal_MRFC'=>$this->input->post('tanggal_MRFC'),
			'pemberi'=>$this->input->post('pemberi'),
			'penerima'=>$this->input->post('penerima'),
			'tanggal_kirim_pengeluaran'=>$this->input->post('tanggal_kirim_pengeluaran'),
			'keterangan_pengeluaran'=>$this->input->post('keterangan_pengeluaran')
		);
		$this->logistik->edit_all('pengeluaran', 'id_pengeluaran', $value, $data);
		echo 'bisa';
	}
	function hapus_material_keluar($idmk)
	{
		$this->logistik->delete_where('material_keluar', 'id_material_keluar', $idmk);
		redirect('manage/distribusi');
	}
	function form_edit_mk()
	{
		$this->db->join('stok_material','material_keluar.id_stok_material=stok_material.id_stok_material');
		$this->db->join('material','stok_material.id_material=material.id_material');
		$this->db->join('gudang','stok_material.id_gudang=gudang.id_gudang');
		$data['datax']=$this->logistik->view_where('material_keluar',array('id_material_keluar'=>$this->input->post('idmk')));
		$data['datay']=$this->logistik->view_all('material');
		$data['dataz']=$this->logistik->view_all('gudang');
		$this->load->view('manage/form_edit_material_keluar',$data);
	}
	function edit_mk()
	{
		$value=$this->input->post('idmk');
		$cek_mk=$this->logistik->view_where('material_keluar',array('id_material_keluar'=>$value));
		if($cek_mk->row('volume_kembali') != 0 && $this->input->post('alasan_kembali') != 'Rusak'){
			if($cek_mk->row('volume_kembali') != $this->input->post('volume_kembali')){
				if( $cek_mk->row('volume_kembali') > $this->input->post('volume_kembali') ){
					$j = $cek_mk->row('volume_kembali') - $this->input->post('volume_kembali');
					$this->trigger_stok_material('hapus', $j, $this->input->post('material'), $this->input->post('gudang'));
				}else if( $cek_mk->row('volume_kembali') < $this->input->post('volume_kembali') ){
					$j = $this->input->post('volume_kembali') - $cek_mk->row('volume_kembali');
					$this->trigger_stok_material('tambah', $j, $this->input->post('material'), $this->input->post('gudang'));
				}
			}else{
					$j = $this->input->post('volume_kembali');
					$this->trigger_stok_material('tambah', $j, $this->input->post('material'), $this->input->post('gudang'));
				}
		}
		if($cek_mk->row('volume_kembali') == 0 && $this->input->post('alasan_kembali') != 'Rusak'){
			$this->trigger_stok_material('tambah', $this->input->post('volume_kembali'), $this->input->post('material'), $this->input->post('gudang'));
		}if($cek_mk->row('volume_kembali') != 0 && $this->input->post('alasan_kembali') == 'Rusak'){
			$this->trigger_stok_material('hapus', $this->input->post('volume_kembali'), $this->input->post('material'), $this->input->post('gudang'));
		}
		
		$get_id_stok_material = $this->logistik->view_where('stok_material',array('id_material'=>$this->input->post('material'),'id_gudang'=>$this->input->post('gudang')));
		$data=array(
			'id_stok_material'=>$get_id_stok_material->row('id_stok_material'),
			'volume_keluar'=>$this->input->post('volume_keluar'),
			'satuan_keluar'=>$this->input->post('volume_satuan'),
			'volume_kembali'=>$this->input->post('volume_kembali'),
			'alasan_kembali'=>$this->input->post('alasan_kembali'),
			'keterangan_alasan'=>$this->input->post('keterangan_alasan'),
			'tanggal_kembali'=>$this->input->post('tanggal_kembali')
		);
		$this->logistik->edit_all('material_keluar', 'id_material_keluar', $value, $data);
				
		redirect('manage/distribusi');
	}
	function stok()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['title']='Stok Material Di Gudang';
		$data['manage_page'] = 'stok';
		$this->db->join('gudang','stok_material.id_gudang = gudang.id_gudang');
		$this->db->join('material','stok_material.id_material = material.id_material');
		$this->db->order_by('stok','desc');
		$this->db->order_by('kode_material','asc');
		$data['datax']=$this->logistik->view_all('stok_material');
		$this->load->view('manage/main-page',$data);
	}
	function proses_pindah_gudang()
	{
		$postingan = $this->input->post();
		// echo $postingan['no_surat_jalan'];
		// echo 'masa';die;
		$data_pg = array(
			'no_surat_jalan'=>$postingan['no_surat_jalan'],
			'tanggal_surat_jalan'=>$postingan['tanggal_surat_jalan'],
			'gudang_tujuan'=>$postingan['gudang_tujuan'],
			'pemberi'=>$postingan['pemberi'],
			'penerima'=>$postingan['penerima'],
			'keterangan_pindah_gudang'=>$postingan['keterangan_pindah_gudang'],
			'pindah_gudang_input_oleh'=>$this->whois(),
			'tanggal_input_pindah_gudang'=>date('Y-m-d h:i:s')
		);
		$this->logistik->insert_table('pindah_gudang', $data_pg);
		$max_pindah_gudang = $this->logistik->get_max('pindah_gudang','id_pindah_gudang');
		
		for($nc=1;$nc<=$postingan['maxc'];$nc++){
			$isiwell = explode(',',$postingan['wellinp'.$nc]);
			$get_id_stok_material = $this->logistik->view_where('stok_material',array('id_material'=>$isiwell[0],'id_gudang'=>$isiwell[1]));
			$data_dpg = array(
				'id_pindah_gudang'=>$max_pindah_gudang->row('max_id'),
				'id_stok_material'=>$get_id_stok_material->row('id_stok_material'),
				'volume_pindah'=>$isiwell[2]
			);
			$this->logistik->insert_table('detail_pindah_gudang', $data_dpg);
			
			//kurangi stok
			$this->logistik->edit_stok_gudang_lagi($get_id_stok_material->row('id_stok_material'), $isiwell[2]);
		}
		redirect('manage/pag');
	}
	function edit_stok()
	{
		$data = array('stok'=>$this->input->post('stok'));
		$value = $this->input->post('id');
		$fb = $this->logistik->edit_all('stok_material', 'id_stok_material', $value, $data);
		// if($fb){ echo 'success'; }
	}
	
	function ambil_mitra_project()
	{
		$id_project = $this->input->post('id');
		$this->db->join('mitra','mitra.username=project_mitra.mitra');
		$dmp = $this->logistik->view_where('project_mitra',array('id_project'=>$id_project));
		foreach($dmp->result() as $mp){
			$arr['mitra'][]=$mp->nama_mitra;
		}
		// echo $arr[2];die;
		echo json_encode($arr);
	}
	function PAG()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['title']='Perpindahan Antar Gudang';
		$data['manage_page'] = 'pag';
		$data['datax'] = $this->logistik->view_all('pindah_gudang');
		$this->db->where('satuan !=','');
		$data['dataw'] = $this->logistik->view_all('material');
		$data['dataz'] = $this->logistik->view_all('gudang');
		$data['datab']=$this->logistik->for_autocomplete('pindah_gudang', 'pemberi');	
		$data['datac']=$this->logistik->for_autocomplete('pindah_gudang', 'gudang_tujuan');	
		$this->load->view('manage/main-page',$data);
	}
	function hapus_pindah_gudang($id)
	{
		
		
		//proses update stok
		$get_data_pag = $this->logistik->view_where('detail_pindah_gudang',array('id_pindah_gudang'=>$id));
		foreach($get_data_pag->result() as $gdp){
			$this->logistik->edit_stok_gudang($gdp->id_stok_material, $gdp->volume_pindah);
		}
		
		$this->logistik->delete_where('pindah_gudang', 'id_pindah_gudang', $id);
		redirect('manage/pag');
	}
	function detail_pindah_gudang()
	{
		$id = $this->input->post('id');
		$data['datax'] = $this->logistik->view_where('pindah_gudang',array('id_pindah_gudang'=>$id));
		$this->db->join('stok_material','stok_material.id_stok_material = detail_pindah_gudang.id_stok_material');
		$this->db->join('gudang','stok_material.id_gudang=gudang.id_gudang');
		$this->db->join('material','stok_material.id_material=material.id_material');
		$data['datay'] = $this->logistik->view_where('detail_pindah_gudang',array('id_pindah_gudang'=>$id));
		$this->load->view('manage/detail_pindah_gudang',$data);
	}
	function edit_pindah_gudang()
	{
		$table='pindah_gudang';
		$field='id_pindah_gudang';
		$value=$this->input->post('id_pindah_gudang');
		
		$this->logistik->edit_all($table, $field, $value, $this->input->post());
		echo 'bisa';
	}
	function hapus_detail_pindah_gudang($id)
	{
		//update stok 
		$get_data_pag = $this->logistik->view_where('detail_pindah_gudang',array('id_detail_pindah_gudang'=>$id));
		foreach($get_data_pag->result() as $gdp);
		$this->logistik->edit_stok_gudang($gdp->id_stok_material, $gdp->volume_pindah);
		
		$this->logistik->delete_where('detail_pindah_gudang', 'id_detail_pindah_gudang', $id);
		redirect('manage/pag');
	}
	function form_edit_detail_pag()
	{
		$this->db->join('stok_material','detail_pindah_gudang.id_stok_material=stok_material.id_stok_material');
		$this->db->join('material','stok_material.id_material=material.id_material');
		$this->db->join('gudang','stok_material.id_gudang=gudang.id_gudang');
		$data['datax']=$this->logistik->view_where('detail_pindah_gudang',array('id_detail_pindah_gudang'=>$this->input->post('id')));
		$data['datay']=$this->logistik->view_all('material');
		$data['dataz']=$this->logistik->view_all('gudang');
		$this->load->view('manage/form_edit_detail_pindah_gudang',$data);
	}
	function edit_detail_pindah_gudang()
	{
		$get_id_stok_material = $this->logistik->view_where('stok_material',array('id_material'=>$this->input->post('materialx'),'id_gudang'=>$this->input->post('gudangx')));
		$value= $this->input->post('iddpg');
		$data = array(
			'volume_pindah'=>$this->input->post('volume_pindah'),
			'id_stok_material'=>$get_id_stok_material->row('id_stok_material')
		);
		
		//ubah stok
		$ambil_data_lama = $this->logistik->view_where('detail_pindah_gudang',array('id_detail_pindah_gudang'=>$this->input->post('iddpg')));
		$mat_lama = $ambil_data_lama->row('id_stok_material');
		$mat_baru = $data['id_stok_material'];
		if( $mat_lama != $mat_baru ){			
			//mengembalikan stok material yg lama
			$this->logistik->edit_stok_gudang($mat_lama, $ambil_data_lama->row('volume_pindah'));
			//mengurangi stok material yg baru dipindahkan
			$this->logistik->edit_stok_gudang_lagi($mat_baru, $data['volume_pindah']);
		}else{
			if( $data['volume_pindah'] > $ambil_data_lama->row('volume_pindah') ){
				$nambahnya = $data['volume_pindah'] - $ambil_data_lama->row('volume_pindah');
				$this->logistik->edit_stok_gudang_lagi($mat_lama, $nambahnya);
			}else if( $data['volume_pindah'] < $ambil_data_lama->row('volume_pindah') ){
				$kurangnya = $ambil_data_lama->row('volume_pindah') - $data['volume_pindah'];
				$this->logistik->edit_stok_gudang($mat_lama, $kurangnya);
			}
		}		
		
		$this->logistik->edit_all('detail_pindah_gudang', 'id_detail_pindah_gudang', $value, $data);
		redirect('manage/pag');
	}
	function tambah_eksekutor_project()
	{
		$post = $this->input->post();
		$data = array(
			'id_project'=>explode('<>',$post['tab3a'])[0],
			'mitra'=>$post['tab3b'],
			'pesan_singkat'=>$post['tab3c'],
			'project_mitra_input_oleh'=>$this->whois(),
			'tanggal_input_project_mitra'=>date('Y-m-d h:i:s')
		);
		$cek = $this->logistik->view_where('project_mitra',array('id_project'=>$data['id_project'],'mitra'=>$data['mitra']));
		if($cek->num_rows()>0){
			$this->session->set_flashdata('err_add_mitra','true');
		}else{
			$this->logistik->insert_table('project_mitra',$data);
			$this->session->set_flashdata('err_add_mitra','false');
			
			//mail
			$content = 'Anda memiliki tugas eksekusi project (ID PROJECT = '.explode('<>',$post['tab3a'])[1].') dari <b>Telkom Akses Bandung</b>. <a href="http://localhost/logistik">Selengkapnya</a>';
			$dm = $this->logistik->view_where('mitra',array('username'=>$data['mitra']));
			if( $dm->row('email_mitra') != '' ){
				$this->trigger_send_email($dm->row('email_mitra'), 'Tugas Eksekusi Project', $content); 
			}			
		}
		redirect('manage/project');
	}
	function laporan()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['title']='Laporan Logistik';
		$data['manage_page'] = 'laporan';
		$data['tgl_error'] = $this->session->flashdata('tgl_salah');
		//start of paging
		$config['base_url'] = site_url().'/manage/laporan/';
		$config['per_page'] = 30; 
		if(isSet($_GET['t1']) && isset($_GET['t2'])){
			$cek = $this->db->query("select  datediff('".$_GET['t1']."','".$_GET['t2']."') as jml from dual");
			if($cek->row('jml') > 0){
				$this->session->set_flashdata('tgl_salah','Tanggal awal harus lebih kecil');
				redirect('manage/laporan');
				
			}
			if($this->uri->segment(3)==''){
				$or2='';
			}else{
				$or2=', '.$this->uri->segment(3);
			}
			$config['total_rows'] = $this->db->query("SELECT kode_material, nama_material, satuan, SUM(volume_BAPPB) AS jumlah_masuk 
			FROM (material_masuk) 
			JOIN material ON material.id_material=material_masuk.id_material 
			WHERE tanggal_masuk_barang BETWEEN '".$_GET['t1']."' AND '".$_GET['t2']."' 
			GROUP BY kode_material, nama_material, satuan 
			ORDER BY jumlah_masuk DESC LIMIT ".$config['per_page'].$or2)->num_rows();
			$data['periode']=$_GET['t1'].' sampai '.$_GET['t2'];
		}else{
			$this->db->join('material','material.id_material=material_masuk.id_material');
			$this->db->select('kode_material, nama_material, satuan, sum(volume_BAPPB) as jumlah_masuk');
			$this->db->group_by('kode_material, nama_material, satuan');
			$this->db->order_by('jumlah_masuk','desc');
			$config['total_rows'] = $this->logistik->view_all('material_masuk')->num_rows(); 
			$data['periode'] = 'Semua periode';
		}		
		
		$config['num_links'] = 3;
		$config['uri_segment'] = 3;		
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		
		$config['cur_tag_open'] = '<li class="class="active""><a href="#" style="background-color: #ccc; color:white; cursor:default;">';
		$config['cur_tag_close'] = '</a></li>';		
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';		
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';		
		$this->pagination->initialize($config);
		$data['page_link'] = $this->pagination->create_links(); 
		if(isSet($_GET['t1']) && isset($_GET['t2'])){
			if($this->uri->segment(3)==''){
				$or2='';
			}else{
				$or2=', '.$this->uri->segment(3);
			}
			$data['datax'] = $this->db->query("SELECT kode_material, nama_material, satuan, SUM(volume_BAPPB) AS jumlah_masuk 
			FROM (material_masuk) 
			JOIN material ON material.id_material=material_masuk.id_material 
			WHERE tanggal_masuk_barang BETWEEN '".$_GET['t1']."' AND '".$_GET['t2']."' 
			GROUP BY kode_material, nama_material, satuan 
			ORDER BY jumlah_masuk DESC LIMIT ".$config['per_page'].$or2);
		}else{
			$this->db->join('material','material.id_material=material_masuk.id_material');
			$this->db->select('kode_material, nama_material, satuan, sum(volume_BAPPB) as jumlah_masuk');
			$this->db->group_by('kode_material, nama_material, satuan');
			$this->db->order_by('jumlah_masuk','desc');
			$data['datax'] = $this->logistik->view_paging_laporan('material_masuk',$config['per_page'], $this->uri->segment(3));
		}
		
		// $data['datax'] = $this->logistik->view_paging('material_masuk', $config['per_page'], $this->uri->segment(3));
		// end paging
		$w = "WHERE DATE_FORMAT(tanggal_mrfc,'%Y-%m') = '".date('Y-m')."'	";
		$df = "%Y-%m-%d";
		if(isset($_GET['tahun'])  &&  isset($_GET['bulan']) ){
		
			if($_GET['tahun'] == '' && $_GET['bulan']==''){
				$df = "%Y-%m";
				$w = "";
			}else{
				if($_GET['tahun'] == '' && $_GET['bulan']!=''){
					$df = "%Y-%m-%d";
					$kon = "%m";
					$thn = $_GET['bulan'];
					$w = "WHERE DATE_FORMAT(tanggal_mrfc,'".$kon."') = '".$thn."'";	
				}else if($_GET['tahun'] != '' && $_GET['bulan']==''){
					$df = "%Y-%m";
					$kon = "%Y";
					$thn = $_GET['tahun'];
					$w = "WHERE DATE_FORMAT(tanggal_mrfc,'".$kon."') = '".$thn."'";	
				}else{
					$df = "%Y-%m-%d";
					$kon = "%Y-%m";
					$thn = $_GET['tahun'].'-'.$thn = $_GET['bulan'];
					$w = "WHERE DATE_FORMAT(tanggal_mrfc,'".$kon."') = '".$thn."'";	
				}				
			}
					
		}
		if(isset($_GET['project'])){
			$data['lpa'] = $this->logistik->get_laporan_permintaan_project($_GET['project']);
			$data['lpb'] = $this->logistik->get_laporan_distribusi_project($_GET['project']);
		}
		$this->db->join('material','material.id_material=material_masuk.id_material');
		$this->db->select('kode_material, nama_material, satuan, sum(volume_BAPPB) as jumlah_masuk');
		$this->db->group_by('kode_material, nama_material, satuan');
		$this->db->order_by('jumlah_masuk','desc');
		$data['datay'] = $this->logistik->view_all('material_masuk');
		$data['dataw'] = $this->logistik-> chart_material_keluar1($df, $w);
		$data['datav'] = $this->logistik-> chart_material_keluar2($df, $w);
		$data['d_tahun'] = $this->logistik->get_tahun_mrfc();
		$data['datap'] = $this->logistik->view_all('project');
		$this->db->join('material','material.id_material=stok_material.id_material');
		$data['dataz'] =  $this->logistik->view_all('stok_material');
		$this->load->view('manage/main-page',$data);
	}
	
	/* F u t u r e */
	
	public function search($tp)
	{
		// cari di database
		$data = $this->logistik->for_autocomplete('material_masuk', $tp);	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['suggestions'][] = array(
				'value'	=>$row->$tp,
				'data'	=>$row->$tp
			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
	function JKM()
	{
		$data['title'] = 'Surat Justifikasi Pengadaan Material';
		$data['kepala'] = 'JUSTIFIKASI KEBUTUHAN MATERIAL';
		$this->db->join('permintaan','permintaan.id_project_mitra = project_mitra.id_project_mitra');
		$get_idpro = $this->logistik->view_where('project_mitra',array('id_permintaan'=>$_GET['perm1']));
		$nos = $this->logistik->no_surat('permintaan','NO_JKM');
		$data['no_surat'] = 'NOMOR : '.($nos->row('no_su')).'/LG-JP/TA-0203/2014';
		$mi = $_GET['maxi'];
		$tmp = '';
		for($ni=1;$ni<=$mi;$ni++){
			if($ni==$mi){ $km =''; }else{ $km=','; }
			$tmp = $tmp.$_GET['perm'.$ni].$km;
		}
		$data['back'] = base_url().'manage/permintaan/'.$get_idpro->row('id_project');
		$data['next'] = 'simpan_no_jkm';	
		$data['datax'] = $this->logistik->for_detail_permintaan2('id_permintaan',$tmp);	
		$data['id_perm']= $tmp;
		$data['no_su']= $nos->row('no_su');
		$data['whois'] = $this->logistik->view_where('pegawai',array('username'=>$this->whois())); 
		$this->load->view('manage/surat',$data);
	}
	function simpan_no_jkm()
	{
		$ids = $this->input->post('ids');
		$data = $this->input->post('nosu');
		// echo $ids.' - '.$data;die;
		$this->logistik->edit_all_in('permintaan', 'id_permintaan', $ids, array('NO_JKM'=>$data,'status_permintaan'=>'Sedang Diproses, Sedang Diproses','tanggal_baca_mitra'=>''));
		
		//mail
		$content = 'Permintaan material (PRM-'.$ids.') <b>telah ditanggapi</b> dan akan segera diproses. <a href="http://localhost/logistik">Selengkapnya</a>';
		$idmit = $this->db->query("select mitra from project_mitra where id_project_mitra = (select id_project_mitra from permintaan where id_permintaan='".$ids."')");
		$dm = $this->logistik->view_where('mitra',array('username'=>$idmit->row('mitra')));
		// if( $dm->row('email_mitra') != '' ){
			// $this->trigger_send_email($dm->row('email_mitra'), 'Respon Permintaan Material', $content); 
		// }
		echo 'print';
	}
	function JPM()
	{
		$data['title'] = 'Surat Justifikasi Pengadaan Material';
		$data['kepala'] = 'JUSTIFIKASI PENGADAAN MATERIAL';
		$nos = $this->logistik->no_surat('detail_permintaan','no_JPM');
		$this->db->join('detail_permintaan','detail_permintaan.id_permintaan=permintaan.id_permintaan');
		$no_jkm = $this->logistik->view_where('permintaan',array('id_detail_permintaan'=>$_GET['id_detail_permintaan1']));
		$data['no_surat'] = 'NOMOR : '.($nos->row('no_su')).'/LG-JP/TA-0203/2014';
		$data['no_jkm'] = 'Justifikasi Kebutuhan Nomor : '.($no_jkm->row('NO_JKM')).'/LG-JK/TA-0203/2014';
		
		$mi = $_GET['max_print'];
		$tmp = '';
		for($ni=1;$ni<=$mi;$ni++){
			if($ni==$mi){ $km =''; }else{ $km=','; }
			$tmp = $tmp.$_GET['id_detail_permintaan'.$ni].$km;
		}
		$data['back'] = base_url().'manage/detail_permintaan/'.$no_jkm->row('id_permintaan');
		$data['next'] = 'simpan_no_jpm';
		$data['datax'] = $this->logistik->for_detail_permintaan2('id_detail_permintaan',$tmp);	
		$data['id_perm']= $tmp;
		$data['no_su']= $nos->row('no_su');
		$data['whois'] = $this->logistik->view_where('pegawai',array('username'=>$this->whois())); 
		$this->load->view('manage/surat',$data);
	}
	function simpan_no_jpm()
	{
		$ids = $this->input->post('ids');
		$data = $this->input->post('nosu');
		// echo $ids.' - '.$data;die;
		$this->logistik->edit_all_in('detail_permintaan', 'id_detail_permintaan', $ids, array('no_JPM'=>$data));
		echo 'print';
	}
	function mitra()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['title']='Mitra';
		$data['manage_page'] = 'mitra';
		$data['datax'] = $this->logistik->view_all('mitra');
		$this->load->view('manage/main-page',$data);
	}
	function delete_mitra($id)
	{
		$this->logistik->delete_where('user', 'username', $id);
		redirect('manage/mitra');
	}
	function form_tambah_mitra()
	{
		$this->load->view('manage/form_tambah_mitra');
	}
	function cek_username()
	{
		$u = $this->input->post('u');
		$cek_user = $this->logistik->view_where('user',array('username'=>$u))->num_rows();
		echo $cek_user;
	}
	function simpan_mitra()
	{
		$data_u = array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'date_created'=>date('Y-m-d h:i:s'),
		);
		$data_m = array(
			'username'=>$data_u['username'],
			'nama_mitra'=>$this->input->post('nama_mitra'),
			'alamat_mitra'=>$this->input->post('alamat_mitra'),
			'email_mitra'=>$this->input->post('email_mitra'),
			'telepon_mitra'=>$this->input->post('telepon_mitra')
		);
		$this->logistik->insert_table('user', $data_u);
		$this->logistik->insert_table('mitra', $data_m);
		redirect('manage/mitra');
	}
	function form_edit_mitra()
	{
		$u = $this->input->post('id');
		$data['datax'] = $this->logistik->view_where('mitra',array('username'=>$u));
		$this->load->view('manage/form_edit_mitra',$data);
	}
	function edit_mitra()
	{	
		$data_m = array(
			'nama_mitra'=>$this->input->post('nama_mitra'),
			'alamat_mitra'=>$this->input->post('alamat_mitra'),
			'email_mitra'=>$this->input->post('email_mitra'),
			'telepon_mitra'=>$this->input->post('telepon_mitra')
		);
		$this->logistik->edit_all('mitra', 'username', $this->input->post('username'), $data_m);
		$this->logistik->edit_all('user', 'username', $this->input->post('username'), array('password'=>$this->input->post('password')));
		redirect('manage/mitra');
	}
	function kirim_percakapan()
	{
		$data_p = array(
			'tanggal_kirim_percakapan'=>gmdate("Y-m-d H:i:s", time()+60*60*7),
			'oleh'=>$this->whois(),
			'kepada'=>$this->input->post('kepada'),
			'isi_pesan'=>$this->input->post('isi_pesan')
		);
		$this->logistik->insert_table('percakapan',$data_p);
		$profil_aku = $this->logistik->view_where('pegawai',array('username'=>$this->whois()));
		$profil_dia = $this->logistik->view_where('pegawai',array('username'=>$data_p['kepada']));
		$this->trigger_send_email($profil_dia->row('email'), 'Percakapan - '.$profil_aku->row('nama'), $data_p['isi_pesan'].'. <a href="http://localhost/logistik/">Lihat</a>');
		redirect('manage/profile/pesan');
		
	}
	function lihat_percakapan()
	{
		$id = $this->input->post('id');
		$data['datax'] = $this->logistik->get_isi_pesan_peruser($this->whois(), $id);
		$data['curr_user'] = $this->whois();
		$data['that_user'] = $id;
		$this->load->view('manage/percakapan',$data);
	}
	function loadPercakapan()
	{
		$id = $this->input->post('id');
		$data['datax'] = $this->logistik->get_isi_pesan_peruser($this->whois(), $id);
		$data['curr_user'] = $this->whois();
		$data['that_user'] = $id;
		$this->load->view('manage/loadPercakapan',$data);
	}
	function readPercakapan()
	{
		$ua = $this->input->post('ua');
		$ub = $this->input->post('ub');
		$this->db->query("update percakapan set tanggaLbaca_percakapan = now() where kepada = '".$ua."' and oleh = '".$ub."' and tanggaLbaca_percakapan='0000-00-00 00:00:00'");
	}
	function export()
	{
		include_once ( APPPATH."libraries/write-excel/Worksheet.php");
		include_once ( APPPATH."libraries/write-excel/Workbook.php");
	  
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=Logistik_Export_".date('Y-m-d').".xls" );
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Pragma: public");

		$workbook = new Workbook("");
		$worksheet1 =& $workbook->add_worksheet('Master Material');
		$worksheet2 =& $workbook->add_worksheet('Material Masuk');
		$worksheet3 =& $workbook->add_worksheet('Distribusi');

		$format =& $workbook->add_format();
		$format->set_bold();

		$worksheet1->set_row(0, 15);
		$worksheet1->set_column(0, 0, 30);
		$worksheet1->write_string(0, 0, 'ID BARANG');
		$worksheet1->set_column(0, 1, 60);
		$worksheet1->write_string(0, 1, 'NAMA BARANG');
		$worksheet1->set_column(0, 2, 80);
		$worksheet1->write_string(0, 2, 'SPESIFIKASI');
		$worksheet1->set_column(0, 3, 30);
		$worksheet1->write_string(0, 3, 'SATUAN');

		$material = $this->logistik->view_all('material');
		$i_a = 1;
		foreach($material->result() as $m){
			$worksheet1->write_string($i_a, 0, $m->kode_material);
			$worksheet1->write_string($i_a, 1, $m->nama_material);
			$worksheet1->write_string($i_a, 2, $m->spesifikasi_material);
			$worksheet1->write_string($i_a, 3, $m->satuan);
			$i_a++;
		}
		
		$worksheet2->set_row(2, 15);
		$worksheet2->set_column(2, 0, 4);
		$worksheet2->write_string(2, 0, 'No');
		$worksheet2->set_column(2, 1, 20);
		$worksheet2->write_string(2, 1, 'Tanggal Faktur');
		$worksheet2->set_column(2, 2, 20);
		$worksheet2->write_string(2, 2, 'Tanggal Faktur');
		$worksheet2->set_column(2, 3, 20);
		$worksheet2->write_string(2, 3, 'Tanggal Masuk');
		$worksheet2->set_column(2, 4, 20);
		$worksheet2->write_string(2, 4, 'Tanggal Entri');
		$worksheet2->set_column(2, 5, 20);
		$worksheet2->write_string(2, 5, 'Admin Entri');
		$worksheet2->set_column(2, 6, 1);
		$worksheet2->write_string(2, 6, '');
		$worksheet2->set_column(2, 7, 30);
		$worksheet2->write_string(2, 7, 'ID Material');
		$worksheet2->set_column(2, 8, 30);
		$worksheet2->write_string(2, 8, 'Nama Material');
		$worksheet2->set_column(2, 9, 30);
		$worksheet2->write_string(2, 9, 'Supplier');
		$worksheet2->set_column(2, 10, 15);
		$worksheet2->write_string(2, 10, 'Satuan');
		$worksheet2->set_column(2, 11, 10);
		$worksheet2->write_string(2, 11, 'Volume (BAPPB)');
		$worksheet2->set_column(2, 12, 10);
		$worksheet2->write_string(2, 12, 'Harga/Satuan');
		$worksheet2->set_column(2, 13, 30);
		$worksheet2->write_string(2, 13, 'Ekspedisi');
		$worksheet2->set_column(2, 14, 10);
		$worksheet2->write_string(2, 14, 'Kondisi');
		$worksheet2->set_column(2, 15, 30);
		$worksheet2->write_string(2, 15, 'Penerima');
		$worksheet2->set_column(2, 16, 10);
		$worksheet2->write_string(2, 16, 'Gudang');
		$worksheet2->set_column(2, 17, 30);
		$worksheet2->write_string(2, 17, 'No. Surat Jalan');
		$worksheet2->set_column(2, 18, 20);
		$worksheet2->write_string(2, 18, 'Tanggal PO');
		$worksheet2->set_column(2, 19, 30);
		$worksheet2->write_string(2, 19, 'No. PO');
		$worksheet2->set_column(2, 20, 30);
		$worksheet2->write_string(2, 20, 'Keterangan');
		
		$this->db->order_by('tanggal_faktur','asc');
		$this->db->join('supplier','material_masuk.id_supplier=supplier.id_supplier');
		$this->db->join('material','material_masuk.id_material=material.id_material');
		$this->db->join('gudang','material_masuk.id_gudang=gudang.id_gudang');
		$material_masuk = $this->logistik->view_all('material_masuk');
		$i_b = 4;
		$i_b_row = 1;
		foreach($material_masuk->result() as $mm){
			$worksheet2->write_number($i_b, 0, $i_b_row);
			$worksheet2->write_string($i_b, 1, $mm->tanggal_faktur);
			$worksheet2->write_string($i_b, 2, $mm->tanggal_faktur);
			if($mm->tanggal_masuk_barang=='0000-00-00'){
				$mm->tanggal_masuk_barang = '';
			}
			$worksheet2->write_string($i_b, 3, $mm->tanggal_masuk_barang);
			if($mm->tanggal_input_material_masuk=='0000-00-00'){
				$mm->tanggal_input_material_masuk = '';
			}
			$worksheet2->write_string($i_b, 4, date('Y-m-d',strtotime($mm->tanggal_input_material_masuk)));
			$worksheet2->write_string($i_b, 5, $mm->material_masuk_input_oleh);
			$worksheet2->write_string($i_b, 6, '');
			$worksheet2->write_string($i_b, 7, $mm->kode_material);
			$worksheet2->write_string($i_b, 8, $mm->nama_material);
			$worksheet2->write_string($i_b, 9, $mm->nama_supplier);
			$worksheet2->write_string($i_b, 10, $mm->satuan);
			$worksheet2->write_number($i_b, 11, $mm->volume_BAPPB);
			$worksheet2->write_number($i_b, 12, $mm->harga_satuan);
			$worksheet2->write_string($i_b, 13, $mm->ekspedisi);
			$worksheet2->write_string($i_b, 14, $mm->kondisi);
			$worksheet2->write_string($i_b, 15, $mm->penerima);
			$worksheet2->write_string($i_b, 16, $mm->nama_gudang);
			if(substr($mm->no_surat_jalan,0,2) == '* '){
				$mm->no_surat_jalan = substr($mm->no_surat_jalan,2);
			}
			$worksheet2->write_string($i_b, 17, $mm->no_surat_jalan);
			if($mm->tanggal_PO=='0000-00-00'){
				$mm->tanggal_PO = '';
			}
			$worksheet2->write_string($i_b, 18, $mm->tanggal_PO);
			$worksheet2->write_string($i_b, 19, $mm->no_PO);
			$worksheet2->write_string($i_b, 20, $mm->keterangan);
			$i_b++;
			$i_b_row++;
		}
		$worksheet2->write_string(1, 11, '=SUM(L5:L'.$i_b.')');
		
		$worksheet3->set_row(2, 15);
		$worksheet3->set_column(2, 0, 4);
		$worksheet3->write_string(2, 0, 'No');
		$worksheet3->set_column(2, 1, 20);
		$worksheet3->write_string(2, 1, 'Tanggal MRFC');
		$worksheet3->set_column(2, 2, 20);
		$worksheet3->write_string(2, 2, 'Tanggal Entri');
		$worksheet3->set_column(2, 3, 15);
		$worksheet3->write_string(2, 3, 'Gudang');
		$worksheet3->set_column(2, 4, 1);
		$worksheet3->write_string(2, 4, '');
		$worksheet3->set_column(2, 5, 15);
		$worksheet3->write_string(2, 5, 'Admin Entri');
		$worksheet3->set_column(2, 6, 1);
		$worksheet3->write_string(2, 6, '');
		$worksheet3->set_column(2, 7, 30);
		$worksheet3->write_string(2, 7, 'ID Material');
		$worksheet3->set_column(2, 8, 30);
		$worksheet3->write_string(2, 8, 'Nama Material');
		$worksheet3->set_column(2, 9, 10);
		$worksheet3->write_string(2, 9, 'Satuan');
		$worksheet3->set_column(2, 10, 15);
		$worksheet3->write_string(2, 10, 'Vol Minta (RFC)');
		$worksheet3->set_column(2, 11, 15);
		$worksheet3->write_string(2, 11, 'Vol Ambil (BASTA)');
		$worksheet3->set_column(2, 12, 15);
		$worksheet3->write_string(2, 12, 'Vol Return (BASTR)');
		$worksheet3->set_column(2, 13, 15);
		$worksheet3->write_string(2, 13, 'Vol Visik Terpakai');
		$worksheet3->set_column(2, 14, 30);
		$worksheet3->write_string(2, 14, 'Mitra');
		$worksheet3->set_column(2, 15, 20);
		$worksheet3->write_string(2, 15, 'Pemberi');
		$worksheet3->set_column(2, 16, 20);
		$worksheet3->write_string(2, 16, 'Penerima');
		$worksheet3->set_column(2, 17, 20);
		$worksheet3->write_string(2, 17, 'Project');
		$worksheet3->set_column(2, 18, 1);
		$worksheet3->write_string(2, 18, '');
		$worksheet3->set_column(2, 19, 1);
		$worksheet3->write_string(2, 19, '');
		$worksheet3->set_column(2, 20, 20);
		$worksheet3->write_string(2, 20, 'ID Project');
		$worksheet3->set_column(2, 21, 30);
		$worksheet3->write_string(2, 21, 'No. RFC / S. Jalan');
		$worksheet3->set_column(2, 22, 30);
		$worksheet3->write_string(2, 22, 'Keterangan');
		
		$this->db->order_by('tanggal_MRFC','asc');
		$this->db->join('stok_material','stok_material.id_stok_material = material_keluar.id_stok_material');
		$this->db->join('material','stok_material.id_material=material.id_material');
		$this->db->join('gudang','stok_material.id_gudang=gudang.id_gudang');
		$this->db->join('pengeluaran','material_keluar.id_pengeluaran=pengeluaran.id_pengeluaran');
		$this->db->join('permintaan','permintaan.id_permintaan=pengeluaran.id_permintaan');
		$this->db->join('project_mitra','permintaan.id_project_mitra=project_mitra.id_project_mitra');
		$this->db->join('project','project_mitra.id_project=project.id_project');
		$this->db->join('mitra','project_mitra.mitra=mitra.username');
		$material_keluar = $this->logistik->view_all('material_keluar');
		$i_c = 3;
		$i_c_row = 1;
		foreach($material_keluar->result() as $mk){
			$worksheet3->write_number($i_c, 0, $i_c_row);
			$worksheet3->write_string($i_c, 1, $mk->tanggal_MRFC);
			$worksheet3->write_string($i_c, 2, date('Y-m-d',strtotime($mk->tanggal_input_pengeluaran)));
			$worksheet3->write_string($i_c, 3, $mk->nama_gudang);
			$worksheet3->write_string($i_c, 4, '');
			$worksheet3->write_string($i_c, 5, $mk->pengeluaran_input_oleh);
			$worksheet3->write_string($i_c, 6, '');
			$worksheet3->write_string($i_c, 7, $mk->kode_material);
			$worksheet3->write_string($i_c, 8, $mk->nama_material);
			$worksheet3->write_string($i_c, 9, $mk->satuan);
			$worksheet3->write_number($i_c, 10, $mk->volume_keluar);
			$worksheet3->write_number($i_c, 11, $mk->volume_keluar);
			$worksheet3->write_number($i_c, 12, $mk->volume_kembali);
			$worksheet3->write_number($i_c, 13, $mk->volume_keluar - $mk->volume_kembali);
			$worksheet3->write_string($i_c, 14, $mk->nama_mitra);
			$worksheet3->write_string($i_c, 15, $mk->pemberi);
			$worksheet3->write_string($i_c, 16, $mk->penerima);
			$worksheet3->write_string($i_c, 17, $mk->nama_project);
			$worksheet3->write_string($i_c, 18, '');
			$worksheet3->write_string($i_c, 19, '');
			$worksheet3->write_string($i_c, 20, $mk->kode_project);
			$worksheet3->write_string($i_c, 21, $mk->no_MRFC);
			$worksheet3->write_string($i_c, 22, $mk->keterangan_pengeluaran);
			$i_c++;
			$i_c_row++;
		}
		
		$this->db->order_by('tanggal_surat_jalan','asc');
		$this->db->join('pindah_gudang','pindah_gudang.id_pindah_gudang = detail_pindah_gudang.id_pindah_gudang');
		$this->db->join('stok_material','stok_material.id_stok_material = detail_pindah_gudang.id_stok_material');
		$this->db->join('material','stok_material.id_material=material.id_material');
		$this->db->join('gudang','stok_material.id_gudang=gudang.id_gudang');
		$pindah_gudang = $this->logistik->view_all('detail_pindah_gudang');
		
		$i_d = $i_c;
		$i_d_row = $i_c_row;
		foreach($pindah_gudang->result() as $pg){
			$worksheet3->write_number($i_d, 0, $i_d_row);
			$worksheet3->write_string($i_d, 1, $pg->tanggal_surat_jalan);
			$worksheet3->write_string($i_d, 2, date('Y-m-d',strtotime($pg->tanggal_input_pindah_gudang)));
			$worksheet3->write_string($i_d, 3, $pg->nama_gudang.'-'.$pg->gudang_tujuan);
			$worksheet3->write_string($i_d, 4, '');
			$worksheet3->write_string($i_d, 5, $pg->pindah_gudang_input_oleh);
			$worksheet3->write_string($i_d, 6, '');
			$worksheet3->write_string($i_d, 7, $pg->kode_material);
			$worksheet3->write_string($i_d, 8, $pg->nama_material);
			$worksheet3->write_string($i_d, 9, $pg->satuan);
			$worksheet3->write_number($i_d, 10, $pg->volume_pindah);
			$worksheet3->write_number($i_d, 11, $pg->volume_pindah);
			$worksheet3->write_number($i_d, 12, '');
			$worksheet3->write_number($i_d, 13, $pg->volume_pindah);
			$worksheet3->write_string($i_d, 14, $pg->gudang_tujuan);
			$worksheet3->write_string($i_d, 15, $pg->pemberi);
			$worksheet3->write_string($i_d, 16, $pg->penerima);
			$worksheet3->write_string($i_d, 17, 'Perpindahan Antar Gudang');
			$worksheet3->write_string($i_d, 18, '');
			$worksheet3->write_string($i_d, 19, '');
			$worksheet3->write_string($i_d, 20, 'PAG');
			$worksheet3->write_string($i_d, 21, $pg->no_surat_jalan);
			$worksheet3->write_string($i_d, 22, $pg->keterangan_pindah_gudang);
			$i_d++;
			$i_d_row++;
		}
		
		
		$workbook->close();
	}
	function pencarian()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['title']='Pencarian Data';
		$data['manage_page'] = 'pencarian';
		
		// start T1
		$data['t1a'] = $this->db->query("select distinct tanggal_faktur from material_masuk");
		$data['t1b'] = $this->db->query("select distinct tanggal_masuk_barang from material_masuk");
		
		if(isset($_GET['t1'])){
			if(isset($_GET['tanggal_faktur']) && $_GET['tanggal_faktur'] !=''){
				$this->db->where('tanggal_faktur',$_GET['tanggal_faktur']);
			}
			if(isset($_GET['tanggal_masuk_barang']) && $_GET['tanggal_masuk_barang'] !=''){
				$this->db->where('tanggal_masuk_barang',$_GET['tanggal_masuk_barang']);
			}
			if(isset($_GET['kode_material']) && $_GET['kode_material'] !=''){
				$this->db->where('kode_material',$_GET['kode_material']);
			}
			if(isset($_GET['nama_material']) && $_GET['nama_material'] !=''){
				$this->db->where('nama_material',$_GET['nama_material']);
			}
			if(isset($_GET['ekspedisi']) && $_GET['ekspedisi'] !=''){
				$this->db->where('ekspedisi',$_GET['ekspedisi']);
			}
			if(isset($_GET['no_surat_jalan']) && $_GET['no_surat_jalan'] !=''){
				$this->db->where('no_surat_jalan',$_GET['no_surat_jalan']);
			}
			if(isset($_GET['no_PO']) && $_GET['no_PO'] !=''){
				$this->db->where('no_PO',$_GET['no_PO']);
			}
			if(isset($_GET['tanggal_PO']) && $_GET['tanggal_PO'] !=''){
				$this->db->where('tanggal_PO',$_GET['tanggal_PO']);
			}
			if(isset($_GET['material_masuk_input_oleh']) && $_GET['material_masuk_input_oleh'] !=''){
				$this->db->where('material_masuk_input_oleh',$_GET['material_masuk_input_oleh']);
			}
			if(isset($_GET['nama_gudang']) && $_GET['nama_gudang'] !=''){
				$this->db->where('nama_gudang',$_GET['nama_gudang']);
			}
			if(isset($_GET['penerima']) && $_GET['penerima'] !=''){
				$this->db->where('penerima',$_GET['penerima']);
			}
			
		}
		
		$this->db->order_by('tanggal_faktur','desc');
		$this->db->join('supplier','material_masuk.id_supplier=supplier.id_supplier');
		$this->db->join('material','material_masuk.id_material=material.id_material');
		$this->db->join('gudang','material_masuk.id_gudang=gudang.id_gudang');
		$data['datax'] = $this->logistik->view_all('material_masuk');
		//end T1
		
		//start T2
		if(isset($_GET['t2'])){
			if(isset($_GET['tanggal_MRFC']) && $_GET['tanggal_MRFC'] !=''){
				$this->db->where('tanggal_MRFC',$_GET['tanggal_MRFC']);
			}
			if(isset($_GET['no_MRFC']) && $_GET['no_MRFC'] !=''){
				$this->db->where('no_MRFC',$_GET['no_MRFC']);
			}
			if(isset($_GET['kode_material']) && $_GET['kode_material'] !=''){
				$this->db->where('kode_material',$_GET['kode_material']);
			}
			if(isset($_GET['nama_material']) && $_GET['nama_material'] !=''){
				$this->db->where('nama_material',$_GET['nama_material']);
			}
			if(isset($_GET['nama_mitra']) && $_GET['nama_mitra'] !=''){
				$this->db->where('nama_mitra',$_GET['nama_mitra']);
			}
			if(isset($_GET['nama_gudang']) && $_GET['nama_gudang'] !=''){
				$this->db->where('nama_gudang',$_GET['nama_gudang']);
			}
			if(isset($_GET['tanggal_input_pengeluaran']) && $_GET['tanggal_input_pengeluaran'] !=''){
				$this->db->where('tanggal_input_pengeluaran',$_GET['tanggal_input_pengeluaran']);
			}
			if(isset($_GET['pengeluaran_input_oleh']) && $_GET['pengeluaran_input_oleh'] !=''){
				$this->db->where('pengeluaran_input_oleh',$_GET['pengeluaran_input_oleh']);
			}
			if(isset($_GET['pemberi']) && $_GET['pemberi'] !=''){
				$this->db->where('pemberi',$_GET['pemberi']);
			}
			if(isset($_GET['nama_project']) && $_GET['nama_project'] !=''){
				$this->db->where('nama_project',$_GET['nama_project']);
			}
			if(isset($_GET['kode_project']) && $_GET['kode_project'] !=''){
				$this->db->where('kode_project',$_GET['kode_project']);
			}
			
		}
		$this->db->order_by('tanggal_MRFC','desc');
		$this->db->join('stok_material','stok_material.id_stok_material = material_keluar.id_stok_material');
		$this->db->join('material','stok_material.id_material=material.id_material');
		$this->db->join('gudang','stok_material.id_gudang=gudang.id_gudang');
		$this->db->join('pengeluaran','material_keluar.id_pengeluaran=pengeluaran.id_pengeluaran');
		$this->db->join('permintaan','permintaan.id_permintaan=pengeluaran.id_permintaan');
		$this->db->join('project_mitra','permintaan.id_project_mitra=project_mitra.id_project_mitra');
		$this->db->join('project','project_mitra.id_project=project.id_project');
		$this->db->join('mitra','project_mitra.mitra=mitra.username');
		$data['datay'] = $this->logistik->view_all('material_keluar');
		//end T2
		
		//start T3
		if(isset($_GET['t3'])){
			if(isset($_GET['tanggal_surat_jalan']) && $_GET['tanggal_surat_jalan'] !=''){
				$this->db->where('tanggal_surat_jalan',$_GET['tanggal_surat_jalan']);
			}
			if(isset($_GET['no_surat_jalan']) && $_GET['no_surat_jalan'] !=''){
				$this->db->where('no_surat_jalan',$_GET['no_surat_jalan']);
			}
			if(isset($_GET['kode_material']) && $_GET['kode_material'] !=''){
				$this->db->where('kode_material',$_GET['kode_material']);
			}
			if(isset($_GET['nama_material']) && $_GET['nama_material'] !=''){
				$this->db->where('nama_material',$_GET['nama_material']);
			}
			if(isset($_GET['gudang_tujuan']) && $_GET['gudang_tujuan'] !=''){
				$this->db->where('gudang_tujuan',$_GET['gudang_tujuan']);
			}
			
		}
		
		$this->db->order_by('tanggal_surat_jalan','desc');
		$this->db->join('pindah_gudang','pindah_gudang.id_pindah_gudang = detail_pindah_gudang.id_pindah_gudang');
		$this->db->join('stok_material','stok_material.id_stok_material = detail_pindah_gudang.id_stok_material');
		$this->db->join('material','stok_material.id_material=material.id_material');
		$this->db->join('gudang','stok_material.id_gudang=gudang.id_gudang');
		$data['dataz'] = $this->logistik->view_all('detail_pindah_gudang');
		//end T3
		
		$this->load->view('manage/main-page',$data);
	}
	
	
	
	// tutorial di bawah
	
	function charts()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['manage_page'] = 'charts';
		$this->load->view('manage/main-page',$data);
	}
	function tables()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['manage_page'] = 'tables';
		$this->load->view('manage/main-page',$data);
	}
	function forms()
	{
		$data['notif2']=$this->logistik->notif('permintaan', "tanggal_baca_pegawai is null or tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['notif1']=$this->logistik->notif('project', "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif3']=$this->logistik->notif('detail_permintaan', "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['manage_page'] = 'forms';
		$this->load->view('manage/main-page',$data);
	}
	function typography()
	{
		$data['notif2']=$this->logistik->notif('permintaan', "tanggal_baca_pegawai is null or tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['notif1']=$this->logistik->notif('project', "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif3']=$this->logistik->notif('detail_permintaan', "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['manage_page'] = 'typography';
		$this->load->view('manage/main-page',$data);
	}
	function bootstrap_elements()
	{
		$data['notif1']=$this->logistik->notif("project", "join project_mitra using(id_project)", "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif2']=$this->logistik->notif('permintaan',"join project_mitra using(id_project_mitra) join project using(id_project)", "tanggal_baca_pegawai_permintaan is null or tanggal_baca_pegawai_permintaan ='0000-00-00 00:00:00'");
		$data['notif3']=$this->logistik->notif('detail_permintaan',"", "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['manage_page'] = 'bootstrap-elements';
		$this->load->view('manage/main-page',$data);
	}
	function bootstrap_grid()
	{
		$data['notif2']=$this->logistik->notif('permintaan', "tanggal_baca_pegawai is null or tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['notif1']=$this->logistik->notif('project', "tanggal_baca_pegawai is null and status != 'Belum Dieksekusi' or tanggal_baca_pegawai ='0000-00-00 00:00:00' and status != 'Belum Dieksekusi'");
		$data['notif3']=$this->logistik->notif('detail_permintaan', "detail_permintaan_tanggal_baca_pegawai is null or detail_permintaan_tanggal_baca_pegawai ='0000-00-00 00:00:00'");
		$data['pesan']=$this->logistik->notif('percakapan',"", "tanggaLbaca_percakapan='0000-00-00 00:00:00' and kepada='".$this->whois()."'");
		$data['manage_page'] = 'bootstrap-grid';
		$this->load->view('manage/main-page',$data);
	}
	function blank_page()
	{
		$data['manage_page'] = 'blank-page';
		$this->load->view('manage/main-page',$data);
	}
	function view()
	{
		$this->load->view('manage/tables');
	}
	
}

