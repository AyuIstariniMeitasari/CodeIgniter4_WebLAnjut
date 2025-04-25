<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function processRegister()
    {
        try {
            $userModel = new \App\Models\UserModel();
            $userModel->save([
                'name'     => $this->request->getPost('name'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);
    
            return redirect()->to('/login')->with('success', 'Pendaftaran berhasil!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }    

    public function processLogin()
    {
        $userModel = new UserModel();
        $user = $userModel->where('email', $this->request->getPost('email'))->first();
    
        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            session()->set('user_name', $user['name']);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Login gagal!');
        }
    }    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
