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

<?php
$symbol = ""; // Initialisez la variable $symbol avec une valeur par défaut
$short_period = 12; // Initialisez la variable $short_period avec une valeur par défaut
$long_period = 26; // Initialisez la variable $long_period avec une valeur par défaut
$signal_period = 9; // Initialisez la variable $signal_period avec une valeur par défaut
$depart = "2019-01-01"; // Initialisez la variable $depart avec une valeur par défaut
$fin = "2021-01-01"; // Initialisez la variable $arrivee avec une valeur par défaut

///if (isset($_POST['symbol'])) { // Vérifiez si le paramètre "symbole" est soumis dans le formulaire
//    $symbol = $_POST['symbol']; // Assignez la valeur du paramètre "symbole" à la variable $symbol
//}

//var_dump($_POST['symbol']); // Débogage - Affiche la valeur du paramètre "symbole"



if (isset($_GET['symbol'])) {
    $symbol = $_GET['symbol'];

    // Secteur Aeronautique
    if ($symbol == "BA") {
        echo "<h2>The Boeing Company</h2>";
        $_SESSION['symbol'] = "BA";
    } elseif ($symbol == "AIR.PA") {
        echo "<h2>Airbus SE</h2>";
        $_SESSION['symbol'] = "AIR.PA";
    } elseif ($symbol == "LMT") {
        echo "<h2>Lockheed Martin Corporation</h2>";
        $_SESSION['symbol'] = "LMT";
    } elseif ($symbol == "HON") {
        echo "<h2>Honeywell International Inc.</h2>";
        $_SESSION['symbol'] = "HON";
    } elseif ($symbol == "GD") {
        echo "<h2>General Dynamics Corporation</h2>";
        $_SESSION['symbol'] = "GD";
    } elseif ($symbol == "BAESY") {
        echo "<h2>BAE Systems plc</h2>";
        $_SESSION['symbol'] = "BAESY";
    } elseif ($symbol == "NOC") {
        echo "<h2>Northrop Grumman Corporation</h2>";
        $_SESSION['symbol'] = "NOC";
    } elseif ($symbol == "BDRAF") {
        echo "<h2>Bombardier Inc.</h2>";
        $_SESSION['symbol'] = "BDRAF";

        // Secteur Automobile
    } elseif ($symbol == "TM") {
        echo "<h2>Toyota Motor Corporation</h2>";
        $_SESSION['symbol'] = "TM";
    } elseif ($symbol == "VLKAF") {
        echo "<h2>Volkswagen AG</h2>";
        $_SESSION['symbol'] = "VLKAF";
    } elseif ($symbol == "MARUTI.NS") {
        echo "<h2>Maruti Suzuki India Limited</h2>";
        $_SESSION['symbol'] = "MARUTI.NS";
    } elseif ($symbol == "VOLVF") {
        echo "<h2>AB Volvo (publ)</h2>";
        $_SESSION['symbol'] = "VOLVF";
    } elseif ($symbol == "FFP.F") {
        echo "<h2>Peugeot Invest Société anonyme</h2>";
        $_SESSION['symbol'] = "FFP.F";
    } elseif ($symbol == "MBG.DE") {
        echo "<h2>Mercedes-Benz Group AG</h2>";
        $_SESSION['symbol'] = "MBG.DE";
    } elseif ($symbol == "GM") {
        echo "<h2>General Motors Company</h2>";
        $_SESSION['symbol'] = "GM";
    } elseif ($symbol == "F") {
        echo "<h2>Ford Motor Company</h2>";
        $_SESSION['symbol'] = "F";
    } elseif ($symbol == "HMC") {
        echo "<h2>Honda Motor Co., Ltd.</h2>";
        $_SESSION['symbol'] = "HMC";
    } elseif ($symbol == "BMW.DE") {
        echo "<h2>Bayerische Motoren Werke Aktiengesellschaft</h2>";
        $_SESSION['symbol'] = "BMW.DE";


        //Secteur Energie et Environnement
    } elseif ($symbol == "XOM") {
        echo "<h2>Exxon Mobil Corporation</h2>";
        $_SESSION['symbol'] = "XOM";
    } elseif ($symbol == "CVX") {
        echo "<h2>Chevron Corporation</h2>";
        $_SESSION['symbol'] = "CVX";
    } elseif ($symbol == "PTR") {
        echo "<h2>Petróleo Brasileiro S.A. - Petrobras</h2>";
        $_SESSION['symbol'] = "PTR";
    } elseif ($symbol == "ARVCY") {
        echo "<h2>Petróleo Brasileiro S.A. - Petrobras</h2>";
        $_SESSION['symbol'] = "ARVCY";
    } elseif ($symbol == "BP") {
        echo "<h2>BP</h2>";
        $_SESSION['symbol'] = "BP";
    } elseif ($symbol == "E") {
        echo "<h2>ENI</h2>";
        $_SESSION['symbol'] = "E";
    } elseif ($symbol == "SHEL") {
        echo "<h2>Shell</h2>";
        $_SESSION['symbol'] = "SHEL";
    } elseif ($symbol == "TTE") {
        echo "<h2>TotalEnergies</h2>";
        $_SESSION['symbol'] = "TTE";
    } elseif ($symbol == "EQNR") {
        echo "<h2>Equinor ASA</h2>";
        $_SESSION['symbol'] = "EQNR";
    } elseif ($symbol == "CTRA") {
        echo "<h2>Coterra Energy Inc.</h2>";
        $_SESSION['symbol'] = "CTRA";
    } elseif ($symbol == "ENGIY") {
        echo "<h2>Electricité de France S.A.</h2>";
        $_SESSION['symbol'] = "ENGIY";

        //Secteur Immobilier et BTP
    } elseif ($symbol == "EN.PA") {
        echo "<h2>Bouygues SA</h2>";
        $_SESSION['symbol'] = "EN.PA";
    } elseif ($symbol == "DG.PA") {
        echo "<h2>Vinci SA</h2>";
        $_SESSION['symbol'] = "DG.PA";
    } elseif ($symbol == "ALHRG.PA") {
        echo "<h2>Herige</h2>";
        $_SESSION['symbol'] = "ALHRG.PA";
    } elseif ($symbol == "0VW.F") {
        echo "<h2>Hoffmann Green Cement Technologies Societe anonyme</h2>";
        $_SESSION['symbol'] = "0VW.F";
    } elseif ($symbol == "ALLUX.PA") {
        echo "<h2>Installux S.A.</h2>";
        $_SESSION['symbol'] = "ALLUX.PA";
    } elseif ($symbol == "ALNLF.PA") {
        echo "<h2>Neolife SA</h2>";
        $_SESSION['symbol'] = "ALNLF.PA";

        //Secteur Industrie lourde
    } elseif ($symbol == "004560.KS") {
        echo "<h2>Hyundai Bng Steel Co., Ltd.</h2>";
        $_SESSION['symbol'] = "004560.KS";
    } elseif ($symbol == "ABB") {
        echo "<h2>ABB Ltd</h2>";
        $_SESSION['symbol'] = "ABB";
    } elseif ($symbol == "600444.SS") {
        echo "<h2>Sinomach General Machinery Science & Technology Co.,Ltd.</h2>";
        $_SESSION['symbol'] = "600444.SS";
    } elseif ($symbol == "MMTOF") {
        echo "<h2>Mitsubishi Motors Corporation</h2>";
        $_SESSION['symbol'] = "MMTOF";
    } elseif ($symbol == "ALO.PA") {
        echo "<h2>Alstom SA</h2>";
        $_SESSION['symbol'] = "ALO.PA";
    } elseif ($symbol == "SU.PA") {
        echo "<h2>Schneider Electric S.E.</h2>";
        $_SESSION['symbol'] = "SU.PA";
    } elseif ($symbol == "DG.PA") {
        echo "<h2>Vinci SA</h2>";
        $_SESSION['symbol'] = "DG.PA";
    } elseif ($symbol == "BOUYF") {
        echo "<h2>Bouygues SA</h2>";
        $_SESSION['symbol'] = "BOUYF";
    } elseif ($symbol == "HCMLY") {
        echo "<h2>Holcim Ltd</h2>";
        $_SESSION['symbol'] = "HCMLY";
    } elseif ($symbol == "BASFY") {
        echo "<h2>BASF SE</h2>";
        $_SESSION['symbol'] = "BASFY";
    } elseif ($symbol == "DOW") {
        echo "<h2>Dow Inc.</h2>";
        $_SESSION['symbol'] = "DOW";
    } elseif ($symbol == "DFT-PC") {
        echo "<h2>Dupont Fabros Technology, Inc.</h2>";
        $_SESSION['symbol'] = "DFT-PC";

        //Secteur Santé et Chimie
    } elseif ($symbol == "NVS") {
        echo "<h2>Novartis AG</h2>";
        $_SESSION['symbol'] = "NVS";
    } elseif ($symbol == "PFE") {
        echo "<h2>Pfizer Inc.</h2>";
        $_SESSION['symbol'] = "PFE";
    } elseif ($symbol == "SNY") {
        echo "<h2>Sanofi</h2>";
        $_SESSION['symbol'] = "SNY";
    } elseif ($symbol == "MRK") {
        echo "<h2>Merck & Co., Inc.</h2>";
        $_SESSION['symbol'] = "MRK";
    } elseif ($symbol == "JNJ") {
        echo "<h2>Johnson & Johnson</h2>";
        $_SESSION['symbol'] = "JNJ";
    } elseif ($symbol == "BAYRY") {
        echo "<h2>Bayer Aktiengesellschaft</h2>";
        $_SESSION['symbol'] = "BAYRY";
    } elseif ($symbol == "ERF.PA") {
        echo "<h2>Eurofins Scientific SE</h2>";
        $_SESSION['symbol'] = "ERF.PA";
    } elseif ($symbol == "VIRP.PA") {
        echo "<h2>Virbac SA</h2>";
        $_SESSION['symbol'] = "VIRP.PA";
    } elseif ($symbol == "GBT.PA") {
        echo "<h2>Guerbet SA</h2>";
        $_SESSION['symbol'] = "GBT.PA";
    } elseif ($symbol == "DBV.PA") {
        echo "<h2>DBV Technologies S.A.</h2>";
        $_SESSION['symbol'] = "DBV.PA";
    } elseif ($symbol == "DIM.PA") {
        echo "<h2>Sartorius Stedim Biotech S.A.</h2>";
        $_SESSION['symbol'] = "DIM.PA";
    } elseif ($symbol == "VETO.PA") {
        echo "<h2>Vetoquinol SA</h2>";
        $_SESSION['symbol'] = "VETO.PA";
    } elseif ($symbol == "LNA.PA") {
        echo "<h2>LNA Santé SA</h2>";
        $_SESSION['symbol'] = "LNA.PA";
    } elseif ($symbol == "BLC.PA") {
        echo "<h2>Bastide Le Confort Médical SA</h2>";
        $_SESSION['symbol'] = "BLC.PA";
    } elseif ($symbol == "CYAD.BR") {
        echo "<h2>Celyad Oncology SA</h2>";
        $_SESSION['symbol'] = "CYAD.BR";
    } elseif ($symbol == "NANO.PA") {
        echo "<h2>Nanobiotix S.A.</h2>";
        $_SESSION['symbol'] = "NANO.PA";
    } elseif ($symbol == "AB.PA") {
        echo "<h2>AB Science S.A.</h2>";
        $_SESSION['symbol'] = "AB.PA";
    } elseif ($symbol == "GDS.PA") {
        echo "<h2>Ramsay Générale de Santé SA</h2>";
        $_SESSION['symbol'] = "GDS.PA";
    } elseif ($symbol == "IPH.PA") {
        echo "<h2>Innate Pharma S.A.</h2>";
        $_SESSION['symbol'] = "IPH.PA";

        //Secteur Services et distribution
    } elseif ($symbol == "AMZN") {
        echo "<h2>Amazon.com, Inc.</h2>";
        $_SESSION['symbol'] = "AMZN";
    } elseif ($symbol == "EBAY") {
        echo "<h2>eBay Inc.</h2>";
        $_SESSION['symbol'] = "EBAY";
    } elseif ($symbol == "UL") {
        echo "<h2>Unilever PLC</h2>";
        $_SESSION['symbol'] = "UL";
    } elseif ($symbol == "PG") {
        echo "<h2>The Procter & Gamble Company</h2>";
        $_SESSION['symbol'] = "PG";
    } elseif ($symbol == "EL") {
        echo "<h2>The Estée Lauder Companies Inc.</h2>";
        $_SESSION['symbol'] = "EL";
    } elseif ($symbol == "OR.PA") {
        echo "<h2>L'Oreal SA</h2>";
        $_SESSION['symbol'] = "OR.PA";
    } elseif ($symbol == "DANOY") {
        echo "<h2>Danone S.A.</h2>";
        $_SESSION['symbol'] = "DANOY";
    } elseif ($symbol == "TSCDY") {
        echo "<h2>Tesco PLC</h2>";
        $_SESSION['symbol'] = "TSCDY";
    } elseif ($symbol == "RMS.PA") {
        echo "<h2>Hermès International Société en commandite par actions</h2>";
        $_SESSION['symbol'] = "RMS.PA";
    } elseif ($symbol == "CDI.PA") {
        echo "<h2>Christian Dior SE</h2>";
        $_SESSION['symbol'] = "CDI.PA";
    } elseif ($symbol == "MC.PA") {
        echo "<h2>LVMH Moë t Hennessy - Louis Vuitton, Société Européenne</h2>";
        $_SESSION['symbol'] = "MC.PA";
    } elseif ($symbol == "SK.PA") {
        echo "<h2>SEB SA</h2>";
        $_SESSION['symbol'] = "SK.PA";
    } elseif ($symbol == "ML.PA") {
        echo "<h2>Compagnie Générale des établissements Michelin Société en commandite par actions</h2>";
        $_SESSION['symbol'] = "ML.PA";
    } elseif ($symbol == "RI.PA") {
        echo "<h2>Pernod Ricard SA</h2>";
        $_SESSION['symbol'] = "RI.PA";
    } elseif ($symbol == "LPE.PA") {
        echo "<h2>Laurent-Perrier S.A.</h2>";
        $_SESSION['symbol'] = "LPE.PA";
    } elseif ($symbol == "RIN.PA") {
        echo "<h2>Vilmorin & Cie SA</h2>";
        $_SESSION['symbol'] = "RIN.PA";

        //Secteur Telecoms 
    } elseif ($symbol == "ORA.PA") {
        echo "<h2>Orange S.A.</h2>";
        $_SESSION['symbol'] = "ORA.PA";
    } elseif ($symbol == "VZ") {
        echo "<h2>Verizon Communications Inc.</h2>";
        $_SESSION['symbol'] = "VZ";
    } elseif ($symbol == "T") {
        echo "<h2>AT&T Inc..</h2>";
        $_SESSION['symbol'] = "T";
    } elseif ($symbol == "VOD") {
        echo "<h2>Vodafone Group Public Limited Company</h2>";
        $_SESSION['symbol'] = "VOD";
    } elseif ($symbol == "DTEGY") {
        echo "<h2>Deutsche Telekom AG</h2>";
        $_SESSION['symbol'] = "DTEGY";
    } elseif ($symbol == "NPPXF") {
        echo "<h2>Nippon Telegraph and Telephone Corporation</h2>";
        $_SESSION['symbol'] = "NPPXF";

        //Secteur Internet
    } elseif ($symbol == "GOOGL") {
        echo "<h2>Alphabet Inc.</h2>";
        $_SESSION['symbol'] = "GOOGL";
    } elseif ($symbol == "BABA") {
        echo "<h2>Alibaba Group Holding Limited</h2>";
        $_SESSION['symbol'] = "BABA";
    } elseif ($symbol == "BIDU") {
        echo "<h2>Baidu, Inc.</h2>";
        $_SESSION['symbol'] = "BIDU";
    } elseif ($symbol == "SAP") {
        echo "<h2>SAP SE</h2>";
        $_SESSION['symbol'] = "SAP";
    } elseif ($symbol == "CRM") {
        echo "<h2>Salesforce, Inc.</h2>";
        $_SESSION['symbol'] = "CRM";
    } elseif ($symbol == "VMW") {
        echo "<h2>VMware, Inc.</h2>";
        $_SESSION['symbol'] = "VMW";
    } elseif ($symbol == "ADBE") {
        echo "<h2>Adobe Inc.</h2>";
        $_SESSION['symbol'] = "ADBE";
    } elseif ($symbol == "INTU") {
        echo "<h2>Intuit Inc.</h2>";
        $_SESSION['symbol'] = "INTU";
    } elseif ($symbol == "LNKD") {
        echo "<h2>LinkedIn Corporation</h2>";
        $_SESSION['symbol'] = "LNKD";

        //Secteur High Tech
    } elseif ($symbol == "AAPL") {
        echo "<h2>Apple Inc.</h2>";
        $_SESSION['symbol'] = "AAPL";
    } elseif ($symbol == "MSFT") {
        echo "<h2>Microsoft Corporation</h2>";
        $_SESSION['symbol'] = "MSFT";
    } elseif ($symbol == "ORCL") {
        echo "<h2>Oracle Corporation</h2>";
        $_SESSION['symbol'] = "ORCL";
    } elseif ($symbol == "IBM") {
        echo "<h2>International Business Machines Corporation</h2>";
        $_SESSION['symbol'] = "IBM";
    } elseif ($symbol == "INTC") {
        echo "<h2>Intel Corporation</h2>";
        $_SESSION['symbol'] = "INTC";
    } elseif ($symbol == "TSM") {
        echo "<h2>Taiwan Semiconductor Manufacturing Company Limited</h2>";
        $_SESSION['symbol'] = "TSM";
    } elseif ($symbol == "QCOM") {
        echo "<h2>QUALCOMM Incorporated</h2>";
        $_SESSION['symbol'] = "QCOM";
    } elseif ($symbol == "HPQ") {
        echo "<h2>HP Inc.</h2>";
        $_SESSION['symbol'] = "HPQ";
    } elseif ($symbol == "TXN") {
        echo "<h2>Texas Instruments Incorporated</h2>";
        $_SESSION['symbol'] = "TXN";
    } elseif ($symbol == "JD") {
        echo "<h2>JD.com, Inc.</h2>";
        $_SESSION['symbol'] = "JD";
    } elseif ($symbol == "NOK") {
        echo "<h2>Nokia Oyj</h2>";
        $_SESSION['symbol'] = "NOK";
    } elseif ($symbol == "MU") {
        echo "<h2>Micron Technology, Inc.</h2>";
        $_SESSION['symbol'] = "MU";
    } elseif ($symbol == "PCRFY") {
        echo "<h2>Panasonic Holdings Corporation</h2>";
        $_SESSION['symbol'] = "PCRFY";
    } elseif ($symbol == "NTDOY") {
        echo "<h2>Nintendo Co., Ltd.</h2>";
        $_SESSION['symbol'] = "NTDOY";
    } elseif ($symbol == "TOSYY") {
        echo "<h2>Toshiba Corporation</h2>";
        $_SESSION['symbol'] = "TOSYY";

        //Secteur Matières premières
    } elseif ($symbol == "JCQ.PA") {
        echo "<h2>Jacquet Metals SA</h2>";
        $_SESSION['symbol'] = "JCQ.PA";
    } elseif ($symbol == "PVL.PA") {
        echo "<h2>Plastiques du Val de Loire</h2>";
        $_SESSION['symbol'] = "PVL.PA";
    } elseif ($symbol == "AI.PA") {
        echo "<h2>Air Liquide S.A.</h2>";
        $_SESSION['symbol'] = "AI.PA";

        // Cas par défaut ou erreur de symbole non reconnu
    } else {
    }
}

