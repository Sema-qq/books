<?php

/***
 * Class Handler
 */
class Handler
{
    /**
     * @param object $contact
     * @return bool
     */
    public static function showContact($contact)
    {
        if (!empty($contact)){
            self::foreachContact($contact);
        } else {
            self::notContact();
        }
        return true;
    }

    /**
     * @param array objects $contacts
     */
    public static function showContacts($contacts)
    {
        if (!empty($contacts)){
            foreach ($contacts as $contact){
                self::foreachContact($contact);
            }
        } else {
            self::notContact('s');
        }
    }

    /**
     * @param string $end
     * @return bool
     */
    private static function notContact($end = '')
    {
        echo "Contact$end not found\n";
        echo "\n";
        return false;
    }

    /**
     * @param object $contact
     */
    private static function foreachContact($contact)
    {
        foreach ($contact->getAttributeLabels() as $label => $property){
            echo "$label: $property\n";
        }
    }
}
