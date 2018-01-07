<?php

/**
 * Class AddressController
 */
class AddressController extends Controller
{
    /**
     * Модель адресов
     * @var object Address model
     */
    protected $model;

    /**
     * AddressController constructor.
     */
    public function __construct()
    {
        $this->model = new Address();
    }

    /**
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        $total = $this->model->getAdressCount();
        $pagination = new Pagination(
            $total,
            $page,
            Model::COUNT,
            Model::INDEX
        );
        $address = $this->model->getAllAddress((int)$page);
        include_once ROOT . '/views/address/index.php';
        return true;
    }

    /**
     * @return bool
     */
    public function actionCreate()
    {
        include_once ROOT . '/views/address/create.php';
        return true;
    }

    /**
     * @return bool
     */
    public function actionStore()
    {
        if (!empty($_POST)) {
            $insertId = $this->model->createAddress($_POST);
            header("Location: /address/$insertId");
            return true;
        }
        header("Location: /address/create");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        if ($id) {
            $this->model->deleteAddress($id);
        }
        header("Location: /address");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionEdit($id)
    {
        if ($id) {
            $addr = $this->model->getAddress($id);
            include_once ROOT . '/views/address/edit.php';
            return true;
        }
        header("Location: /address");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        if (!empty($_POST)) {
            if ($this->model->updateAddress($id, $_POST)) {
                header("Location: /address/$id");
                return true;
            }
        }
        header("Location: /address/edit/$id");
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionShow($id)
    {
        if ($id) {
            $addr = $this->model->getAddress($id);
            include_once ROOT . '/views/address/view.php';
            return true;
        }
        header("Location: /address");
        return true;
    }
}