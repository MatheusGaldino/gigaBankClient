<?php 

/* classe que seta a conexão com o banco de dados */
abstract class dbConn{
	/*dados do banco que desejamos nos conectar*/
	private static $server = "localhost";
	private static $banco = "gigaBank";
	private static $user = "root";
	private static $senha = "";

	private static $db;

	//metodo estatico que retorna uma conexão com o banco de dados
	public static function getConn(){
		
		try{
			self::$db = new pdo( 'mysql:host='.self::$server.';dbname='.self::$banco,
							self::$user,
							self::$senha,
							array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch(PDOException $ex){
			die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
		}
		return self::$db;
	}

	function debugarDB(){
		return $this->db;
	}
}
