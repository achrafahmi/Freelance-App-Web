<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class projet extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'societe',
        'prix',
        'description',
        'idCreateur',
        'idCategory',
        'isAvailable',
        
    ];
    





    public function save(array $options = []): bool
   {
    $saved = parent::save($options);
    return $saved;
   }
//========================================
   public function update(array $attributes = [], array $options = []): bool
{
    return $this->fill($attributes)->save($options);
}

//===========================================


public static function all($columns = ['*'])
{
    return parent::all($columns);
}


//=========================================


   public function delete(): bool
   {
       return parent::delete();
   }
   public function owner()
   {
       return $this->belongsTo(User::class, 'idCreateur');
   }
   public function category()
   {
       return $this->belongsTo(Category::class, 'idCategory');
   }

   public function scopeByCategory($query, $categoryName)
   {
       return $query->whereHas('category', function ($query) use ($categoryName) {
           $query->where('nom', $categoryName);
       })->orderBy('created_at', 'desc');
   }
   
//=====================================
public static function getProjectCounts()
{
    return self::select(
            \DB::raw('DATE(created_at) as date'),
            \DB::raw('COUNT(*) as count')
        )
        ->where('created_at', '>=', \Carbon\Carbon::now()->subDays(5))
        ->groupBy(\DB::raw('DATE(created_at)'))
        ->orderBy(\DB::raw('DATE(created_at)'))
        ->get();
}



}
