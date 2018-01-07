<?php include_once ROOT.'/views/layouts/header.php';?>

<div class="container">
    <h3>Группы</h3>
    <br>
    <form class="form-horizontal" method="post" action="/contacts/update/<?= $contact->id;?>">
        <input type="hidden" name="user_id" value="<?= $contact->user_id;?>">
        <input type="hidden" name="address_id" value="<?= !empty($contact->address) ? $contact->address_id : 'NULL';?>">
        <div class="form-group">
            <select class="form-control" name="group_id">
                <?php foreach ($groups as $group):?>
                    <option value="<?= $group->id?>">
                        <?= $group->name;?>
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

