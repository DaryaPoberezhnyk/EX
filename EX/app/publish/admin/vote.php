<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Election;
use App\Models\Candidate;
use App\Models\Vote;

session_start();

// �������� ����������� ������������
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// ��������� ID ����������� �� ���������� URL
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$electionId = (int)$_GET['id'];

$electionModel = new Election();
$election = $electionModel->getElectionById($electionId);

if (!$election) {
    header('Location: index.php');
    exit();
}

// ��������, ��� ����������� �������
$currentTime = new DateTime();
$startTime = new DateTime($election['start_time']);
$endTime = new DateTime($election['end_time']);

if ($currentTime < $startTime || $currentTime > $endTime) {
    $error = '��� ����������� �� �������.';
    include __DIR__ . '/../views/vote.php';
    exit();
}

// ��������, ��������� �� ������������
$voteModel = new Vote();
if ($voteModel->hasVoted($_SESSION['user_id'], $electionId)) {
    $error = '�� ��� ������������� � ���� �����������.';
    include __DIR__ . '/../views/vote.php';
    exit();
}

$candidateModel = new Candidate();
$candidates = $candidateModel->getCandidatesByElectionId($electionId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidateId = (int)$_POST['candidate_id'];

    // ��������, ��� �������� ����������
    if (!$candidateModel->candidateExists($candidateId, $electionId)) {
        $error = '��������� �������� �� ����������.';
        include __DIR__ . '/../views/vote.php';
        exit();
    }

    // ���������� ������
    if ($voteModel->castVote($_SESSION['user_id'], $electionId, $candidateId)) {
        $success = '��� ����� ������� ������!';
    } else {
        $error = '��������� ������ ��� ���������� ������ ������.';
    }
}

include __DIR__ . '/../views/vote.php';