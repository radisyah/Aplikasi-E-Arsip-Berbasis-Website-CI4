<?php namespace App\Controllers;
use App\Models\ModelKategori;

class Kategori extends BaseController
{

  public function __construct()
  {
    helper('form');
    $this->ModelKategori = new ModelKategori();
	}
  
	public function index()
	{
		$data = array(
			'title' => 'Kategori',
      'kategori' => $this->ModelKategori->all_data(),
			'isi' => 'v_kategori'
		);
		return view('layout/v_wrapper', $data);
	}

  public function add(){
    $data = array(
      'nama_kategori' => $this->request->getPost('nama_kategori')
    );
    $this->ModelKategori->add($data);
    session()->setFlashdata('pesanSukses','Data Berhasil Ditambahkan');
    return redirect()->to(base_url('kategori'));
  }

  public function update($id_kategori){
    $data = array(
      'id_kategori' => $id_kategori,
      'nama_kategori' => $this->request->getPost('nama_kategori'),
    );
    $this->ModelKategori->update_data($data);
    session()->setFlashdata('pesanSukses','Data Berhasil Diubah');
    return redirect()->to(base_url('kategori'));
  }

  public function delete($id_kategori){
    $data = array(
      'id_kategori' => $id_kategori,
    );
    $this->ModelKategori->delete_data($data);
    session()->setFlashdata('pesanSukses','Data Berhasil Dihapus');
    return redirect()->to(base_url('kategori'));
  }

	

	//--------------------------------------------------------------------

}
