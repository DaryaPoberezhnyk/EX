<?php include __DIR__ . '/../layout/header.php'; ?>

    <div class="container mt-5">
        <h2>������� ����� �����������</h2>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="title">��������:</label>
                <input type="text" name="title" class="form-control" required value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="description">��������:</label>
                <textarea name="description" class="form-control"><?php echo isset($description) ? htmlspecialchars($description) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="start_time">���� � ����� ������:</label>
                <input type="datetime-local" name="start_time" class="form-control" required value="<?php echo isset($start_time) ? $start_time : ''; ?>">
            </div>
            <div class="form-group">
                <label for="end_time">���� � ����� ���������:</label>
                <input type="datetime-local" name="end_time" class="form-control" required value="<?php echo isset($end_time) ? $end_time : ''; ?>">
            </div>
            <button type="submit" class="btn btn-success">�������</button>
            <a href="/admin/elections.php" class="btn btn-secondary">������</a>
        </form>
    </div>

<?php include __DIR__ . '/../layout/footer.php'; ?>