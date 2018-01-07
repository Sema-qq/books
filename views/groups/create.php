<?php include_once ROOT . '/views/layouts/header.php';?>

<div class="container">
    <h3>Создание группы</h3>

    <form class="form-horizontal" method="post" action="/groups/store">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Название*</label>
            <div class="col-sm-10">
                <input value="<?= !empty($_POST['name']) ? $_POST['name'] : ''; ?>"
                       type="text"
                       class="form-control"
                       name="name"
                       id="name"
                       placeholder="Название группы"
                       maxlength="500"
                       required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default" value="Создать">
            </div>
        </div>
    </form>
</div>

<?php include_once ROOT . '/views/layouts/footer.php';?>

