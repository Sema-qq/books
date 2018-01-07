<?php include_once ROOT.'/views/layouts/header.php';?>

    <div class="panel-body">
        <br><a href="/users/create" class="btn btn-default">Создать</a>
    </div>

    <div class="container">
        <?php if(!empty($users)):?>
            <table class="table">
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Телефон</th>
                    <th>Телефон 2</th>
                    <th>Email</th>
                    <th>Компания</th>
                    <th></th>
                </tr>
                <?php foreach($users as $user):?>
                    <tr>
                        <td><?= $user->id;?></td>
                        <td><?= $user->firstname;?></td>
                        <td><?= $user->lastname;?></td>
                        <td><?= $user->phone;?></td>
                        <td><?= $user->phone2;?></td>
                        <td><?= $user->email;?></td>
                        <td><?= $user->company;?></td>
                        <td>
                            <a href="/users/delete/<?= $user->id?>" title="Удалить" onclick="return confirm('Уверены?')">&#10006;</a>
                            <a href="/users/<?= $user->id?>" title="Просмотр">&#9672;</a>
                            <a href="/users/edit/<?= $user->id?>" title="Редактировать">&#9998;</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <h2>Пользователи отсутствуют!</h2>
        <?php endif;?>
    </div>

    <div class="container">
        <?= ($total > Model::COUNT) ? $pagination->get() : '';?>
    </div>

<?php include_once ROOT.'/views/layouts/footer.php';?>