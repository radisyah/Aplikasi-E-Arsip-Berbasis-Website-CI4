<?php namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelDepartemen;

class User extends BaseController
{

  public function __construct()
  {
    helper('form');
    $this->ModelUser = new ModelUser();
    $this->ModelDepartemen = new ModelDepartemen();
	}

	public function index()
	{
		$data = array(
			'title' => 'User',
      'user' => $this->ModelUser->all_data(),
			'isi' => 'user/v_index'
		);
		return view('layout/v_wrapper', $data);
	}

  public function add()
  {
    $data = array(
			'title' => 'Add User',
      'dep' => $this->ModelDepartemen->all_data(),
			'isi' => 'user/v_add',
			'errors' => \Config\Services::validation()
		);
		return view('layout/v_wrapper', $data);
  }

	public function save_insert()
  {
    if (!$this->validate([
      'username'=>[
        'label' => 'Nama User',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
        'email'=>[
        'label' => 'E-Mail',
        'rules' => 'required|is_unique[tbl_user.email]',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada, Input {field} lain'
          ]
        ],
        'password'=>[
        'label' => 'Password',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
        'repassword'=>[
        'label' => 'Re-Password',
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'matches' => '{field} Tidak Sama'
          ]
				],
				'level'=>[
				'label' => 'Level',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong'
					]
				],
				'id_dep'=>[
				'label' => 'Departemen',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong'
					]
				],
    ])) {
			$errors = \Config\Services::validation();
      return redirect()->to(base_url('user/add'))->withInput()->with('errors', $errors);
		}else{
			$data = array(
        'username' => $this->request->getPost('username'),
        'email' => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        'level' => $this->request->getPost('level'),
        'id_dep' => $this->request->getPost('id_dep'),
      );
      $this->ModelUser->add($data);
      session()->setFlashdata('pesanSukses', 'Data Berhasil Ditambahkan');
      return redirect()->to(base_url('user/index')); 
		}
  }

	public function edit($id_user)
  {
    $data = array(
			'title' => 'Edit User',
      'dep' => $this->ModelDepartemen->all_data(),
			'user' => $this->ModelUser->detail_data($id_user),
			'isi' => 'user/v_edit',
			'errors' => \Config\Services::validation()
		);
		return view('layout/v_wrapper', $data);
  }

	public function save_edit($id_user)
  {
    if (!$this->validate([
      'username'=>[
        'label' => 'Nama User',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
				'level'=>[
				'label' => 'Levels',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong'
					]
				],
				
				'id_dep'=>[
				'label' => 'Departemen',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong'
					]
				],
    ])) {
			$errors = \Config\Services::validation();
      return redirect()->to(base_url('user/edit/'.$id_user))->withInput()->with('errors', $errors);
		}else{
			$data = array(
				'id_user' => $id_user,
        'username' => $this->request->getPost('username'),
        'level' => $this->request->getPost('level'),
        'id_dep' => $this->request->getPost('id_dep'),
      );
      $this->ModelUser->update_data($data);
      session()->setFlashdata('pesanSukses', 'Data Berhasil Diupdate');
      return redirect()->to(base_url('user/index/'.$id_user)); 
		}
  }

	public function delete($id_user){
    $data = array(
      'id_user' => $id_user,
    );
    $this->ModelUser->delete_data($data);
    session()->setFlashdata('pesanSukses','Data Berhasil Dihapus');
    return redirect()->to(base_url('user/index/'.$id_user));
  }

	

	//--------------------------------------------------------------------

}
