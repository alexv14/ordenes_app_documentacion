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
    <div class="jumbotron text-black" style=" background: url({{asset('assets/img/documentacion/ui-mockup.jpg')}}); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <h1 class="display-3">Estructuras de control Blade</h1>
            <p>Entender las funciones php que pueden ser utilizadas en el motor de plantillas Blade de Laravel</p>
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
                    <h2 class="h5">Estructuras de control</h2>
                    <p> Blade también proporciona bloques de códigos como atajos para estructuras de control PHP comunes, como declaraciones condicionales y bucles. 
                        Estos atajos proporcionan una forma muy limpia y concisa de trabajar con estructuras de control de PHP,
                        al tiempo que siguen siendo similares a la sintaxis de PHP.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">Sentencia IF</h2>
                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">
                        @php
                            $code = '
                                @if (count($records) === 1)
                                   Tengo un registro
                                @elseif (count($records) > 1)
                                   Tengo multiples registros
                                @else
                                    No tengo registros
                                @endif
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

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">Funciones isset() empty():</h2>
                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">
                        
                        @php
                            $code = '
                            @isset($records)
                                // $records está definido y es not null...
                            @endisset

                            @empty($records)
                                // $records está "vacío"...
                            @endempty
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

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">Funciones Switch:</h2>
                <p>Las instrucciones Switch se pueden construir utilizando las directivas <code>switch</code>, <code>case</code>, <code>default</code>, <code>endswitch</code>.</p>
                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">
                        
                        @php
                            $codeswitch = '
                            @switch($i)
                                @case(1)
                                    Primer caso...
                                    @break

                                @case(2)
                                    Segundo caso...
                                    @break

                                @default
                                    Default...
                            @endswitch
                        
                            '
                        @endphp
                        <pre class="text-white">
                           {{$codeswitch}}
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">Loops:</h2>
                    <p>Blade proporciona directivas simples para trabajar con las estructuras de bucle de PHP. Nuevamente, cada una de estas directivas funciona de manera idéntica a sus contrapartes PHP:</p>
                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">
                        
                        @php
                            $code = '
                            @for ($i = 0; $i < 10; $i++)
                                The current value is {{ $i }}
                            @endfor

                            @foreach ($users as $user)
                                <p>This is user {{ $user->id }}</p>
                            @endforeach

                            @forelse ($users as $user)
                                <li>{{ $user->name }}</li>
                            @empty
                                <p>No users</p>
                            @endforelse

                            @while (true)
                                <p>Im looping forever.</p>
                            @endwhile
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