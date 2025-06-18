<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class DashboardController extends Component
{
    public $users;
    public $search = '';

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $query = User::query();

        // Si hay término de búsqueda, aplicar filtros
        if (!empty($this->search)) {
            $searchTerm = '%' . $this->search . '%';

            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', $searchTerm)
                  ->orWhere('email', 'LIKE', $searchTerm)
                  ->orWhere('id', 'LIKE', $searchTerm);
            });
        }

        $this->users = $query->orderBy('created_at', 'desc')->get();
    }

    // Este método se ejecuta automáticamente cuando cambia $search
    public function updatedSearch()
    {
        $this->loadUsers();
    }

    public function deleteUser($id)
    {
        try {
            User::destroy($id);
            $this->loadUsers(); // Recargar después de eliminar
            session()->flash('success', 'Usuario eliminado correctamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar el usuario.');
        }
    }

    // Método para limpiar búsqueda
    public function clearSearch()
    {
        $this->search = '';
        $this->loadUsers();
    }

    public function render()
    {
        return view('livewire.admin.dashboardcontroller');
    }
}
