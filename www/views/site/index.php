<?php
    include ROOT.'/views/layouts/header.php';
?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="title">Добро пожаловать!</h2>
                        <p>Вы часто задаетесь вопросом,что подарить?Где купить оригинальный подарок?Как удивить?Как выделиться из толпы?</p>
                        <p>Много готовых творений ждут своих новых хозяев! Также можно заказать любое полюбившееся изделие. Каждая вещь, созданная вручную уникальна,точный повтор не возможен.</p>
                        <p>Мы создадим для Вас любое изделие в соответствии с Вашими пожеланиями. Представленные на сайте товары являются примерами  изделий. Каждый заказ обсуждается индивидуально с клиентом, стоимоеть товаров может изменяться, в зависимости от деталей, выбранных заказчиком.</p>
                        <p>Если Вы не нашли в каталоге товаров именно тех, что хотели, то не расстраивайтесь, пишите нам. Мы с радостью сделаем для Вас что-то новое, необычное. Может быть, Ваша идея или мечта станет отличным подарком для других людей.</p>
                        <p class = "important">Мы гарантируем качественную работу и индивидуальный поход к каждому покупателю!</p>

                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="title">Новые товары</h2>
                    </div>
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="products"><!--products-->                            
                                <?php foreach ($products as $product) { 
                                ?>
                                        <div class="col-sm-4">                              
                                            <div class="single-product">
                                                    <div class="image">
                                <?php $img = '/images/products/product'.$product['id'].'.jpg';
                                    if (!file_exists(ROOT.$img))
                                        $img =  '/images/main/no_image.png';
                                ?>
                                                        <img src="<?php echo $img;?>" class="product-image"/>
                                            <?php 
                                                    if ($product['is_new']) 
                                                    echo "<img src='/images/main/new.png' class = 'new'>";
                                                    echo <<<HERE
                                                    </div> 
                                                 
                                                <h2><a href ="/product/{$product['id']}" class= "product-view">{$product['title']}</a></h2>
                                                <h2>{$product['price']} рублей</h2>  
                                                
                                                <a href="#" id = "{$product['id']}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> В корзину</a> 
                                            </div>
                                        </div>
HERE;
                                }  ?>
                        </div><!--products-->
                    </div>
                </div>
            </div>
        </section>
<?php
    include ROOT.'/views/layouts/footer.php';
?>

