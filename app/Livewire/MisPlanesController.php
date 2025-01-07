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
    public $answers;

    public $currentPage = 1;
    public $perPage = 3;
    public $questionsPaginated = [];

    public function mount(){
        $survey = Survey::with('questions.options.answers')->first();
        $this->questions = $survey->questions->pluck('name', 'id')->toArray();

        foreach ($survey->questions as $question) {
            $this->answers[$question->id] = $question->options->pluck('name')->toArray();
        }

        $this->updatePaginatedQuestions();
    }
    public function updatePaginatedQuestions()
    {
        $start = ($this->currentPage - 1) * $this->perPage;
        $this->questionsPaginated = array_slice($this->questions, $start, $this->perPage, true);
    }

    public function nextPage()
    {
        $this->currentPage++;
        $this->updatePaginatedQuestions();
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->updatePaginatedQuestions();
        }
    }




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

    }





    public function render()
    {
        return view('livewire.mis-planes-controller');
    }
}
