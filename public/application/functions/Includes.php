<?php
require_once("application/class/DB.class.php");
$db = new DB;
function get_head()
{
    include_once("temps/head.inc.php");
}

function get_header()
{
    include_once("temps/header.inc.php");
}

function get_partners()
{
    include_once("temps/partners.inc.php");
}

function get_footer()
{
    include_once("temps/footer.inc.php");
}

function get_nav_adm()
{
    include_once("temps/navAdm.inc.php");
}

function get_movies($error = 0)
{
    $db = new DB;
    if ($error == true) {
        echo "<h1 id='movies-404'>O filme não foi encontrado, confira alguns filmes abaixo ou utilize o menu de navegação.</h1>";
    }
    $sql = $db->con()->prepare("SELECT id_post, title, link, sinopse, poster, category, duration, year, size, quality FROM mt_posts ORDER BY id_post DESC LIMIT 10");
    $sql->execute();
    echo "<div id='all-movies' class='boxes'>",
    "<h1 class='section-title'>Filmes</h1>";
    while ($ftc = $sql->fetchObject()) {
        echo "<a href='movies/$ftc->link'>",
        "<div class='item'>",
        "<img src='$ftc->poster' />",
        "<div class='info'>",
        "<h1>$ftc->title</h1>",
        "</div>",
        "</div>",
        "</a>";
    }
    echo "</div>";
    echo "<div id='loading'><img src='lib/images/loading.gif' /></div>";
}
