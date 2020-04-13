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
    <div class="jumbotron text-white" style=" background: url({{asset('assets/img/documentacion/checklist.jpg')}}); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <h1 class="display-3">Creando una nueva orden</h1>
            <p>Haremos uso de la función <code>create()</code> para mostrar el formulario de la nueva orden y <code>store()</code> para almacenarlo, posterior se redirecciona al detalle de la orden </p>
            <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>-->
            <!--<p> *Es requerido tener la estructura de producto para poder crear la relación de orden con producto</p>-->
        </div>
    </div>

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">Agregar las rutas que utilizaremos</h2>
            

                    @php
                        $code = "Route::get('/orders/create', 'OrderController@create')->name('order.create');"
                    @endphp

                    @php 
                        $code2 = "Route::post('/orders', 'OrderController@store')->name('order.store');"
                    @endphp

                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">
                        <code>{{$code}}</code>
                        <br>
                        <code>{{$code2}}</code>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">Crear la vista <code>create.blade.php</code></h2>
                    <p>Esta vista tendrá el formulario de la nueva orden</p>
                    <div class=" bg-dark rounded px-5 py-2 my-2">
                        <code>
                           /order/create.blade.php
                        </code>
                        <br/>
                    </div>
                    
                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">

                        @php
                        $i = '
                            <form>
                                <div class="form-group">
                                    <small id="neworderhelp" class="form-text text-muted">Personalice el nombre de la orden</small>
                                    <input type="email" class="form-control" name="name" id="name" aria-describedby="neworderhelp" value="Nueva orden">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            </form>
                            '
                        @endphp
                        <div class=" bg-dark text-white rounded px-5 py-2 my-2">
                            <pre class="text-white">{{$i}}</pre>
                        </div>
                        
                    </div>

                    <p>Una vez tenemos la <code>UI</code> de nuestro formulario tenemos que agregar 3 elementos</p>
                </div>
            </div>
        </div>
    </div>





    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">Agregando el CSRF Token</h2>
                    <p>Utilizando <a href="{{route('documentacion.csrf-token')}}">CSRF toke de Laravel</a></p>

                    <h2 class="h5"></h2>EL método POST
                    <p>Utilizando el verbo POST de esta menera <code>method="POST"</code></a></p>

                    @php
                     $code = 'action="{{' . 'route("' .'nane de la ruta'.'")' .'}}"'   
                    @endphp

                    <h2 class="h5"></h2>La Ruta al controller
                    <p>Utilizando el helper <code>route()</code> de esta manera <code>{{$code}}</code></p>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">Controller: Método <code>create()</code></h2>
                    <p>Aúnque el método create() podría contener lógica extra, en este momento solo retorna el 
                        <code>view del formulario de la siguiente manera.</code>
                    </p>


                    @php
                     $code = 'return' . 'view("order.create");'   
                    @endphp

                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">
                        <pre class="text-white">{{$code}}</pre>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">Controller: Método <code>store()</code></h2>
                    <p>El método <code>store()</code> es el encargado de contener lógica para crear un nueva registro 
                    de una orden por medio del módelo <code>Order</code>
                    </p>

                    @php
                     $code = '
                        $order = new Order();
                    '   
                    @endphp

                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">
                        <span class="text-success">//Instancia de Order model</span>
                        <pre class="text-white">{{$code}}</pre>
                        
                        @php
                        $code = '
                        $order->name = $request->name;
                        $order->finished = 0;
                        '   
                        @endphp
                        
                        <span class="text-success">//Asignar propiedades
                        <pre class="text-white">{{$code}}</pre>

                        @php
                        $code = '
                            $order->save();
                        '   
                        @endphp

                        <span class="text-success">//Llamar la función save();
                        <pre class="text-white">{{$code}}</pre>

                        @php
                        $code = '
                            return  redirect()->route("order.show", ["id" => $order->id]);
                        '   
                        @endphp
                        <span class="text-success">//Se puede acceder al id del nuevo registro por medio de la propiedad id</span>
                        <br>
                        <br>

                        <span class="text-success">//Redirect a show;
                        <pre class="text-white">{{$code}}</pre>

                       
         
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