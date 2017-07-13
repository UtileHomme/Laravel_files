@if(session()->has('message'))
    <h3 class="alert alert-success">{{session()->get('message')}}</h3>
@endif
