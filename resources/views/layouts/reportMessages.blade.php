@if(isset($errors))
    @foreach($errors as $error)
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>{{$error[0]}}</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    @endforeach
@endif
@if(isset($success))
    @foreach($success as $key)
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>{{$key[0]}}</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    @endforeach
@endif