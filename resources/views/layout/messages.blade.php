@if(session("success"))
    <div class="alert alert-success" role="alert">
        {{ session("success") }}
    </div>
@endif

@if(session("error"))
    <div class="alert alert-danger" role="alert">
        {{ session("error") }}
    </div>
@endif

@error("current_password")
<div class="alert alert-danger" role="alert">
    {{ $message }}
</div>
@enderror

@if(session("message"))
    <div class="alert alert-danger" role="alert">
        {{ session("message") }}
    </div>
@endif

@error("quantity")
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
@enderror
