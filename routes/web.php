<?php

/*
|--------------------------------------------------------------------------
| pagina de informacion
|--------------------------------------------------------------------------
  //https://ajgallego.gitbooks.io/laravel-5/content/capitulo_5_ejercicios.html
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('foo/bar', function()
// {
//     return '¡Hola mundo!';
// });


// Route::match(array('GET', 'POST'), '/foo', function()
// {
//     return '¡Hola mundo!';
// });

// //paramentros de las rutas
// Route::get('user/{id}', function($id)
// {
//     return 'User '.$id;
// });

// Route::get('user/{name?}', function($name = null)
// {
//     return $name;
// });

// Route::get('user/{id}/{name}', function($id, $name)
// {
//     //
// })
// ->where(
//     array('id' => '[0-9]+', 
//     'name' => '[A-Za-z]+')
// );


// //usando vistas
// Route::get('/home', function () {
//     return view('home', array('nombre' => 'Javi'));
    
//     //<h1>¡Hola <?php echo $nombre; ?</h1>     esta linea esta en la vista
//     // y si no se pasa  este array:  array('nombre' => 'Javi')
//     //genera un error
// });


// resources/views/user/register.php 
// la cargaríamos de la forma:

//     Route::get('register', function()
//     {
//         return view('user.register');
//     });



// Route::get('user/profile/{id}', function($id)
// {
//     $user = // Cargar los datos del usuario a partir de $id
//     return view('user.profile', array('user' => $user));
// });


/**      Existen otras maneras de hacelo */

// $view = view('home')->with('nombre', 'Javi');

// $view = view('user.profile')
//             ->with('user', $user)
//             ->with('editable', false);

/**
 * Vistas dentro de vistas
 */
//app/views/partials/view.php dent

$content='pruebas de children views';
// $view = View::make('home')->nest('content', 'partials.view');

// También podemos pasarle datos a la vista hija...
$view = View::make('home')->nest('partials', 'partials.view', array('content' => $content));


/**
 *  utilizaremos:: view('home') tanto si el fichero
 * se llama home.php como: :  home.blade.php.
 */

 /**
  * el código que incluye Blade en una vista empezará 
   * por los símbolos @ o {{, el cual posteriormente 
   * será procesado y preparado para mostrarse por pantalla
  */

  /**
   * as llaves dobles ({{ }}) y dentro de ellas escribiremos la variable o función con el contenido a mostrar:
    *Hola {{ $name }}.
    *La hora actual es {{ time() }}.
   */


   /** */

   /** 
    * Mostrar un dato solo si existe
    * {{ isset($name) ? $name : 'Valor por defecto' }}
    */

    /**
     * {{-- Este comentario no se mostrará en HTML --}}
     */


     /**
      * @foreach ($users as $user)
      *      <p>Usuario {{ $user->name }} con identificador: {{ $user->id }}</p>
       * @endforeach
      */

/**
 * Plantilla dentro de otra
 * @include('view_name')
 */


 /**
  * Layouts
  */

  /**
   * resources/views/layouts/master.blade.php:
   */

/*
  <html>
    <head>
        <title>Mi Web</title>
    </head>
    <body>
        @section('menu')
            Contenido del menu
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
 */


 /**
  * en otra plantilla o vista,  extienda el layout 
  * que hemos creado (con @extends('layouts.master')) y que 
  */

  /*
    @extends('layouts.master')

@section('menu')
    @parent
    <p>Este condenido es añadido al menú principal.</p>
@endsection

@section('content')
    <p>Este apartado aparecerá en la sección "content".</p>
@endsection
   */



/**
 * Ejercicio
 */


Route::get('/login', function () {
    return view('auth.login', array('titulo' => 'Login Usuario'));   
  
});

Route::get('/logout', function () {
    return view('auth.logout', array('titulo' => 'Logout Usuario'));   
  
});

/** */
// Route::get('/catalog', function () {
//     // return view('catalog.index', array('titulo' => 'Listado películas'));   
  
// });

Route::get('/catalog/show/{id}', function ($id) {
    return view('catalog.show', array('titulo' => 'Vista detalle película '.$id));   
  
});

Route::get('/catalog/create', function () {
    return view('catalog.create', array('titulo' => ' Añadir película'));   
  
});

Route::get('/catalog/edit/{id}', function ($id) {
    return view('catalog.edit', array('titulo' => 'Modificar  película '.$id));   
  
});


/**
 * 
 */

Route::get('user/{id}', 'Auth\UserController@showProfile');


