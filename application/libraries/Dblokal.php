<?php 

class Dblokal{

	function koneksiantrian(){
		$host_name = "localhost"; 
		$user_name = "root";
		$password = "Kul0nuwun";
		$database = "antrian";
		 
		@mysql_connect($host_name, $user_name, $password);
		@mysql_select_db($database);

		// echo "Koneksi Terbuka";
	}

	function tutupkoneksiantrian(){
		$host_name = "localhost"; 
		$user_name = "root";
		$password = "Kul0nuwun";
		$database = "antrian";

		$connect_db=@mysql_connect($host_name, $user_name, $password);
		@mysql_close($connect_db);
	}

	
}