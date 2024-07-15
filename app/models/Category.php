<?php

namespace App\models;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];
    public function getPaginator($limit): array
    {
        $table = $this->getTable();
        $categories = [];
        $cats = DB::select("SELECT * FROM $table ORDER BY id DESC" .$limit);
        foreach ($cats as $cat) {
            $dates = new Carbon($cat->created_at);
            $categories[] = [
                'id' => $cat->id,
                'name' => $cat->name,
                'slug' => $cat->slug,
                'created_at' => $dates->diffForHumans(),
            ];
        }
        return $categories;
    }
}