?>
<?php
// Vérifier si une date de départ est soumise via le formulaire
if (isset($_POST['depart'])) {
    $departInput = new DateTime($_POST['depart']);
    $depart = $departInput->format('Y-m-d');
} else {
    // Utiliser la date de départ par défaut
    $depart = '2021-01-01';
}

// Vérifier si une date de fin est soumise via le formulaire
if (isset($_POST['fin'])) {
    $finInput = new DateTime($_POST['fin']);
    $fin = $finInput->format('Y-m-d');
} else {
    // Utiliser la date de fin comme la date actuelle
    $fin = date('Y-m-d');
}

// Convertir la date de départ en objet DateTime
$departObj = new DateTime($depart);

// Obtenir le mois et l'année de la date de départ
$mois_d = $departObj->format('n');
$annee_d = $departObj->format('Y');

// Calculer le nombre de jours dans le mois et le premier jour de la semaine
$nombreJours_d = cal_days_in_month(CAL_GREGORIAN, $mois_d, $annee_d);
$premierJour_d = date('w', strtotime("{$annee_d}-{$mois_d}-1"));

// Tableau des noms de jours de la semaine
$joursSemaine_d = array('Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam');
?>
<?php
// Convertir la date de fin en objet DateTime
$finObj = new DateTime($fin);

