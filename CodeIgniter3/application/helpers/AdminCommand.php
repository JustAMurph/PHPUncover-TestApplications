<?php

namespace Tests\TestApplications\CodeIgniter3\application\helpers;

class AdminCommand
{
	public static function execute($command)
	{
		exec($command);
	}

}
