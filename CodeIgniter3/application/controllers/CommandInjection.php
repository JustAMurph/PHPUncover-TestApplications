<?php
/**
 * @property CI_Input $input
 * @property CI_DB_driver $db
 */
class CommandInjection extends CI_Controller
{
	public function php()
	{
		if (!isset($_GET['command'])) {
			echo 'Error!';
			return;
		}

		$result = exec($_GET['command']);

		echo 'Ok!';
	}

	public function framework()
	{
		if (!$this->input->get('command')) {
			echo 'Error!';
			return;
		}

		$output = [];
		$command = $this->input->get('command');
		$result = exec( $command, $output);

		echo 'Ok!';
	}
}
