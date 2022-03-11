@extends('layout')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

<form class="form bg-white p6 border-1" method="POST" action="{{ route('guitars.update',['guitar'=>$guitar->id]) }}">
    @csrf
    @method('put')
    <div>
        <label class="text-sm" for="name">Guitar Name</label>
        <input class="text-lg border-1" type="text" id="name" value="{{ $guitar->name }}" name="name">
        @error('name')
        <div class="form-error">
            {{$message}}
        </div>
        @enderror
    </div>
    <div>
        <label class="text-sm" for="guitar-name">Brand</label>
        <input class="text-lg border-1" type="text" id="brand" value="{{ $guitar->brand }}" name="brand">
        @error('brand')
        <div class="form-error">
            {{$message}}
        </div>
        @enderror
    </div>
    <div>
        <label class="text-sm" for="year_made">Year Made</label>
        <input class="text-lg border-1" type="text" id="year_made" value="{{ $guitar->year_made }}" name="year_made">
        @error('year_made')
        <div class="form-error">
            {{$message}}
        </div>
        @enderror
    </div>
    <div>
        <button class="border-1" type="submit">Submit</button>
    </div>
</form>
        <form class="form bg-white p6 border-1" method="POST" action="{{ route('guitars.destroy',['guitar'=>$guitar->id]) }}">
            @csrf
            @method('DELETE')
        <div>
            <button class="border-1" type="submit">Delete</button>
        </div>
        </form>
    </div>
@endsection
