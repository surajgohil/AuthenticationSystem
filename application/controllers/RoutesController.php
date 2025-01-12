<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoutesController extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }
	public function index(){
		$this->load->view('register');
	}
	public function login(){
		$this->load->view('login');
	}
	public function register(){
		$this->load->view('register');
	}
	public function home(){
		if($this->session->userdata('id')){
			$this->load->view('header');
			$this->load->view('home');
			$this->load->view('footer');
		}else{
			$this->load->view('login');
		}
	}
	public function page1(){
		if($this->session->userdata('id')){
			$this->load->view('header');
			$this->load->view('page1');
			$this->load->view('footer');
		}else{
			$this->load->view('login');
		}
	}
	public function checkToken(){

		$this->load->helper('custome_helper');

		if(validateToken()){
			echo json_encode([
				"status" => true,
				"message" => "Token is valid."
			]);
		}else{
			echo json_encode([
				"status" => false,
				"message" => "Not invalid or expired token."
			]);
		}
	}
	public function page2(){
		if($this->session->userdata('id')){
			$this->load->view('header');
			$this->load->view('page2');
			$this->load->view('footer');
		}else{
			$this->load->view('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('login');
	}
}
