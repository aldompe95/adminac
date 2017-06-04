@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <form action="/air/{{$id}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="building-name" class="col-sm-12 control-label">Mantenimiento</label>
                <div class="col-sm-8 col-sm-offset-2">
                    <span>Encargado</span><input type="text" name="in_charge" id="building-name" class="form-control">
                    <span>Encargado del mantenimiento</span><input type="text" name="maintenance_in_charge" id="building-name" class="form-control">
                    <span>Descripcion</span><input type="text" name="description" id="building-name" class="form-control">
                    <span>Costo</span><input type="number" step="0.01" name="cost" id="building-name" class="form-control">
                    <span>Fecha de mantenimiento</span><input type="date" name="maintenance_date" id="building-name" class="form-control">
            </div>
            <!-- Add AirConditioner Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Agregar Mantenimiento
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (count($maintenances) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
          
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>Encargado</th>
                        <th>Encargado del mantenimiento</th>
                        <th>Descripción</th>
                        <th>Consto</th>
                        <th>Fecha de mantenimiento</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($maintenances as $maintenance)
                            <tr>
                                <!-- Air Name -->
                                <td>
                                    <div>{{ $maintenance->in_charge }}</div>
                                </td>
                                <td>
                                    <div>{{ $maintenance->maintenance_in_charge }}</div>
                                </td>
                                <td>
                                    <div>{{ $maintenance->description }}</div>
                                </td>
                                <td>
                                    <div>{{ $maintenance->cost }}</div>
                                </td>
                                <td>
                                    <div>{{ $maintenance->maintenance_date }}</div>
                                </td>                     
                                <td>
                                    <a href="{{url('/air/'.$maintenance->id)}}">a/c</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection