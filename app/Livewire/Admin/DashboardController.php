<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class DashboardController extends Component
{

    public $users;

    public function mount(){
        $this->users=User::all();

    }

    public function deleteUser($id){
        User::destroy($id);
        $this->mount();
    }



    public function render()
    {
        return view('livewire.admin.dashboardcontroller');
    }
}
