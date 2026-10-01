<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn') === true) {
            return redirect()->to(site_url('tasks'));
        }

        return view('auth/login', [
            'error' => session()->getFlashdata('error'),
        ]);
    }

    public function attempt()
    {
        $username = trim(
            (string) $this->request->getPost('username')
        );

        $password = (string) $this->request->getPost('password');

        if (! $this->validateData(
            [
                'username' => $username,
                'password' => $password,
            ],
            [
                'username' => 'required|max_length[100]',
                'password' => 'required',
            ]
        )) {
            session()->setFlashdata(
                'error',
                'Enter both a username and password.'
            );

            return redirect()->to(site_url('login'));
        }

        $user = (new UserModel())
            ->where('username', $username)
            ->first();

        if (
            $user === null
            || ! password_verify($password, $user['password'])
        ) {
            session()->setFlashdata(
                'error',
                'Invalid username or password.'
            );

            return redirect()->to(site_url('login'));
        }

        $session = session();

        // Give the authenticated visitor a new session ID.
        $session->regenerate(true);

        // Store small identifying values, never the password.
        $session->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'username'   => $user['username'],
        ]);

        return redirect()->to(site_url('tasks'));
    }

    public function logout()
    {
        session()->destroy();

        // Do not perform another session operation after destroy().
        return redirect()->to(site_url('login'));
    }
}