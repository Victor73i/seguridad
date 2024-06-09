@extends('layouts.app')

@section('title', 'The list of estado_logs')


@section('content')
   {{-- @if(count($tasks)) --}}
   <nav class="mb-4">
       <a href="{{route('estado_logs.create')}}"
          class="link">ADD ESTADO LOG</a>
   </nav>
    @forelse ($estado_logs as $estado_log)
    <div>
        <a href="{{route('estado_logs.show', ['estado_log'=>$estado_log->id])}}"
            @class(['line-through' =>$estado_log->completado])>{{$estado_log->nombre}}</a>

    </div>
    @empty

    <div>There are no estado_logs!</div>
    @endforelse

   @if ($estado_logs->count())
       <nav class="mt-4">
           {{$estado_logs->links()}}
       </nav>
   @endif
@endsection
    {{-- @endif --}}

