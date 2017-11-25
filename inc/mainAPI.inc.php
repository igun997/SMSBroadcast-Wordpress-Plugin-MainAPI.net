<?php

if (!defined('MAINAPIPATH')) {
    exit('No direct script access allowed');
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
add_action('admin_menu', 'add_mainmenu');
add_action('admin_menu', 'add_sms');

function add_mainmenu() {
    add_menu_page(
            'mainAPI Settings', // Judul dari halaman
            'mainAPI', // Tulisan yang ditampilkan pada menu
            'manage_options', // Persyaratan untuk dapat melihat link
            'mainapi', // slug dari file untuk menampilkan halaman ketika menu link diklik.
            'initPages'
    );
}

function add_sms() {
    add_menu_page(
            'Send SMS', // Judul dari halaman
            'SMS Notification', // Tulisan yang ditampilkan pada menu
            'manage_options', // Persyaratan untuk dapat melihat link
            'sms', // slug dari file untuk menampilkan halaman ketika menu link diklik.
            'sendSMS'
    );
}

function initPages() {
    $objClass = new mainAPIPageClass();
    $error = "";
    $success = "";
    if (isset($_POST["saveConfig"])) {
        $objMainAPI = new mainAPIClass($_POST['clientID'], $_POST['SecretID']);
        if ($objMainAPI->checkToken()) {
            $error = "Your Client ID or Secret ID Wrong";
        } else {
            update_option('mainAPI_clientID', $_POST['clientID']);
            update_option('mainAPI_secretID', $_POST['SecretID']);
            update_option('mainAPI_messageTemplate', $_POST['message']);
            $success = "Your Settings Success Saved";
        }
    }
    $clientID = get_option('mainAPI_clientID');
    $secretID = get_option('mainAPI_secretID');
    $msg = get_option('mainAPI_messageTemplate');
    $data = array("client_id" => $clientID, "secret_id" => $secretID, "message" => $msg);
    $objClass->view("settings", array("data" => $data, "response" => (!empty($error)) ? $error : $success));
}

function sendSMS() {
    $args = array(
        'post_status'=>'publish',
        'post_type' => 'post'
    );
    $error = "";
    $success = "";
    if (isset($_POST["broadcast"])) {
        if($_POST["reciever"] != "" && is_numeric($_POST["article"]))
        {
            $clientID = get_option('mainAPI_clientID');
            $secretID = get_option('mainAPI_secretID');
            $singePost = get_post($_POST["article"]);
            $send = new mainAPIClass($clientID, $secretID);
            $get_template = get_option('mainAPI_messageTemplate');
            $get_template = str_replace("{link}", $singePost->guid, $get_template);
            $get_template = str_replace("{enter}", "\n", $get_template);
            $send = $send->SMSNotif($_POST["reciever"], $get_template,false);
            if($send->code == 1)
            {
                $success = "SMS Broadcast Success";
            }else{
                $error = "SMS Broadcast Failed";
            }
        }else{
            $error = "Numbers Not Empty";
        }
    }
    $post = get_posts($args);
    $objClass = new mainAPIPageClass();
    $objClass->view("sms", array("data" => $post, "response" => (!empty($error)) ? $error : $success));
}
