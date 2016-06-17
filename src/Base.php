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

    protected function _sendHit($url) {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url);
        } catch (ClientException $e) {
            return FALSE;
        }
        if ($res->getStatusCode() == 200) {
            return new \SimpleXMLElement($res->getBody());
        } else {
            return FALSE;
        }
    }

}
