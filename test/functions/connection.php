<?php
// Edit by Mr. Azlan on 21 July 2011 (Thursday) for USMS 
class database {
	var $host = "localhost";
	var $user = "root";
	var $pass = "";
	var $d_base;
	var $conx;
	var $db;

	function connectdb ( $db_name="test_db" ) {
		$this->d_base = $db_name;
		$this->conx = mysqli_connect ( $this->host, $this->user, $this->pass,$this->d_base ) or sqli_error ( "db-connect", mysqli_error() );
	//	$this->db = mysqli_select_db ( $this->d_base, $this->conx ) or sqli_error ( "db-select", mysqli_error() );
	}

	function closedb ( ) {
		mysqli_close ( $this->conx ) or sql_error ( "db-close", mysqli_error() );
	}
}

class Pager { 
	function getPagerData($numHits, $limit, $page) { 
		$numHits  = (int) $numHits; 
		$limit    = max((int) $limit, 1); 
		$page     = (int) $page; 
		$numPages = ceil($numHits / $limit); 
		
		$page = max($page, 1); 
		$page = min($page, $numPages); 
		
		$offset = ($page - 1) * $limit; 
		
		$ret = new stdClass; 
		
		$ret->offset   = $offset; 
		$ret->limit    = $limit; 
		$ret->numPages = $numPages; 
		$ret->page     = $page; 
		
		return $ret; 
	} 
}
?>
