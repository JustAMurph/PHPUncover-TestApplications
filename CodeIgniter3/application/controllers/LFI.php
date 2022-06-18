<?php

/**
 * @property CI_Input $input
 */
class LFI extends CI_Controller
{
	public function php()
	{
		$default = 'view.php';

		if (isset($_GET['view'])) {
			include $_GET['view'];
		}

		return 'Ok!';
	}

	public function framework()
	{
		$default = 'view.php';

		if ($this->input->get('view')) {
			include $this->input->get('view');
		}

		return 'Ok!';
	}
}
