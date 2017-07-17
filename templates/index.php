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

    Вы вошли как <a href="/profile"><?= $profile->name ?? 'гость' ?></a>
    <a href="/auth"><?php $profile->name ?? print('Ввойти') ?></a>
    <a href="/auth/logout"><?php if(isset($profile)) echo 'Выйти' ?></a>

    <div class="panel">
        Сортировать по:
        <a href="/main/default/?short=login">Логину</a>
        <a href="/main/default/?short=name">ФИО</a>
        <a href="/main/default/?short=email">email'у</a>

        <a href="/main/default/?short=adminOnly">Только администраторы</a>
    </div>

    <?php foreach($users as $val): ?>
        <div class="panel">
            <a href="main/one/?id=<?= $val->id ?>"><?= $val->name ?></a>
            <?= $val->email ?>
            <?= $val->roleName ?>
        </div>
    <?php endforeach; ?>

</div>
</body>
</html>