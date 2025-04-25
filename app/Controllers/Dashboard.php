<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Cek apakah sudah login
        if (!session()->get('user_name')) {
            return redirect()->to('/login');
        }

        $data['user_name'] = session()->get('user_name'); // Ambil nama user dari session
        $data['tasks'] = [
            ['title' => 'Belajar CI4', 'status' => 'Selesai'],
            ['title' => 'Bikin laporan', 'status' => 'Belum'],
            ['title' => 'Ngoding ToDoList', 'status' => 'Selesai']
        ];
        return view('dashboard_view', $data);
    }
}
