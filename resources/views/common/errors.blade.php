@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-danger">
            <strong>Whoops! Algo salio mal!</strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

            <br><br>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif