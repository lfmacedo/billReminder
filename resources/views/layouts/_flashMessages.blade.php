@if(Session::has('warning_message'))
    <div class="alert alert-warning autoClose" >
        <span class="text-center">{{ Session::get('warning_message') }}</span>
    </div>
    @endif

    @if(Session::has('success_message'))
    <div class="alert alert-success autoClose" >
        <span class="text-center">{{ Session::get('success_message') }}</span>
    </div>
    @endif

    @if(Session::has('error_message'))
    <div class="alert alert-danger autoClose" >
        <span class="text-center">{{ Session::get('error_message') }}</span>
    </div>
@endif