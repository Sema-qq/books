<?php include_once ROOT.'/views/layouts/header.php';?>

<div class="container">
    <h3>Существующие пользователи</h3>
    <br>
    <form class="form-horizontal" method="post" action="/contacts/store">
        <div class="form-group">
            <select class="form-control" name="userId">
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
                <input type="submit" class="btn btn-default" value="Добавить">
                <a href="/conatacts/create" title="Назад" class="btn btn-default text-right">Назад</a>
            </div>
        </div>
    </form>
</div>

<?php include_once ROOT.'/views/layouts/footer.php';?>

