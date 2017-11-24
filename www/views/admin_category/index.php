<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Управление категориями</h2>
            </div>
        </div>
        <div class="row"> 
            <div class="col-sm-12">
                <a href="/admin/category/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>            
                <h3>Список категорий</h3>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID категории</th>
                        <th>Название категории</th>
                        <th>Видимость</th>
                        <th>Кол-во товаров</th>
                        <th>Товары</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach ($categories as $category){ ?>
                        <tr>
                            <td><?php echo $category['id']; ?></td>
                            <td><?php echo $category['title']; ?></td>
                            <td><input type="checkbox" name="admin" disabled
                            <?php if ($category['visible']) 
                                echo "checked";
                            ?>
                            ></td>
                            <td><?php echo $category['count']; ?></td>
                            <td><?php if ($category['count']) {?>
                               <a href="/admin/category/products/<?php echo $category['id']; ?>" title="Просмотр товаров"><i class="fa fa-shopping-cart"></i></a>
                                <?php } ?>
                            </td>
                            <td><a href="/admin/category/edit/<?php echo $category['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td>
                                <?php if ($category['count']==0) {?>
                                <a href="/admin/category/delete/<?php echo $category['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a>
                                <?php } ?>
                                </td>
                            </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

