<?php

namespace App\Livewire;

use App\Models\MealPlan;
use App\Models\Progress;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class SeguimientoController extends Component
{
    use WithFileUploads;
    public $trackings,$meal_plans,$showModal=false,$fecha,$mealPlanIds;

    public $photos = [],$observaciones,$plan_active;
    public $tempImages = [];
    protected $listeners = ['imageRemoved'];

    protected $rules = [
        'photos.*' => 'image|max:4000'
    ];

    public function updatedPhotos()
    {
        $this->validate();

        $this->tempImages = [];
        foreach ($this->photos as $photo) {
            $this->tempImages[] = [
                'temporaryUrl' => $photo->temporaryUrl(),
            ];
        }
    }

    public function crearSeguimiento()
    {
        $this->validate();

        foreach ($this->photos as $photo) {
            $path = $photo->store('progress', 'public');
            Progress::create([
                'title'=> $this->plan_active->name,
                'note'=> $this->observaciones,
                'photo' => $path,
                'meal_plan_id' => $this->plan_active->id,
            ]);
        }

        $this->reset(['photos', 'tempImages']);
        session()->flash('message', 'Imágenes subidas correctamente.');

        $this->showModal = false;

        $this->loadPlans(); // <-- ESTO es lo que refresca los tracking correctamente
    }


    public function removeImage($index)
    {
        // Eliminar la imagen del array de previsualizaciones
        unset($this->tempImages[$index]);
        $this->tempImages = array_values($this->tempImages);

        // Eliminar la imagen del array de archivos
        unset($this->photos[$index]);
        $this->photos = array_values($this->photos);
    }



    public function mostrarModal(){
        $this->fecha = Carbon::today()->format('d-m-Y');
        $this->showModal=!$this->showModal;

    }

    public function mount(){
        $this->loadPlans();
    }
    public function loadPlans()
    {
        $this->trackings = Progress::join('meal_plans', 'meal_plans.id', '=', 'progress.meal_plan_id')
            ->where('meal_plans.user_id', auth()->user()->id)
            ->orderBy('progress.created_at', 'desc')
            ->get();

        $this->mealPlanIds = $this->trackings->pluck('title','meal_plan_id')->unique()->toArray();

        $this->meal_plans = MealPlan::where('user_id',auth()->user()->id)
            ->orderby('created_at','desc')
            ->get();

        $this->plan_active = $this->meal_plans->firstWhere('is_active', true);
        $this->observaciones = [];
    }

    public function deleteTracking($key){
        Progress::where('meal_plan_id', $key)->delete();
        $this->loadPlans();
    }

    public function render()
    {
        return view('livewire.seguimiento-controller');
    }
}
