<?php include_once ROOT.'/views/layouts/header.php';?>

<div class="container">
    <h3>Адреса</h3>
    <br>
    <form class="form-horizontal" method="post" action="/contacts/update/<?= $contact->id;?>">
        <input type="hidden" name="user_id" value="<?= $contact->user_id;?>">
        <input type="hidden" name="group_id" value="<?= !empty($contact->group) ? $contact->group_id : 'NULL';?>">
        <div class="form-group">
            <select class="form-control" name="address_id">
                <?php foreach ($address as $addr):?>
                    <option value="<?= $addr->id?>">
                        <?= $addr->city.' '.$addr->address;?>
                    </option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <div class="col-sm-12 text-right">
                <br>
                <input type="submit" class="btn btn-default" value="Выбрать">
                <a href="/conatacts/<?= $contact->id;?>" title="Назад" class="btn btn-default text-right">Назад</a>
            </div>
        </div>
    </form>
</div>

<?php include_once ROOT.'/views/layouts/footer.php';?>

