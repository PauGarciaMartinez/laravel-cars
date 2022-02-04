@extends('layouts.app')

@section('content')
  <div class="m-auto w-4/5 py-24">
    <div class="text-center">
      <h1 class="text-5xl uppercase bold">{{ $car->name }}</h1>
    </div>
    <div class="py-10 text-center">
      <div class="m-auto">
        <span class="uppercase text-blue-500 font-bold text-xs italic">Founded: {{ $car->founded }}</span>
        <p class="text-lg text-gray-700 py-6">{{ $car->description }}</p>

        <table>
          <tr>
            <th>Models</th>
            <th>Engines</th>
            <th>Date</th>
          </tr>

          @forelse ($car->carModels as $model)
            <tr>
              <td>{{ $model->model_name }}</td>
              <td>
                @foreach ($car->carEngines as $engine)
                  @if ($model->id == $engine->model_id)
                    {{ $engine->engine_name }}
                  @endif
                @endforeach
              </td>
              <td>{{ date('d-m-Y', strtotime($car->productionDate->created_at)) }}</td>
            </tr>
          @empty
            <p>No car models found</p>
          @endforelse
        </table>

        <hr class="mt-4 mb-8">
      </div>
    </div>
  </div>
@endsection