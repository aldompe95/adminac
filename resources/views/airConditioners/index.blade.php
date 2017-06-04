@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- New Area Form -->
        <form action="/airs" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="new-air" class="col-sm-12 control-label">Nuevo Aire Acondicionado</label>
                <div class="col-sm-8 col-sm-offset-2">
                    <span>Marca</span><input type="text" name="brand" id="brand-name" class="form-control">
                    <span>Modelo</span><input type="text" name="model" id="model-name" class="form-control">
                    <span>Fecha de compra</span><input type="date" name="purchase_at" id="purchase-date" class="form-control">
                </div>
            </div>
            <!-- Add Area Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
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
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>Aires Acondicionados</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($airs as $air)
                            <tr>
                                <!-- Building Name -->
                                <td class="table-text">
                                    <div>{{ $air->brand }}</div>
                                </td>
                                <td>
                                   <a href="{{url('/air/'.$air->id)}}">a/c</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

