@extends('layouts.app')

@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
	<div class="panel-body">
        <!-- New Building Form -->
        <form action="/building" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="building-name" class="col-sm-8 col-sm-offset-2">Nuevo Edificio</label>
                <div class="col-sm-8 col-sm-offset-2">
                    <span>Nombre</span><input type="text" name="name" id="building-name" class="form-control">
                </div>
            </div>
            <!-- Add Building Button -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Agregar Edificio
                    </button>
                </div>
            </div>
        </form>
    </div>

	@if (count($buildings) > 0)
        <div class="panel panel-default col-sm-8 col-sm-offset-2">
            <div class="panel-heading">
               {{$tecnological}}
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>Edificios</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($buildings as $building)
                            <tr>
                                <!-- Building Name -->
                                <td class="table-text">
                                    <div>{{ $building->name }}</div>
                                </td>
                                <td>
                                	<a href="{{url('/building/'.$building->id)}}">Areas</a>    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
