<?php include __DIR__ . '/../layout/header.php'; ?>

    <div class="container mt-5">
        <h2>���������� �������������</h2>
        <a href="/admin/create_election.php" class="btn btn-success mb-3">������� ����� �����������</a>
        <?php if (!empty($elections)): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>��������</th>
                    <th>������</th>
                    <th>�����</th>
                    <th>��������</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($elections as $election): ?>
                    <tr>
                        <td><?php echo $election['id']; ?></td>
                        <td><?php echo htmlspecialchars($election['title']); ?></td>
                        <td><?php echo $election['start_time']; ?></td>
                        <td><?php echo $election['end_time']; ?></td>
                        <td>
                            <a href="/admin/edit_election.php?id=<?php echo $election['id']; ?>" class="btn btn-primary btn-sm">�������������</a>
                            <a href="/admin/delete_election.php?id=<?php echo $election['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('�� �������, ��� ������ ������� ��� �����������?');">�������</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>��� ��������� �����������.</p>
        <?php endif; ?>
    </div>

<?php include __DIR__ . '/../layout/footer.php'; ?>