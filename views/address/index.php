<?php include_once ROOT.'/views/layouts/header.php';?>

    <div class="panel-body">
        <br><a href="/address/create" class="btn btn-default">Создать</a>
    </div>

    <div class="container">
        <?php if(!empty($address)):?>
            <table class="table">
                <tr>
                    <th>№</th>
                    <th>Город</th>
                    <th>Адрес</th>
                    <th></th>
                </tr>
                <?php foreach($address as $addr):?>
                    <tr>
                        <td><?= $addr->id;?></td>
                        <td><?= $addr->city;?></td>
                        <td><?= $addr->address;?></td>
                        <td>
                            <a href="/address/delete/<?= $addr->id?>" title="Удалить" onclick="return confirm('Уверены?')">&#10006;</a>
                            <a href="/address/<?= $addr->id?>" title="Просмотр">&#9672;</a>
                            <a href="/address/edit/<?= $addr->id?>" title="Редактировать">&#9998;</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <h2>Нет созданных адресов!</h2>
        <?php endif;?>
    </div>

    <div class="container">
        <?= ($total > Model::COUNT) ? $pagination->get() : '';?>
    </div>

<?php include_once ROOT.'/views/layouts/footer.php';?>