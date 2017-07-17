<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <title>Document</title>
</head>
<body>


<div class="row">
    <div class="container">
        <form action="/admin/save" method="post">

            <div class="col-md-6 col-md-offset-3">


                    <input type="hidden" name="id" value="<?= $user->id ?>">

                    <div class="form-group">
                        <input type="text"  name="name" class="form-control" placeholder="name" value="<?= $user->name ?>">
                    </div>

                    <div class="form-group">
                        <input type="login"  name="login" class="form-control" value="<?= $user->login ?>">
                    </div>

                    <div class="form-group">
                        <input type="password"  name="password" class="form-control" value="<?= $user->password ?>">
                    </div>


                <div class="form-group">
                        <input type="email"  name="email" class="form-control" placeholder="email" value="<?= $user->email ?>">
                    </div>

                    <div class="form-group">
                        <label>Администратор
                            <input type="checkbox"  name="role" class="form-control" <?php if ($user->role == 1) echo 'checked'?>>
                        </label>
                    </div>

                    <input type="submit" class="btn btn-primary btn-lg">

            </div>

        </form>

    </div>
</div>


</body>
</html>