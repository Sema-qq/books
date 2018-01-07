<?php include_once ROOT.'/views/layouts/header.php';?>

    <div class="panel-body">
        <br><a href="/groups/create" class="btn btn-default">Создать</a>
    </div>

    <div class="container">
        <?php if(!empty($groups)):?>
            <table class="table">
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th></th>
                </tr>
                <?php foreach($groups as $group):?>
                    <tr>
                        <td><?= $group->id;?></td>
                        <td><?= $group->name;?></td>
                        <td>
                            <a href="/groups/delete/<?= $group->id?>" title="Удалить" onclick="return confirm('Уверены?')">&#10006;</a>
                            <a href="/groups/<?= $group->id?>" title="Просмотр">&#9672;</a>
                            <a href="/groups/edit/<?= $group->id?>" title="Редактировать">&#9998;</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <h2>Группы еще не созданы!</h2>
        <?php endif;?>
    </div>

    <div class="container">
        <?= ($total > Model::COUNT) ? $pagination->get() : '';?>
    </div>

<?php include_once ROOT.'/views/layouts/footer.php';?>