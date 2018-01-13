<?php


/**
 * Class AddressBook
 */
class AddressBook extends Table
{
    /**
     * Основной метод класса.
     */
    public function run()
    {
        //сначала выведем справку
        $this->help();
        //затем запустим (почти)бесконечный цикл
        while (true){
            echo "Please enter command: ";
            $command = fgets(STDIN);
            if (rtrim(strtolower($command)) == 'add'){
                $this->add();
            } elseif (rtrim(strtolower($command)) == 'show') {
                $this->show();
            }  elseif (rtrim(strtolower($command)) == 'edit') {
                $this->edit();
            } elseif (rtrim(strtolower($command)) == 'show all'){
                $this->showAll();
            } elseif (rtrim(strtolower($command)) == 'help'){
                $this->help();
            } elseif (rtrim(strtolower($command)) == 'delete'){
                $this->delete();
            } elseif (rtrim(strtolower($command)) == 'exit'){
                echo "Close this script.";
                break;
            } else {
                echo "Unknown command!\n";
            }
        }
    }

    /**
     * Вывод справки
     */
    private function help()
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
     */
    private function add()
    {
        echo "Please enter F.I.O.: ";
        $fio = $this->validateFio(rtrim(fgets(STDIN)));
        echo "Please enter phone: ";
        $phone = $this->validatePhone(rtrim(fgets(STDIN)));
        echo $this->create($fio, $phone);
    }

    /**
     * Вывод одного контакта
     */
    private function show()
    {
        echo "Enter number contact: ";
        $contact = $this->findOne($this->validateId(rtrim(fgets(STDIN))));

        if (!empty($contact)){
            echo "ID:       $contact->id\n";
            echo "F.I.O.:   $contact->fio.\n";
            echo "Phone:    $contact->phone.\n";
            echo "\n";
        } else {
            echo "Contact not found\n";
            echo "\n";
        }
    }

    /**
     * Редактирование одного контакта
     */
    private function edit()
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
    private function showAll()
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
     */
    private function delete()
    {
        echo "Enter number contact: ";
        $id = $this->validateId(rtrim(fgets(STDIN)));
        if ($this->destroy($id)){
            echo "Contact $id successfully deleted!\n";
            echo "\n";
        };
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
