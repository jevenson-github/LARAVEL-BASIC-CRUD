<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product </title>
</head>
<body>
    <h1>Create Product </h1>
    {{-- Adding Error Validation Message and Retaining the old Value  --}}
    <form method="post" action="{{ route('product.store') }}">
        @csrf
        @method('post')

        <div>
            <label >Name</label>
            <input type="text" name="name" placeholder="name" value="{{ old('name') }}">
            @error('name')
            {{ $message }}
        @enderror

        </div>
        <div>
            <label >Quantity</label>
            <input type="number" name="qty" id="" placeholder="quantity"  value="{{ old('qty')  }}">
            @error('qty')
            {{ $message }}
        @enderror
        </div>

        <div>
            <label >Price</label>
            <input type="text" name="price" id="" placeholder="price"  value=" {{ old('price') }}">
            @error('price')
                {{ $message }}
            @enderror
        </div>

        <div>
            <label >Description</label>
            <input type="text" name="description" placeholder="description" value="{{ old('description') }}">

        </div>

        <div>
            <input type="submit" value="Save Product "/ >
            <a href="{{ route('product.index') }}">CANCEL</a>
        </div>
    </form>
</body>
</html>