@extends('layouts.app')

@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body">
        <!-- New AirConditioner Form -->
        <form action="/airs" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="new-air" class="col-sm-8 col-sm-offset-2">Nuevo Aire Acondicionado</label>
                <div class="col-sm-8 col-sm-offset-2">
                    <span>Numero de serie</span><input type="text" name="nserie" id="nserie-name" class="form-control">
                    <span>Marca</span><input type="text" name="brand" id="brand-name" class="form-control">
                    <span>Modelo</span><input type="text" name="model" id="model-name" class="form-control">
                    <span>Fecha de compra</span><input type="date" name="purchase_at" id="purchase-date" class="form-control">
                </div>
            </div>
            <!-- Add AirConditioner Button -->
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Agregar Aire
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (count($airs) > 0)
        <div class="panel panel-default col-sm-8 col-sm-offset-2">
            <div class="panel-heading">
               Aires acondicionados
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>Numero de serie</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Fecha de compra</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($airs as $air)
                            <tr>
                                <!-- Airconditioner Info -->
                                <td>
                                    <div>{{ $air->nserie }}</div>
                                </td>
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
                                   <a href="{{url('/air/'.$air->id)}}">Mantenimientos</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
