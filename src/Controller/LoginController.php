<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use phpCAS;

class LoginController extends AbstractController
{
    public function index(Request $request)
    {
        $res = $this->loginCAS( $request );

        $response = new Response(
            json_encode($res),
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );

        return $response;
    }

    // login para el sistema CAS
    public function loginCAS( Request $request ){

        $ticket = ( $request->get('ticket') ? $request->get('ticket') : false );

        $cas_server_ca_cert_path = '';
        $ctx = '/cas';
        $ctx_service = '/cas/serviceValidate';

        $cas_host = 'precas.camaras.es';
        $cas_port = 443;

        phpCAS::setDebug();
        //phpCAS::setVerbose( true ); [no funciona em prod por version phpCAS]

        // Initialize phpCAS
        phpCAS::client( CAS_VERSION_2_0, $cas_host, $cas_port, $ctx );
        phpCAS::setNoCasServerValidation();
        //phpCAS::setCasServerCACert( $cas_server_ca_cert_path, false);

        // en este punto redirige hacia el servidor de autenticación CAS
        // si es que no estamos autenticados
        phpCAS::forceAuthentication();

        if ($request->get('logout')) {

            phpCAS::logout();
        }

        return phpCAS::getUser();
    }
}