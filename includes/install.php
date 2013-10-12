<?php
// MySQL Setup
function setupMySQL()
{
	// we need to locate tracker.mysql.php
	// first, try the most obvious location.. which should be in the 
	// same directory as the ./help.php file being ran
	if (is_readable('./tracker.mysql.php'))
	{
		// require
		require './tracker.mysql.php';
	}
	// unfortunately, it does not seem the file is located in the current
	// directory, we will recurse the paths below and attempt to locate it
	elseif (findFile(realpath('.'), 'tracker.mysql.php'))
	{
		// require
		chdir(dirname($_GET['found_file_path']));
		require './tracker.mysql.php';
	}
	// unable to find the file, might as well quit
	else
	{
		$_GET['notice'] = 'no';
		$_GET['message'] = '' . 
			"Could not locate the <em>tracker.mysql.php</em> file. " .
			"Make sure all of the necessary tracker files have been uploaded. ";
		return;
	}

	// open db
	peertracker::open();
	
	// setup
	if (
		peertracker::$api->query("DROP TABLE IF EXISTS `{$_SERVER['tracker']['db_prefix']}peers`") &&
		peertracker::$api->query(
			"CREATE TABLE IF NOT EXISTS `{$_SERVER['tracker']['db_prefix']}peers` (" .
				"`info_hash` binary(20) NOT NULL," .
				"`peer_id` binary(20) NOT NULL," .
				"`compact` binary(6) NOT NULL," . 
				"`ip` char(15) NOT NULL," .
				"`port` smallint(5) unsigned NOT NULL," .
				"`state` tinyint(1) unsigned NOT NULL DEFAULT '0'," .
				"`updated` int(10) unsigned NOT NULL," .
				"PRIMARY KEY (`info_hash`,`peer_id`)" .
			") ENGINE=MyISAM DEFAULT CHARSET=latin1"
		) && 
		peertracker::$api->query("DROP TABLE IF EXISTS `{$_SERVER['tracker']['db_prefix']}tasks`") &&
		peertracker::$api->query(
			"CREATE TABLE IF NOT EXISTS `{$_SERVER['tracker']['db_prefix']}tasks` (" . 
				"`name` varchar(5) NOT NULL," . 
				"`value` int(10) unsigned NOT NULL" . 
			") ENGINE=MyISAM DEFAULT CHARSET=latin1"
		))
	{
		// Check Table
		@peertracker::$api->query("CHECK TABLE `{$_SERVER['tracker']['db_prefix']}peers`");
		
		// no errors, hopefully???
		$_GET['notice'] = 'yes';
		$_GET['message'] = 'Your MySQL Tracker Database has been setup.';
	}
	// error
	else
	{
		$_GET['notice'] = 'no';
		$_GET['message'] = 'Could not setup the MySQL Database.';
	}
	
	// close
	peertracker::close();
}
?>