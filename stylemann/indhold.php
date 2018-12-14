<!DOCTYPE html>
<html lang="da">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/indhold.css">
    <title>Indhold</title>
</head>

<body>
    <?php include "head.html"; ?>
    <section id="data-container">
        <div id="overskrift"></div>
        <div id="billede"><img class="billede" alt="" src=""></div>
        <div id="tekst"></div>
    </section>
    <?php include "footer.html"; ?>
    <script>
        let urlParams = new URLSearchParams(window.location.search);
        let slug = urlParams.get("slug");
        console.log(slug);

        let content;
        document.addEventListener("DOMContentLoaded", hentJson);

        async function hentJson() {
            let myJson = await fetch("http://rockbottomproductions.dk/kea/sem2/stylemann/wp-json/wp/v2/indhold");
            content = await myJson.json();
            visIndhold();
        }

        function visIndhold() {

            let dest = document.querySelector("#data-container");
            content.forEach(data => {
                if (data.slug == slug) {
                    dest.querySelector("#overskrift").innerHTML = "<h2>" + data.acf.overskrift + "</h2>";
                    dest.querySelector(".billede").src = data.acf.billede;
                    dest.querySelector("#tekst").innerHTML = "<p>" + data.acf.tekst + "</p>";
                }
            })
        }

    </script>
</body>

</html>
