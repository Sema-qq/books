<?php

/**
* table: address_books.users
*
* @var int id
* @var string firstname
* @var string lastname
* @var int phone
* @var int phone2
* @var string email
* @var string company
*/
class User extends Model
{
	/**
	* @var string tableName
	*/
	protected $table = 'users';

	/**
	* @var object PDO
	*/
	protected $db;

    /**
     * User constructor.
     */
	public function __construct()
	{
		$this->db = DB::getConnection();
	}

    /**
     * Вернет айди вставленной записи
     * @param array $input
     * @return bool
     */
	public function createUser(array $input)
	{
        $input = $this->htmlSpecialSimbol($input);

        $query = "INSERT INTO $this->table VALUES (NULL";
        $query .= ',';
        $query .= !empty($input['firstname'])? '"'.$input['firstname'].'"':'NULL';
        $query .= ',';
        $query .= !empty($input['lastname'])? '"'.$input['lastname'].'"':'NULL';
        $query .= ',';
        $query .= !empty($input['phone'])? '"'.$input['phone'].'"':'NULL';
        $query .= ',';
        $query .= !empty($input['phone2'])? '"'.$input['phone2'].'"':'NULL';
        $query .= ',';
        $query .= !empty($input['email'])? '"'.$input['email'].'"':'NULL';
        $query .= ',';
        $query .= !empty($input['company'])? '"'.$input['company'].'"':'NULL';
        $query .= ')';

        return $this->create($query);
	}

    /**
     * @param int $page
     * @return array|null
     */
	public function getUsers($page = 1, $all = false)
	{
		return $this->findAll($this->table, $page, $all);
	}

    /**
     * @param $id
     * @return null
     */
	public function getUser($id)
	{
		return $this->findOne($id, $this->table);
	}

    /**
     * @param $id
     * @return bool
     */
	public function updateUser($id, $input)
	{
        $input = $this->htmlSpecialSimbol($input);
        $query = "UPDATE $this->table SET ";
        $query .= 'firstname=';
        $query .= !empty($input['firstname'])? '"'.$input['firstname'].'"':'NULL';
        $query .= ', lastname=';
        $query .= !empty($input['lastname'])? '"'.$input['lastname'].'"':'NULL';
        $query .= ', phone=';
        $query .= !empty($input['phone'])? '"'.$input['phone'].'"':'NULL';
        $query .= ', phone2=';
        $query .= !empty($input['phone2'])? '"'.$input['phone2'].'"':'NULL';
        $query .= ', email=';
        $query .= !empty($input['email'])? '"'.$input['email'].'"':'NULL';
        $query .= ', company=';
        $query .= !empty($input['company'])? '"'.$input['company'].'"':'NULL';
        $query .= " WHERE id = $id";
        return $this->update($query);
	}

    /**
     * @param $id
     * @return mixed
     */
	public function deleteUser($id)
	{
		return $this->delete($id, $this->table);
	}

    /**
     * Вернем общее количество пользователей
     * @return mixed
     */
	public function getUsersCount()
    {
        return $this->getCount($this->table);
    }
}