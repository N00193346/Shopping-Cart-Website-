<?php
use BookWorms\Model\CreditCard;

$customer_id = $request->session()->get("customer_id");
$credit_cards = CreditCard::findByCustomerId($customer_id);
$numCredit_cards = count($credit_cards);
$pageSize = 10;
$numPages = ceil($numCredit_cards / $pageSize);
?>
<table class="table" id="table-credit_cards">
    <thead>
        <tr>
            <th>Type</th>
            <th>Name on Card</th>
            <th>Card Number</th>
            <th>Expiry Month</th>
            <th>Expiry Year</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($credit_cards as $credit_card) { ?>
            <tr class="d-none">
            
                <td><?= $credit_card->type ?></td>
                <td><?= $credit_card->name ?></td>
                <td><?= $credit_card->card_number ?></td>
                <td><?= $credit_card->exp_month ?></td>
                <td><?= $credit_card->exp_year ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<nav id="nav-credit_cards">
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