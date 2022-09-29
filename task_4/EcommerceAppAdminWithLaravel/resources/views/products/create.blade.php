@extends('layouts.parent')

@section('title', 'Create Product')

@section('content')
    <div class="col-12">
        <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name_en">Name (EN)</label>
                        <input type="text" name="name_en" id="name_en" class="form-control" value="{{old('name_en')}}">
                    </div>
                    @error('name_en')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="name_ar">Name (AR)</label>
                        <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{old('name_ar')}}">
                    </div>
                    @error('name_ar')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="number" name="code" id="code" class="form-control" value="{{old('code')}}">
                    </div>
                    @error('code')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{old('price')}}">
                    </div>
                    @error('price')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="{{old('quantity')}}">
                    </div>
                    @error('quantity')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option @selected(old('status') == 1) value="1">Active</option>
                            <option @selected(old('status') == 0) value="0">Not Active</option>
                        </select>
                    </div>
                    @error('status')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="brand_id">Brand</label>
                        <select name="brand_id" id="brand_id" class="form-control">
                            @foreach ($brands as $brand)
                                <option @selected(old('brand_id') == $brand->id) value="{{ $brand->id }}">{{ $brand->name_en }}</option>
                            @endforeach
                        </select>

                    </div>
                    @error('brand_id')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="subcategory_id">Subcategory</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                            @foreach ($subcategories as $subcategory)
                                <option @selected(old('subcategory_id') == $subcategory->id) value="{{ $subcategory->id }}">{{ $subcategory->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('subcategory_id')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="details_en">Details (EN)</label>
                        <textarea name="details_en" id="details_en" cols="30" rows="10" class="form-control">{{old('details_en')}}</textarea>
                    </div>
                    @error('details_en')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="details_ar">Details (AR)</label>
                        <textarea name="details_ar" id="details_ar" cols="30" rows="10" class="form-control">{{old('details_ar')}}</textarea>
                    </div>
                    @error('details_ar')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-2 my-3">
                    <button class="btn btn-primary"> Store </button>
                </div>
            </div>
        </form>
    </div>
@endsection