// Obtenir le mois et l'année de la date de fin
$mois_f = $finObj->format('n');
$annee_f = $finObj->format('Y');

// Calculer le nombre de jours dans le mois et le premier jour de la semaine
$nombreJours_f = cal_days_in_month(CAL_GREGORIAN, $mois_f, $annee_f);
$premierJour_f = date('w', strtotime("{$annee_f}-{$mois_f}-1"));

// Tableau des noms de jours de la semaine
$joursSemaine_f = array('Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam');


// Calculer la différence en jours entre la date de départ et la date de fin
$interval = $departObj->diff($finObj);
$period = $interval->days;
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $symbol = ($_POST['symbol']);
    //print_r($symbol);
    //$fichier_figure = "Boeing";
    $fichier_py = "back.py";
    $dir = getcwd();
    $chemin = $dir . "/" . $fichier_py;
    //$chemin = $fichier_py;

    //echo $chemin;
    //echo "<br>";

    $cmd = "python " . " " . $chemin .  " " . $symbol . " " . $short_period . " " . $long_period . " " . $signal_period . " " . $depart . " " . $fin . " " . $period;
    //echo $cmd;
    $output = null;
    $retval = null;
    $sortie = exec($cmd, $output, $retval);
    //var_dump($output);
    //echo "<br>";
    //echo $output[0][3];
    //echo $output[9];
} else {
}
?>

