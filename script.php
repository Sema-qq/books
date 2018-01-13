<?php
#запуск скрипта
$onject = new AddressBook();
$onject->run();

/*
 * описание задачи:
 *
 * Необходимо реализовать консольное приложение для работы с телефонной книгой,
 * реализованное с применением ООП и сохраняющее данные в память (в переменные).
 * Т.е. не нужно сохранять ни в базу ни в файл,
 * необходимо хранить данные только в процессе выполнения скрипта.

        В итоге у тебя должен получится файл, в котором будет примерно такой код:
        - создать контакт1 c ФИО = 'asd', телефон = 123, ...
        - посмотреть список контактов
        - посмотреть контакт1
        - изменить часть данных в контакте1
        - посмотреть контакт1
        - добавить контакт2
        - посмотреть список контактов
        - посмотреть контакт2
        - удалить контакт1
        - посмотреть список контактов
 *
 * */

/**
 * Class AddressBook
 */
class AddressBook
{
    /**
     * Контакт 1
     * @var array
     */
    private $contact1;

    /**
     * Контакт 2
     * @var array
     */
    private $contact2;

    /**
     * Основной метод класса.
     */
    public function run()
    {
        //сначала выведем справку
        $this->help();
        //затем запустим (почти)бесконечный цикл
        while (true){
            echo "Please insert command: ";
            $command = fgets(STDIN);
            if (rtrim(strtolower($command)) == 'add'){
                $this->add();
            } elseif (rtrim(strtolower($command)) == 'show') {
                echo "Insert number contact (1 or 2): ";
                $this->show(rtrim(fgets(STDIN)));
            }  elseif (rtrim(strtolower($command)) == 'show all'){
                $this->showAll();
            } elseif (rtrim(strtolower($command)) == 'help'){
                $this->help();
            } elseif (rtrim(strtolower($command)) == 'delete'){
                echo "Insert number contact (1 or 2): ";
                $this->delete(rtrim(fgets(STDIN)));
            } elseif (rtrim(strtolower($command)) == 'exit'){
                echo "Close this script. Buy buy.";
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
        echo "==============================================\n";
        echo "Available command current script:";
        echo "==============================================\n";
        echo "Help:         show hint\n";
        echo "Add:          add new contact\n";
        echo "Show:         show one contact\n";
        echo "Show all:     show all contacts\n";
        echo "Delete:       delete contact\n";
        echo "==============================================\n";
        echo "Exit:         close current script\n";
        echo "==============================================\n";
        echo "\n";
    }

    /**
     * Добавление контакта
     */
    private function add()
    {
        if (empty($this->contact1)){
            $this->contact1 = new Contacts();
            echo "Please insert your F.I.O.: ";
            $this->contact1->name = rtrim(fgets(STDIN));
            echo "Please insert your phone: ";
            $this->contact1->phone = rtrim(fgets(STDIN));
            echo "Contact successfully create\n";
        } elseif (empty($this->contact2)){
            $this->contact2 = new Contacts();
            echo "Please insert your F.I.O.: ";
            $this->contact2->name = rtrim(fgets(STDIN));
            echo "Please insert your phone: ";
            $this->contact2->phone = rtrim(fgets(STDIN));
            echo "Contact successfully create\n";
        } else {
            echo "All contacts are already created.\n";
        }
    }

    /**
     * Вывод одного контакта
     * @param string $number
     */
    private function show($number)
    {
        if ($number == '1' && !empty($this->contact1)){
            echo "==============================================\n";
            echo "Contact 1:\n";
            echo "==============================================\n";
            echo "F.I.O:        ".$this->contact1->name."\n";
            echo "Phone:        ".$this->contact1->phone."\n";
            echo "==============================================\n";
            echo "\n";
        } else if ($number == '2' && !empty($this->contact2)){
            echo "==============================================\n";
            echo "Contact 2:\n";
            echo "==============================================\n";
            echo "F.I.O:        ".$this->contact2->name."\n";
            echo "Phone:        ".$this->contact2->phone."\n";
            echo "==============================================\n";
            echo "\n";
        } else {
            echo "Contact not found\n";
        }
    }

    /**
     * Вывод всех существющих контактов
     */
    private function showAll()
    {
        if (!empty($this->contact1)){
            echo "==============================================\n";
            echo "Contact 1:\n";
            echo "==============================================\n";
            echo "F.I.O:        ".$this->contact1->name."\n";
            echo "Phone:        ".$this->contact1->phone."\n";
            echo "==============================================\n";
            echo "\n";
        } else if (!empty($this->contact2)){
            echo "==============================================\n";
            echo "Contact 2:\n";
            echo "==============================================\n";
            echo "F.I.O:        ".$this->contact2->name."\n";
            echo "Phone:        ".$this->contact2->phone."\n";
            echo "==============================================\n";
            echo "\n";
        } else {
            echo "Contacts not found\n";
        }
    }

    /**
     * Удаление контакта
     * @param string $number
     */
    private function delete($number)
    {
        if ($number == '1' && !empty($this->contact1)){
            $this->contact1 = '';
            echo "Contact 1 successfully delete!\n";
        } elseif ($number == '2' && !empty($this->contact2)){
            $this->contact2 = '';
            echo "Contact 2 successfully delete!\n";
        } else {
            echo "Contact not found\n";
        }
    }
}

/**
 * Назвал класс в множественном числе, т.к. в проекте уже есть класс Contact.php и шторм ругался
 * Class Contacts
 */
class Contacts
{
    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $phone;
}
