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
     */
    public function edit()
    {
        echo "Enter number contact: ";
        $contact = $this->findOne($this->validateId(rtrim(fgets(STDIN))));

        if (!empty($contact)){
            echo "ID:       $contact->id\n";
            echo "F.I.O.:   $contact->fio.\n";
            echo "Phone:    $contact->phone.\n";
            echo "Enter new F.I.O. for contact: ";
            $fio = rtrim(fgets(STDIN));
            echo "Enter new Phone for contact: ";
            $phone = rtrim(fgets(STDIN));
            $contact->fio = !empty($fio) ? $this->validateFio($fio) : $contact->fio;
            $contact->phone = !empty($phone) ? $this->validatePhone($phone) : $contact->phone;
            if ($this->update($contact)){
                echo "Contact $contact->id successfully edited!\n";
                echo "\n";
            } else {
                echo "Contact update failure!\n";
            }
        } else {
            echo "Contact not found!\n";
            echo "\n";
        }
    }

    /**
     * Вывод всех существющих контактов
     */
    public function showAll()
    {
        $contacts = $this->getAll();

        if (!empty($contacts)){
            foreach ($contacts as $contact){
                echo "ID:       $contact->id\n";
                echo "F.I.O.:   $contact->fio.\n";
                echo "Phone:    $contact->phone.\n";
                echo "\n";
            }
        } else {
            echo "Contacts not found!\n";
            echo "\n";
        }
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

    /**
     * Валидация телефон
     * @param string $phone
     * @return string
     */
    private function validatePhone($phone)
    {
        while (true){
            //только цифры и не меньше 5 цифр
            if (preg_match('([^0-9]+)', $phone)){
                echo "Must be only numbers! Please try again enter phone: ";
                $phone = rtrim(fgets(STDIN));
            } elseif (strlen($phone) < 5){
                echo "Length 5 characters! Please try again enter phone: ";
                $phone = rtrim(fgets(STDIN));
            } else { return $phone; }
        }
    }

    /**
     * Валидация имени контакта
     * @param string $fio
     * @return string
     */
    private function validateFio($fio)
    {
        while (true){
            //только буквы и цифры
            if (strlen($fio) < 3){
                echo "Length 3 characters! Please try again enter F.I.O.: ";
                $fio = rtrim(fgets(STDIN));
            } else { return $fio; }
        }
    }

    /**
     * Валидация номера контакта
     * @param string $id
     * @return string
     */
    private function validateId($id)
    {
        while (true){
            //только цифры
            if (preg_match('([^0-9]+)', $id)){
                echo "Must be only numbers! Please try again enter number contact: ";
                $id = rtrim(fgets(STDIN));
            } else { return $id; }
        }
    }
}
