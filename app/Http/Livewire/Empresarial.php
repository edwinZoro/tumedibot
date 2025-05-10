<?php

namespace App\Http\Livewire;

use App\Models\Clinica;
use App\Models\Factura;
use App\Models\User;
use App\Models\Pais;
use App\Models\State;
use App\Models\Ciudad;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Empresarial extends Component
{
	use WithPagination;
	public $negocio,$nombre,$municipio,$estado,$ciudad;
	protected $paginationTheme = 'bootstrap';

    public function updatingNegocio() {
        $this->resetPage();
    }
    public function updatingNombre() {
        $this->resetPage();
    }
    public function updatingEstado() {
        $this->resetPage();
    }
    public function updatingMunicipio() {
        $this->resetPage();
    }
    public function updatingCiudad() {
        $this->resetPage();
    }
    public function updatedEstado() {
         $this->ciudad = '';
         $this->municipio = '';
    }
    public function updatedMunicipio() {
         $this->ciudad = '';
    }
    public function updatedCiudad() {
         $this->resetPage();
    }

    public function render()
    {
        $state = Pais::all();

        $municipio_a = State::where('pais_id','=',$this->estado)->get();

        $parroquia_a = Ciudad::where('state_id','=',$this->municipio)->get();
        
        $lista_empresarial = Clinica::orderBy('id','ASC')
        ->where('pagos','=','positive')
        ->Where('tipo_negocio','LIKE', '%' .$this->negocio. '%')
        ->Where('nombre','LIKE', '%' .$this->nombre. '%')
        ->Where('estado_id','LIKE', '%' .$this->estado. '%')
        ->Where('municipio_id','LIKE', '%' .$this->municipio. '%')
        ->Where('parroquia_id','LIKE', '%' .$this->ciudad. '%')
        ->Paginate(15);

        return view('livewire.empresarial',["lista_empresarial"=>$lista_empresarial,"state" => $state, "municipio_a" => $municipio_a, "parroquia_a" => $parroquia_a]);
    }
}
