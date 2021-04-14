<?php
use BookWorms\Model\User;
use BookWorms\Model\Customer;

$customers = Customer::findAll();
$numCustomers = count($customers);
$pageSize = 10;
$numPages = ceil($numCustomers / $pageSize);
?>
<table class="table" id="table-customers">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>User Id</th>
        
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer) { ?>
            <tr class="d-none">
                <td><?= $customer->id ?></td>
                <?php
                try{
                  $user = User::findById($customer->user_id);
                }
                catch(Exception $e){}
                if ($user !== null){
                ?>
                <td><?= $user->name ?></td> 
                <?php } ?>
                <td><?= $customer->address ?></td>
                <td><?= $customer->phone ?></td>
                <td><?= $customer->user_id ?></td>
               
            </tr>
        <?php } ?>
    </tbody>
</table>
<nav id="nav-customers">
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