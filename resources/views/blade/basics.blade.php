<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos de Blade</title>
</head>
<body>
    
    {{-- Imprimir variables --}}
   {{ $errorMessage }}
   
   {{-- renderizar texto enriquecido --}}
   {{!! '<mark>Texto</mark>' !!}}

   {{-- imprimir variables de js --}}
   @{{ counter }}

   {{-- llevar datos de laravel a js --}}
   <script>
      let posts = {{!! json_encode($posts) !!}};
   </script>

    {{-- 32. Directivas condicionales --}}
    @if($user->isAdmin())
        <p>Bienvenido, administrador.</p>
    @elseif($user->isEditor())
        <p>Bienvenido, editor.</p>
    @else
        <p>Bienvenido, usuario.</p>
    @endif

    {{-- 33. Directivas Environments --}}
    @env('local')
        <p>Modo desarrollo</p>
    @endenv

    {{-- 34. Directivas switch --}}
    @switch($status)
        @case('active')
            <p>Activo</p>
            @break
        @case('inactive')
            <p>Inactivo</p>
            @break
        @default
            <p>Desconocido</p>
    @endswitch

    {{-- 35. Directiva @foreach --}}
    @foreach($users as $user)
        <p>{{ $user->name }}</p>
    @endforeach

    {{-- 36. Directiva @forelse --}}
    @forelse($orders as $order)
        <p>Pedido #{{ $order->id }}</p>
    @empty
        <p>No hay pedidos.</p>
    @endforelse

    {{-- 37. Directiva @for y @while --}}
    @for($i = 0; $i < 5; $i++)
        <p>Iteración {{ $i }}</p>
    @endfor

    @while($counter < 5)
        <p>Contador: {{ $counter }}</p>
        @php $counter++ @endphp
    @endwhile

    {{-- 38. Continue y break --}}
    @foreach($numbers as $number)
        @if($number % 2 == 0)
            @continue
        @endif
        <p>Número impar: {{ $number }}</p>
        @if($number > 10)
            @break
        @endif
    @endforeach

    {{-- 39. Variable $loop --}}
    @foreach($items as $item)
        <p>{{ $loop->index }} - {{ $item }}</p>
    @endforeach

    {{-- 40. Directiva @class --}}
    <div @class(['alert', 'alert-danger' => $error])>
        Mensaje de alerta
    </div>

    {{-- 41. Atributos adicionales --}}
    <input type="text" {{ $attributes->merge(['class' => 'form-control']) }}>

    {{-- 42. Directiva include --}}
    @include('partials.header')

    {{-- 43. Componentes de clase --}}
    <x-alert type="success" message="Operación exitosa" />

    {{-- 44. Componentes anónimos --}}
    <x-button>Enviar</x-button>

    {{-- 45. Componentes como plantilla --}}
    <x-layout>
        <x-slot name="header">Mi Encabezado</x-slot>
        Contenido principal aquí.
    </x-layout>

    {{-- 46. Herencia de plantillas Blade --}}
    @extends('layouts.app')
    @section('content')
        <p>Contenido de la página.</p>
    @endsection

    {{-- 47. Directiva @stack --}}
    @push('scripts')
        <script>
            console.log('Script agregado al stack');
        </script>
    @endpush
</body>
</html>