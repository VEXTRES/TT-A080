<div>
    <x-app-layout>
        @if ($meal_plans->isnotEmpty())
            @foreach ($meal_plans as $meal_plan)

                <p>{{$meal_plan->name}}</p>
                <p>{{$meal_plan->email}}</p>
            @endforeach
            @foreach ($workoutPlans as $workoutPlan)
                <p>{{$workoutPlan->name}}</p>
            @endforeach
        @else
            <p>No hay planes de entrenamiento para este usuario</p>
        @endif
    </x-app-layout>
</div>
