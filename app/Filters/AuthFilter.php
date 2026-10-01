<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (
            session()->get('isLoggedIn') !== true
            || session()->get('user_id') === null
        ) {
            session()->setFlashdata(
                'error',
                'Please log in to view the tasks page.'
            );

            return redirect()->to(site_url('login'));
        }
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // Nothing to do after the controller responds.
    }
}