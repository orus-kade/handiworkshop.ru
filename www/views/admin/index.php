<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class='col-sm-12'>
                <h2 class="title">Панель администратора</h2>
            </div>      
            <div class="col-sm-8 col-sm-offset-2">
                <h3>Добрый день, администратор!</h3>
                <p>Вам доступны такие возможности:</p>
                <ul class="nav">
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li><a href="/admin/user">Управление пользователями</a></li>
                </ul>
            </div>   
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>