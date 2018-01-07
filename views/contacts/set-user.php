<?php include_once ROOT.'/views/layouts/header.php';?>

    <div class="container">
        <h3>Пользователи</h3>
        <br>
        <form class="form-horizontal" method="post" action="/contacts/update/<?= $contact->id;?>">
            <input type="hidden" name="address_id" value="<?= !empty($contact->address) ? $contact->address_id : 'NULL';?>">
            <input type="hidden" name="group_id" value="<?= !empty($contact->group) ? $contact->group_id : 'NULL';?>">
            <div class="form-group">
                <select class="form-control" name="user_id">
                    <?php foreach ($users as $user):?>
                        <option value="<?= $user->id?>">
                            <?= $user->firstname.' '.$user->lastname.' '.$user->phone;?>
                            <?= ' '.$user->phone2.' '.$user->email.' '.$user->company;?>
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