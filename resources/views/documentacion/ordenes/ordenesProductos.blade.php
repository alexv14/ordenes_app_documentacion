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
            <h1 class="display-3">Detalle de la orden</h1>
            <p>El objetivo es al darle click a una orden ir a su detalle en donde podremos ver los productos que contiene una orden. </p>
            <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>-->
            <p> *Es requerido tener la estructura de producto para poder crear la relación de orden con producto</p>
        </div>
    </div>

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">Crear la migración para la table de relación (pivote) de la orden con los productos </h2>

                    <div class=" bg-dark rounded px-5 py-2 my-2">
                        <code>
                            php artisan make:migration create_order_products_table
                        </code>
                        <br/>
                        <code>
                            php artisan migrate
                        </code>
                    </div>
                    
                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">

                        <p>Esquema:</p>
                        <pre class="text-white">
                            Schema::create('order_products', function (Blueprint $table) {
                                $table->foreignId('product_id');
                                $table->foreignId('order_id');
                                $table->boolean('finished');
                            });
                        </pre>
                        <br/>
                        <pre  class="text-white">
                            Schema::table('order_products', function (Blueprint $table) {
                                $table->foreign('product_id')->references('product_id')->on('product');
                                $table->foreign('order_id')->references('id')->on('order');
                            });
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
                    <h2 class="h5">Crear un seeder para llenar la relación orden-productos de datos mock</h2>

                    <div class=" bg-dark rounded px-5 py-2 my-2">
                        <code>
                            php artisan make:seeder TempOrderProductsSeeder 
                        </code>
                        <br/>
                    </div>

                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">

                        <p>Seeder:</p>
                        <pre class="text-white">
                            public function run()
                            {
                                $table = 'order_products';

                                $arr = [
                                    ['product_id' => '1', 'order_id' => '1', 'finished' => true],      
                                    ['product_id' => '1', 'order_id' => '1', 'finished' => false], 
                                    ['product_id' => '2', 'order_id' => '1', 'finished' => false], 
                                    ['product_id' => '5', 'order_id' => '1', 'finished' => false], 
                                    ['product_id' => '6', 'order_id' => '1', 'finished' => false],
                                    ['product_id' => '7', 'order_id' => '1', 'finished' => false]  
                                ];

                                DB::table($table)->insert($data);
                                
                            }

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
                    <h2 class="h5">Agregar la relación al modelo "Order"</h2>
                    <p>Crearemos la función que servirá para relacionar ordenes con productos.</p>

                    <div class="border rounded py-4 px-5">
                        <p>Eloquetn ORM: tiene disponible varios tipos de relaciones, estas son las básicas </p>

                        <ul>
                            <li>One To One</li>
                            <li>One To Many</li>
                            <li>One To Many (Inverse)</li>
                            <li> Many To Many</li>
                        </ul>

                        <p>* Utilizaremos <code>Many To Many</code> para acceder a los productos</p>
                        <pre>
                            order
                                id - integer
                                name - string

                            product
                                id - integer
                                name - string

                            order_products
                                orden_id - integer
                                product_id - integer
                                finished - bool
                        </pre>
                        <hr>
                        <div class=" bg-dark text-white rounded  py-2 my-2">
                            <pre class="text-white">
                                public function products()
                                {
                                    return $this->belongsToMany('App\Products');
                                }
                            </pre>
                        </div>
                        <p>* Eloquent unirá los dos nombres de modelo relacionados en orden alfabético. Sin embargo, esta convención es posible de anular. Puede hacerlo pasando un segundo argumento al belongsToManymétodo:</p>
                        
                            <code>
                                $this->belongsToMany('App\Products', 'order_products');
                            </code>
                        <p>* Además de personalizar el nombre de la tabla de unión, también puede personalizar los nombres de columna de las claves en la tabla pasando argumentos adicionales al método belongsToMany</p>
                        <p>El tercer argumento es el nombre de la clave externa del modelo en el que está definiendo la relación, mientras que el cuarto argumento es el nombre de la clave externa del modelo al que se está uniendo:</p>
                            
                        <code>
                            return $this->belongsToMany('App\Products', 'product_id', 'role_user', 'role_id');
                        </code>
                    </div>
                    <div class="border rounded py-4 px-5 my-2">
                        <p>Una vez que se define la relación, puede acceder a <strong>productos</strong> utilizando la  propiedad dinámica: <code>products</code></p>
                        <div class=" bg-dark text-white rounded  py-2 my-2">
                            <pre class="text-white">
                                $order = App\Order::find(1);

                                foreach ($order->products as $product) {
                                    
                                }
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col col-md-22 ">
                <div class="w-100 bg-light shadow-sm rounded px-4 py-4">
                    <h2 class="h5">Crear la ruta  </h2>
                    <p>Crearemos la ruta para acceder al método show y crear la lógica para obtener la orden y los productos.</p>
                    <p>recibiendo por método <code>get</code> el <code>id</code> de la orden</p>

                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">

                        <p>Ruta web:</p>
                        <pre class="text-success">
                            Route::get('/order/{id}', 'OrderController@show')->name('order.show');
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
                    <h2 class="h5">Método show</h2>
                    <p>EL método <code>show</code> es el encargado de desplegar un recurso específico</p>
                    <p><code>// @param  int  $id</code></p>
                    <p><code>// @return \Illuminate\Http\Response</code></p>
                   
                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">
                        <pre class="text-white">
                            /**
                            * Display the specified resource.
                            *
                            * @param  int  $id
                            * @return \Illuminate\Http\Response
                            */
                            public function show($id)
                            {
                                <span class="text-success">//</span>
                            }
                        </pre>
                    </div>

                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">
                        <pre class="text-white">
                            <span class="text-success">//Obtenemos la orden</span>
                            $order = App\Order::find($id);

                            <span class="text-success">//Creamos la respuesta</span>
                            $ordersResponse = (object)[
                                'id'        => $order->id, 
                                'name'      => $order->name, 
                                'finished'  => $order->finished,
                                'products'  => []
                            ];

                            <span class="text-success">//Se declara un array para productos  'products'  => []</span>

                            <span class="text-success">//Agregamos los productos al arreglo $ordersResponse->products</span>
                            foreach ($order->products as $product) {
                                $ordersResponse->products[] = (object)['name' => $product->name];  
                            }

                            <span class="text-success">//Retornamos a la vista</span>
                            return view('order.show', ['orders' => $ordersResponse]);
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
                    <h2 class="h5">Redireccionar al controlador</h2>
                    <p>Ligar el listado a la ruta por medio de una etiqueta <code>a</code></p>

                    <div class=" bg-dark text-white rounded px-5 py-2 my-2">

                        <p>anchor route:</p>
                        
                        <pre class="text-success">
                            route('order.show', ['id' => 1])
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
                    <h2 class="h5">Todo listo</h2>
                    <p>Ahora conecta los datos con la <code>UI</code></p>

                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>