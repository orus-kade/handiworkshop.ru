<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Просмотр заказов</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <h3>Просмотр заказа #<?php echo $order['id']; ?></h3>
            <h5>Информация о клиента</h5>
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>ID клиента</td>
                    <td><?php echo $order['user_id']; ?></td>
                </tr>
                <tr>
                    <td>Имя клиента</td>
                    <td><?php echo $order['name']; ?></td>
                </tr>
                <tr>
                    <td>Телефон клиента</td>
                    <td><?php echo $order['ph_number']; ?></td>
                </tr>
                <tr>
                    <td>Email клиента</td>
                    <td><?php echo $order['email']; ?></td>
                </tr>
            </table>
            <h5>Информация о заказе</h5>
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>ID заказа</td>
                    <td colspan="2"><?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <td>Дата</td>
                    <td colspan="2"><?php echo $order['time']; ?></td> 
                </tr>
                <tr>
                    <td>Статус</td>
                    <form action="/admin/order/editstatus/<?php echo $order['id']; ?>" method="post">
                    <td>   
                            <select name="status">
                                <?php for ($i=1; $i<=4; $i++){ ?>
                                <option value="<?php echo $i;?>" 
                                    <?php if  ($order['status']==$i) {
                                        echo 'selected';
                                        }?>>
                                    <?php echo  Order::getTextStatus($i);?>
                                </option>
                                <?php } ?>
                            </select>
                        </td>
                    <td><button type="submit" name = "submit" id = "status" title="Редактировать"><a><i class="fa fa-pencil-square-o"></i></a></button></td>
                    </form>
                </tr>
                <tr>
                    <td>Стоимость, руб.</td>
                    <td colspan="2"><?php echo $order['totalPrice']; ?></td>  
                </tr>
            </table>
            <label id = "labelCount" class = "hidden">Неправильное количество товара!</label>
            <h5>Товары</h5>
            <table class="table-admin-medium table-bordered table-striped table ">
                <tr>
                    <th>ID товара</th>
                    <th>Название</th>
                    <th>Цена, руб.</th>
                    <th>Количество</th>
                    <th>Стоимость, руб.</th>
                    <th>Сохранить</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($order['products'] as $product){ ?>
                <form action="/admin/order/edit/<?php echo $product['id']; ?>" method="post">
                    <tr>
                        <td><?php echo $product['product_id']; ?></td>
                        <td><?php echo $product['title']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><input type="text" id="count" name="count" placeholder="" value="<?php echo $product['count']; ?>" class="input-count"></td>
                        <td><?php echo $product['totalPrice']; ?></td>
                        <td><button type="submit" name = "submit" id = "save" title="Редактировать"><a><i class="fa fa-pencil-square-o"></i></a></button></td>
                        <td><a href="/admin/order/deleteProduct/<?php echo $product['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                </form>
                <?php } ?>
            </table>
        </div>
</section>
<script src = "/js/editOrder.js"></script>
<?php include ROOT . '/views/layouts/footer.php'; ?>
