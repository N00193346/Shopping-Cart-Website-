<script src="<?= APP_URL ?>/assets/js/deletequery.js"></script>
<?php
use BookWorms\Model\Product;

$products = Product::findAll();
$numProducts = count($products);
$pageSize = 10;
$numPages = ceil($numProducts / $pageSize);
?>
<table class="table" id="table-products">
    <thead>
        <tr>
          
            <th>Id</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Price</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) { ?>
            <tr class="d-none">
                <td><?= $product->id ?></td>
                <td><?= $product->brand ?></td>
                <td><?= $product->model ?></td>
                <td>€<?= $product->price ?></td>
                <td><a class="btn btn-primary" href="<?= APP_URL ?>/views/admin/product-edit.php?id=<?= $product->id ?>">Edit</a></td>
                <td><a class="btn btn-danger btn-delete" href="<?= APP_URL ?>/actions/product-delete.php?id=<?= $product->id ?>">Delete</a></td>
            </tr>
        <?php } ?>
       
     
    </tbody>
</table>
<nav id="nav-products">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" data-page="previous">
                &laquo;
            </a>
        </li>
        <?php for ($i = 0; $i < $numPages; $i++) { ?>
            <li class="page-item">
                <a class="page-link" href="#" data-page="<?= $i + 1 ?>">
                    <?= $i + 1 ?>
                </a>
            </li>
        <?php } ?>
        <li class="page-item">
            <a class="page-link" href="#" data-page="next">
                &raquo;
            </a>
        </li>
    </ul>
</nav>