<?php


error_reporting(E_ALL ^ E_DEPRECATED);

function connect(){
	mysql_connect("mysql427.umbler.com:41890", "paesvitor", "freelove12");
	mysql_select_db("sysmad");
}

function protect($string){
	return mysql_real_escape_string(strip_tags(addslashes($string)));
}
