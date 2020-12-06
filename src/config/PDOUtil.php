<?php

namespace App\config;

use PDO;
use PDOException;

class PDOUtil
{
	private static $conexao = null;
	public static function getStance()
	{
		try {
			if (self::$conexao == null) {
				self::$conexao = new PDO('mysql:host=127.0.0.1;dbname=test_products;port=3306','root','docker');
			}
		} catch (PDOException $excecao) {
			if ($excecao->getCode() == "2002") {
				echo 'The Host does not was found';
			}
			if ($excecao->getCode() == "1049") {
				echo 'Message here';
			}
			if ($excecao->getCode() == "1044") {
				echo 'Message here';
			}
			if ($excecao->getCode() == "1045") {
				echo 'Message here';
			}
		}
		return self::$conexao;
	}
}
