<div class="card" style="max-width: 480px; margin: 60px auto;">
    <h2>Iniciar sesión</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post" action="/login">
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars(old('email')) ?>" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="btn btn-primary" style="margin-top: 16px;">Entrar</button>
    </form>
</div>