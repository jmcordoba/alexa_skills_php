<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AlexaController extends AbstractController
{
    public function index()
    {
        $body = json_decode(file_get_contents('php://input'));

        //$this->log($body);

        $version = $body->version;
        $session = $body->session;
        $context = $body->context;
        $request = $body->request;

        $this->log("Version", $version);
        $this->log("Session", $session);
        $this->log("Context", $context);
        $this->log("Request", $request);

        if ($request->type == "LaunchRequest") {

            $response_text = "Bienvenido a escola del mar";

            $shouldEndSession = false;
        }
        else if ($request->type == "IntentRequest") {

            $intent_name = $request->intent->name;

            if ($intent_name == "menu") {

                if (isset($request->intent->slots->dia->value)) {

                    $dia = $request->intent->slots->dia->value;

                    switch ($dia) {

                        case "lunes":
                            $response_text = "El $dia hay col con patata hervida, lomo de caña a la plancha, fruta del tiempo y para acabar un poquito de pan.";
                            break;
                        case "martes":
                            $response_text = "El $dia hay tallarines con salsa de hortalizas, dorada al horno, tomate aliñado y yogurt.";
                            break;
                        case "miercoles":
                            $response_text = "El $dia hay crema de verduras, garbanzos cocidos con verduras, fruta del tiempo y para acabar un poquito de pan.";
                            break;
                        case "jueves":
                            $response_text = "El $dia hay sopa de ave con arroz, pollo rebozado, fruta del tiempo y para acabar un poquito de pan.";
                            break;
                        case "viernes":
                            $response_text = "El $dia hay crema de calabacín de primero, lentejas estofadas con arroz de segundo, yogurt de postre y para acabar un poquito de pan.";
                            break;
                        default:
                            $response_text = "Los fines de semana no hay menú en la Escola del Mar";
                            break;
                    }

                } else {

                    $response_text = "No he entendido el día del que quieres saber el menú.";
                }

                $response_text .= " ¿Te puedo ayudar con el menú de algún otro día?";

                $shouldEndSession = false;

            } else if ($intent_name == "actividades") {

                $response_text = "los lunes hay psicomotricitat, los martes hay música, los miércoles hay ética, los jueves hay racons y los viernes hay psicomotricidad.";

                $shouldEndSession = false;

            } else {

                $response_text = "El nombre del intent es ".$intent_name;

                $shouldEndSession = true;
            }
        }
        else {

            $response_text = "No sé qué decir.";

            $shouldEndSession = false;
        }

        $res = [
            "version" => "1.0",
            "response" => [
                "outputSpeech" => [
                    "type" => "PlainText",
                    "text" => $response_text,
                    "playBehavior" => "REPLACE_ENQUEUED"
                ],
                "shouldEndSession" => $shouldEndSession
            ]
        ];

        $response = new Response(
            json_encode($res),
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );

        return $response;
    }

    public function log($type, $text)
    {
      $fichero = '/var/www/html/centribotextensionspre.centribal.com/alexa.log';
      $content = "\n$type: ".json_encode($text)."\n";
      file_put_contents($fichero, $content, FILE_APPEND | LOCK_EX);
    }
}
