<!DOCTYPE html>
<html lang="fr">


<head>
  <meta charset="utf-8">
  <link rel='shortcut icon' href='https://icon-library.com/images/pi-icon/pi-icon-29.jpg' />
  <title>Analyse financi&egrave;re</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <script type="text/x-mathjax-config">
    MathJax.Hub.Config({
      jax: ["input/TeX", "output/HTML-CSS"],
      extensions: ["tex2jax.js"],
      "HTML-CSS": { preferredFont: "TeX", availableFonts: ["STIX","TeX"] },
      tex2jax: { inlineMath: [ ["$", "$"], ["\\(","\\)"] ], displayMath: [ ["$$","$$"], ["\\[", "\\]"] ], processEscapes: true, ignoreClass: "tex2jax_ignore|dno" },
      TeX: { noUndefined: { attributes: { mathcolor: "red", mathbackground: "#FFEEEE", mathsize: "90%" } } },
      messageStyle: "none"
    });
    </script>
  <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML">
  </script>

  <style type="text/css">
    body {
      padding: 10px 10px 10px 20px;
      background-color: #f8f9f9;
      scroll-behavior: auto;
    }

    p {
      text-align: justify;
    }
  </style>

<body>
  <center>
    <h1> Analyse financi&egrave;re </h1>
  </center>

  <br><br>
  <h2 style="color:blue; font-weight: bold;"> Lina EL HADDAJ ENSIIE </h2>


  <br><br>

  <p style="font-family: cursive; font-size: 13pt; text-align: justify; text-justify: inter-word;">
    Ce travail a &eacute;t&eacute; r&eacute;alis&eacute; dans le cadre de mon stage de première ann&eacute;e d'&eacute;cole d'ing&eacute;nieur.
    Ce stage a &eacute;t&eacute; effectu&eacute; au Conservatoire Nationale des Arts
    et M&eacute;tiers (CNAM) au d&eacute;partement math&eacute;matiques et statistiques,
    sous la direction de <i style="font-weight: bold;"> Dariush Ghorbanzadeh </i> d'une dur&eacute;e de huit semaines
    juin-juillet 2023.
  </p>

  <br><br>
  <p style="color:red; font-weight: bold; font-size: 30px;">Le sujet du stage : Indicateurs pour l'analyse technique de l'évolution du prix d'un actif
  </p>

  <p>
    <b> RSI (Relative Strength Index) :</b>
    <br>
    Le RSI est un <b>indicateur de momentum</b> utilisé pour <b>évaluer la force et la faiblesse d'un actif</b> financier. Il mesure la <b>vitesse et l'ampleur des variations des prix</b> et se situe dans une fourchette de 0 à 100.
    <br>
    Un RSI supérieur à 70 est généralement considéré comme un signe de surachat, indiquant que l'actif pourrait être surévalué et susceptible de connaître une correction à la baisse. Un RSI inférieur à 30 est généralement considéré comme un signe de survente, indiquant que l'actif pourrait être sous-évalué et susceptible de connaître une correction à la hausse.
  </p>

  <p>
    <b> MFI (Money Flow Index) : </b>
    <br>
    Le MFI est un <b>indicateur de momentum</b> similaire au RSI, qui prend en compte non seulement les <b>variations des prix</b>, mais également les <b>volumes de transactions</b>.
    Il <b>mesure la pression d'achat et de vente sur un actif</b> financier en utilisant une échelle de 0 à 100.
    <br>
    Un MFI supérieur à 80 est généralement considéré comme un signe de surachat, tandis qu'un MFI inférieur à 20 est généralement considéré comme un signe de survente.
  <p>

  <p>
    <b> MACD (Moving Average Convergence Divergence) : </b>
    <br>
    Le MACD est un <b>indicateur de tendance</b> qui combine des moyennes mobiles exponentielles (MME) pour <b>générer des signaux d'achat et de vente</b>. Il se compose de deux lignes principales : la ligne MACD et la ligne de signal.
    Lorsque la ligne MACD croise la ligne de signal de bas en haut, cela peut être interprété comme un signal d'achat, indiquant une possible inversion de la tendance à la hausse. En revanche, lorsque la ligne MACD croise la ligne de signal de haut en bas, cela peut être interprété comme un signal de vente, indiquant une possible inversion de la tendance à la baisse.
  </p>


  <?php include './includes/secteurs.php'; ?>


  <br><br>




</body>

</html>