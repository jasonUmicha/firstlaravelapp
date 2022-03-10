@extends('layout')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

<form class="form bg-white p6 border-1" method="POST" action="{{ route('guitars.update',['guitar'=>$guitar->id]) }}">
    @csrf
    @method('put')
    <div>
        <label class="text-sm" for="guitar-name">Guitar Name</label>
        <input class="text-lg border-1" type="text" id="guitar-name" value="{{ $guitar->name }}" name="guitar-name">
        @error('guitar-name')
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
        <label class="text-sm" for="guitar-name">Year Made</label>
        <input class="text-lg border-1" type="text" id="year" value="{{ $guitar->year_made }}" name="year">
        @error('year')
        <div class="form-error">
            {{$message}}
        </div>
        @enderror
    </div>
    <div>
        <button class="border-1" type="submit">Submit</button>
    </div>
</form>

    </div>
@endsection