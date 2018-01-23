<?php


/**
 * Class AddressBook
 */
class AddressBook extends Table
{
    /**
     * Вывод справки
     */
    public function help()
    {
        echo "\n";
        echo "Available command current script:\n";
        echo "\n";
        echo "Help      - show hint.\n";
        echo "Add       - add new contact.\n";
        echo "Show      - show one contact.\n";
        echo "Show all  - show all contacts.\n";
        echo "Delete    - delete contact.\n";
        echo "Exit      - close current script.\n";
        echo "\n";
    }

    /**
     * Добавление контакта
     * @param string $fio
     * @param string $phone
     * @return string id-контакта
     */
    public function add($fio, $phone)
    {
        return $this->create($fio, $phone);
    }

    /**
     * Вывод одного контакта
     * @param string $id
     * @return bool|mixed
     */
    public function show($id)
    {
        return !empty($id) ? $this->findOne($id) : false;
    }

    /**
     * Редактирование одного контакта
     * @param object $contact
     * @return bool
     */
    public function edit($contact)
    {
        return $this->update($contact);
    }

    /**
     * Вывод всех существющих контактов
     */
    public function showAll()
    {
        return $this->getAll();
    }

    /**
     * Удаление контакта
     * @param string $id
     * @return bool
     */
    public function delete($id)
    {
        return !empty($id) ? $this->destroy($id) : false;
    }
}
