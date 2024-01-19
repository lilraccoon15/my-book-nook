page d'enregistrement

<?php
if (isset($_GET['error'])) {
    $errorMessage = '';

    switch ($_GET['error']) {
        case 'invalid_password':
            $errorMessage = "Le mot de passe ne respecte pas les règles.";
            break;
        case 'username_taken':
            $errorMessage = "Ce nom d'utilisateur est déjà pris.";
            break;
        case 'email_taken':
            $errorMessage = "Cette adresse email est déjà utilisée.";
            break;
        case 'terms_not_accepted':
            $errorMessage = "Il est obligatoire d'accepter les termes d'utilisation.";
            break;
    }
    
    echo '<p style="color: red;">' . $errorMessage . '</p>';
}
?>

<form action="index.php" method="post">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" pattern="(?=.*[A-Z])(?=.*\d).{12,}" 
       title="Le mot de passe doit contenir au moins 12 caractères avec une majuscule et un chiffre"
       required>

    <label for="birthYear">Année de naissance :</label>
    <input type="number" id="birthYear" name="birthYear" min="1900" max="2024" required>
    <br>

    <label for="gender">Genre :</label>
    <select id="gender" name="gender" required>
        <option value="male">Homme</option>
        <option value="female">Femme</option>
        <option value="other">Autre</option>
    </select>
    <br>

    <label for="country">Pays :</label>
    <input type="text" id="country" name="country" required>
    <br>

    <label for="terms">J'accepte les conditions générales d'utilisation :</label>
    <input type="checkbox" id="terms" name="terms" required>
    <br>

    <input type="submit" value="S'inscrire">
</form>