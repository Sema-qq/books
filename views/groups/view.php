<?php include_once ROOT . '/views/layouts/header.php';?>

<div class="container">
    <h3>Просмотр группы <?= $group->name;?></h3><br>

    <form class="form-horizontal" method="post" action="/groups/<?= $group->id;?>">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Название</label>
            <div class="col-sm-10">
                <input value="<?= $group->name; ?>"
                       type="text"
                       class="form-control"
                       name="name"
                       id="name"
                       placeholder="Имя"
                       readonly>
            </div>
        </div>
    </form>
</div>

<div class="container text-right">
    <form action="/groups/<?= $group->id?>" method="post">
        <input type="submit"
               class="btn btn-default"
               name="<?= isset($contacts) ? 'hideContacts' : 'getContacts'; ?>"
               value="<?= isset($contacts) ? 'Скрыть контакты' : 'Показать контакты';?>">
        <a href="/groups/edit/<?= $group->id?>" title="Редактировать" class="btn btn-default" >Редактировать</a>
        <a href="/groups" title="Назад" class="btn btn-default">Назад</a>
    </form>
</div>

<?php if (isset($contacts)):?>
    <br>
    <div class="container">
        <?php if(!empty($contacts)):?>
            <table class="table">
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Телефон</th>
                    <th>Телефон 2</th>
                    <th>Email</th>
                    <th>Компания</th>
                </tr>
                <?php foreach($contacts as $contact):?>
                    <tr>
                        <td><?= $contact->id;?></td>
                        <td><?= $contact->firstname;?></td>
                        <td><?= $contact->lastname;?></td>
                        <td><?= $contact->phone;?></td>
                        <td><?= $contact->phone2;?></td>
                        <td><?= $contact->email;?></td>
                        <td><?= $contact->company;?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <h3>Контакты у данной группы отсутствуют!</h3>
        <?php endif;?>
    </div>
<?php endif;?>
<?php include_once ROOT . '/views/layouts/footer.php';?>

