<?php

class Validator
{
    /**
     * Валидация телефон
     * @param string $phone
     * @return string
     */
    public static function validatePhone($phone)
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
    public static function validateFio($fio)
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
    public static function validateId($id)
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
