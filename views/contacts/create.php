<?php include_once ROOT.'/views/layouts/header.php';?>

<div class="container">
    <h3>Создать нового пользователя</h3>
    <a href="/contacts/add/user" title="Выбрать из существующих" class="btn btn-default">Выбрать пользователя</a>
    <br><br>

    <form class="form-horizontal" method="post" action="/contacts/store">
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">Имя*</label>
            <div class="col-sm-10">
                <input value="<?= !empty($_POST['firstname']) ? $_POST['firstname'] : ''; ?>"
                       type="text"
                       class="form-control"
                       name="firstname"
                       id="firstname"
                       placeholder="Имя"
                       maxlength="50"
                       required>
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">Фамилия</label>
            <div class="col-sm-10">
                <input value="<?= !empty($_POST['lastname']) ? $_POST['lastname'] : ''; ?>"
                       type="text"
                       class="form-control"
                       name="lastname"
                       id="lastname"
                       maxlength="100"
                       placeholder="Фамилия">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Телефон*</label>
            <div class="col-sm-10">
                <input value="<?= !empty($_POST['phone']) ? $_POST['phone'] : ''; ?>"
                       type="number"
                       class="form-control"
                       name="phone"
                       id="phone"
                       placeholder="Телефон"
                       maxlength="11"
                       required>
            </div>
        </div>
        <div class="form-group">
            <label for="phone2" class="col-sm-2 control-label">Второй телефон</label>
            <div class="col-sm-10">
                <input value="<?= !empty($_POST['phone2']) ? $_POST['phone2'] : ''; ?>"
                       type="number"
                       class="form-control"
                       name="phone2"
                       id="phone2"
                       maxlength="11"
                       placeholder="Второй телефон">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input value="<?= !empty($_POST['email']) ? $_POST['email'] : ''; ?>"
                       type="email"
                       class="form-control"
                       name="email"
                       id="email"
                       maxlength="50"
                       placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="company" class="col-sm-2 control-label">Компания</label>
            <div class="col-sm-10">
                <input value="<?= !empty($_POST['company']) ? $_POST['company'] : ''; ?>"
                       type="text"
                       class="form-control"
                       name="company"
                       id="company"
                       maxlength="100"
                       placeholder="Компания">
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

