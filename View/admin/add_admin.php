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
                <div class="page-title"><a href="/travaux/sil-da2i-td-rappels-web" >Index du site</a></div>
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
                <div id="message"></div>
                <form id="formAddMovie" method="post" action="/travaux/sil-da2i-td-rappels-web/add/">
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
               <!-- <input type="submit" value="Enregistrer"> -->
                    <div role="submit" id="subAddMov">Enregistrer</div>
                </form>
            </section>
        </main>
    <script>
        $(document).ready(function () {
            //ajax avec .ajax
            $("#subAddMov").on("click", function () {

                var form = $("#formAddMovie");
                console.log(form);
                $.ajax({
                    type: "POST",
                    url: form.attr("action"),
                    data: form.serialize()
                })
                    .fail(function () {
                        $("#message").html("Une erreur s'est produite.").attr("class", "msg-info");
                    }).done(function (response) {
                    $("#message").html(response).attr("class", "msg-info");
                });
            });
        });
    </script>
    </body>
</html>