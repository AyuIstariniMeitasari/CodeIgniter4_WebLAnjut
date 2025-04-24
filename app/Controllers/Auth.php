<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Auth extends BaseController
{
    use ResponseTrait;

    // Tampilkan halaman login
    public function index()
    {
        return view('auth/login');
    }

    // Tampilkan halaman register
    public function register()
    {
        return view('auth/register');
    }

    // Proses registrasi
    public function save()
    {
        $validation = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]'
        ]);

        if(!$validation) {
            return view('auth/register', [
                'validation' => $this->validator
            ]);
        }

        $userModel = new UserModel();
        $userModel->save([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password')
        ]);

        return redirect()->to('/auth/login')->with('success', 'Registrasi berhasil!');
    }

    // Proses login
    public function check()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if($user && password_verify($password, $user['password'])) {
            session()->set([
                'isLoggedIn' => true,
                'userData' => [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                ]
            ]);
            return redirect()->to('/dashboard');
        }

        return redirect()->back()->withInput()->with('error', 'Email/Password salah!');
    }

    public function doLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'email' => $user['email'],
                'logged_in' => true
                ]
            );
            return redirect()->to('/dashboard');
        } 
        else {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    // Proses logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}