<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrdersByEmailController extends AbstractController
{
    public function index($id, $email)
    {
        $aOrder = array();

        if ($id%3==0 and $email=="mquilabert@centribal.com") {
            $aOrder = array(
                "id" => $id,
                "name" => "Camiseta",
                "date" => "17/11/2020",
                "price" => "39,95",
                "link" => "https://platform.centribal.com",
                "status" => "0",
                "return_status" => "0",
                "transport_link" => "https://platform.centribal.com",
                "currency" => "0",
                "user_name" => "Miriam Quilabert",
                "user_email" => "mquilabert@centribal.com",
                "user_phone" => "+34677987793",
            );

            $status = Response::HTTP_OK;
        }
        else if ($id%3==1 and $email=="abeitia@centribal.com") {
            $aOrder = array(
                "id" => $id,
                "name" => "Sombrero",
                "date" => "16/11/2020",
                "price" => "69,95",
                "link" => "https://platform.centribal.com",
                "status" => "1",
                "return_status" => "0",
                "transport_link" => "https://platform.centribal.com",
                "currency" => "1",
                "user_name" => "Andrea Beitia",
                "user_email" => "abeitia@centribal.com",
                "user_phone" => "+34646128074",
            );

            $status = Response::HTTP_OK;
        }
        else if ($id%3==2 and $email=="ciriarte@centribal.com") {
            $aOrder = array(
                "id" => $id,
                "name" => "Jersey",
                "date" => "14/11/2020",
                "price" => "89,95",
                "link" => "https://platform.centribal.com",
                "status" => "2",
                "return_status" => "1",
                "transport_link" => "https://platform.centribal.com",
                "currency" => "0",
                "user_name" => "Juanma Cordoba",
                "user_email" => "jmcordoba@centribal.com",
                "user_phone" => "+34608370934",
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