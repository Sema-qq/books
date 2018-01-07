<?php

/**
 * Class Model
 */
class Model
{
    /**
     * Количество отображаемых строк выборки бд на одной странице
     * константа для пагинации
     */
    const COUNT = 7;

    /**
     * Отображение гет запроса при пагинации
     * константа для пагинации
     */
    const INDEX = 'page-';

    /**
     * @var DB (object PDO)
     */
	protected $db;

    /**
     * Model constructor.
     */
	public function __construct()
	{
		$this->db = DB::getConnection();
	}

    /**
     * Возвращает все записи с нужной нам таблицы
     * @param $tableName
     * @return array|null
     */
    public static function getAll($tableName)
    {
        //создадим объект базы для статичной функции
        $db = DB::getConnection();

        $model = $db->query("SELECT * FROM $tableName ORDER BY id DESC");

        $model->setFetchMode(PDO::FETCH_OBJ);

        $array = [];

        while ($row = $model->fetch()) {
            $array[] = $row;
        }

        return !empty($array) ? $array : null;
    }

    /**
     * @param string $tableName (имя таблицы)
     * @param int $page (номер страница, для вычесления отсутпа)
     * @return array|null
     */
	protected function findAll($tableName, $page)
	{
	    $offset = ($page -1) * self::COUNT;

        $model = $this->db->query("SELECT * FROM $tableName ORDER BY id ASC LIMIT ".self::COUNT." OFFSET $offset");

		$model->setFetchMode(PDO::FETCH_OBJ);

		$array = [];

		while ($row = $model->fetch()) {
			$array[] = $row;
		}

		return !empty($array) ? $array : null;
	}

    /**
     * @param $id
     * @param $tableName
     * @return null
     */
	protected function findOne($id, $tableName)
	{
		$model = $this->db->query("SELECT * FROM $tableName WHERE id=$id");

		$model->setFetchMode(PDO::FETCH_OBJ);

		return !empty($model) ? $model->fetch() : null;
	}

    /**
     * @param $id
     * @param $tableName
     * @return mixed
     */
	protected function delete($id, $tableName)
	{
	    return $this->db->exec("DELETE FROM $tableName WHERE id=$id");
	}

    /**
     * Вернем айди вставленной записи
     * @param $query (sql запрос)
     * @return mixed
     */
	protected function create($query)
    {
        $this->db->exec($query);
        return $this->db->lastInsertId();
    }

    /**
     * @param $query (sql запрос)
     * @return mixed
     */
    protected function update($query)
    {
        return $this->db->exec($query);
    }

    /**
     * Экранируем символы
     * @param $array
     * @return mixed
     */
    protected function htmlSpecialSimbol(array $array)
    {
        foreach ($array as &$arr){
            $arr = htmlspecialchars($arr);
        }
        return $array;
    }

    /**
     * @param $tableName
     * @return mixed (количество записей в таблице)
     */
    protected function getCount($tableName)
    {
        $model = $this->db->query("SELECT count(id) AS count FROM $tableName");
        $model->setFetchMode(PDO::FETCH_OBJ);
        $count = $model->fetch();
        return $count->count;

    }
}