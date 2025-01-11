<?php
require_once FCPATH . 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function validateToken() {

    $CI =& get_instance();

    $headers = $CI->input->request_headers();
    $token = isset($headers['Authorization']) ? $headers['Authorization'] : null;

    if (!$token) {
        return null;
    }

    try {
        $decoded = JWT::decode($token, new Key('decodeKey001', 'HS256'));
        return $decoded;
    } catch (Exception $e) {
        return null;
    }
}

?>