/**
 *  Para generar la caché simplemente tenemos que 
 * ejecutar el comando de Artisan:
 * php artisan route:cache
 */

 /**
  * La caché se recomienda crearla solo cuando ya
  * vayamos a pasar a producción nuestra web
  */




  /**
   * Si todo es correcto permitir que la petición 
   * continúe devolviendo: return $next($request);
    * Realizar una redirección a otra ruta para no 
    *permitir el acceso con: return redirect('home');
  * Lanzar una excepción o llamar al método abort
  * para mostrar una página de error: 
    * abort(403, 'Unauthorized action.');
   */




   /**
    * será necesario registrar primero el Middleware en la
    * clase app/Http/Kernel.php.
    */


    /**
     * Dentro de kernel de middleware
     * 
     * protected $routeMiddleware = [
     * 'auth' => \App\Http\Middleware\Authenticate::class,
 
     */

/**
 * Para asociar un filtro con una ruta que utiliza un 
 *  método de un controlador se realizaría de la
 *  misma manera pero indicando la acción mediante
 *  la clave "uses
 */


/**
 * Route::get('profile', [
  *  'middleware' => 'auth',
  *  'uses' => 'UserController@showProfile'
  *]);
 */


 /**
  * varios middlewares
  */
/**
 * Route::get('dashboard', ['middleware' => ['auth', 'es_mayor_de_edad'], function () {
  *  //...
*}]);
 */

 /**
  * Middleware dentro de controladores
  */



/**
 * los filtros también tendrán que estar registrador 
 * en el array $routeMiddleware del fichero 
 * app/Http/Kernel.php
 */

 /**
  *  la asignación en el constructor del controlador y 
  * asignar los filtros usando su clave mediante el método 
  * middleware. 
  */


/**
 *  public function __construct()
   * {
     *   // Filtrar todos los métodos
     *   $this->middleware('auth');
*
     *   // Filtrar solo estos métodos...
    *    $this->middleware('log', ['only' => ['fooAction', 'barAction']]);

    *    // Filtrar todos los métodos excepto...
    *    $this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
   * }
 */



 /**
  * Un Middleware también puede recibir parámetros

  *   añadir un tercer parámetro a la función handle del Middleware:
  */


  /**
   * public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            // No tiene el rol esperado!
        }

        return $next($request);
    }
   */


   /**
    *  en la definición de una ruta lo tendremos que
    *  añadir a continuación del nombre del filtro 
    * separado por dos puntos, por ejemplo:
    */


    /**
     * Route::put('post/{id}', ['middleware' => 'role:editor', function ($id) {
    * //
    * }]);
     */



     /**
      * Route::group, el cual recibirá como primer parámetro
      * las opciones a aplicar sobre todo el grupo y 
      * como segundo parámetro una clausula con la
      *  definición de las rutas.
      */


      /**
       * Middleware sobre un grupo de rutas
       */

       /**
        * Route::group(['middleware' => 'auth'], function () {
        * Route::get('/', function ()    {
        *     // Ruta filtrada por el middleware
        * });

        *  Route::get('user/profile', function () {
         *   // Ruta filtrada por el middleware
        *  });
      *  });
        */

    
/**
 * 
 * Grupos de rutas con prefijo
 */

 /**
  * Route::group(['prefix' => 'dashboard'], function () {
  *     Route::get('catalog', function () {  });
  *     Route::get('users', function () {  });
  * });
  */

/**
 * ejemplo para definir un grupo de rutas a 
 * utilizar en una API y crear diferentes rutas 
 * según la versión de la API podríamos hacer:
 */

 /**
  * Route::group(['prefix' => 'api'], function()
    *{
    *    Route::group(['prefix' => 'v1'], function()
    *    {
    *        // Rutas con el prefijo api/v1
    *        Route::get('recurso',      'ControllerAPIv1@getRecurso');
    *        Route::post('recurso',     'ControllerAPIv1@postRecurso');
    *        Route::get('recurso/{id}', 'ControllerAPIv1@putRecurso');
    *    });
*
    *    Route::group(['prefix' => 'v2'], function()
    *    {
    *        // Rutas con el prefijo api/v2
    *        Route::get('recurso',      'ControllerAPIv2@getRecurso');
    *        Route::post('recurso',     'ControllerAPIv2@postRecurso');
    *        Route::get('recurso/{id}', 'ControllerAPIv2@putRecurso');
    *    });
    *});
  */



/**
 * Redirecciones
 */
/**
 * return redirect('user/login')
 * return back();
 * return redirect()->action('HomeController@index');

 * anadir un parametros, se lo hace como array al fiinal
 * return redirect()->action('UserController@profile', [1]);
 */

/**
 * Redirección con los valores de la petición
 */



/**
 * return redirect('form')->withInput();
 * return redirect('form')->withInput($request->except('password'));

 */
/**
 * Este método también lo podemos usar con la función back o con la función action:
 * return back()->withInput();

 * return redirect()->action('HomeController@index')->withInput()
 */

 /**
  * Formularios
  */

 /**
  * <form action="{{ url('foo/bar') }}" method="POST">
   *     ...
  *  </form>
  */

  /**
   *  indicar directamente el método de un controlador a 
   * utilizar, por ejemplo: action('HomeController@getIndex')
   */

