<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Редактировать данные пользователя</h2>
            </div>
        </div>
        <div class="row"> 
            <div class="col-sm-6 col-sm-offset-1">
                <h3>Редактировать данные пользователя #<?php echo $id; ?></h3>
                <div class="admin-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Имя</p>
                        <label id="labelName" class="hidden">Имя должно быть не короче 2-х символов!</label>
                        <input type="text" name="name" placeholder="" value="<?php echo $user['name']; ?>">
                        <p>Телефон</p>
                        <label id="labelPhone" class="hidden">Неправильный формат номера телефона! 8(+7)-000-000-00-00</label>
                        <input type="text" name="ph_number" placeholder="" value="<?php echo $user['ph_number']; ?>">
                        <p>Email</p>
                        <label id="labelEmail" class="hidden">Неправильный email! (example@email.com)</label>
                        <input type="text" name="email" placeholder="E-mail" value="<?php echo $user['email'];?>"/>
                        <p>Администратор</p>
                        <input type="checkbox" name="admin" 
                            <?php if ($user['admin']) 
                                echo "checked";
                            ?>
                        >
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить"> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src='/js/editUser.js'></script>

<?php include ROOT . '/views/layouts/footer.php'; ?>

