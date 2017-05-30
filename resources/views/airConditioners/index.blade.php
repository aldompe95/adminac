@extends('layouts.app')

@section('content')

	<div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- New AirConditioner Form -->
        <form action="/area/{{$id}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="building-name" class="col-sm-12 control-label">Nuevo Aire Acondicionado</label>
                <div class="col-sm-6">
                    <span>Marca</span><input type="text" name="brand" id="building-name" class="form-control">
                    <span>Modelo</span><input type="text" name="model" id="building-name" class="form-control">
                    <span>Fecha de compra</span><input type="date" name="purchase_at" id="building-name" class="form-control">
                    <span>Fecha de remision</span><input type="date" name="remission_at" id="building-name" class="form-control">
            </div>
            <!-- Add AirConditioner Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Agregar Aire Acondicionado
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (count($airs) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $area }}
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Fecha de compra</th>
                        <th>Fecha de Remision</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($airs as $air)
                            <tr>
                                <!-- Air Name -->
                                <td>
                                    <div>{{ $air->brand }}</div>
                                </td>
                                <td>
                                    <div>{{ $air->model }}</div>
                                </td>
                                <td>
                                    <div>{{ $air->purchase_at }}</div>
                                </td>
                                <td>
                                    <div>{{ $air->remission_at }}</div>
                                </td>                     
                                <td>
                                    <a href="{{url('/sensor/'.$air->id)}}">a/c</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
