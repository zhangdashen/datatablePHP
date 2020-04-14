<?php
function Conexion_pozos(){
	$db = new PDO("mysql:dbname=usuarios;host=127.0.0.1","root","123456");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    // 设置sql语句查询如果出现问题 就会抛出异常
            
	return $db;
    // $db=mysql_connect("localhost","root","123456") or die("No se conecto al servidor");
    //         mysql_select_db("scada",$db) or die ("No se conecto a la base de datos");
    //         return $db;
}
$dbx=Conexion_pozos();
?>