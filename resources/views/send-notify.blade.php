@extends('site.master')

@section('content')
<br>
<br>
<div class="container">
    {{-- <div class="list-group">
        @foreach (auth()->user()->notifications as $notification)
        <a href="{{ route('readd',$notification->id) }}" class="list-group-item ">
            {{ $notification->data['data'] }}
          </a>
        @endforeach --}}

      {{-- </div> --}}
      <div class="text-center mt-4">
        <a href="{{route('Read_notify') }}" class="btn btn-main ">Go to Read-Notify</a>
    </div>
</div>
  <br>
  <br>
@stop

@section('scripts')
<script>
setTimeout(() => {
    window.location.href ='/read_notify';
}, 2000);


</script>
@stop

