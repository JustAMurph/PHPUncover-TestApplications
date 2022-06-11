<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');

		$user = $this->User_model->getUserById($_COOKIE['user']);


		if ($_GET['userId']) {
			$user = $this->User_model->safeGetUserById($_GET['userId']);
		}

		$adminCommand = $_POST['admin-command'];
		if ($adminCommand) {
			AdminCommand::execute($adminCommand);
		}

		$allUsers = $this->User_model->getNewUsers($_GET['withUsers']);

		$this->loadView();
	}

	/**
	 * @finding
	 *
	 * @return void
	 */
	private function loadView()
	{
		$view = $_GET['view'];
		if ($view) {
			include($view);
		}

		$view2 = $this->input->get('view2');
		if ($view2) {
			$this->load->view($view2);
		}
	}

	private function no_route()
	{
		$command = $_GET['command'];
		exec($command);
	}
}
