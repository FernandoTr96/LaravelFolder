<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /* contrareio a fillable especifica que campos no quieres insertar */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /* ACCESORES Y MUTADORES */

    /* accesor: retorna el valor de la base de datos original y puedes modificarlo sin afectar el valor de la db */
    public function getNameAttribute($value){
        return ucfirst($value);
    }

    /* mutador: cambia el valor del atributo antes de guardarlo en la db */
    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }

    /* modificar el binding de las rutas para obtener otro dato y no el objeto como tal */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    /*  Los atributos del modelo pueden ser parseados usando casts
        protected $casts = [
            'propiedad' => 'float',
            'propiedad' => 'datetime',
            'propiedad' => 'boolean',
            'propiedad' => 'array',
            'propiedad' => 'json',
            'propiedad' => 'collection',
        ];
    */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /* RELACIONES DE MODELOS */

    /* relacion uno a uno 
        - tiene un elemento: $this->hasOne(Profile::class);
        - a que entidad pertenece: $this->belongsTo(User::class);
    */

    /* relacion uno a muchos  
        - tiene muchos elementos: $this->hasMany(Post::class);
        - a que entidad pertenece uno de estos elementos: $this->belongsTo(User::class);
    */

    /* relacion muchos a muchos 
        - tiene muchos elementos: $this->belongsToMany(Role::class);
        - a que entidad pertenece uno de estos elementos: $this->belongsToMany(User::class);
        - en estos casos es neccesaria una tabla pivote mediante una migracion la cual tendra las llaves foraneas de ambas tablas
        - finalmente la relacion inversa belongs to many esperara el nombre de la tabla y los campos
        $this->belongsToMany(Role::class, 'usuarios_roles', 'usuario_id', 'rol_id')->withTimestamps();
    */

    /* relacion indirecta entre 2 modelos 
       - obtener resultados de otro modelo usando otro como intermediario 
       - company debe tener el id del pais y del empleado de esta forma mediante el pais sabes cuantos empleados hay
       País (Country) → Compañía (Company) → Empleado (Employee)
       $this->hasManyThrough(Employee::class, Company::class, 'country_id', 'company_id');
    */

    /* relaciones auto referenciadas  
       - cuando el mismo registro guarda una referencia de id de otro registro de la misma entidad
       - pero que tendra una funcion diferente
        Ejemplo: Un empleado tiene un jefe (otro empleado) entonces en el mismo modelo.
        
        public function subordinates()
        {
            return $this->hasMany(Employee::class, 'manager_id');
        }

        public function manager()
        {
            return $this->belongsTo(Employee::class, 'manager_id');
        }
    */
}
