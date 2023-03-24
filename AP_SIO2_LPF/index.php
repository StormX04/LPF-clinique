<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <title>Verification client</title>
    <link rel="stylesheet" href="src/css/Verification.css">
    <link rel="stylesheet" href="src/pre-admission_CSS/text.css">
    <link rel="stylesheet" href="src/pre-admission_CSS/main.css">
</head>

<body>
<header>
    <div class="logo"></div>
</header>
<h1 class="red TitlePreAdmi">Verification client</h1>

<section class="group_form">
    <form action="src/php/verificationPages.php" method="POST" >
        <div class="NumerosSecu">
            <h3>Numeros de securite social :</h3>
            <input type="text" id="NumerosSecuVerif" name="NumerosSecuVerif">
        </div>

</section>
<div class="group_buttun">
    <div class="button_suiv_prea1_form">
        <input type="submit"  formmethod="post" name="btn" class="button_s" value="Suivant">
    </div>
    </form>
</div>
</body>
</html>