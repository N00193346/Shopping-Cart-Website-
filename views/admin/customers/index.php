<?php
use BookWorms\Model\User;
use BookWorms\Model\Customer;

$customers = Customer::findAll();
$numCustomers = count($customers);
$pageSize = 10;
$numPages = ceil($numCustomers / $pageSize);
?>
<table class="table" id="table-products">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Model</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) { ?>
            <tr class="d-none">
                <td><?= $product->id ?></td>
                <td><?= $product->brand ?></td>
                <td><?= $product->model ?></td>
                <td>€<?= $product->price ?></td>
               
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