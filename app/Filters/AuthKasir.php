<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthKasir implements FilterInterface{
	public function before(RequestInterface $request, $arguments = null){
		// jika user belum login
		if(session()->get('level') !="1"){
			// maka redirct ke halaman login
			return redirect()->to('/login'); 
		}
	}

	//--------------------------------------------------------------------

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
		// Do something here
	}
}