<div class="row"> <!--Контент-->

    <h1 align="center">Продукты</h1>

    <div class="col-12">
        <a class="btn btn-primary" href="ProductAdd">Добавить</a>
        <a class="btn btn-warning" href="/Product">Очистить</a>
        <a class="btn btn-danger" href="DeleteAll">Удалить все!</a>
    </div>


    <table class="table mt-2 table-bordered table-striped table-primary" border="2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>

            <?php

            foreach ($models as $product) { ?>
                <tr class="red">
                    <th class="th" scope="row"><?= $product->id ?></th>
                    <td class="td"><?= $product->name ?></td>


                    <td class="td text-center">
                        <img src="<?= "App/Views/product/" . $product->image ?>" alt="png" width="120px" height="130px" style="border:2px solid aqua; border-radius:50%;">
                    </td>

                    <td class="td">

                        <form action="ProductRead" method="POST" style="display:inline">
                            <input type="hidden" name="ReadId" value="<?=$product->id?>">
                            <button type="submit" name="Read" class="btn btn-primary"><i class="bi bi-book-fill"></i></button>
                        </form>


                        <!-- Delete Modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#DeleteModal<?= $product->id ?>">
                            <i class="bi bi-trash-fill"></i>
                        </button>

                        <!-- Deletes - Modal -->
                        <div class="modal fade" id="DeleteModal<?= $product->id ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Удаление...
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h1 class="text-center text-danger">Вы действительно хотите
                                            удалить этот данные?</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Назад</button>

                                        <form action="ProductDelete" method="post">
                                            <input type="hidden" name="deletedId" value="<?= $product->id ?>">
                                            <button name="delete"
                                                class="btn btn-primary">ДА!</i>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Update Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#Update<?= $product->id ?>">
                            <i class="bi bi-pencil-fill"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="Update<?= $product->id ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 align="center" class="text-primary mb-3">Изменить Продукта - <?= $product->id ?></h4>
                                        <form action="ProductUpdate" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <input class="form-control border-primary" id="name" type="text"
                                                    name="name" placeholder="<?= $product->name ?>">
                                            </div>
                                            <input type="hidden" name="old_image" value="<?= $product->image ?>">
                                            <div class="mb-3" align="center">
                                                <img src="<?= "App/Views/product/" . $product->image ?>" alt="png" width="120px" height="120px" style="border:2px solid blue; border-radius:50%;">
                                                <input class="form-control border-primary mt-3" id="image" type="file"
                                                    name="image">
                                            </div>
                                            <input type="hidden" name="UpId" value="<?= $product->id ?>">
                                            <div class="mb-3" align="center">
                                                <button name="Update" class="btn btn-primary"
                                                    style="width:350px">Изменить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php }

            ?>

        </tbody>
    </table>

</div>