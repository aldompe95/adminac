@extends('layouts.app')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body">
        <!-- Set ActiveAir Form -->
        <form action="/area/{{$id}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="new-air" class="col-sm-8 col-sm-offset-2">Asignar aires acondicionados</label>
                <div class="col-sm-8 col-sm-offset-2">
                    @if (count($inactive_airs) === 0)
                        <span>No hay aires acondicionados sin uso.</span>
                    @endif
                    @foreach ($inactive_airs as $air)
                        <input type="checkbox" name="air[]" id="inactive_air" value="{{$air->id}}"><span>{{ $air->brand }}</span><br>
                    @endforeach
                </div>     
            </div>
            <!-- Add ActiveAir Button -->
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Asignar Aires
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (count($airs) > 0)
        <div class="panel panel-default col-sm-8 col-sm-offset-2">
            <div class="panel-heading">
            Edificio - Area especifica
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>Aires Acondicionados</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($airs as $air)
                            <tr>
                                <!-- ActiveAir Info -->
                                <td class="table-text">
                                    <div>{{ $air }}</div>
                                </td>
                                <td>
                                    <a href="{{url('/air/'.$air->id)}}">Sensores</a><br>
                                </td>
                                <td>
                                    <a href="{{url('/air/'.$air->air_conditioner_id)}}">Matenimientos</a><br>
                                </td>
                                <td>
                                    <a href="{{ action('ActiveAirController@removeAir',array($air->id, $air->air_conditioner_id, $air->area_id)) }}">Retirar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