/**
 * Laravel establece el uso del nombre "_method" 
 * para indicar el método a usar, por ejemplo:
 * 
 *<form action="/foo/bar" method="POST">
 *    <input type="hidden" name="_method" value="PUT">
 *    ...
 *</form>

 *Laravel se encargará de recoger el valor de dicho campo y de 
 * procesarlo como una petición tipo PUT (o la que indiquemos). 


 */

 /**
  * Protección contra CSRF
  * llamar al método csrf_field después de abrir el formulario
  */
  /**
   * <form action="/foo/bar" method="POST">
   *     {{ csrf_field() }}
    *    ...
   * </form>
   */

/**
 * con Blade podemos asignar el contenido de una variable 
 * (en el ejemplo $nombre) 
 * 
 * <input type="text" name="nombre" id="nombre" value="{{ $nombre }}">

 */



 Route::get('/', array(
    'uses' => 'Home\HomeController@getHome'
 ) );

 //hay una redireccion en la anterior ruta por ello se necesita
 //aqui crear tambien la ruta del controlador  al que redirecciona
 Route::get('/catalog', array(
    'uses' => 'Catalog\MoviesController@getIndex'
 ) );


 Route::get('/custommer', array(
  'uses' => 'Custommer\CustommerController@createNew'
) );




 /**
  * bases de datos
  */

  /**
   * se puede modificar la coneccion en :
   *  config/dtabase.php
   */
  /**
   * luego usaer el comando
   * php artisan migrate:install
   */


   /**
    * Migraciones
    */

    /**
     * php artisan make:migration create_users_table --create=users
     */
    /**
     * creará un fichero de migración en la carpeta 
     * database/migrations con el nombre
     *  <TIMESTAMP>_create_users_table.php
     */
/**
 * Al añadir un timestamp a las migraciones el sistema 
 * sabe el orden en el que tiene que ejecutar
 *  (o deshacer) las mismas
 */


/**
 * Datos de entrada
 */


/**
 * Si el método del controlador tuviera más parámetros 
 * simplemente los tendremos que añadir a continuación de 
 * las dependencias, por ejemplo:
 */

 

 /**
  * public function edit(Request $request, $id)
  * {
  *     //...
  * }
  */

/**
 * Obtener los valores de entrada
 */

/**
 * $name = $request->input('nombre');

*  // O simplemente....
*  $name = $request->nombre;
 */

/**
 * Usando un valor por defecto
 * $name = $request->input('nombre', 'Pedro');
 */


/**
 * Comprobar si una variable existe
 */

/**
 * if ($request->has('nombre'))
 * {
 *     //...
 * }
 */

 /**
  * Varias formas
  */
/**
 * // Obtener todos: 
 * $input = $request->all();

 * // Obtener solo los campos indicados: 
 * $input = $request->only('username', 'password');

 * // Obtener todos excepto los indicados: 
 * $input = $request->except('credit_card');
 */


/**
 * Obtener datos de array
 */
/**
 * $input = $request->input('products.0.name');
 */


/**
 * Ficheros 
 */
/**
 * $file = $request->file('photo');

 * // O simplemente...
 * $file = $request->photo;
 * 
 * if ($request->hasFile('photo')) {
   * //...
 * }
 */


/**
 * if ($request->file('photo')->isValid()) {
  *    //...
 * }
 */


/**
 * 
 */
/**
 * // Mover el fichero a la ruta conservando el nombre original: 
 * $request->file('photo')->move($destinationPath);

 * // Mover el fichero a la ruta con un nuevo nombre:
 * $request->file('photo')->move($destinationPath, $fileName);
 */


 /**
  * otros metodos
  */
/**
 * // Obtener la ruta:
 * $path = $request->file('photo')->getRealPath();
 * 
 * // Obtener el nombre original:
 * $name = $request->file('photo')->getClientOriginalName();
 * 
 * // Obtener la extensión: 
 * $extension = $request->file('photo')->getClientOriginalExtension();
 * 
 * // Obtener el tamaño: 
 * $size = $request->file('photo')->getSize();
 * 
 * // Obtener el MIME Type:
 * $mime = $request->file('photo')->getMimeType();
 */


/**
 *  instalación de paquete
 */

/**
 * 1. 
 *  editar el fichero composer.json y en su sección "require" 
 * añadir la siguiente línea:
 * "edvinaskrucas/notification": "5.*"
 */
/**
 * 2.
 * sudo composer update
 */
/**
 * 3. editar el fichero config/app.php para añadir, en la 
 * sección providers, la siguiente línea:
 * 
 * Krucas\Notification\NotificationServiceProvider::class,
 */
