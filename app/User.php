<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

/*
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
*/


class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{
    use Authenticatable, CanResetPassword, HasRoleAndPermission;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username','tipo','name','apellido','email', 'password','oficina_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function oficina(){
        return $this->belongsTo('App\Oficina');
    }

    public function equipo(){
        return $this->hasOne('App\Equipo');
    }

    public function incidentes(){
        return $this->hasMany('App\Incidente');
    }

    public function comentarios(){
        return $this->hasMany('App\Comentario');
    }
    // Creación del Scope llamado Buscar.
    //return $query->where('columna (titulo)','cuando sea igual(LIKE)',a la variable ("%titulo%")
    public function scopeBuscar($query, $name){
        return $query->where('name','LIKE',"%$name%");
    }
}
