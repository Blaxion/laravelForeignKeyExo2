@extends('layout.index')
@section('main')
<section>
    <div class="container mt-5">
        @foreach ($colors as $color)
            <h1>{{ $color->color }}</h1>
            <ul>
                @foreach ($color->cars as $car)
                    <li>{{$car->brand}} / {{$car->year}} </li>
                @endforeach
            </ul>
        @endforeach
    </div>
</section>
@endsection