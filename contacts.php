<?php

echo "Справку можно получить набрав комманду php contacts.php help \n";

switch ($argv[1]) {
    case 'show':
        show();
        break;
    case 'view':
        if (isset($argv[2])) {
            view($argv[2]);
        } else {
            echo "Unknown id\n";
        }
        break;
    case 'help':
        help();
        break;

    default:
        // Если параметр нам не подходит, или его нет, говорим об ошибке
        echo "Unknown parameter. Use help. \n";
        break;
}
/**
 * Вывод справки
 */
function help()
{
    echo "==============================================\n";
    echo "Help on the program\n";
    echo "==============================================\n";
    echo "php contacts.php show - Show all contacts.\n";
    echo "php contacts.php show (id) - Show one contact.\n";
    echo "php contacts.php help - Show hint.\n";
}

/**
 * Вывод всех контактов
 */
function show()
{
    $mysqli = mysqli_connect('localhost', 'root','','address_books');
    $mysqli->query("SET NAMES 'utf-8'");
    $query = $mysqli->query("SELECT * FROM contacts ORDER BY id DESC");
    $contacts = [];
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
        $contacts[] = $row = getRelations($row);
    }
    foreach ($contacts as $contact){
        echo "==============================================\n";
        echo "ID contact:       ".$contact['id']."\n";
        echo "==============================================\n";
        echo "Name contact:     ".$contact['user']['firstname']."\n";
        echo "Lastname contact: ".$contact['user']['lastname']."\n";
        echo "Phone contact:    ".$contact['user']['phone']."\n";
        echo "Phone2 contact:   ".$contact['user']['phone2']."\n";
        echo "Email contact:    ".$contact['user']['email']."\n";
        echo "Company contact:  ".$contact['user']['company']."\n";
        echo "==============================================\n";
        echo "City contact:     ".$contact['address']['city']."\n";
        echo "Address contact:  ".$contact['address']['address']."\n";
        echo "==============================================\n";
        echo "Group contact:    ".$contact['group']['name']."\n";
        echo "==============================================\n";
        echo "\n";
    }
}

/**
 * Вывод одного контакта
 * @param $id
 */
function view($id)
{
    $contact = findOne($id, 'contacts');
    $contact = getRelations($contact);
    echo "==============================================\n";
    echo "ID contact:       ".$contact['id']."\n";
    echo "==============================================\n";
    echo "Name contact:     ".$contact['user']['firstname']."\n";
    echo "Lastname contact: ".$contact['user']['lastname']."\n";
    echo "Phone contact:    ".$contact['user']['phone']."\n";
    echo "Phone2 contact:   ".$contact['user']['phone2']."\n";
    echo "Email contact:    ".$contact['user']['email']."\n";
    echo "Company contact:  ".$contact['user']['company']."\n";
    echo "==============================================\n";
    echo "City contact:     ".$contact['address']['city']."\n";
    echo "City contact:     ".$contact['address']['address']."\n";
    echo "==============================================\n";
    echo "Group contact:    ".$contact['group']['name']."\n";
    echo "==============================================\n";
}

/**
 * @param $id
 * @param $tableName
 * @return array|null
 */
function findOne($id, $tableName)
{
    $mysqli = mysqli_connect('localhost', 'root','','address_books');
    $mysqli->query("SET NAMES 'utf-8'");
    $query = $mysqli->query("SELECT * FROM $tableName WHERE `id` = $id");
    return mysqli_fetch_array($query, MYSQLI_ASSOC);
}

/**
 * @param $model
 * @return mixed
 */
function getRelations($model)
{
    $model['user'] = !empty($model['user_id']) ? findOne($model['user_id'], 'users') : null;
    $model['address'] = !empty($model['address_id']) ? findOne($model['address_id'], 'address') : null;
    $model['group'] = !empty($model['group_id']) ? findOne($model['group_id'], 'groups') : null;
    return $model;
}