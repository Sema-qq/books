<?php

/**
 * Class GroupController
 */
class GroupController extends Controller
{
    /**
     * Модель пользователей
     * @var object Group model
     */
    protected $model;

    /**
     * GroupController constructor.
     */
    public function __construct()
    {
        $this->model = new Group();
    }

    /**
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        $total = $this->model->getGroupsCount();
        $pagination = new Pagination(
            $total,
            $page,
            Model::COUNT,
            Model::INDEX
        );
        $groups = $this->model->getGroups((int)$page);
        include_once ROOT . '/views/groups/index.php';
        return true;
    }

    /**
     * @return bool
     */
    public function actionCreate()
    {
        include_once ROOT . '/views/groups/create.php';
        return true;
    }

    /**
     * @return bool
     */
    public function actionStore()
    {
        if (!empty($_POST)) {
            $insertId = $this->model->createGroup($_POST);
            header("Location: /groups/$insertId");
            return true;
        }
        header("Location: /groups/create");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        if ($id) {
            if ($this->model->deleteGroup($id)) {
                header("Location: /groups");
                return true;
            }
        }
        header("Location: /groups");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionEdit($id)
    {
        if ($id) {
            $group = $this->model->getGroup($id);
            include_once ROOT . '/views/groups/edit.php';
            return true;
        }
        header("Location: /groups");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        if (!empty($_POST)) {
            if ($this->model->updateGroup($id, $_POST)) {
                header("Location: /groups/$id");
                return true;
            }
        }
        header("Location: /groups/edit/$id");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionShow($id)
    {
        if ($id) {
            if (!empty($_POST['getContacts'])){
                //контакты текущей группы
                $contacts = $this->model->getContactsCurrentGroup($id);
                !$contacts ? $contacts = [] : null;
            }
            //текущая группа
            $group = $this->model->getGroup($id);
            include_once ROOT . '/views/groups/view.php';
            return true;
        }
        header("Location: /groups");
        return true;
    }
}