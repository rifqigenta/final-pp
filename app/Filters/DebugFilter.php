<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class DebugFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the current route's URI
        $uri = $request->uri->getSegment(3);

        // Define the URL where you want to disable the Debug Toolbar
        $disabledUrl = 'detail-transaksi';

        // Check if the current URI matches the disabled URL
        if ($uri === $disabledUrl) {
            // Disable the Debug Toolbar
            $env = new \CodeIgniter\HTTP\URI(base_url());
            $env->setScheme('production');

            define('CI_ENVIRONMENT', 'production');
            // define('ENVIRONMENT', 'production');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed here
    }
}
