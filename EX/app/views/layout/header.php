<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/index.php">������� �����������</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($_SESSION['is_admin']): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/index.php">�����-������</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="/logout.php">�����</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login.php">�����</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register.php">�����������</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>