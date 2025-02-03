<section>
    <form method="POST">
        <h2>Inscription</h2>

        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname" required pattern="[A-Za-zÀ-ÿ\- ]{2,}" title="Seuls les lettres, espaces et tirets sont autorisés. Minimum 2 caractères.">

        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname" required pattern="[A-Za-zÀ-ÿ\- ]{2,}" title="Seuls les lettres, espaces et tirets sont autorisés. Minimum 2 caractères.">

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required minlength="8" title="Le mot de passe doit contenir au moins 8 caractères.">

        <button type="submit">S'inscrire</button>

        <p id="submit"><?= $message ?></p>
    </form>
</section>

<section>
    <ul>
        <!--Liste de compte-->
        <?php foreach ($users as $user): ?>
            <li>
                <?php echo htmlspecialchars($user['firstname']) . ' ' . htmlspecialchars($user['lastname']); ?> 
                (<?php echo htmlspecialchars($user['email']); ?>)
            </li>
        <?php endforeach; ?>
    </ul>
</section>