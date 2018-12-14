<!DOCTYPE html>
<html lang="da">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/kontakt.css">
    <title>Kontakt Stylemann</title>

    <style>
        .icon img {

            width: 3vw;
            max-width: 50px;
            min-width: 20px;

        }
    </style>
</head>

<body>
    <?php include "head.html"; ?>
    <main>
        <section class="page-container">

        </section>
<?php include "footer.html"; ?>
        <template id="kontakt">
            <div id="box1">
                <div id="icon1" class="icon"><img alt="" src="http://rockbottomproductions.dk/kea/sem2/stylemann/wp-content/uploads/2018/12/Asset-3.png"></div>
                <div id="overskrift1">
                    <h2>Info</h2>
                </div>
                <div id="tekst1"></div>
            </div>
            <div id="box2">
                <div id="icon2" class="icon"><img alt="" src="http://rockbottomproductions.dk/kea/sem2/stylemann/wp-content/uploads/2018/12/Asset-4.png"></div>
                <div id="overskrift2">
                    <h2>Åbningstider</h2>
                </div>
                <div id="tekst2"></div>
            </div>
            <div id="box3">
                <div id="icon3" class="icon"><img alt="" src="http://rockbottomproductions.dk/kea/sem2/stylemann/wp-content/uploads/2018/12/Asset-2.png"></div>
                <div id="overskrift3">
                    <h2>Adresse</h2>
                </div>
                <div id="tekst3"></div>
            </div>
            <div class="google-maps"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2250.6673169046676!2d12.603611651487897!3d55.659995106517904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4652534c403e0c11%3A0x4efcac04d573954d!2sSTYLEMANN!5e0!3m2!1sda!2sdk!4v1544468163210" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
        </template>
    </main>
    <script>
        let dest = document.querySelector(".page-container");

        let jsonFile;


        document.addEventListener("DOMContentLoaded", getJson);

        async function getJson() {

            let myJson = await fetch("http://rockbottomproductions.dk/kea/sem2/stylemann/wp-json/wp/v2/kontakt");

            jsonFile = await myJson.json();

            visIndhold();
        }

        function visIndhold() {
            let dest = document.querySelector(".page-container"),
                temp = document.querySelector("#kontakt");


            let klon = temp.cloneNode(true).content;

            jsonFile.forEach(indholdData => {

                klon.querySelector("#tekst1").innerHTML = "<p>" + indholdData.acf.info + "</p>";
                klon.querySelector("#tekst2").innerHTML = "<p>" + indholdData.acf.abningstider + "</p>";
                klon.querySelector("#tekst3").innerHTML = "<p>" + indholdData.acf.adresse + "</p>";

                dest.appendChild(klon);
            })
        }
    </script>
</body>

</html>
