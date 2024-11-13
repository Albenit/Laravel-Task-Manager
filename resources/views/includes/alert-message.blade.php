@if (Illuminate\Support\Facades\Session::has('success'))
    <div class="d-flex justify-content-center mt-5">
        <div class="col-6">
            <div class="alert alert-success" role="alert">
                {!! Illuminate\Support\Facades\Session::get('success') !!}
            </div>
        </div>
    </div>
@endif
@if (Illuminate\Support\Facades\Session::has('fail'))
    <div class="d-flex justify-content-center mt-5">
        <div class="col-6">
            <div class="alert alert-danger" role="alert">
                {!! Illuminate\Support\Facades\Session::get('fail') !!}
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="d-flex justify-content-center">
        <div class="col-6">
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
    </div>
@endif
