<?php
namespace Multiple\Api\V1\Controllers;

use Library\V1\Data\Test;
use Phalcon\Mvc\Controller;

class TestController extends Controller
{
    public function onConstruct()
    {
		//$this->response->setContentType('application/json', 'utf-8');		
    }

    public function indexAction()
    {
        echo "api";
    }

	public function getAction()
    {
        //echo 'get';
        $tc = new Test($this->db);

        $datas = $tc->getTestList();
        
        print_r($datas);
        exit();


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