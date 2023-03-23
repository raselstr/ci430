<?php 

namespace App\Controllers;

use App\Models\PenggunaModel;

class Login extends BaseController
{
    public function index()
    {
        return view('vw_login');
    }

    public function process()
    {
        $users = new PenggunaModel();
        $usernama = $this->request->getVar('usernama');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'usernama' => $usernama,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'usernama' => $dataUser->usernama,
                    'name' => $dataUser->name,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('pages/home'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }
}

?>