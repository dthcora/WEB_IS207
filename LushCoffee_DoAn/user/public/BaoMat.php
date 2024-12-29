<?php
session_start();
require_once '../controllers/PrivacyPolicyController.php';

$controller = new PrivacyPolicyController();
$controller->showPolicy();

