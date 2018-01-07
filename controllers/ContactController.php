<?php

/**
 * Class ContactController
 */
class ContactController
{
    /**
     * object Contact model
     * @var Contact
     */
    protected $model;

    /**
     * object User model
     * @var User
     */
    protected $user;

    /**
     * object Group model
     * @var Group
     */
    protected $group;

    /**
     * object Address model
     * @var Address
     */
    protected $address;

    /**
     * ContactController constructor.
     */
    public function __construct()
    {
        $this->model = new Contact();
        $this->user = new User();
        $this->group = new Group();
        $this->address = new Address();
    }

    /**
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        $total = $this->model->getContactsCount();
        $pagination = new Pagination(
            $total,
            $page,
            Model::COUNT,
            Model::INDEX
        );
        $contacts = $this->model->getContacts((int)$page);
        include_once ROOT.'/views/contacts/index.php';
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        if ($id){
            $this->model->deleteContact($id);
            header("Location: /contacts");
            return true;
        }
        return true;
    }

    /**
     * @return bool
     */
    public function actionCreate()
    {
        include_once ROOT.'/views/contacts/create.php';
        return true;
    }

    /**
     * @return bool
     */
    public function actionStore()
    {
        $userId = null;
        //если выбрали пользователя из существующих
        if (!empty($_POST['userId'])){
            //то возьмем его айди
            $userId = $_POST['userId'];
        }
        //если решили создать нового пользователя
        else if ($_POST){
            //то после создания получим его айди
            $userId = $this->user->createUser($_POST);
        }
        //если айди пользователя у нас есть, то создаем контакт
        if (!empty($userId)){
            $newContactId = $this->model->createContact($userId);
            //и покажем страницу созданного контакта
            header("Location: /contacts/$newContactId");
            return true;
        }
        //иначе вернемся на страницу контактов
        header("Location: /contacts");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionShow($id)
    {
        $contact = $this->model->getContact($id);
        include_once ROOT.'/views/contacts/view.php';
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        if ($_POST){
            $this->model->updateContact(
                $id,
                $_POST['user_id'],
                $_POST['address_id'],
                $_POST['group_id']
            );
        }
        header("Location: /contacts/$id");
        return true;
    }

    /**
     * страница добавления пользователя в контакт
     * @return bool
     */
    public function actionAddUser()
    {
        $users = Model::getAll('users');
        include_once ROOT . '/views/contacts/add-user.php';
        return true;
    }

    /**
     * страница выбора пользователя
     * @param $id
     * @return bool
     */
    public function actionSetUser($id)
    {
        $contact = $this->model->getContact($id);
        $users = Model::getAll('users');
        include_once ROOT.'/views/contacts/set-user.php';
        return true;
    }

    /**
     * страница выбора группы
     * @param $id
     * @return bool
     */
    public function actionSetGroup($id)
    {
        $contact = $this->model->getContact($id);
        $groups = Model::getAll('groups');
        include_once ROOT . '/views/contacts/set-group.php';
        return true;
    }

    /**
     * страница выбора адреса
     * @param $id
     * @return bool
     */
    public function actionSetAddress($id)
    {
        $contact = $this->model->getContact($id);
        $address = Model::getAll('address');
        include_once ROOT.'/views/contacts/set-address.php';
        return true;
    }
}