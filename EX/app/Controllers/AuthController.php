<?php
namespace App\Controllers;

use App\Models\User;

class AuthController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // ��������� ������ �� �����
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // ��������� ������
            $errors = [];

            if (empty($username) || empty($email) || empty($password)) {
                $errors[] = '��� ���� ����������� ��� ����������.';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = '������������ email �����.';
            }

            if ($password !== $confirmPassword) {
                $errors[] = '������ �� ���������.';
            }

            // �������� ������������� ������������
            $userModel = new User();
            if ($userModel->userExists($username, $email)) {
                $errors[] = '������������ � ����� ������ ��� email ��� ����������.';
            }

            if (empty($errors)) {
                if ($userModel->register($username, $email, $password)) {
                    // ����������� �������
                    header('Location: login.php');
                    exit();
                } else {
                    $errors[] = '������ ��� �����������. ���������� �����.';
                }
            }

            // ����������� ����� � ��������
            include __DIR__ . '/../../views/register.php';
        } else {
            // ����������� ����� �����������
            include __DIR__ . '/../../views/register.php';
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // ��������� ������ �� �����
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            // ��������� ������
            $errors = [];

            if (empty($username) || empty($password)) {
                $errors[] = '��� ���� ����������� ��� ����������.';
            }

            if (empty($errors)) {
                $userModel = new User();
                $user = $userModel->login($username, $password);
                if ($user) {
                    // ���� �������
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['is_admin'] = $user['is_admin'];
                    header('Location: index.php');
                    exit();
                } else {
                    $errors[] = '������������ ��� ������������ ��� ������.';
                }
            }

            // ����������� ����� � ��������
            include __DIR__ . '/../../views/login.php';
        } else {
            // ����������� ����� �����
            include __DIR__ . '/../../views/login.php';
        }
    }
    // ������ ������ ����� ��������� �����
}