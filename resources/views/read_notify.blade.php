@extends('site.master')

@section('styles')
<style>
    button{
       border:0;
      background: transparent
    }
</style>
@section('content')
<br>
<br>
<div class="container">
    <h3>({{ auth()->user()->unreadnotifications->count() }}) Unread Notifications</h3>
    <a href="{{ route('readall_notify') }}">Read All</a>
    <div class="list-group">
        @foreach (auth()->user()->notifications as $notification)
        <a href="{{ route('readd',$notification->id) }}" class="list-group-item {{ $notification->read_at ? 'active' : '' }} ">
            {{ $notification->data['data'] }}
            <span class="badge"onclick="return confirm('Are you sure!!!')"><form action="{{ route('del',$notification->id) }}" method="post">
                @csrf
                @method('delete')
                <button>Delete</button>
            </form></span>
          </a>
        @endforeach

      </div>
      <div class="text-center mt-4">
        <a href="{{route('send-notify') }}" class="btn btn-main ">Back to Send_Notify</a>
    </div>
</div>
  <br>
  <br>
@stop
