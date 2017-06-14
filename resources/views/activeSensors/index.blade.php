@extends('layouts.app')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body">
        <!-- Set ActiveAir Form -->
        <form action="/active/{{$id}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="new-air" class="col-sm-8 col-sm-offset-2">Aires</label>
                <div class="col-sm-8 col-sm-offset-2">
                    @if (count($inactiveSensors) === 0)
                        <span>No hay sensores sin uso.</span>
                    @endif
                    @foreach ($inactiveSensors as $sensor)
                        <input type="checkbox" name="sensor[]" id="inactiveSensor" value="{{$sensor->id}}"><span>{{ $sensor->brand }}</span><br>
                    @endforeach
                </div>     
            </div>
            <!-- Add ActiveAir Button -->
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Asignar Sensor
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (count($sensors) > 0)
        <div class="panel panel-default col-sm-8 col-sm-offset-2">
            <div class="panel-heading">
                Aire activo - Sensores
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($activeSensors as $sensor)
                            <tr>
                                <!-- ActiveAir Info -->
                                <td>
                                    <div>{{ $sensors[$i]->type }}</div>
                                </td>
                                <td>
                                    <div>{{ $sensors[$i]->brand }}</div>
                                </td>
                                <td>
                                    <div>{{ $sensors[$i]->model }}</div>
                                </td>
                                <td>
                                    <a href="{{ action('ActiveSensorController@remove',array($sensor->id, $sensor->sensor_id, $sensor->active_air_id)) }}">Retirar</a>
                                </td>
                            </tr>
                            <?php $i += 1; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
