@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Area Level Tool</div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col col-form-label text-center">
                                    <h5>
                                        Area Levels
                                    </h5>
                                    <p>This tool displays area levels based on your search parameters.
                                    <p>Ordered by version area level.</p>
                                    <p>Level Range: {{ $minlvl }} - {{ $maxlvl }}.
                                    </p>
                                    <p><a href="{{ route('areaLevels') }}">Click here</a> to search again.</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-sm table-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">Act Name</th>
                                                <th scope="col">Difficulty</th>
                                                <th scope="col">Area Name</th>
                                                <th scope="col">Classic Level</th>
                                                <th scope="col">Expansion Level</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @if($areas->count())
                                        @foreach ($areas as $area)
                                            @if ($area->difficulty_name === 'Normal' && $area->area_name === 'Pandemonium 1-3')
                                            <!--blank-->
                                            @elseif($area->difficulty_name === 'Normal' && $area->area_name === 'Pandemonium Finale')
                                            <!--blank-->
                                            @elseif($area->difficulty_name === 'Nightmare' && $area->area_name === 'Pandemonium 1-3')
                                            <!--blank-->
                                            @elseif($area->difficulty_name === 'Nightmare' && $area->area_name === 'Pandemonium Finale')
                                            <!--blank-->
                                            @else
                                            <tr>
                                                    <th>{{ $area->act_name }}</th>
                                                        <td>{{ $area->difficulty_name }}</td>
                                                        <td>{{ $area->area_name }}</td>
                                                        <td>{{ $area->classic_level }}</td>
                                                        <td>{{ $area->expansion_level }}</td>
                                                    </tr>
                                            @endif
                                        @endforeach
                                    @endif

                                    </tbody>
                                    </table>
                                </div>
                                        <br><a href="{{ route('areaLevels') }}">Click here</a> to search again.
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
