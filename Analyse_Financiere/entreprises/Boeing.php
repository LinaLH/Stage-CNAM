<!DOCTYPE html>
<html lang="en">
<script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=default'></script>

<head>
    <title>Statistiques inf&eacute;rentielles</title>

    <link rel='shortcut icon' href="https://findicons.com/files/icons/2804/plex/512/python.png" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Pour formules maths LaTex -->
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
    extensions: ["tex2jax.js"],
    jax: ["input/TeX", "output/HTML-CSS"],
    tex2jax: {
      inlineMath: [ ['$','$'], ["\\(","\\)"] ],
      displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
      processEscapes: true
    },
    "HTML-CSS": { fonts: ["TeX"] }
  });
</script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=default'></script>
    <!-- fin LaTex -->

    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <style type="text/css">
        body {
            background-color: #f8f9f9;
        }

        .fontsofia {
            font-family: "Sofia", sans-serif;
        }
    </style>

</head>

<body>

    <div class="container mt-4">
        <h2>The Boeing Company</h2>
        <br>
        <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="pill" href="#donnees"> Étude des donn&eacute;es </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#tabStats"> Tableau des statistiques descriptives </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#histo"> Histogramme</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#analyse"> Analyse et Estimation</a>
            </li>
        </ul>


        <!-- Tab panes -->

        <div id="simulation" class="tab-content">

            <div id="donnees" class="container tab-pane active"><br>
                <h3 class="fontsofia"> Étude des donn&eacute;es</h3>

                <div style="padding:10px; border-style:solid;border-width: 3px; width:50%;">


                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">


                        <button type="submit" name="Boeing_etude" class="btn btn-primary">Étudier</button>

                </div>
                </form>
                <div style="width: 300px; background-color: #ecf0f1;">
                    <div id="Étudier" style="width: 1%;height: 30px;background-color: #2e86c1; color:white;"></div>
                </div>
            </div>


            <!-- fin simulation -->

            <div id="tabStats" class="container tab-pane fade"><br>
                <h3 class="fontsofia"> Tableau des statistiques descriptives</h3>

                <br>

                <table class="table table-bordered table-hover">

                    <thead style="background-color: blue;color: white; font-size: 17px;">
                        <tr>
                            <th scope="col">Statistiques</th>
                            <th scope="col">Formules</th>
                            <th scope="col">Valeurs empiriques</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>nombres d'observations</td>
                            <td class="text-center">n</td>
                            <td class="text-center"><?php
                                                    $symbol = $_GET['symbol'];
                                                    $fichier_figure = "Boeing.csv";
                                                    $fichier_py = "../back.py";
                                                    $dir = getcwd();
                                                    $chemin = $dir . "/" . $fichier_py;
                                                    //$chemin = $fichier_py;

                                                    //echo $chemin;
                                                    //echo "<br>";

                                                    $cmd = "python " . " " . $chemin . " " . $fichier_figure . " " . $symbol;
                                                    //echo $cmd;
                                                    $output = null;
                                                    $retval = null;
                                                    $sortie = exec($cmd, $output, $retval);
                                                    $nombre_observations = $output[1]; // Récupérer la valeur de nombre_observations
                                                    echo $nombre_observations; ?></td>
                        </tr>

                        <tr>
                            <td>minimum</td>
                            <td class="text-center">$$\displaystyle min(x_{1}, \ldots , x_{n}) $$</td>
                            <td class="text-center"><?php

                                                    $fichier_figure = "Boeing.csv";
                                                    $fichier_py = "../back.py";
                                                    $dir = getcwd();
                                                    $chemin = $dir . "/" . $fichier_py;
                                                    //$chemin = $fichier_py;

                                                    //echo $chemin;
                                                    //echo "<br>";

                                                    $cmd = "python " . " " . $chemin . " " . $fichier_figure;
                                                    //echo $cmd;
                                                    $output = null;
                                                    $retval = null;
                                                    $sortie = exec($cmd, $output, $retval);
                                                    $valeur_min = $output[2]; // Récupérer la valeur de nombre_observations
                                                    echo $valeur_min; ?></td>
                        </tr>

                        <tr>
                            <td>maximum</td>
                            <td class="text-center">$$\displaystyle max(x_{1}, \ldots , x_{n}) $$</td>
                            <td class="text-center"><?php

                                                    $fichier_figure = "Boeing.csv";
                                                    $fichier_py = "../back.py";
                                                    $dir = getcwd();
                                                    $chemin = $dir . "/" . $fichier_py;
                                                    //$chemin = $fichier_py;

                                                    //echo $chemin;
                                                    //echo "<br>";

                                                    $cmd = "python " . " " . $chemin . " " . $fichier_figure;
                                                    //echo $cmd;
                                                    $output = null;
                                                    $retval = null;
                                                    $sortie = exec($cmd, $output, $retval);
                                                    $valeur_max = $output[3]; // Récupérer la valeur de nombre_observations
                                                    echo $valeur_max; ?></td>
                        </tr>

                        <tr>
                            <td>moyenne empirique</td>
                            <td class="text-center">$$\displaystyle m_{1}=\overline{x}_{n}= \frac{1}{n}
                                \sum\limits_{i=1}^{n} x_{i}$$</td>
                            <td class="text-center"><?php

                                                    $fichier_figure = "Boeing.csv";
                                                    $fichier_py = "../back.py";
                                                    $dir = getcwd();
                                                    $chemin = $dir . "/" . $fichier_py;
                                                    //$chemin = $fichier_py;

                                                    //echo $chemin;
                                                    //echo "<br>";

                                                    $cmd = "python " . " " . $chemin . " " . $fichier_figure;
                                                    //echo $cmd;
                                                    $output = null;
                                                    $retval = null;
                                                    $sortie = exec($cmd, $output, $retval);
                                                    $moyenne = $output[4]; // Récupérer la valeur de nombre_observations
                                                    echo $moyenne; ?></td>
                        </tr>


                        <tr>
                            <td>variance empirique</td>
                            <td class="text-center">$$\displaystyle \mu_{2}= \frac{1}{n} \sum\limits_{i=1}^{n}
                                \big(x_{i}-\overline{x}_{n}\big)^{2}$$</td>
                            <td class="text-center"><?php

                                                    $fichier_figure = "Boeing.csv";
                                                    $fichier_py = "../back.py";
                                                    $dir = getcwd();
                                                    $chemin = $dir . "/" . $fichier_py;
                                                    //$chemin = $fichier_py;

                                                    //echo $chemin;
                                                    //echo "<br>";

                                                    $cmd = "python " . " " . $chemin . " " . $fichier_figure;
                                                    //echo $cmd;
                                                    $output = null;
                                                    $retval = null;
                                                    $sortie = exec($cmd, $output, $retval);
                                                    $variance = $output[5]; // Récupérer la valeur de nombre_observations
                                                    echo $variance; ?></td>
                        </tr>

                        <tr>
                            <td>Asym&eacute;trie (skewness)</td>
                            <td class="text-center"> $$\displaystyle \gamma_{1}=\frac{\mu_{3}}{\mu_{2}^{3/2}}$$</td>
                            <td class="text-center"><?php

                                                    $fichier_figure = "Boeing.csv";
                                                    $fichier_py = "../back.py";
                                                    $dir = getcwd();
                                                    $chemin = $dir . "/" . $fichier_py;
                                                    //$chemin = $fichier_py;

                                                    //echo $chemin;
                                                    //echo "<br>";

                                                    $cmd = "python " . " " . $chemin . " " . $fichier_figure;
                                                    //echo $cmd;
                                                    $output = null;
                                                    $retval = null;
                                                    $sortie = exec($cmd, $output, $retval);
                                                    $asymétrie = $output[6]; // Récupérer la valeur de nombre_observations
                                                    echo $asymétrie; ?></td>
                        </tr>

                        <tr>
                            <td> Aplatissement (kurtosis)</td>
                            <td class="text-center"> $$\displaystyle \gamma_{2}=\frac{\mu_{4}}{\mu_{2}^{2}}-3$$</td>
                            <td class="text-center"><?php

                                                    $fichier_figure = "Boeing.csv";
                                                    $fichier_py = "../back.py";
                                                    $dir = getcwd();
                                                    $chemin = $dir . "/" . $fichier_py;
                                                    //$chemin = $fichier_py;

                                                    //echo $chemin;
                                                    //echo "<br>";

                                                    $cmd = "python " . " " . $chemin . " " . $fichier_figure;
                                                    //echo $cmd;
                                                    $output = null;
                                                    $retval = null;
                                                    $sortie = exec($cmd, $output, $retval);
                                                    $aplatissement = $output[7]; // Récupérer la valeur de nombre_observations
                                                    echo $aplatissement; ?></td>
                        </tr>

                    </tbody>
                </table>

            </div>

            <!-- Fin table -->

            <div id="histo" class="container tab-pane fade">
                <br>
                <h3 class="fontsofia">Histogramme Des donn&eacute;es</h3>
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $fichier_figure  = htmlspecialchars('Histogramme');


                    // Appel à python

                    //echo "..............<br>";
                    $fichier_py = "../back.py";


                    $dir = getcwd();
                    $chemin = $dir . "/" . $fichier_py;
                    //$chemin = $fichier_py;

                    //echo $chemin;
                    //echo "<br>";

                    $cmd = "python " . " " . $chemin . " " . $fichier_figure;
                    //echo $cmd;
                    $output = null;
                    $retval = null;
                    $sortie = exec($cmd, $output, $retval);
                    //echo "<br>";
                    //print_r($sortie);
                    //$output = shell_exec($cmd);
                    //echo "<pre>$output</pre>";

                    $nom_histo = $fichier_figure;
                    $nom_histo = $fichier_figure . "_histo.png";
                    //echo $nom_histo;



                    $Histogramme = <<<EOT
<center>
<img src={$nom_histo} alt='BA_histo' />
</center>
EOT;

                    echo ($Histogramme);


                ?>
                <?php } else {
                } ?>

                <center>
                    <img src="BA_histo.png" alt='Histogramme' />
                </center>

            </div>

            <div id="analyse" class="container tab-pane fade"><br>
                <h3 class="fontsofia"> Analyse et Estimation des donn&eacute;es</h3>
                <p>ins&eacute;rer Analyse et Estimation des donn&eacute;es</p>
            </div>

        </div>

    </div>

    <script>
        var i = 0;

        function progression() {
            if (i == 0) {
                i = 1;
                var elem = document.getElementById("Étudier");
                var width = 1;
                var id = setInterval(frame, 5);

                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                        i = 0;
                    } else {
                        width++;
                        elem.style.width = width + "%";
                        elem.innerText = width + "%";
                    }
                }
            }
        }
    </script>





</body>

</html>