/**
 * 3.1 Y en la sección aliases lo siguiente:
 * 'Notification' => Krucas\Notification\Facades\Notification::class,

 */

/**
 * 4. añadir el middleware al fichero app/Http/Kernel.php. 
 * En el array de $middlewareGroups añadimos la siguiente 
 * línea al grupo web, después de 
 * 'Illuminate\Session\Middleware\StartSession':
 * 
 * \Krucas\Notification\Middleware\NotificationMiddleware::class,

 */
/**
 * añadir el espacio de nombres de esta clase
 *  (use Notification;) en el controlador donde se usara
 * 
 */
/**
 * Controladores de recursos RESTful
 */

/**
 * tendríamos que usar el comando de Artisan 
 * php artisan make:controller <nombre-controlador> --resource
 */

Route::resource('photo', 'PhotoController');

/**
 * Esta línea de ruta crea por si sola múltiples rutas para
 *  gestionar todos los tipos de peticiones RESTful. 
 * Además, el controlador creado mediante Artisan estará 
 * preparado con todos los métodos necesarios para responder
 *  a todas las peticiones correspondientes.
 */

/**
 * Restringir rutas en un controlador RESTful
 */

/**
 * only (para que solo se creen esas rutas) o except 
 * (para que se creen todas las rutas excepto las indicadas)
 */
/**
 * Route::resource('photo', 'PhotoController',
 *              ['only' => ['index', 'show']]);

 *  Route::resource('photo', 'PhotoController',
 *              ['except' => ['create', 'store', 'update', 'destroy']]);
 */

/**
 * Rutas adicionales en un controlador tipo RESTful
 */
/**
 * Route::get('photos/popular', 'PhotoController@getPopular');
 * Route::resource('photos', 'PhotoController');
 */


/**
 * añadir middleware a un controlador tipo recurso
 */

/**
 * Route::group(['middleware' => 'auth'], function() {
 *     Route::resource('photo', 'PhotoController');
 * });
 */
/**
 * o en el constructor
 */
/**
 * class PhotoController extends Controller {
 *   public function __construct() {
 *       $this->middleware('auth');
 *       $this->middleware('log', ['only' => ['store', 'update', 'destroy']]);
 *   }
 *
 */


/**
 * API mediante controladores RESTful
 */

 /**
  * una API, ya sea mediante controladores tipo RESTful o 
  * controladores normales, es recomendable que utilicemos
  * el fichero de rutas routes/api.php en lugar de 
  * routes/web.php
  */


/**
 * en las rutas que se añadan a routes/api.php 
 * únicamente se aplican filtros para limitar el número 
 * de peticiones y para cargar los bindings
 */

 /**
  * si editamos el fichero app/Http/Kernel.php, donde 
  * dentro de su array $middlewareGroups veremos dos 
  * grupos: web y api, con los filtros que se aplican 
  * en cada caso.
  */

  /**
   *  A todas las rutas que especifiquemos en 
   * routes/api.php se les añadirá el prefijo api
   */


   /**
    * Autenticación HTTP básica sin estado
    */
  /**
   *  Al usar este sistema se solicitará siempre el 
   * usuario y contraseña, sin almacenar las credenciales 
   * del usuario. 
   */

/**
 * Laravel no incluye un Middleware por defecto para la 
 * autenticación sin estado pero lo podemos crear
 */

/**
 * php artisan make:middleware AuthenticateOnceWithBasicAuth
 */

/**
 * Por último nos faltaría registrar el middleware para
 * poder utilizarlo. Para esto abrimos el fichero 
 * app/Http/Kernel.php 
 * 
 * 'auth.basic.once' => \App\Http\Middleware\AuthenticateOnceWithBasicAuth::class,

 */


/**
 * hemos asignado el alias auth.basic.once, así que ya
 *  podemos usarlo para añadir la autenticación HTTP básica 
 */
/**
 * Route::get('api/user', function () {
 *     // Zona de acceso restringido
 * })->middleware('auth.basic.once');
 */
/**
 * $ curl --user username:password http://localhost/recurso
* $ curl -u username:password http://localhost/recurso
 */

/**
 * modelos en Arrays o JSON
 */

/**
 * $user = User::first();

 * $arrayUsuario = $user->toArray();

 * $jsonUsuario = $user->toJson();
 */

 /**
  * $arrayUsuarios = User::all()->toArray();

  * $jsonUsuarios = User::all()->toJson();
  */

/**
 * Respuestas json
 */
/**
 * $usuarios = User::all();

 * return response()->json( $usuarios );
 * return response()->json( ['name' => 'Steve', 'state' => 'CA'] );
 * para devolver un error 500 
 *   return response()->json( ['error'=>true, 'msg'=>'Error al procesar la petición' ], 500 );
 * 
 */




























