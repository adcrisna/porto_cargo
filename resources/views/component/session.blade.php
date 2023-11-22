@if ($message = Session::get('success'))
    <div class="alert alert-info alert-dismissible fade show" id="alert" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif



@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif



@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade show" id="alert" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif



@if ($message = Session::get('info'))
    <div class="alert alert-info alert-dismissible fade show" id="alert" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif



@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
        <strong>Please check the form below for errors</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
