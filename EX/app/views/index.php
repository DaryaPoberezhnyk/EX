<?php include 'layout/header.php'; ?>

    <div class="container mt-5">
        <h2>��������� �����������</h2>
        <?php if (!empty($elections)): ?>
            <ul class="list-group">
                <?php foreach ($elections as $election): ?>
                    <li class="list-group-item">
                        <h4><?php echo htmlspecialchars($election['title']); ?></h4>
                        <p><?php echo htmlspecialchars($election['description']); ?></p>
                        <a href="/vote.php?id=<?php echo $election['id']; ?>" class="btn btn-primary">�������������</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>� ��������� ����� ��� �������� �����������.</p>
        <?php endif; ?>
    </div>

<?php include 'layout/footer.php'; ?>