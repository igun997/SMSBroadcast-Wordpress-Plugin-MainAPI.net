<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class for MainAPI 
 *
 * @author Indra Guananda <indra.gunanda@gmail.com>
 */
require_once plugin_dir_path(__FILE__) . 'Mainapi.php';

class mainAPIClass extends Mainapi {

    /**
     * 
     * @param type $client_id
     * @param type $secret_id
     * @return void
     */
    function __construct($client_id, $secret_id) {
        $this->setClient_id($client_id);
        $this->setSecret_id($secret_id);
    }

    /**
     * 
     * @return boolean
     */
    function checkToken() {
        $this->getAccessToken();
        return $this->checkAT() == null;
    }

    /**
     * 
     * @param type $msdn
     * @param type $content
     * @param type $editor
     * @return array
     */
    function SMSNotif($msdn = "", $content = "", $editor = "") {
        return $this->SendSMS($msdn, $content, $editor);
    }

    /**
     * 
     * @param type $key
     * @param type $msdn
     * @param type $type
     * @param type $otpstr
     * @return array
     */
    function SMSOTP($key, $msdn, $type = "send", $otpstr = "") {
        return $this->otp($key, $msdn, $type, $otpstr);
    }

}
