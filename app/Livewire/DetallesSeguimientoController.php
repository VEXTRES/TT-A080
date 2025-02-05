<?php

namespace App\Livewire;

use App\Models\Progress;
use Livewire\Component;

class DetallesSeguimientoController extends Component
{
    public $trackings,$idPlan,$title;

    public function mount($id){
        $this->idPlan = $id;

        $this->trackings= Progress::where('meal_plan_id',$this->idPlan)->get();

        $this->title= $this->trackings->pluck('title','meal_plan_id')->unique()->toArray();



    }



    public function render()
    {
        return view('livewire.detalles-seguimiento-controller');
    }
}
