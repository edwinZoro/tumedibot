<?php

namespace App\Http\Livewire;

use App\Models\Clinica;
use App\Models\Factura;
use App\Models\User;
use App\Models\Estado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Empresarial extends Component
{
	use WithPagination;
	public $nombre,$tipo_negocio,$municipio,$estado,$ciudad;
	protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $state = Estado::all();
        $lista_empresarial = Clinica::orderBy('id','ASC')
        ->where('pagos','=','positive')
        ->Where('tipo_negocio','LIKE', '%' .$this->tipo_negocio. '%')
        ->Where('nombre','LIKE', '%' .$this->nombre. '%')
        ->Where('pais_id','LIKE', '%' .$this->estado. '%')
        ->Where('estado_id','LIKE', '%' .$this->municipio. '%')
        ->Where('ciudad_id','LIKE', '%' .$this->ciudad. '%')
        ->Paginate(5,['*'],'lista_empresarial_paginated');

        return view('livewire.updating-data',["lista_medico"=>$lista_medico,"state" => $state]);
    }
}
