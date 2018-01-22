<?php


/**
 * Class Contact
 */
class Contact
{
    /**
     * @var
     */
    public $id;
    /**
     * @var
     */
    public $fio;

    /**
     * @var
     */
    public $phone;


    /**
     * @return array
     */
    public function getAttributeLabels()
    {
        return [
            'ID' => $this->id,
            'F.I.O.' => $this->fio,
            'PHONE' => $this->phone
        ];
    }
}

