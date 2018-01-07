<?php

/**
 * Class UserController
 */
class UserController extends Controller
{
    /**
     * Модель пользователей
     * @var object User model
     */
    protected $model;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        $total = $this->model->getUsersCount();
        $pagination = new Pagination(
            $total,
            $page,
            Model::COUNT,
            Model::INDEX
        );
        $users = $this->model->getUsers((int)$page);
        include_once ROOT . '/views/users/index.php';
        return true;
    }

    /**
     * @return bool
     */
    public function actionCreate()
    {
        include_once ROOT . '/views/users/create.php';
        return true;
    }

    /**
     * @return bool
     */
    public function actionStore()
    {
        if (!empty($_POST)) {
            $insertId = $this->model->createUser($_POST);
            header("Location: /users/$insertId");
            return true;
        }
        header("Location: /users/create");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        if ($id) {
            $this->model->deleteUser($id);
        }
        header("Location: /users");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionEdit($id)
    {
        if ($id) {
            $user = $this->model->getUser($id);
            include_once ROOT . '/views/users/edit.php';
            return true;
        }
        header("Location: /users");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        if (!empty($_POST)) {
            if ($this->model->updateUser($id, $_POST)) {
                header("Location: /users/$id");
                return true;
            }
        }
        header("Location: /users/edit/$id");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionShow($id)
    {
        if ($id) {
            $user = $this->model->getUser($id);
            include_once ROOT . '/views/users/view.php';
            return true;
        }
        header("Location: /users");
        return true;
    }
}