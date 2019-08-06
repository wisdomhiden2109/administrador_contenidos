<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('StructureModel', 'structure');
		$this->load->model('ContactsModel', 'contacts');
	}


	public function index()
	{
		$data = array(
			'configuration' => $this->configuration->getConfiguration(),
			'contents' => $this->structure->getContents(),
		);
		$this->load->view('layout/header',$data);
		//$this->load->view('admin/login');
		$this->load->view('layout/footer');
	}

	public function dashboard()
	{
		$data = array(
			'configuration' => $this->configuration->getConfiguration(),
			'contents' => $this->structure->getContents(),
		);
		$this->load->view('layout/header',$data);
		$this->load->view('dashboard');
		$this->load->view('layout/footer');
	}

	public function galery()
	{
		$data = array(
			'configuration' => $this->configuration->getConfiguration(),
			'contents' => $this->structure->getContents(),
		);
		$this->load->view('layout/header',$data);
		$this->load->view('galery');
		$this->load->view('layout/footer');
	}

	public function contact()
	{
		$data = array(
			'configuration' => $this->configuration->getConfiguration(),
			'contacts' => $this->contacts->getContacts()
		);
		$this->load->view('layout/header', $data);
		$this->load->view('contact/index');
		$this->load->view('layout/footer');
	}


	public function configuration()
	{
		$data = array(
			'user' => $this->configuration->getUser(),
			'configuration' => $this->configuration->getConfiguration()
		);
		$this->load->view('layout/header', $data);
		$this->load->view('configuration/index');
		$this->load->view('layout/footer');
	}

	
}
