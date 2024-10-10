<div class="row"> <!--Контент-->

    <h1 align="center">Добавить Продукта!</h1>

    <div class="col-12">
        <a class="btn btn-primary" href="/Product">Назад</a>
    </div>

    <form action="ProductCreate" class="mt-4" align="center" enctype="multipart/form-data" method="post">
        <div class="mb-3" align="center">
            <label from="hint">Имя Продукта!</label>
            <input type="text" class="form-control" style="border:2px solid aqua; width:520px; font-weight: 500; color:blueviolet" name="ProductName" id="hint" aria-describedby="hint">
        </div>

        <div class="mb-3" align="center">

            <input type="file" name="image" class="form-control" style="border:2px solid aqua; width:520px; font-weight: 500; color:blueviolet" name="ProductImage">

        </div>

        <button type="submit" name="Add" class="btn btn-primary" style="width: 200px;">Добавить</button>
    </form>


</div>