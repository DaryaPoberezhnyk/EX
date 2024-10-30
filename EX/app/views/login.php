<?php include 'layout/header.php'; ?>

    <div class="container mt-5">
        <h2>����</h2>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="/login.php" method="POST">
            <div class="form-group">
                <label for="username">��� ������������ ��� Email:</label>
                <input type="text" name="username" class="form-control" required value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">������:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">�����</button>
        </form>
        <p class="mt-3">��� ��������? <a href="/register.php">������������������</a></p>
    </div>

<?php include 'layout/footer.php'; ?>