<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria Villanueva García</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/alfgow.css">
</head>

<body class="p-3">

    <header class="row  align-items-center pb-3">

        <div class="col-8 col-md-12 pb-3  text-center ">
            <img class="img-fluid logo" src="./img/logo-inmobiliaria-villanueva-garcia.jpg" alt="Inmobiliaria en CDMX">
        </div>


        <div class="col-4 col-md-12   ">

            <i class="bi bi-menu-down fs-1 menuMovil p-2 d-md-none"></i>

            <div id="navegacion" class="d-none d-md-block fs-md-4">
                <nav class="navbar-nav container d-flex flex-md-row justify-content-evenly text-center ">
                    <a class="text-dark text-decoration-none" href="#">Inicio</a>
                    <a class="text-dark text-decoration-none" href="#">Nosotros</a>
                    <a class="text-dark text-decoration-none" href="#">Inmuebles</a>
                    <a class="text-dark text-decoration-none" href="#">Blog</a>
                    <a class="text-dark text-decoration-none" href="#">Arrendamiento Seguro</a>

                </nav>



            </div>



        </div>
    </header>

    <div class="hero" id="hero"></div>

    <section class="container-xl pt-5 text-center">
        <h1>Inmobiliaria en CDMX</h1>


        <h3>Aquí te presentamos algunos inmuebles destacados</h3>
        <i class="bi bi-arrow-down-circle display-3 flecha"></i>
        <div class="row pt-3">

<?php
$url = 'https://api.easybroker.com/v1/properties?search%5Bstatuses%5D%5B%5D=published';
$curl = curl_init();
// OPTIONS:
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'X-Authorization: vc7t7o5uopriecledy5mrsd7qb3nml',
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
// EXECUTE:
$uno = curl_exec($curl);
//Desmarañando
$resultado = json_decode($uno, true);
$entrando = $resultado["content"];

foreach ($entrando as $propiedades) {

    $id = $propiedades['public_id'];

    $op = $propiedades['operations'];
    $op2 = $op['0'];

    $tipooperacion = '';
    if ($op2['type'] === 'sale') {
        $tipooperacion = 'Venta';
    } elseif ($op2['type'] === 'rental') {
        $tipooperacion = 'Renta';
    }

    $url2 = "https://api.easybroker.com/v1/properties/" . $id;
    $curl2 = curl_init();
    // OPTIONS:
    curl_setopt($curl2, CURLOPT_URL, $url2);
    curl_setopt($curl2, CURLOPT_HTTPHEADER, array(
        'X-Authorization: vc7t7o5uopriecledy5mrsd7qb3nml',
    ));
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl2, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $dos = curl_exec($curl2);
    //Desmarañando
    $resultadoindividual = json_decode($dos, true);
    $tag = $resultadoindividual['tags'];
    $tagprincipal = $tag[0];

    $operacion = $resultadoindividual["operations"][0]["type"];

    if ($tagprincipal === 'Destacado') {?>

      <!-- //print("<pre>".print_r($resultadoindividual,true)."</pre>"); -->

             <!-- <?php echo '<pre>' . var_dump($resultadoindividual["operations"]) . '</pre>' ?> -->

            <div class="col-md-4 propiedadDestacada">
                <div class="overflow-hidden">
                    <img class="img-fluid"
                        src="<?php echo $resultadoindividual["property_images"][0]["url"] ?>"
                        alt="Categoria 2">
                </div>
                <p class="text-decoration-none text-dark fs-2 d-block text-center py-3" href=" #">
                    <button class="btn btn-success fs-5" disabled="disabled">
                        <?php
if ($operacion === 'rental') {
        echo 'Renta';
    } else {
        echo 'Venta';
    }
        ?>
                    </button>

                         Colonia: <?php echo $resultadoindividual["location"]["name"] ?>
  <span class="text-danger"><?php echo $resultadoindividual["operations"][0]["formatted_amount"] ?> <?php echo $resultadoindividual["operations"][0]["currency"] ?>

</span>
                    </p>

            </div>



      <?php }

    // print("<pre>".print_r($tag,true)."</pre>");

}

?>





        </div>
    </section>


    <section class="container-xl pt-5 text-center ">
        <h2 class="display-1 display-md-3">Nosotros...</h2>
        <div class="row pt-3 nosotros align-items-center  justify-content-evenly">
            <div class="col-md-4  pb-3 pb-md-0  text-md-end">
                <img src="./img/logo-inmobiliaria-villanueva-garcia.jpg" alt="" class="logoNosotros">
            </div>
            <div class="col-md-6  text-md-start mb-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum,
                assumenda
                totam
                sequi
                repudiandae obcaecati velit incidunt accusamus impedit dolore iste vel ut maxime ipsa ullam doloribus
                minima pariatur quisquam aspernatur.</div>

        </div>
    </section>


</body>

<footer class="container-xl mt-3  text-center footer">

    <div class="row  mt-2">
        <div class="col-12 col-md-6 col-lg-4 pt-4 pb-4 pb-md-0">
            <h3 class="text-danger">Nuestra Ubicación</h3>
            <h5 class="text-success">Av. Ejército Nacional 505, Col. Granada, Alcaldía Miguel Hidalgo, C.P. 11520, CDMX
            </h5>
        </div>
        <div class="col-12 col-md-6 col-lg-4  row pt-4 pb-4 footerLegales">
            <h3 class="text-danger">Avisos Legales</h3>
            <div class="col-6 bfooter">
                <p class="text-primary">
                    Términos y condiciones
                </p>
                <i class="bi bi-file-check display-4  text-success"></i>
            </div>
            <div class="col-6 ">
                <p class="text-primary">
                    Aviso de Privacidad
                </p>
                <i class="bi bi-file-earmark-lock2 display-4  text-success"></i>
            </div>
        </div>
        <div class="col-12  col-lg-4  row pt-sm-4 pt-4 footerContacto">
            <h3 class="text-danger">Contacto</h3>
            <div class="col-4 bfooter">
                <p class="text-success"><i class="bi bi-whatsapp display-4 "></i></p>
            </div>
            <div class="col-4 bfooter">
                <p class="text-primary"><i class="bi bi-telephone-inbound display-4 "></i></p>
            </div>
            <div class="col-4">
                <p class="text-dark"><i class="bi bi-envelope-check display-4 "></i></p>
            </div>
        </div>
        <div class="align-items-center footerCopy w-100 mt-3">
            <p class="col-12 m-0">Diseñado y Programado por alfgow ©2022</p>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script src="./js/index.js"></script>
<script src="./js/app.js"></script>

</html>
