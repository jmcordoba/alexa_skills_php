<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusController extends AbstractController
{
    public function index()
    {
	    $status = ["status" => strval(rand(0,1))];

        $response = new Response(
            json_encode($status),
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );

        return $response;
    }
}
