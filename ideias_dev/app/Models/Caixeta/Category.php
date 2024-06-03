<?php

namespace App\Models\Caixeta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $vectorCategories = [];

    public static function listCategories(){
    //    $vectorCategories = ['Abraçadeiras','Acabamentos', 'Acessórios','Amortecedores', 'Borrachas', 'Buchas', 'Cilindro de Roda', 'Colas', 'Elétrico', 'Emblemas', 'Farol', 'Filtros', 'Guarnições', 'Iluminação', 'Kit de embreagem', 'Lâmpadas', 'Lubrificantes', 'Maçanetas', 'Mangueiras', 'Motor', 'Óleo de freio', 'Palhetas', 'Parafusos', 'Retentores', 'Retrovisores', 'Rolamentos', 'Segurança', 'Suportes', 'Tampas', 'Velas Ignição', 'Vidros'];
        $vectorCategories = [
            [
                "item" => "Abraçadeiras",
                "icon" => "fa-wrench"
            ],
            [
                "item" => "Acessórios",
                "icon" => "fa-car"
            ],
            [
                "item" => "Farol",
                "icon" => "fa-lightbulb"
            ],
            [
                "item" => "Filtros",
                "icon" => "fa-filter"
            ],
            [
                "item" => "Motor",
                "icon" => "fa-cogs"
            ],
            [
                "item" => "Vidros",
                "icon" => "fa-window-maximize"
            ],
            [
                "item" => "Segurança",
                "icon" => "fa-shield-alt"
            ],
            [
                "item" => "Elétrico",
                "icon" => "fa-bolt"
            ],
            [
                "item" => "Óleo de freio",
                "icon" => "fa-oil-can"
            ],
        ];
       return $vectorCategories;
    }
}
