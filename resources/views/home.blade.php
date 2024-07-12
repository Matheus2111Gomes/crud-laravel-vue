@extends('base')

@section('content')
    <div id="app"> 
       <content />
    </div>
    <script src="{{asset('js/app.js')}}"></script>
@endsection