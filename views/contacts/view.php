<?php include_once ROOT.'/views/layouts/header.php';?>
<div class="container">
    <h3>Просмотр контакта №<?= $contact->id;?></h3><br>

    <a href="/contacts/<?= $contact->id?>/set-user" class="btn btn-default">Пользователи</a>
    <a href="/contacts/<?= $contact->id?>/set-address" class="btn btn-default">Адреса</a>
    <a href="/contacts/<?= $contact->id?>/set-group" class="btn btn-default">Группы</a>
    <a href="/contcts" title="Назад" class="btn btn-default" style="float: right">Назад</a>

    <br><br>

    <form class="form-horizontal" method="post" action="/contacts/update/<?= $contact->user->id;?>">
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
                <input value="<?= $contact->user->firstname; ?>"
                       type="text" class="form-control" name="firstname" id="firstname" placeholder="Имя" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">Фамилия</label>
            <div class="col-sm-10">
                <input value="<?= $contact->user->lastname; ?>"
                       type="text" class="form-control" name="lastname" id="lastname" placeholder="Фамилия" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Телефон</label>
            <div class="col-sm-10">
                <input value="<?= $contact->user->phone; ?>"
                       type="number" class="form-control" name="phone" id="phone" placeholder="Телефон" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="phone2" class="col-sm-2 control-label">Второй телефон</label>
            <div class="col-sm-10">
                <input value="<?= $contact->user->phone2; ?>"
                       type="number" class="form-control" name="phone2" id="phone2" placeholder="Второй телефон" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input value="<?= $contact->user->email; ?>"
                       type="email" class="form-control" name="email" id="email" placeholder="Email" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="company" class="col-sm-2 control-label">Компания</label>
            <div class="col-sm-10">
                <input value="<?= $contact->user->company; ?>"
                       type="text" class="form-control" name="company" id="company" placeholder="Компания" readonly>
            </div>
        </div>
        <?php if (!empty($contact->address)):?>
            <div class="form-group">
                <label for="city" class="col-sm-2 control-label">Город</label>
                <div class="col-sm-10">
                    <input value="<?= $contact->address->city; ?>"
                           type="text" class="form-control" name="city" id="city" placeholder="Город" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Аддрес</label>
                <div class="col-sm-10">
                    <input value="<?= $contact->address->address; ?>"
                           type="text" class="form-control" name="address" id="address" placeholder="Адрес" readonly>
                </div>
            </div>
        <?php endif;?>
        <?php if (!empty($contact->group)):?>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Группа</label>
                <div class="col-sm-10">
                    <input value="<?= $contact->group->name; ?>"
                           type="text" class="form-control" name="name" id="name" placeholder="Группа" readonly>
                </div>
            </div>
        <?php endif;?>
    </form>
</div>

<div class="container text-right">
</div>
<?php include_once ROOT.'/views/layouts/footer.php';?>

