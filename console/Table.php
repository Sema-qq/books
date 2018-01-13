<?php

/**
 * Class Table
 */
class Table
{
    /**
     * Array for object (imitation table)
     * @var array
     */
    protected $contacts = [];

    /**
     * Counter (autoincrement)
     * @var int
     */
    protected $i = 1;


    /**
     * @param string $fio
     * @param string $phone
     * @return string
     */
    protected function create($fio, $phone)
    {
        $contact = new Contact();
        $contact->id = $this->i;
        $contact->fio = $fio;
        $contact->phone = $phone;

        $this->contacts[] = $contact;
        $this->i++;

        return "Contact $contact->id successfully create!\n\n";
    }

    /**
     * @param string $id
     * @return bool|mixed
     */
    protected function findOne($id)
    {
        foreach ($this->contacts as $contact){
            if ($contact->id == $id){
                return $contact;
            }
        }
        return false;
    }

    /**
     * @return array
     */
    protected function getAll()
    {
        return $this->contacts;
    }

    /**
     * @param object $editedContact
     * @return bool
     */
    protected function update($editedContact)
    {
        foreach ($this->contacts as $key => $contact){
            if ($contact->id == $editedContact->id){
                $this->contacts[$key] = $editedContact;
                return true;
            }
        }
        return false;
    }

    /**
     * @param string $id
     * @return bool
     */
    protected function destroy($id)
    {
        foreach ($this->contacts as $key => $contact){
            if ($contact->id == $id){
                unset($this->contacts[$key]);
                return true;
            }
        }
        return false;
    }
}