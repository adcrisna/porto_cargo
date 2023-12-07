@if ($message = Session::get('success'))
    <div class="alert mt-5 alert-info alert-dismissible fade show" id="alert" role="alert">
        <strong style="margin-left: 35%">{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    {{-- <div class="alert mt-5 alert-danger alert-dismissible fade show" id="alert" role="alert">
        <strong style="margin-left: 35%">{{ $message }}</strong>
        <button type="button" class="close border-primary" data-dismiss="alert" aria-label="Close"
            style="float: right">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> --}}
@endif



@if ($message = Session::get('warning'))
    <div class="alert mt-5 alert-warning alert-dismissible fade show" id="alert" role="alert">
        <strong style="margin-left: 35%">{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
@endif



@if ($message = Session::get('info'))
    <div class="alert mt-5 alert-info alert-dismissible fade show" id="alert" role="alert">
        <strong style="margin-left: 35%">{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



@if ($errors->any())
    {{-- <div class="alert mt-5 alert-danger alert-dismissible fade show" id="alert" role="alert"> --}}
        {{-- <strong>Please check the form below for errors</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close border-primary" data-dismiss="alert" aria-label="Close"
            style="float: right">
            <span aria-hidden="true">&times;</span>
        </button> --}}

        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Please check the form below for errors</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    {{-- </div> --}}
@endif
