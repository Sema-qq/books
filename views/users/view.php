<?php include_once ROOT.'/views/layouts/header.php';?>

<div class="container">
    <h3>Просмотр пользователя <?= $user->firstname;?></h3><br>

    <form class="form-horizontal" method="post" action="/users/update/<?= $user->id;?>">
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
                <input value="<?= $user->firstname; ?>"
                       type="text" class="form-control" name="firstname" id="firstname" placeholder="Имя" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">Фамилия</label>
            <div class="col-sm-10">
                <input value="<?= $user->lastname; ?>"
                       type="text" class="form-control" name="lastname" id="lastname" placeholder="Фамилия" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Телефон</label>
            <div class="col-sm-10">
                <input value="<?= $user->phone; ?>"
                       type="number" class="form-control" name="phone" id="phone" placeholder="Телефон" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="phone2" class="col-sm-2 control-label">Второй телефон</label>
            <div class="col-sm-10">
                <input value="<?= $user->phone2; ?>"
                       type="number" class="form-control" name="phone2" id="phone2" placeholder="Второй телефон" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input value="<?= $user->email; ?>"
                       type="email" class="form-control" name="email" id="email" placeholder="Email" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="company" class="col-sm-2 control-label">Компания</label>
            <div class="col-sm-10">
                <input value="<?= $user->company; ?>"
                       type="text" class="form-control" name="company" id="company" placeholder="Компания" readonly>
            </div>
        </div>
    </form>
</div>

<div class="container text-right">
    <a href="/users/edit/<?= $user->id?>" title="Назад" class="btn btn-default" >Редактировать</a>
    <a href="/users" title="Назад" class="btn btn-default">Назад</a>
</div>
<?php include_once ROOT.'/views/layouts/footer.php';?>

