<?php
namespace Multiple\Api\V1\Controllers;
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
		echo "api";
    }

	public function getAction()
    {
        echo 'get';
    }

	
	public function postAction()
    {
       echo 'post';
    }
	
	public function putAction()
    {
       echo 'put';
    }
	
	public function patchAction()
    {
       echo 'patch';
    }
	
	public function deleteAction()
    {
       echo 'delete';
    }

}