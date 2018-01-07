<?php

/**
* table: address_books.groups
*
* @var int id
* @var string name
*/
class Group extends Model
{
    /**
     * @var string tableName
     */
    protected $table = 'groups';

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
    public function createGroup(array $input)
    {
        $input = $this->htmlSpecialSimbol($input);
        return $this->create("INSERT INTO $this->table VALUES (NULL, '".$input['name']."')");
    }

    /**
     * @param int $page
     * @return array|null
     */
    public function getGroups($page)
    {
        return $this->findAll($this->table, $page);
    }

    /**
     * @param $id
     * @return null
     */
    public function getGroup($id)
    {
        return $this->findOne($id, $this->table);
    }

    /**
     * @param $id
     * @return bool
     */
    public function updateGroup($id, $input)
    {
        $input = $this->htmlSpecialSimbol($input);
        return $this->update("UPDATE $this->table SET name = '".$input['name']."' WHERE id=$id");
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteGroup($id)
    {
        return $this->delete($id, $this->table);
    }

    /**
     * Вернем общее количество групп
     * @return mixed
     */
    public function getGroupsCount()
    {
        return $this->getCount($this->table);
    }

    /**
     * Контакты текущей группы
     * @param $id
     * @return array|null
     */
    public function getContactsCurrentGroup($id)
    {
        $query = "SELECT * FROM contacts INNER JOIN users ON contacts.user_id = users.id WHERE group_id = $id";

        $model = $this->db->query($query);

        $model->setFetchMode(PDO::FETCH_OBJ);

        $array = [];

        while ($row = $model->fetch()) {
            $array[] = $row;
        }

        return !empty($array) ? $array : null;
    }
}