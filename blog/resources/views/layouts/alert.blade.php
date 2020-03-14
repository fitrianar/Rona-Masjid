
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))            
            <p class="alert alert-{!! $msg !!} alert-dismissible" role="alert">{!! Session::get('alert-' . $msg) !!}  
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
            </p>
        @endif
    @endforeach
</div> 
