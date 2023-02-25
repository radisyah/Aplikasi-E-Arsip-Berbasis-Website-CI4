<?php namespace App\Controllers;
use App\Models\ModelDepartemen;

class Departemen extends BaseController
{

  public function __construct()
  {
    helper('form');
    $this->ModelDepartemen = new ModelDepartemen();
	}
  
	public function index()
	{
		$data = array(
			'title' => 'Departemen',
      'departemen' => $this->ModelDepartemen->all_data(),
			'isi' => 'v_departemen'
		);
		return view('layout/v_wrapper', $data);
	}

  public function add(){
    $data = array(
      'nama_dep' => $this->request->getPost('nama_dep')
    );
    $this->ModelDepartemen->add($data);
    session()->setFlashdata('pesanSukses','Data Berhasil Ditambahkan');
    return redirect()->to(base_url('departemen'));
  }

  public function update($id_dep){
    $data = array(
      'id_dep' => $id_dep,
      'nama_dep' => $this->request->getPost('nama_dep'),
    );
    $this->ModelDepartemen->update_data($data);
    session()->setFlashdata('pesanSukses','Data Berhasil Diubah');
    return redirect()->to(base_url('departemen'));
  }

  public function delete($id_dep){
    $data = array(
      'id_dep' => $id_dep,
    );
    $this->ModelDepartemen->delete_data($data);
    session()->setFlashdata('pesanSukses','Data Berhasil Dihapus');
    return redirect()->to(base_url('departemen'));
  }

	

	//--------------------------------------------------------------------

}
