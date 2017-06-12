@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <form action="/activeAir/{{$id}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="building-name" class="col-sm-12 control-label">Tiempo de aire activo</label>
                <div class="col-sm-8 col-sm-offset-2">
                    <span>Día</span><input type="date" name="day" id="building-name" class="form-control">
                    <span>Hora de encendido</span><input type="time" name="switched_on_hour" id="building-name" class="form-control">
                    <span>Hora de apagado</span><input type="time" name="switched_off_hour" id="building-name" class="form-control">
                </div>
            </div>
            <!-- Add AirConditioner Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Agregar actividad
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (count($performances) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
          
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>Día</th>
                        <th>Hora de encendido</th>
                        <th>Hora de apagado</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($performances as $performance)
                            <tr>
                                <!-- Air Name -->
                                <td>
                                    <div>{{ $performance->day }}</div>
                                </td>
                                <td>
                                    <div>{{ $performance->switched_on_hour }}</div>
                                </td>
                                <td>
                                    <div>{{ $performance->switched_off_hour }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection