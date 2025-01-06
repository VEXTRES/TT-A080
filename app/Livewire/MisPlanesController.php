<?php

namespace App\Livewire;

use App\Models\Survey;
use Livewire\Component;

class MisPlanesController extends Component
{
    public $sortOrderAlimentacion = 'close';
    public $sortOrderEntrenamiento = 'close';
    public $questions;
    public $showModal =false;



    public function setOrderAlimentacion()
    {
        $this->sortOrderAlimentacion= $this->sortOrderAlimentacion == 'open' ? 'close' : 'open';

    }
    public function setOrderEntrenamiento(){
        $this->sortOrderEntrenamiento=$this->sortOrderEntrenamiento=='open'?'close':'open';

    }

    public function MostrarModal()
    {
        $this->showModal = !$this->showModal;
        if($this->showModal==true){
            $this->questions=Survey::first()->questions()->pluck('name')->toArray();
        }
    }





    public function render()
    {
        return view('livewire.mis-planes-controller');
    }
}
