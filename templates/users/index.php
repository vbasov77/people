<?php include __DIR__ . '/../layouts/header.php'; ?>
    <div>
        <a type="summit" href="user/create">Добавить юзера </a>
        <a type="summit" href="/active">Кто в сети </a>

    </div>
    <section style="margin-top: 40px" class="section text-center">
        <div class="container-fluid px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <br>
                <?php if (!empty(count($users))): ?>
                    <?php foreach ($users as $user): ?>
                        <div class="card" style="width: 18rem; margin: 5px">
                            <h1><?= $user->id ?></h1>
                            <div class="card-body">
                                ФИО: <?= $user->fio ?><br>
                                Логин: <?= $user->login ?><br>
                                active: <?= $user->active ?><br>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-outline-success"
                                        onclick="window.location.href = 'update/<?= $user->id ?>';">
                                    Редактировать
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                Нет пользователей
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php include __DIR__ . '/../layouts/footer.php'; ?>