<body>

    <div class="container mt-4">
        <!--<h2>The Boeing Company</h2>
        <br>-->
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


        <div id="simulation" class="tab-content">

            <div id="donnees" class="container tab-pane active"><br>

                <h3 class="fontsofia"> Étude des donn&eacute;es</h3>

                <div style="padding:10px; border-style:solid;border-width: 3px; width:50%;">


                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                        <table>

                            <tr>
                                <td> <label for="paramsymbol"> symbole</label> </td>
                                <td> <input type="text" id="paramsymbol" name="symbol" value="<?php echo $symbol; ?>" /></td>
                            </tr>
                            <tr>
                                <td> <label for="paramshortperiod"> période courte</label> </td>
                                <td> <input type="text" id="paramshortperiod" name="short_period" value="<?php echo $short_period; ?>" /></td>
                            </tr>
                            <tr>
                                <td> <label for="paramlongperiod"> période longue</label> </td>
                                <td> <input type="text" id="paramlongperiod" name="long_period" value="<?php echo $long_period;
                                                                                                        ?>" /></td>
                            </tr>
                            <tr>
                                <td> <label for="paramsymbol">période du signal</label> </td>
                                <td> <input type="text" id="paramsignalperiod" name="signal_period" value="<?php echo $signal_period;
                                                                                                            ?>" /></td>
                            </tr>

                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <label for="depart">Date de départ:</label>
                                <input type="date" name="depart" id="depart" value="<?php echo $depart; ?>">
                                <input type="submit" value="Soumettre">
                            </form>
                            <br>


                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <label for="fin">Date de fin:</label>
                                <input type="date" name="fin" id="fin" value="<?php echo $fin; ?>">
                                <input type="submit" value="Soumettre">
                            </form>

                        </table>



                        <button type=" submit" name="Boeing" class="btn btn-primary">Étudier</button>

                </div>
                </form>
                <div style="width: 300px; background-color: #ecf0f1;">
                    <div id="Étudier" style="width: 1%;height: 30px;background-color: #2e86c1; color:white;"></div>
                </div>
            </div>


            <!-- fin simulation -->





            <div id="tabStats" class="container tab-pane fade"><br>

                <h3 class="fontsofia"> Tableau des statistiques descriptives de <?php echo $output[9]; ?>
                </h3>

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
                            <td class="text-center"><?php echo $output[0];  ?></td>
                        </tr>

                        <tr>
                            <td>minimum</td>
                            <td class="text-center">$$\displaystyle min(x_{1}, \ldots , x_{n}) $$</td>
                            <td class="text-center"><?php echo $output[1]; ?></td>
                        </tr>

                        <tr>
                            <td>maximum</td>
                            <td class="text-center">$$\displaystyle max(x_{1}, \ldots , x_{n}) $$</td>
                            <td class="text-center"><?php echo $output[2] ?></td>
                        </tr>

                        <tr>
                            <td>moyenne empirique</td>
                            <td class="text-center">$$\displaystyle m_{1}=\overline{x}_{n}= \frac{1}{n}
                                \sum\limits_{i=1}^{n} x_{i}$$</td>
                            <td class="text-center"><?php echo $output[3]; ?></td>
                        </tr>


                        <tr>
                            <td>variance empirique</td>
                            <td class="text-center">$$\displaystyle \mu_{2}= \frac{1}{n} \sum\limits_{i=1}^{n}
                                \big(x_{i}-\overline{x}_{n}\big)^{2}$$</td>
                            <td class="text-center"><?php echo $output[4]; ?></td>
                        </tr>

                        <tr>
                            <td>Asym&eacute;trie (skewness)</td>
                            <td class="text-center"> $$\displaystyle \gamma_{1}=\frac{\mu_{3}}{\mu_{2}^{3/2}}$$</td>
                            <td class="text-center"><?php echo $output[5] ?></td>
                        </tr>

                        <tr>
                            <td> Aplatissement (kurtosis)</td>
                            <td class="text-center"> $$\displaystyle \gamma_{2}=\frac{\mu_{4}}{\mu_{2}^{2}}-3$$</td>
                            <td class="text-center"><?php echo $output[6]; ?></td>
                        </tr>

                    </tbody>
                </table>

            </div>

            <!-- Fin table -->

            <div id="histo" class="container tab-pane fade">

                <br>
                <h3 class="fontsofia">Histogramme Des donn&eacute;es de <?php echo $output[9]; ?></h3>
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $fichier_figure  = htmlspecialchars('Histogramme');


                    // Appel à python

                    //echo "..............<br>";
                    //$fichier_py = "../back.py";


                    //$dir = getcwd();
                    //$chemin = $dir . "/" . $fichier_py;
                    //$chemin = $fichier_py;

                    //echo $chemin;
                    //echo "<br>";

                    //$cmd = "python " . " " . $chemin . " " . $fichier_figure;
                    //echo $cmd;
                    //$output = null;
                    //$retval = null;
                    //$sortie = exec($cmd, $output, $retval);
                    //echo "<br>";
                    //print_r($sortie);
                    //$output = shell_exec($cmd);
                    //echo "<pre>$output</pre>";

                    //$nom_histo = $fichier_figure;
                    //$nom_histo = $symbol . "_histo.png";


                ?>
                <?php } else {
                } ?>

                <center>
                    <?php echo "<img src=\"data:image/png;base64,$output[7]\" align=\"middle\" style=\"width:650px;height:550px;\"\>"; ?>
                </center>

            </div>

            <div id="analyse" class="container tab-pane fade"><br>

                <h3 class="fontsofia"> Analyse et Estimation des donn&eacute;es de <?php echo $output[9]; ?></h3>
                <br>

                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    //$fichier_figure  = htmlspecialchars('Courbes');

                    // Appel à python

                    //echo "..............<br>";
                    //$fichier_py = "back.py";

                    //$dir = getcwd();
                    //$chemin = $dir . "/" . $fichier_py;
                    //$chemin = $fichier_py;

                    //echo $chemin;
                    //echo "<br>";

                    //$cmd = "python " . " " . $chemin . " " . $fichier_figure;
                    //echo $cmd;
                    //$output = null;
                    //$retval = null;
                    //$sortie = exec($cmd, $output, $retval);
                    //echo "<br>";
                    //print_r($sortie);
                    //$output = shell_exec($cmd);
                    //echo "<pre>$output</pre>";
                    //$nom_courbes = $symbol . "_courbes.png";

                    //echo $nom_histo;

                ?>
                <?php } else {
                } ?>

                <center>
                    <?php echo "<img src=\"data:image/png;base64,$output[8]\" align=\"middle\" style=\"width:800px;height:750px;\"\>"; ?>
                </center>
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