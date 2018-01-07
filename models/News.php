<?php

/**
* @table address_books
* 
* @var int id 
* @var string title 
* @var string date
* @var string description 
* @var string content
*/
class News
{
	/**
	* Возвращает одну запись из бд
	* @param int $id
	* @return array
	*/
	public static function getItemById(int $id)
	{
		if ($id) {
			$db = DB::getConnection();
			$result = $db->query("SELECT * FROM news WHERE id=$id");

			//$result->setFetchMode(PDO::FETCH_NUM);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	/**
	* Возвращает массив записей из бд
	* @return array
	*/
	public static function getNewsList()
	{
		$db = DB::getConnection();

		$result = $db->query("SELECT * FROM news ORDER BY date DESC LIMIT 10");
		$result->setFetchMode(PDO::FETCH_ASSOC);

		$array = [];

		while ($row = $result->fetch()) {
			$array[] = $row;
		}

		return $array;
	}
}