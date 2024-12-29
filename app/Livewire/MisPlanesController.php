<?php

namespace App\Livewire;

use Livewire\Component;

class MisPlanesController extends Component
{
    public $sortOrderAlimentacion = 'close';
    public $sortOrderEntrenamiento = 'close';

    public function setOrderAlimentacion()
    {
        $this->sortOrderAlimentacion= $this->sortOrderAlimentacion == 'open' ? 'close' : 'open';

    }
    public function setOrderEntrenamiento(){
        $this->sortOrderEntrenamiento=$this->sortOrderEntrenamiento=='open'?'close':'open';

    }




    public function render()
    {
        return view('livewire.mis-planes-controller');
    }
}
