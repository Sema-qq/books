<?php 

/**
* table: address_books.address
*
* @var int id
* @var string city
* @var string address
*/
class Address extends Model
{
    /**
     * @var string tableName
     */
    protected $table = 'address';

    /**
     * @var object PDO
     */
    protected $db;

    /**
     * Address constructor.
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
    public function createAddress(array $input)
    {
        $input = $this->htmlSpecialSimbol($input);
        $query = "INSERT INTO $this->table VALUES (NULL";
        $query .= ',';
        $query .= !empty($input['city'])? '"'.$input['city'].'"':'NULL';
        $query .= ',';
        $query .= !empty($input['address'])? '"'.$input['address'].'"':'NULL';
        $query .= ')';

        return $this->create($query);
    }

    /**
     * @param int $page
     * @return array|null
     */
    public function getAllAddress($page, $all = false)
    {
        return $this->findAll($this->table, $page, $all);
    }

    /**
     * @param $id
     * @return null
     */
    public function getAddress($id)
    {
        return $this->findOne($id, $this->table);
    }

    /**
     * @param $id
     * @return bool
     */
    public function updateAddress($id, $input)
    {
        $input = $this->htmlSpecialSimbol($input);
        $query = "UPDATE $this->table SET ";
        $query .= 'city=';
        $query .= !empty($input['city'])? '"'.$input['city'].'"':'NULL';
        $query .= ', address=';
        $query .= !empty($input['address'])? '"'.$input['address'].'"':'NULL';
        $query .= " WHERE id = $id";
        return $this->update($query);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteAddress($id)
    {
        return $this->delete($id, $this->table);
    }

    /**
     * Вернем общее количество адресов
     * @return mixed
     */
    public function getAdressCount()
    {
        return $this->getCount($this->table);
    }
}