<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Корзина</h2>
            </div>
        </div>
        <div class="row">  
            <div class="col-sm-8 col-sm-offset-2">                  
                    <?php if ($productsInCart){ ?>
                        <p>Выбранные товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Название</th>
                                <th>Стомость, руб.</th>
                                <th>Количество, шт</th>
                                <th>Удалить</th>
                            </tr>
                            <?php foreach ($products as $product){
                                echo <<<HERE
                                <tr>
                                    <td>
                                        <a href="/product/{$product['id']}">
                                            {$product['title']}
                                        </a>
                                    </td>
                                    <td>{$product['price']}</td>
                                    <td>{$productsInCart[$product['id']]}</td> 
                                    <td>
                                        <a href="/cart/delete/{$product['id']}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
HERE;
                                } ?>
                                <tr>
                                    <td colspan="3">Общая стоимость, руб:</td>
                                    <td><?php echo $totalPrice;?></td>
                                </tr>
                            
                        </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">                        
                <a class="btn btn-default checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
            </div>
            <div class="col-sm-4">
                <a class="btn btn-default  pull-right" href="/cart/deleteall"><i class="fa fa-shopping-cart"></i> Очистить корзину</a>
            </div>
        </div>
                            <?php
                        }
                        else {?>
                        <p>Корзина пуста</p>                        
                        <a class="btn btn-default" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>

                    <?php } ?>       
                
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>