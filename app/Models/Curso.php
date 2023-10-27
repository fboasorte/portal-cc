<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model{
    protected $table = 'curso';

    protected $fillable = [
        'nome',
        'turno',
        'carga_horaria',
        'sigla',
        'analytics',
        'calendario',
        'horario',

        /*
        - Nome do curso: Ciência da Computação
        - Modalidade: Presencial
        - Tipo: Bacharelado
        - Habilitação: Bacharel em Ciência da Computação
        - Ano de implantação: 2013
        - Ato de autorização: Portaria Nº 521-Reitor/2012
        - Total de vagas ofertadas anualmente: 40
        - Número de vagas ofertadas por turma: 40
        - Formas de acesso: Vestibular/SISU
        - Número de vagas disponibilizadas: 50%Vestibular e 50%SISU
        - Periodicidade de ingresso: Anual
        - Turno de funcionamento: Integral
        - Tempo para integralização do curso: Mínimo de cinco anos (10 semestres) e máximo de sete anos e meio (15 semestres)
        - Resultados obtidos nas últimas avaliações realizadas pelo MEC: ( Quatro (4) na avaliação in loco –SINAES; Nota quatro (4) no ENADE)
        */
    ];

}
