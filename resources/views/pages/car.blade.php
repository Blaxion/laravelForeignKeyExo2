@extends('layout.index')
@section('main')
<section>
    <div class="container mt-5">
        <form action="/car" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Brand: </label>
                <input type="text" name="brand" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Year: </label>
                <input type="date" name="year" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <select name="color_id" class="form-select mb-5" aria-label="Default select example">
                <option selected>Select a color</option>
                @foreach ($colors as $color)
                    <option value="{{$color->id}}">{{$color->color}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Year</th>
                    <th scope="col">Color</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <th scope="row">{{ $car->id }}</th>
                        <td>{{ $car->brand}}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->colors->color }}</td>
                        <td>
                            <form action="/car/{{ $car->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection