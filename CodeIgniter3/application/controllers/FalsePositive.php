<?php

class FalsePositive extends CI_Controller
{
	private function a()
	{
		exec($_GET['command']);
	}

	private function b()
	{
		include $_POST['view'];
	}
}
