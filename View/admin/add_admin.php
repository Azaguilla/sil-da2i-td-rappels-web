<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>test</title>
        <link rel="stylesheet" type="text/css" href="/travaux/sil-da2i-td-rappels-web/css/style.css" >
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
        </header>
        <main class="main-film">
            <section>
                <h2>Ajouter un film</h2>
                <form method="post" action="/travaux/sil-da2i-td-rappels-web/add/">
                    <p>
                        <label>
                            Titre
                        </label>
                        <input name="title" type="text" placeholder="Le seigneur des anneaux...">
                    </p>
                    <p>
                        <label>
                            Synopsis
                        </label>
                        <input name="synopsis" type="text" placeholder="L'histoire débute avec ...">
                    </p>
                    <p>
                        <label>
                            Date de sortie
                        </label>
                        <input name="sortie" type="date" placeholder="2001...">
                    </p>
                    <p>
                        <label>
                            Note
                        </label>
                        <input name="note" type="number" placeholder="5">
                    </p>
                <input type="submit" value="Enregistrer">
                </form>
            </section>
        </main>
    </body>
</html>