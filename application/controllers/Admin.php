<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$this->load->view('layout/header');
		//$this->load->view('admin/login');
		$this->load->view('layout/footer');
	}

	public function home()
	{
		$this->load->view('layout/header');
		$this->load->view('home');
		$this->load->view('layout/footer');
	}

	public function galery()
	{
		$this->load->view('layout/header');
		$this->load->view('galery');
		$this->load->view('layout/footer');
	}
}
