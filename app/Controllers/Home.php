<?php namespace App\Controllers;
use App\Models\ModelHome;

class Home extends BaseController
{

	public function __construct()
  {
    $this->ModelHome = new ModelHome();
	}

	public function index()
	{
		$data = array(
			'title' => 'Home',
			'jumlahArsip' => $this->ModelHome->jumlahArsip(),
			'jumlahDepartemen' => $this->ModelHome->jumlahDepartemen(),
			'jumlahUser' => $this->ModelHome->jumlahUser(),
			'jumlahKategori' => $this->ModelHome->jumlahKategori(),
			'isi' => 'v_home'
			
		);
		return view('layout/v_wrapper', $data);
	}

	

	//--------------------------------------------------------------------

}
