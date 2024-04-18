<?php include __DIR__ . '/../layouts/header.php'; ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php if (!empty($_SESSION['errors'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['errors'];
                        unset($_SESSION['errors']); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="/user/edit">
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <label for="fio">ФИО</label><br>
                    <input class="form-control" placeholder="ФИО" type="text" name="fio" value="<?= $user->fio ?? "" ?>"
                           size="50"><br>
                    <br>
                    <label for="login">Login</label><br>
                    <input class="form-control" placeholder="login" type="text" name="login"
                           value="<?= $user->login ?? "" ?>"
                           size="50"><br>

                    <br>
                    <label for="password">password</label><br>
                    <input class="form-control" placeholder="password" type="password" name="password" value="100"
                           size="50"><br>
                    <br>
                    <label for="birth">Дата рождения</label><br>
                    <input class="form-control" placeholder="birth" type="text" name="birth"
                           value="<?= $user->birth ?? "" ?>"
                           size="50"><br>

                    <br>
                    <label for="active">active</label><br>
                    <input class="form-control" placeholder="active" type="text" name="active"
                           value="<?= $user->active ?? "" ?>"
                           size="50"><br>
                    <br>
                    <input class="form_button" type="submit" value="Обновить">
                </form>

            </div>
        </div>
    </div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>