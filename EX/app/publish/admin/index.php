<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Election;

session_start();

// �������� ����������� ������������
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$electionModel = new Election();
$elections = $electionModel->getActiveElections();

include __DIR__ . '/../views/index.php';