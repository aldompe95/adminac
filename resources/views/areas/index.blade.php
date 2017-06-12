@extends('layouts.app')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
	<div class="panel-body">
        <!-- New Area Form -->
        <form action="/building/{{$id}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="building-name" class="col-sm-8 col-sm-offset-2">Nueva Area</label>
                <div class="col-sm-8 col-sm-offset-2">
                    <span>Nombre</span><input type="text" name="name" id="building-name" class="form-control">
                </div>
            </div>
            <!-- Add Area Button -->
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Agregar Area
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (count($areas) > 0)
        <div class="panel panel-default col-sm-8 col-sm-offset-2">
            <div class="panel-heading">
                {{$building}}
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>Areas</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($areas as $area)
                            <tr>
                                <!-- Area Name -->
                                <td class="table-text">
                                    <div>{{ $area->name }}</div>
                                </td>
                                <td>
                                    <a href="{{url('/area/'.$area->id)}}">a/c</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
