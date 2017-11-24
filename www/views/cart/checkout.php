<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
           

            <div class="col-sm-12">
                <div class="features_items">
                    <h2 class="title">Корзина</h2> 
                            <div class="col-sm-8 col-sm-offset-2">
                                <?php if(!$result) {?>
                                <p>Выбрано товаров: <?php echo $totalCount; ?>, на сумму: <?php echo $totalPrice; ?> руб.</p><br/>

                                <p>Для оформления заказа заполните форму, если данные в ней неправильные. Мы свяжемся с Вами.</p>

                                <div class="form">
                                    <form action="#" method="post">
                                        <p>Ваша имя</p>
                                        <label id="labelName" class="hidden">Имя должно быть не короче 2-х символов!</label>
                                        <input type="text" name="name" placeholder="" value="<?php echo $userName; ?>"/>
                                        <p>Номер телефона</p>
                                        <label id="labelPhone" class="hidden">Неправильный формат номера телефона! 8(+7)-000-000-00-00</label>
                                        <input type="text" name="phone" placeholder="Телефон 8(+7)-000-000-00-00" value="<?php if($userPhone != "") echo $userPhone; ?>"/>
                                        <br/>
                                        <br/>
                                        <input type="submit" name="submit" class="btn btn-default" value="Оформить" />
                                    </form>
                                </div>
                            </div>
                        <?php }
                        else {?>
                        	<p>Заказы оформлены. Мы свяжемся с Вами!</p>
                        <?php } ?>
                </div>

            </div>
        </div>
    </div>
</section>
<script src="/js/checkout.js"></script>


<?php include ROOT . '/views/layouts/footer.php'; ?>