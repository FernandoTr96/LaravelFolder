### Trabajar laravel con sail
+ Descargar docker desktop y wsl activando la integracion de wsl en docker. Para mac y linux solo se ocupa docker meramente.
+ Crear un proyecto con laravel sail ejecutando curl -s https://laravel.build/mi-proyecto | bash.
+ Cuando se genere abrimos una consola en la raiz y creamos un alias para laravel sail con lo siguiente *alias sail='bash vendor/bin/sail'*
+ Si el alias se pierde hay que agregarlo por default 
```
echo "alias sail='bash vendor/bin/sail'" >> ~/.bashrc
source ~/.bashrc
```
+ Modificamos lo que quieramos y levantamos el proyecto con *sail up* o *sail up -d*.

### Comandos de laravel

#### Migraciones 
+ create: *php artisan make:migration create_tablename_table*
+ execute migration: *php artisan migrate*
+ execute one migration: *php artisan migrate --path=relativepath*
+ rollback: *php artisan migrate:rollback*
+ refresh: *php artisan migrate:refresh*
+ add data: *php artisan make:migration add_propertyname*
+ drop table: *php artisan make:migration drop_tablename*
+ alter column: *php artisan make:migration alter_colname_from_tablename_table* 
+ rename column: *php artisan make:migration rename_colname_from_tablename_table*

#### Jobs
+ create: *php artisan make:job test*
+ queue: *php artisan make:queue-table* *php artisan migrate*

#### Listeners and events
+ create: *php artisan make:event eventName*
+ create: *php artisan make:listener listenerName*

#### middleware
+ create: *php artisan make:middleware auth*

### email
+ create: *php artisan make:mail NombreDelMailable*

#### Otros
+ crear cast personalizado para modelos: *php artisan make:cast NombreDelCast*
`
    protected $casts = [
        'precio' => PrecioCast::class,
    ];
`

#### Recordatorios de uso
+ Hay que usar mas cursor, lazy y chunk para iteraciones.
+ El modelo tiene casts, mutadores, accesors, configuracion de binding, etc.
+ Considerar puck, with para cargar relaciones, when para disparar queries, los AND que son query anidadas del where, exists, doesntExist, whereHas, where, doesntHas,etc.
+ Existen las relaciones "atravez de (through)" y las relaciones autoreferenciadas.
+ usar jobs y queues para operaciones asyncronas donde el procedimiento es pesado
+ Los middlewares protegen rutas
+ Los gates protegen los elementos ui de las vistas mediante directivas y la condicion establecida  en el gate
+ Las policies son un conjunto de reglas asociadas a un modelo
+ Usar scopes para modificar consultas en los modelos, los scope locales van en el modelo los globales los creas en App/Scopes y debe implementar Scope en un metodo apply. Luego ese scope se llama en el modelo que quieras usando booted y dentro static::addGlobalScope(new NotDeletedScope).
+ usar full text search en vez de query like para muchos datos es mas eficiente.
`
    $table->fullText(['title', 'body']);

    $articles = DB::table('articles')
    ->whereRaw("MATCH(title, body) AGAINST(? IN NATURAL LANGUAGE MODE)", ['medicine'])
    ->get();
`