<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
       <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Управление товарами</h2>
            </div>
        </div>
        <div class="row"> 
            <div class="col-sm-12">
                <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>            
                <h3>Список товаров</h3>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID товара</th>
                        <th>Название товара</th>
                        <th>Цена, руб.</th>                        
                        <th>Видимость</th>
                        <th>Количество заказов</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach ($products as $product){ ?>
                        <tr>
                            <td><?php echo $product['id']?></td>
                            <td><?php echo $product['title']?></td>
                            <td><?php echo $product['price']?></td>
                            <td><input type="checkbox" name="admin" disabled
                            <?php if ($product['visible']) 
                                echo "checked";
                            ?>> 
                            </td>
                            <td><?php echo $product['count']?></td> 
                            <td><a href="/admin/product/edit/<?php echo $product['id'] ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td>
                            <?php
                            if ($product['count']==0){
                                echo "<a href='/admin/product/delete/{$product['id']}'' title='Удалить''><i class='fa fa-times'></i></a>";
                            }
                            ?>
                            </td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>

