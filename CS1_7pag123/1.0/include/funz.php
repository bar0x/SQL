<?php
function scriviNavbar(){
    echo("
        <nav class=\"navbar navbar-expand-lg bg-body-tertiary\">
        <div class=\"container-fluid\">
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
            
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"index.php\">Home</a>
                </li>

                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    Città
                    </a> 
                    <ul class=\"dropdown-menu\">
                        <li><a class=\"dropdown-item\" href=\"citta.php?scelta=formNuovaCitta\">Nuova Città</a></li>
                        <li><a class=\"dropdown-item\" href=\"citta.php?scelta=listaCitta\">Lista Città</a></li>
                        <li><a class=\"dropdown-item\" href=\"citta.php?scelta=deleteCitta\">Rimuovi Città</a></li>
                    </ul>
                </li>

                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    Reparto
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li><a class=\"dropdown-item\" href=\"reparto.php?scelta=formNuovoReparto\">Nuovo Reparto</a></li>
                        <li><a class=\"dropdown-item\" href=\"reparto.php?scelta=listaReparti\">Lista Reparti</a></li>
                        <li><a class=\"dropdown-item\" href=\"reparto.php?scelta=deleteReparto\">Rimuovi un reparto</a></li>
                    </ul>
                </li>

                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    Dipendente
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li><a class=\"dropdown-item\" href=\"dipendente.php\">Nuovo Dipendente</a></li>
                        <li><a class=\"dropdown-item\" href=\"#\">Lista Dipendenti</a></li>
                        <li><a class=\"dropdown-item\" href=\"#\">Rimuovi un Reparte</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    ");
}


?>