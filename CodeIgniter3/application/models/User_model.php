<?php

namespace Tests\TestApplications\CodeIgniter3\application\models;

class User_model extends \CI_Model
{
	/**
	 * @finding
	 *
	 * @param $id
	 * @return void
	 */
	public function getUserById($id)
	{
		$this->db->query($id);
	}

	/**
	 *
	 * @falsePositive
	 *
	 * @param $id
	 * @return void
	 */
	public function safeGetUserById($id)
	{
		$tempt = (int) $id;

		$this->db->query('SELECT * FROM users WHERE id = ' . $tempt);
	}

	/**
	 * @finding
	 *
	 * @param $query
	 * @return void
	 */
	public function getNewUsers($query)
	{
		$a = mysql_query($query);
	}
}
