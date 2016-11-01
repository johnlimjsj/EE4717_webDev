<?php
  DEFINE('DB_USER', 'root');
  DEFINE('DB_PASSWORD', 'pepper25');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_NAME', 'MixAndMatch');

  session_start();

@$dbcnx = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
// @ to ignore error message display //
if ($dbcnx->connect_error){
	echo "Database is not online"; 
	exit;
	// above 2 statements same as die() //
	}
	// else
	// echo "Congratulations...  MySql is working..";

if (!$dbcnx->select_db ("MixAndMatch"))
	exit("<p>Unable to locate the database</p>");
?>	