<?php

function head()
{
    return "<!doctype html>
    <html lang='en'>
    
    <head>
        <!-- Required meta tags -->
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
    
        <!-- Bootstrap CSS -->
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
              <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
        <title>Projet cubes 2</title>
    </head>
    <body>
    ";
}


function nav($get)
{
    $nav = "
<nav class='navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light'>
  <div class='container'>
    <a class='navbar-brand' href='index.php'>Navbar</a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNav'>
      <ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link " . ($get == '' ? 'active' : '') . "' aria-current='page' href='index.php'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link " . ($get == 'graphique' ? 'active' : '') . "' href='index.php?p=graphique'>Graphique</a>
        </li>
         <li class='nav-item'>
        <a class='nav-link " . ($get == 'connexion' ? 'active' : '') . "' href='index.php?p=connexion'>Connexion</a>
      </li>
      </ul>
    </div>
  </div>
</nav>
 ";
    return $nav;
}


function body($page = false)
{
    $html = "";
    if ($page) {

        switch ($page) {
            case 'grahpique':

                $html .= "  <main class='container'>
                                <h1>Page du graphique</h1>
                                    <div id='curve_chart'></div>
                                </main>
                               ";
                break;
            case 'connexion':
                $html .= "
                        <main class='container'>
                        <form>
                        <div class='mb-3'>
                          <label for='exampleInputEmail1' class='form-label'>Email address</label>
                          <input type='email' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'>
                          <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
                        </div>
                        <div class='mb-3'>
                          <label for='exampleInputPassword1' class='form-label'>Password</label>
                          <input type='password' class='form-control' id='exampleInputPassword1'>
                        </div>
                        <div class='mb-3 form-check'>
                          <input type='checkbox' class='form-check-input' id='exampleCheck1'>
                          <label class='form-check-label' for='exampleCheck1'>Check me out</label>
                        </div>
                        <button type='submit' class='btn btn-primary'>Submit</button>
                        </form></main>
                        ";
                break;
        }
    } else {
        $html .= "
            <main class='container'>
            <h1>Accueil</h1>
            </main>
            ";
    }
    return $html;
}


function footer()
{
    return "<footer></footer>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js' integrity='sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW' crossorigin='anonymous'></script>
<script type='text/javascript' src='assets/graph.js'>
    </script>
    </main>
    </body>
    
    </html>";

}

