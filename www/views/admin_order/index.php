<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Управление заказами</h2>
            </div>
        </div>
        <div class="row">
             <div class="col-sm-12">
                <h3>Список заказов</h3>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID заказа</th>
                        <th>Имя покупателя</th>
                        <th>Телефон покупателя</th>
                        <th>Дата</th>
                        <th>Статус</th>
                        <th>Стоимость, руб.</th>
                        <th>Просмотреть</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach ($orders as $order){ ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['name']; ?></td>
                            <td><?php echo $order['ph_number']; ?></td>  
                            <td><?php echo $order['time']; ?></td> 
                            <td><?php echo Order::getTextStatus($order['status']); ?></td> 
                            <td><?php echo $order['totalPrice']; ?></td>  
                            <td><a href="/admin/order/view/<?php echo $order['id']; ?>" id = "a1" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                            <td><a href='/admin/order/delete/<?php echo $order['id']; ?>''title='Удалить''><i class='fa fa-times'></i></a
                            ></td>     
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>



