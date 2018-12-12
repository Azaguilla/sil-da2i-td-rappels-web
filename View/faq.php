<?php
sleep(1);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>test</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
    <link rel="stylesheet" type="text/css" href="css/director.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
</head>
<body>
<header class="header-menu">
    <nav>
        <div class="page-title"><a href="index.php" >Index du site</a></div>
        <ul class="menu">
            <li><a href="#" >Réalisateur</a></li>
            <li>
                <a href="#" >Acteurs</a>
            </li>
        </ul>
    </nav>
</header><main class="main-film">
<section>
    <h2>Foire aux Questions</h2>
    <dl id="faq">
        <dt id="q1">Question 1 <span class="click" id="clickq1">0</span></dt>
        <dd id="rq1">
            <dl>
                <dt>réponse 1 partie 1</dt>
                <dd>détail 1</dd>
                <dt>réponse 1 partie 2</dt>
                <dd>détail 2</dd>
            </dl>
        </dd>
        <dt id="q2">Question 2 <span class="click" id="clickq2">0</span></dt>
        <dd id="rq2">
            <dl>
                <dt>réponse 2 partie 1</dt>
                <dd>détail 1</dd>
                <dt>réponse 2 partie 2</dt>
                <dd>détail 2</dd>
            </dl>
        </dd>
        <dt id="q3">Question 3 <span class="click" id="clickq3">0</span></dt>
        <dd id="rq3">
            <dl>
                <dt>réponse 3 partie 1</dt>
                <dd>détail 1</dd>
                <dt>réponse 3 partie 2</dt>
                <dd>détail 2</dd>
            </dl>
        </dd>
        <dt id="q4">Question 4 <span class="click" id="clickq4">0</span></dt>
        <dd id="rq4">
            <dl>
                <dt>réponse 4 partie 1</dt>
                <dd>détail 1</dd>
                <dt>réponse 4 partie 2</dt>
                <dd>détail 2</dd>
            </dl>
        </dd>
    </dl>
</section>
</main>
<script>
    $("dt").on("click", function(event) {
        alert("ok");
    })
</script>
</body>
</html>