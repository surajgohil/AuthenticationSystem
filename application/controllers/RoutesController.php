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
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
	public function page1(){
		$this->load->view('header');
		$this->load->view('page1');
		$this->load->view('footer');
	}
	public function redirectToPage1(){

		$this->load->helper('custome_helper');

		if(validateToken()){
			echo json_encode([
				"status" => true,
				"data" => [
					"redirect" => 'page1'
				]
			]);
		}else{
			echo json_encode([
				"status" => true,
				"message" => "Not invalid or expired token."
			]);
		}
	}
	public function page2(){
		$this->load->view('header');
		$this->load->view('page2');
		$this->load->view('footer');
	}
}
