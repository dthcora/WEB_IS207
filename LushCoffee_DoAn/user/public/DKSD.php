<?php
session_start();
require_once '../controllers/TermsController.php';

$controller = new TermsController();
$controller->displayTerms();

