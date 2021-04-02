<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [

        'uuid', 
        'designation',
         'description',
          'prix', 
          'pays_source', 
          'poids', 
          'like',
          'image',
    ];
    public function commande()
    {
        return $this->hasMany(Commande::class);
    }
    public function users()
    {
       return $this->belongsToMany(user::class);
    }
}
