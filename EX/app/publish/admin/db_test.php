<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;

try {
    $db = Database::getInstance()->getConnection();
    echo "����������� � ���� ������ ������� �����������!";
} catch (Exception $e) {
    echo "������ �����������: " . $e->getMessage();
}