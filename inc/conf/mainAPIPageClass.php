<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainAPIPageClass
 *
 * @author Indra Guananda <indra.gunanda@gmail.com>
 */
class mainAPIPageClass {
    /**
     * Function for Control the page Of Plugin
     * @param type $location Name Of File Without .php
     * @param type $param Passing Variable From Controller to View
     * @return void
     */
    function view($location,$param="") {
        try {
            
            include MAINAPIPATH . 'inc/pages/' . $location . '.php';
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
}
