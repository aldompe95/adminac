@extends('layouts.app')

@section('content')

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        @if (count($technological) == 0)
            <!-- New Technological Form -->
            <form action="/technological" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="technological-name" class="col-sm-12 control-label">Create Technological</label>
                    <div class="col-sm-6">
                        <span>Nombre del Tecnologico</span><input type="text" name="name" id="technological-name" class="form-control">
                        <span>Numero de control del instituto</span><input type="number" name="it_key" id="technological-it_key" class="form-control">
                    </div>
                </div>
                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Agregar Tecnologico
                        </button>
                    </div>
                </div>
            </form>
        @endif
    </div>

    <!-- Current Technologic -->
    @if (count($technological) == 1)
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Nombre</th>
                        <th>Numero de control</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="technological-name">
                                {{ $technological->name }}
                            </td>
                            <td class="technological-name">
                                {{ $technological->it_key }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
