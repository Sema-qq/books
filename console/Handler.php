<?php

class Handler
{
    /**
     * @param array $contact
     */
    public static function showContact($contact)
    {
        if (!empty($contact)){
            foreach ($contact->getAttributeLabels() as $label => $property){
                echo "$label: $property\n";
            }
        } else {
            self::notContact();
        }
    }

    /**
     * @param array $contacts
     */
    public function showContacts($contacts)
    {
        if (!empty($contacts)){
            foreach ($contacts as $contact){
                $array = $contact->getAttributeLabels();
                foreach ($array as $label => $property){
                    echo "$label: $property\n";
                }
            }
        } else {
            self::notContact();
        }
    }

    /**
     * Чтобы не дублировать код
     */
    private static function notContact()
    {
        echo "Contact not found\n";
        echo "\n";
    }
}
