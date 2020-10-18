<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';

    protected $fillable = ['dish_name','description','allergy','price'];

    public function indexPath()
    {
        return "/menu/";
    }
    public function showPath()
    {
        return "menu/". $this -> id;
    }

    public function editMenuPath()
    {
        return $this -> id . '/edit';
    }
    public function deleteMenuPath()
    {
        return $this -> id . '/delete';
    }
    public function createMenuPath()
    {
        return 'menu/create';
        //use with post and get
    }
}