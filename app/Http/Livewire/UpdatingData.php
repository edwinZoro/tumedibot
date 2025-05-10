<?php

namespace App\Http\Livewire;

use App\Models\Medico;
use App\Models\Factura;
use App\Models\User;
use App\Models\Especialidades;
use App\Models\Pais;
use App\Models\State;
use App\Models\Ciudad;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use DB;
class UpdatingData extends Component
{
	use WithPagination;
	public $nombre,$apellido,$precio,$especialidad,$estado,$municipio,$ciudad,$stated,$mun;
	protected $paginationTheme = 'bootstrap';

    public function updatingNombre() {
        $this->resetPage();
    }
    public function updatingApellido() {
        $this->resetPage();
    }
    public function updatingPrecio() {
        $this->resetPage();
    }
    public function updatingEspecialidad() {
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
        $especialidades = Especialidades::all();
        $state = Pais::all();

        $municipio_a = State::where('pais_id','=',$this->estado)->get();

        $parroquia_a = Ciudad::where('state_id','=',$this->municipio)->get();
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->Where('nombre','LIKE', '%' .$this->nombre. '%')
        ->Where('apellido','LIKE', '%' .$this->apellido. '%')
        ->Where('consultorio_costo','LIKE', '%' .$this->precio. '%')
        ->Where('especialidad_id','LIKE', '%' .$this->especialidad. '%')
        ->Where('pais_id','LIKE', '%' .$this->estado. '%')
        ->Where('estado_id','LIKE', '%' .$this->municipio. '%')
        ->Where('ciudad_id','LIKE', '%' .$this->ciudad. '%')
        ->Paginate(10);

        return view('livewire.updating-data',["lista_medico"=>$lista_medico, 'especialidades'=>$especialidades, "state" => $state, "municipio_a" => $municipio_a, "parroquia_a" => $parroquia_a]
        );
    }

}
