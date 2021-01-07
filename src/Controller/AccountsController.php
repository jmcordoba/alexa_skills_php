<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountsController extends AbstractController
{
    public function index($email, $pass)
    {
        $aOrder = array();

        if ($email=="mquilabert@centribal.com" and $pass="Centribal123") {

            $aOrder = array(
                "id" => 1,
                "email" => "mquilabert@centribal.com",
                "pass" => "Centribal123",
                "name" => "Miriam",
                "surname" => "Quilabert",
                "age" => "26",
                "expiration" => "31/12/2020",
            );

            $status = Response::HTTP_OK;
        }
        else if ($email=="abeitia@centribal.com" and $pass="Centribal123") {

            $aOrder = array(
                "id" => 2,
                "email" => "abeitia@centribal.com",
                "pass" => "Centribal123",
                "name" => "Andrea",
                "surname" => "Beitia",
                "age" => "26",
                "expiration" => "31/12/2020",
            );

            $status = Response::HTTP_OK;
        }
        else if ($email=="ciriarte@centribal.com" and $pass="Centribal123") {

            $aOrder = array(
                "id" => 3,
                "email" => "ciriarte@centribal.com",
                "pass" => "Centribal123",
                "name" => "Conrad",
                "surname" => "Iriarte",
                "age" => "26",
                "expiration" => "31/12/2020",
            );

            $status = Response::HTTP_OK;
        }
        else {

            $status = Response::HTTP_BAD_REQUEST;
        }

        $order = json_encode($aOrder);

        $response = new Response(
            $order,
            $status,
            ['content-type' => 'application/json']
        );

        return $response;
    }
}