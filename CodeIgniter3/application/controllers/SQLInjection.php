<?php
/**
 * @property CI_Input $input
 * @property CI_DB_driver $db
 */
class SQLInjection extends CI_Controller
{
	public function php()
	{
		$query = $_POST['query'];
		if ($query) {
			$mysqli = new mysqli("example.com", "user", "password", "database");
			$mysqli->query($query);
		}
	}

	public function framework()
	{
		$sql = $this->input->post('query');
		$query = $this->db->query($sql);
	}
}
