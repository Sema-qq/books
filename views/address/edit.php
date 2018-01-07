<?php include_once ROOT.'/views/layouts/header.php';?>

<div class="container">
    <h3>Редактирование адреса №<?= $addr->id; ?></h3>

    <form class="form-horizontal" method="post" action="/address/update/<?= $addr->id;?>">
        <div class="form-group">
            <label for="city" class="col-sm-2 control-label">Город*</label>
            <div class="col-sm-10">
                <input value="<?= $addr->city; ?>"
                       type="text"
                       class="form-control"
                       name="city"
                       id="city"
                       placeholder="Город"
                       maxlength="50"
                       required>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Адрес</label>
            <div class="col-sm-10">
                <input value="<?= $addr->address; ?>"
                       type="text"
                       class="form-control"
                       name="address"
                       id="address"
                       maxlength="100"
                       placeholder="Адрес">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default" value="Сохранить">
            </div>
        </div>
    </form>
</div>

<?php include_once ROOT.'/views/layouts/footer.php';?>

