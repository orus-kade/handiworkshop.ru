<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Кабинет пользователя</h2>
            </div>
            <div class="col-sm-8 col-sm-offset-2">            	
            	<h3>Здравствуйте, <?php echo $user['name']?>!</h3>
            	<ul class="nav user-menu">
            		<li><a href = "/cabinet/edit">Редактировать данные</a></li>
            		<li><a href = "/user/orders">Заказы</a></li>
            	</ul>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>