<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Просмотр заказов</h2>
            </div>
            <div class="col-sm-12">
                <?php if (empty($orders)) {
                    echo "<h4>Заказов нет</h4>";
                }
                else{
                    ?>
                <table class="table-admin-medium table-bordered table-striped table ">
                    <tr>
                        <th>ID заказа</th>
                        <th>Дата</th>
                        <th>Статус</th>
                        <th>Стоимость заказа, руб.</th>
                        <th>ID товара</th>
                        <th>Название</th>
                        <th>Кол-во, шт.</th>
                        <th>Цена, руб.</th>                       
                        <th>Стоимость, руб.</th>
                    </tr>
                    <tr>
                    <?php foreach ($orders as $order){ ?>                        
                            <td rowspan="<?php echo $order['productsCount'];?>"><?php echo $order['id']; ?></td>
                            <td rowspan="<?php echo $order['productsCount'];?>"><?php echo $order['time']; ?></td>
                            <td rowspan="<?php echo $order['productsCount'];?>"><?php echo  Order::getTextStatus($order['status']);?></td>
                            <td rowspan="<?php echo $order['productsCount'];?>"><?php echo $order['totalPrice']; ?></td>
                        <?php foreach ($order['products'] as $product) { ?>
                                <td><a href = "/product/<?php echo $product['product_id']; ?>"><?php echo $product['product_id']; ?></a></td>
                                <td><?php echo $product['title']; ?></td>
                                <td><?php echo $product['count']; ?></td>
                                <td><?php echo $product['price']; ?></td>
                                <td><?php echo $product['totalPrice']; ?></td>
                            </tr>
                            <tr>
                        <?php } ?>
                    <?php }  } ?>
                </table>
            </div>
        </div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>
