<?php

namespace App\Models\Games;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeiaDev extends Model
{
    use HasFactory;

    public static $vectorMenuIdeias = [
        [
            'name' => 'Matemática',
            'desc' => 'Neste sistema você consegue gerar operações matemáticas, de forma aleatoria, e consultar os resultados por operação e por acerto ou erro.',
            'url' => 'games/matematica'
        ],
        [
            'name' => 'Fala',
            'desc' => 'Neste sistema você será desafiado a diser as palavras que apareceram na tela, para isso terá que ter um microfone conectado ao seus dispositivo.',
            'url' => 'games/fala'
        ],
        // [
        //     'name' => 'Gravador IMG',
        //     'desc' => 'Neste sistema você poderá gravar vídeos pela webcam e quando finalizar poderá baixar o arquivo da gravação..',
        //     'url' => 'games/gravador-img'
        // ],
       
        // [
        //     'name' => 'Gravador Tela',
        //     'desc' => 'Neste sistema você poderá gravar uma janela e quando finalziar poderá baixar a gravação .',
        //     'url' => 'games/gravador-tela'
        // ],
        [
            'name' => 'Gravador Voz',
            'desc' => 'Neste sistema você poderá gravar tudo que falar e baixar o arquivo de texto quando finalizar a gravação.',
            'url' => 'games/gravador-voz'
        ],
        // [
        //     'name' => 'Desenho',
        //     'desc' => 'Neste sistema você podera brincar de desenha com o mouse, parecido com o famoso PAINT.',
        //     'url' => 'games/desenho'
        // ],
        // [
        //     'name' => 'Cobrinha',
        //     'desc' => 'Neste sistema você podera relembrar os bons tempos do jogo da cobrinha pelos primeiros celulares.',
        //     'url' => 'games/cobrinha'
        // ],
        [
            'name' => 'RGB',
            'desc' => 'Neste sistema você podera misturar cores seguindo o padrão RGB e descobrir o nome da cor misturada.',
            'url' => 'games/rgb'
        ],
    ];
}

// forca e matematica => criar banco de dados onde podem registrar nomes, turma, e nessa seção eles vao armazenando os resultados
