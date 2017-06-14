@extends('layouts.app')

@section('content')
    
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <label for="building-name" class="col-sm-12 control-label">Sensores</label>
        <form action="/sensors" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <span>Tipo</span><input type="text" name="type" id="building-name" class="form-control">
                    <span>Marca</span><input type="text" name="brand" id="building-name" class="form-control">
                    <span>Modelo</span><input type="text" name="model" id="building-name" class="form-control">
                    <span>Descripcion</span><input type="text" name="description" id="building-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Agregar Sensor
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (count($sensors) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Descripcion</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($sensors as $sensor)
                            <tr>
                                <!-- Air Name -->
                                <td>
                                    <div>{{ $sensor->type }}</div>
                                </td>
                                <td>
                                    <div>{{ $sensor->brand }}</div>
                                </td>
                                <td>
                                    <div>{{ $sensor->model }}</div>
                                </td>
                                <td>
                                    <div>{{ $sensor->description }}</div>
                                </td>                    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection