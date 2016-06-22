<?php

/**
 * Description of Base
 *
 * @author Anik
 */

namespace SportsDirect;

use GuzzleHttp\Exception\ClientException;

class Base {

    protected $base_url = "http://xml.sportsdirectinc.com/sport";
    protected $base_url_atom = "http://xml.sportsdirectinc.com/Atom?feed=";

    protected function _sendHit($url) {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url);
        } catch (ClientException $e) {
            return FALSE;
        }
        if ($res->getStatusCode() == 200) {
            return json_decode(json_encode(new \SimpleXMLElement($res->getBody())), 1);
        } else {
            return FALSE;
        }
    }

}
