<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <title>Пользователи</title>
</head>
<body>

<div class="container">
    <?php foreach($users as $val): ?>
        <div class="panel">
            <a href="main/one/?id=<?= $val->id ?>"><?= $val->name ?></a>
            <?= $val->login ?>
            <?= $val->password ?>
            <?= $val->email ?>
            <?= $val->roleName ?>
            <a href="admin/edit/?id=<?= $val->id ?>">Редактировать</a>
            <a href="admin/delete/?id=<?= $val->id ?>">Удалить</a>
        </div>
    <?php endforeach; ?>

    <a href="admin/add">+ Добавить пользователя</a>
</div>
</body>
</html>