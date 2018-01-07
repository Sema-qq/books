<?php include_once ROOT.'/views/layouts/header.php';?>

    <div class="panel-body">
        <br><a href="/contacts/create" class="btn btn-default" title="Добавить контакт">&#10010;</a>
    </div>

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
                    <th>Город</th>
                    <th>Адрес</th>
                    <th>Группа</th>
                    <th></th>
                </tr>
                <?php foreach($contacts as $contact):?>
                    <tr>
                        <td><?= $contact->id;?></td>
                        <td><?= $contact->user->firstname;?></td>
                        <td><?= $contact->user->lastname;?></td>
                        <td><?= $contact->user->phone;?></td>
                        <td><?= $contact->user->phone2;?></td>
                        <td><?= $contact->user->email;?></td>
                        <td><?= $contact->user->company;?></td>
                        <td><?= !empty($contact->address) ? $contact->address->city : null;?></td>
                        <td><?= !empty($contact->address) ? $contact->address->address : null;?></td>
                        <td><?= !empty($contact->group) ? $contact->group->name : null;?></td>
                        <td>
                            <a href="/contacts/delete/<?= $contact->id?>" title="Удалить" onclick="return confirm('Уверены?')">&#10006;</a>
                            <a href="/contacts/<?= $contact->id?>" title="Просмотр">&#9672;</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <h2>Контактов пока что нет!</h2>
        <?php endif;?>
    </div>

    <div class="container">
        <?= ($total > Model::COUNT) ? $pagination->get() : '';?>
    </div>

<?php include_once ROOT.'/views/layouts/footer.php';?>