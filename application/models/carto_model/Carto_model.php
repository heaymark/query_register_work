<?php
/**
 * Created by IntelliJ IDEA.
 * User: User
 * Date: 26/06/2018
 * Time: 02:51 AM
 */


class Carto_model extends CI_Model
{
    private $httpClient;

    public function __construct()
    {
        $this->load->library('guzzle');
        $this->httpClient =  new GuzzleHttp\Client();

    }

    private function prepareResponse($body)
    {
        $parsedResponse = \GuzzleHttp\json_decode((string)$body);
        $response = ['status' => 1, 'msg' => $parsedResponse];
        if (array_key_exists('error', $parsedResponse)) {
            $response = ['status' => 0, 'msg' => $parsedResponse];
        }
        return \GuzzleHttp\json_encode($response);
    }

    public function toSql($sql){
        $url = 'http://'.CARTODB_USER.'.carto.com/api/v2/sql';
        try {
            # guzzle post request example with form parameter
            $request = $this->httpClient->request( 'POST',
                $url,
                [ 'form_params'
                => [ 'q' => $sql,'api_key' => CARTODB_APIKEY]
                ]
            );
            #guzzle repose for future use
            //echo $response->getStatusCode(); // 200
            //echo $response->getReasonPhrase(); // OK
            //echo $response->getProtocolVersion(); // 1.1
            return $request->getBody()->getContents();
        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            #guzzle repose for future use
            $response = $e->getResponse();
            return $response->getBody()->getContents();

        }

    }

    public function toField($dataset){

    }

    public function toContains ($dataset,$geomJson){

    }

    public function toIntercepts($dataset,$geomJson){

    }

    public function toBoundBox($dataset,$xmin,$ymin,$xmax,$ymin){

    }
}
