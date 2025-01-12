<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends CI_Controller {

    private $key = "decodeKey001";

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(['form_validation']);
        $this->load->helper(['url', 'security']);
        $this->load->library('session');
    }

    public function register() {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['status' => false, 'errors' => validation_errors()]);
            return;
        }

        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
        ];

        $this->db->insert('users', $data);
        echo json_encode(['status' => true, 'message' => 'Registration successful!']);
    }

    public function login() {

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        if (empty($user) || !password_verify($password, $user['password'])) {
            echo json_encode(['status' => false, 'message' => 'Invalid email or password']);
            return;
        }

        $this->session->set_userdata($user);

        $payload = [
            'id' => $user['id'],
            'email' => $user['email'],
            'exp' => time() + (60 * 60) // Token expires in 1 hour
        ];
        $token = JWT::encode($payload, $this->key, 'HS256');

        echo json_encode(['status' => true, 'token' => $token]);
    }
}
