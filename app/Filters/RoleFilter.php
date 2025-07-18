<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $roleId  = $session->get('role_id');
        if (!$session->get('logged_in') || empty($arguments)) {
            return Services::response()->setStatusCode(403, 'Forbidden');
        }

        if (!in_array($roleId, $arguments, true)) {
            return Services::response()->setStatusCode(403, 'Forbidden');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
