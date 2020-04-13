<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ordenes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    
 
</head>
<body>
    <div class="jumbotron text-white" style=" background: url({{asset('assets/img/documentacion/security.jpg')}}); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <h1 class="display-3">Protección CSRF</h1>
            <p>Utilizando la protección <code>cross-site request forgery (CSRF)</code> que incluye laravel</p>
            <br>
            <p>
               
            </p>
            <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>-->
        </div>
    </div>



    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">¿Qué es CSRF?</h2>
                    <p> Según el sitio oficial de Wikipedia describe el CSRF (del inglés Cross-site request forgery o 
                        falsificación de petición en sitios cruzados) 
                        es un tipo de exploit malicioso de un sitio web en el que comandos no 
                        autorizados son transmitidos por un usuario en el cual el sitio web confía. 
                        Esta vulnerabilidad es conocida también por otros nombres como XSRF, enlace hostil, 
                        ataque de un click, secuestro de sesión, y ataque automático.</p>
                    <p>Laravel provee una forma fácil para protegernos de estos ataques: 
                        generando automáticamente un "token" CSRF para cada sesión de usuario activa
                    </p>
                    <p>La documentación oficial de laravel nos indica que 
                        cada vez que defina un formulario HTML en su aplicación, 
                        debe incluir un campo de token CSRF oculto en el formulario para que el middleware de
                        protección CSRF pueda validar la solicitud. Puede usar la @csrfdirectiva Blade
                        para generar el campo de token:</p>

                        <div class=" bg-dark text-white rounded px-5 py-2 my-2">
                            <p>Ejemplo</p>
                            @php
                                $code = '
                                <form method="POST" action="/order">
                                    @csrf
                                    ...
                                </form>
                                '
                            @endphp
                            <pre class="text-white">
                               {{$code}}
                            </pre>
                        </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>