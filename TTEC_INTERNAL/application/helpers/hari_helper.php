<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('ubah'))
{
	function ubah($tgl)
	{
		$x=explode('/',$tgl);
		$tgl_baru='';
		if(count($x)==3){
			$tgl_baru=$x[2].'-'.$x[1].'-'.$x[0];
		}
		return $tgl_baru;
	}
}
