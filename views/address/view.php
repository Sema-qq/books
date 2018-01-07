<?php include_once ROOT.'/views/layouts/header.php';?>

<div class="container">
    <h3>Просмотр адреса №<?= $addr->id;?></h3><br>

    <form class="form-horizontal" method="post" action="/address/update/<?= $addr->id;?>">
        <div class="form-group">
            <label for="city" class="col-sm-2 control-label">Город</label>
            <div class="col-sm-10">
                <input value="<?= $addr->city; ?>"
                       type="text" class="form-control" name="city" id="city" placeholder="Город" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Адрес</label>
            <div class="col-sm-10">
                <input value="<?= $addr->address; ?>"
                       type="text" class="form-control" name="address" id="address" placeholder="Адрес" readonly>
            </div>
        </div>
    </form>
</div>

<div class="container text-right">
    <a href="/address/edit/<?= $addr->id?>" title="Назад" class="btn btn-default" >Редактировать</a>
    <a href="/address" title="Назад" class="btn btn-default">Назад</a>
</div>
<?php include_once ROOT.'/views/layouts/footer.php';?>

