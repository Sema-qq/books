<?php include_once ROOT.'/views/layouts/header.php';?>

<div class="container">
    <h3>Создание адреса</h3>

    <form class="form-horizontal" method="post" action="/address/store">
        <div class="form-group">
            <label for="city" class="col-sm-2 control-label">Город*</label>
            <div class="col-sm-10">
                <input value="<?= !empty($_POST['city']) ? $_POST['city'] : ''; ?>"
                       type="text"
                       class="form-control"
                       name="city"
                       id="city"
                       placeholder="Город"
                       maxlength="100"
                       required>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Адрес</label>
            <div class="col-sm-10">
                <input value="<?= !empty($_POST['address']) ? $_POST['address'] : ''; ?>"
                       type="text"
                       class="form-control"
                       name="address"
                       id="address"
                       maxlength="500"
                       placeholder="Адрес">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default" value="Создать">
            </div>
        </div>
    </form>
</div>

<?php include_once ROOT.'/views/layouts/footer.php';?>

