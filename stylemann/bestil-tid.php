<!DOCTYPE html>
<html lang="da">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bestil-tid.css">
    <title>Bestil Tid</title>
</head>

<body>
    <?php include "head.html"; ?>
    <section class="page-container">
    </section>
    <?php include "footer.html"; ?>
    <template id="bestil-tid">
        <div id="form">
            <div id="overskrift"></div>
            <form>
                Navn:<br>
                <input type="text" name="navn"><br>
                E-mail:<br>
                <input type="text" name="e-mail"><br>
                Tlf:<br>
                <input type="text" name="tlf"><br>
                Beskriv hvad du ønsker:<br>
                <textarea type="text" name="besked"></textarea><br>
                <br>
                <input id="button" type="submit" value="Send"></form>
        </div>
        <div id="billede"><img class="billede" alt="" src=""></div>
    </template>
    <script>
        let jsonFileBestil;

        document.addEventListener("DOMContentLoaded", getJson);

        async function getJson() {

            let myJsonBestil = await fetch("http://rockbottomproductions.dk/kea/sem2/stylemann/wp-json/wp/v2/bestil_tid");

            jsonFileBestil = await myJsonBestil.json();

            visIndhold();
        }

        function visIndhold() {

            let destBestil = document.querySelector(".page-container"),
                temp = document.querySelector("#bestil-tid");

            let klon = temp.cloneNode(true).content;

            jsonFileBestil.forEach(indholdData => {
                klon.querySelector("#overskrift").innerHTML = "<h2>" + indholdData.acf.overskrift + "</h2>";
                klon.querySelector(".billede").src = indholdData.acf.billede;

                destBestil.appendChild(klon);
            })
        }

    </script>
</body>

</html>
