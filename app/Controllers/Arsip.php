<?php namespace App\Controllers;
use App\Models\ModelArsip;
use App\Models\ModelKategori;

class Arsip extends BaseController
{

  public function __construct()
  {
    helper('form');
    $this->ModelArsip = new ModelArsip();
    $this->ModelKategori = new ModelKategori();
	}

	public function index()
	{
		$data = array(
			'title' => 'Arsip',
      'arsip' => $this->ModelArsip->all_data(),
			'isi' => 'arsip/v_index'
			
		);
		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = array(
			'title' => 'Add Arsip',
			'kategori' => $this->ModelKategori->all_data(),
			'isi' => 'arsip/v_add',
			'errors' => \Config\Services::validation()
			
		);
		return view('layout/v_wrapper', $data);
	}

	public function save_insert()
  {
    if (!$this->validate([
      'nama_file'=>[
        'label' => 'Nama Arsip',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
        'id_kategori'=>[
          'label' => 'Kategori',
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Tidak Boleh Kosong'
            ]
          ],
        'deskripsi'=>[
        'label' => 'Deskripsi',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          ]
        ],
				'berkas' => [
          'rules' => 'uploaded[berkas]|ext_in[berkas,pdf]|max_size[berkas,10048]',
          'errors' => [
            'uploaded' => 'Harus Ada File yang diupload',
            'ext_in' => 'File Extention Harus Berupa PDF',
            'max_size' => 'Ukuran File Maksimal 10 MB'
          ]
        ]
    ])) {
			session()->setFlashdata('errors', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}else{
      $dataBerkas = $this->request->getFile('berkas');
      $fileName = $dataBerkas->getRandomName();
      $ukuranFile = $dataBerkas->getSize('mb');
			$data = array(
        'id_kategori' => $this->request->getPost('id_kategori'),
				'no_arsip' => $this->request->getPost('no_arsip'),
        'nama_file' => $this->request->getPost('nama_file'),
        'deskripsi' => $this->request->getPost('deskripsi'),
				'tgl_upload' => date('Y-m-d H:i:s'),
				'tgl_update' => date('Y-m-d H:i:s'),
        'id_user' => session()->get('id_user'),
        'id_dep' => session()->get('id_dep'),
        'berkas' => $fileName,
        'ukuranFile' => $ukuranFile,
      );
      $dataBerkas->move('uploads/berkas/', $fileName);
      $this->ModelArsip->add($data);
      session()->setFlashdata('pesanSukses', 'Data Berhasil Ditambahkan');
      return redirect()->to(base_url('arsip')); 
		}
  }

  public function edit($id_arsip)
	{
		$data = array(
			'title' => 'Edit Arsip',
			'kategori' => $this->ModelKategori->all_data(),
      'arsip' => $this->ModelArsip->detail_data($id_arsip),
			'isi' => 'arsip/v_edit',
			'errors' => \Config\Services::validation()
			
		);
		return view('layout/v_wrapper', $data);
	}

  public function save_edit($id_arsip)
  {
    if (!$this->validate([
      'nama_file'=>[
        'label' => 'Nama Arsip',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
        'id_kategori'=>[
          'label' => 'Kategori',
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Tidak Boleh Kosong'
            ]
          ],
        'deskripsi'=>[
        'label' => 'Deskripsi',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          ]
        ],
				'berkas' => [
          'rules' => 'ext_in[berkas,pdf]|max_size[berkas,10048]',
          'errors' => [
            'ext_in' => 'File Extention Harus Berupa PDF',
            'max_size' => 'Ukuran File Maksimal 10 MB'
          ]
        ]
    ])) {
			session()->setFlashdata('errors', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}else{
      $dataBerkas = $this->request->getFile('berkas');
      if ($dataBerkas->getError()==4) {
        $data = array(
          'id_arsip' => $id_arsip,
          'id_kategori' => $this->request->getPost('id_kategori'),
          'no_arsip' => $this->request->getPost('no_arsip'),
          'nama_file' => $this->request->getPost('nama_file'),
          'deskripsi' => $this->request->getPost('deskripsi'),
          'tgl_update' => date('Y-m-d'),
          'id_user' => session()->get('id_user'),
          'id_dep' => session()->get('id_dep'),
        );
        $this->ModelArsip->update_data($data);
      }else {
        $arsip = $this->ModelArsip->detail_data($id_arsip);
        $fileName_old = $arsip['berkas'];
        if (file_exists("uploads/berkas/".$fileName_old)) {
          unlink('uploads/berkas/'.$arsip['berkas']);
        }
        $fileName = $dataBerkas->getRandomName();
        $ukuranFile = $dataBerkas->getSize('mb');
        $data = array(
          'id_arsip' => $id_arsip,
          'id_kategori' => $this->request->getPost('id_kategori'),
          'no_arsip' => $this->request->getPost('no_arsip'),
          'nama_file' => $this->request->getPost('nama_file'),
          'deskripsi' => $this->request->getPost('deskripsi'),
          'tgl_update' => date('Y-m-d H:i:s'),
          'id_user' => session()->get('id_user'),
          'id_dep' => session()->get('id_dep'),
          'berkas' => $fileName,
          'ukuranFile' => $ukuranFile,
        );
        $dataBerkas->move('uploads/berkas/', $fileName);
        $this->ModelArsip->update_data($data);
      }    
      session()->setFlashdata('pesanSukses', 'Data Berhasil Diupdate');
      return redirect()->to(base_url('arsip')); 
		}
  }

  public function viewpdf($id_arsip){
    $data = array(
			'title' => 'View Arsip',
			'kategori' => $this->ModelKategori->all_data(),
      'arsip' => $this->ModelArsip->detail_data($id_arsip),
			'isi' => 'arsip/v_viewPDF',
			'errors' => \Config\Services::validation()
			
		);
		return view('layout/v_wrapper', $data);
  }

  public function delete($id_arsip){
    $arsip =  $this->ModelArsip->detail_data($id_arsip);
    $fileName = $arsip['berkas'];
    if (file_exists("uploads/berkas/".$fileName)) {
      unlink("uploads/berkas/".$fileName);
    }
    $data = array(
      'id_arsip' => $id_arsip,
    );
    $this->ModelArsip->delete_data($data);
    session()->setFlashdata('pesanSukses','Data Berhasil Dihapus');
    return redirect()->to(base_url('arsip/index/'.$id_arsip));
  }

	

	//--------------------------------------------------------------------

}
