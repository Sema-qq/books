<?php

/**
* table: address_books.contacts
*
* @var int id
* @var int user_id (users.id)
* @var int address_id (address.id)
* @var int group_id (groups.id)
*/
class Contact extends Model
{
    /**
     * object PDO
     * @var DB
     */
	protected $db;

    /**
     * @var string tableName
     */
	protected $table = 'contacts';

    /**
     * Contact constructor.
     */
	public function __construct()
    {
        $this->db = DB::getConnection();
    }

    /**
     * @param int $page
     * @return array
     */
    public function getContacts($page)
    {
//        $query = "SELECT * FROM $this->table INNER JOIN users ON $this->table.user_id = users.id";
//        $query .= " INNER JOIN address ON $this->table.address_id = address.id";
//        $query .= " INNER JOIN groups ON $this->table.group_id = groups.id";

        $offset = ($page -1) * self::COUNT;

        $query = "SELECT * FROM $this->table ORDER BY id ASC LIMIT ".self::COUNT." OFFSET $offset";

        return $this->getArrayByQuery($query);
    }

    /**
     * @param $id
     * @return null
     */
    public function getContact($id)
    {
        $model = $this->db->query("SELECT * FROM $this->table WHERE id=$id");

        $model->setFetchMode(PDO::FETCH_OBJ);

        $contact = $model->fetch();

        $contact->user = !empty($contact->user_id) ? $this->findOne($contact->user_id, 'users') : null;
        $contact->address = !empty($contact->address_id) ? $this->findOne($contact->address_id, 'address') : null;
        $contact->group = !empty($contact->group_id) ? $this->findOne($contact->group_id,'groups') : null;

        return !empty($contact) ? $contact : null;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function createContact($userId)
    {
        return $this->create("INSERT INTO $this->table VALUES (NULL, $userId, NULL, NULL)");
    }

    /**
     * @param $id
     * @param $user_id
     * @param $address_id
     * @param $group_id
     * @return mixed
     */
    public function updateContact($id, $user_id, $address_id, $group_id)
    {
        $query = "UPDATE $this->table SET user_id=$user_id, address_id=$address_id, group_id=$group_id WHERE id=$id";
        return $this->update($query);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteContact($id)
    {
        return $this->delete($id, $this->table);
    }

    /**
     * Вернем общее количество контактов
     * @return mixed
     */
    public function getContactsCount()
    {
        return $this->getCount($this->table);
    }

    /**
     * Все контакты без лимита и пагинации
     * @return array
     */
    public function getAllContacts()
    {
        $query = "SELECT * FROM $this->table ORDER BY id DESC";

        return $this->getArrayByQuery($query);
    }

    /**
     * @param $query (sql)
     * @return array
     */
    private function getArrayByQuery($query)
    {
        $model = $this->db->query($query);

        $model->setFetchMode(PDO::FETCH_OBJ);

        $array = [];

        while ($row = $model->fetch()) {
            $row->user = !empty($row->user_id) ? $this->findOne($row->user_id, 'users') : null;
            $row->address = !empty($row->address_id) ? $this->findOne($row->address_id, 'address') : null;
            $row->group = !empty($row->group_id) ? $this->findOne($row->group_id,'groups') : null;
            $array[] = $row;
        }

        return $array;
    }
}