<?php

namespace Knightcott\Librelink;

use Illuminate\Support\Facades\Http;

class Librelink {

    private $serviceURL = null;
    private $token = null;

    public function __construct()
    {

        $url = config('librenms.server');
        if (substr($url,-1) != '/') {
            $url = $url.'/';
        }

        $this->serviceURL = $url."api/v0/";   // must end with a forward-slash
        $this->token = config('librenms.token');
    }

    public function list_Devices() {
        
        return $this->sendGetRequest('devices');

    }

    public function get_Device($target) {
        
        return $this->sendGetRequest('devices/'.$target);

    }

    public function edit_Device($target, $fields) {
        
        return $this->sendPatchRequest('devices/'.$target, $fields);

    }

    public function add_Device($device) {
        
        return $this->sendPostRequest('devices/', $device);

    }

    public function del_Device($target) {
        
        return $this->sendDeleteRequest('devices/'. $target);

    }

    private function sendGetRequest($url_path) {
        
        $response = Http::withHeaders([
            'X-Auth-Token' => $this->token
        ])->get($this->serviceURL.$url_path);

        if ($response->successful()){
            return json_decode($response->body());
        } else {
            $response->throw();
        }

    }

    private function sendPostRequest($url_path,$fields) {
        
        $response = Http::withHeaders([
            'X-Auth-Token' => $this->token
        ])->post($this->serviceURL.$url_path,$fields);

        if ($response->successful()){
            return json_decode($response->body());
        } else {
            $response->throw();
        }

    }

    private function sendPatchRequest($url_path,$fields) {
        
        $response = Http::withHeaders([
            'X-Auth-Token' => $this->token
        ])->patch($this->serviceURL.$url_path,$field);

        if ($response->successful()){
            return json_decode($response->body());
        } else {
            $response->throw();
        }

    }

    private function sendDeleteRequest($url_path) {
        
        $response = Http::withHeaders([
            'X-Auth-Token' => $this->token
        ])->delete($this->serviceURL.$url_path);

        if ($response->successful()){
            return json_decode($response->body());
        } else {
            $response->throw();
        }

    }

}