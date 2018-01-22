<?php


// подключение файлов системы
define('ROOT', dirname(__FILE__));
/**
 * Функция __autoload для автоматического подключения классов
 */
function __autoload($class_name)
{
    // Массив папок, в которых могут находиться необходимые классы
    $array_paths = array(
        '/console/',
    );

    // Проходим по массиву папок
    foreach ($array_paths as $path) {

        // Формируем имя и путь к файлу с классом
        $path = ROOT . $path . $class_name . '.php';

        // Если такой файл существует, подключаем его
        if (is_file($path)) {
            include_once $path;
        }
    }
}

#запуск скрипта
$object = new AddressBook();
#сначала выведем справку
$object->help();
#затем запустим (почти)бесконечный цикл
while (true){
    echo "Please enter command: ";
    $command = fgets(STDIN);
    if (rtrim(strtolower($command)) == 'add'){
        echo "Please enter F.I.O.: ";
        $fio = Validator::validateFio(rtrim(fgets(STDIN)));
        echo "Please enter phone: ";
        $phone = Validator::validatePhone(rtrim(fgets(STDIN)));
        $result = $object->add($fio, $phone);
        echo $result ? "Contact $result successfully create!\n\n" : "Failure!";
    } elseif (rtrim(strtolower($command)) == 'show') {
        echo "Enter number contact: ";
        Handler::showContact($object->show(Validator::validateId(rtrim(fgets(STDIN)))));
    }  elseif (rtrim(strtolower($command)) == 'edit') {
        $object->edit();
    } elseif (rtrim(strtolower($command)) == 'show all'){
        $object->showAll();
    } elseif (rtrim(strtolower($command)) == 'help'){
        $object->help();
    } elseif (rtrim(strtolower($command)) == 'delete'){
        echo "Enter number contact: ";
        $id = Validator::validateId(rtrim(fgets(STDIN)));
        if ($id = $object->delete($id)){
            echo "Contact $id successfully deleted!\n";
            echo "\n";
        };
    } elseif (rtrim(strtolower($command)) == 'exit'){
        echo "Close this script.\n";
        break;
    } else {
        echo "Unknown command!\n";
    }
}

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
