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

                <form method="post" action="/user/store">
                    <label for="fio">ФИО</label><br>
                    <input class="form-control" placeholder="ФИО" type="text" name="fio"
                           value="<?= $_POST['fio'] ?? "" ?>"
                           size="50"><br>
                    <br>
                    <label for="login">Login</label><br>
                    <input class="form-control" placeholder="login" type="text" name="login"
                           value="<?= $_POST['login'] ?? "" ?>"
                           size="50"><br>

                    <br>
                    <label for="password">password</label><br>
                    <input class="form-control" placeholder="password" type="password" name="password" value=""
                           size="50"><br>
                    <br>
                    <label for="birth">Дата рождения</label><br>
                    <input class="form-control" placeholder="birth" type="text" name="birth"
                           value="<?= $_POST['birth'] ?? "" ?>"
                           size="50"><br>

                    <br>
                    <label for="active">active</label><br>
                    <input class="form-control" placeholder="active" type="text" name="active"
                           value="<?= $_POST['active'] ?? "" ?>"
                           size="50"><br>
                    <br>
                    <input type="submit" value="Создать">
                </form>
            </div>
        </div>
    </div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>