<?php require_once '../config.php'; ?>
<?php
if (!$request->is_logged_in()) {
  $request->redirect("index.php");
}
$request->session()->forget('email');
$request->session()->forget('name');
$request->session()->forget('id');
$request->session()->forget('role');
$request->session()->forget('customer_id');

$request->redirect("index.php");
?>