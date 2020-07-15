@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Category</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="SKU" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>

                                <div class="col-md-6">
                                    <input id="SKU"
                                           type="text"
                                           class="form-control @error('SKU') is-invalid @enderror"
                                           name="SKU"
                                           value="{{ $product->SKU ?? '' }}"
                                           required
                                           autofocus>

                                    @error('SKU')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           value="{{ $product->name ?? '' }}"
                                           required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                <div class="col-md-6">
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}" @if($category['id'] === $product->category_id) selected="selected" @endif>{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                    @if(!empty($product->thumbnail))
                                        <img src="{{ Storage::disk('public')->url($product->thumbnail) }}" height="250" width="250" />
                                    @endif
                                </div>
                                <label for="thumbnail" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input id="thumbnail"
                                           type="file"
                                           class="form-control @error('thumbnail') is-invalid @enderror"
                                           name="thumbnail"
                                           value="{{ old('thumbnail') }}">

                                    @error('thumbnail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea name="description"
                                              id="description"
                                              cols="30"
                                              rows="10"
                                              class="form-control"
                                    >{{$product->description ?? ''}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_description" class="col-md-4 col-form-label text-md-right">{{ __('Short description') }}</label>

                                <div class="col-md-6">
                                    <textarea name="short_description"
                                              id="short_description"
                                              cols="30"
                                              rows="10"
                                              maxlength="200"
                                              class="form-control @error('short_description') is-invalid @enderror"
                                    >{{$product->short_description ?? ''}}</textarea>
                                    @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price"
                                           type="number"
                                           class="form-control @error('price') is-invalid @enderror"
                                           name="price"
                                           value="{{ $product->price ?? '' }}"
                                           required>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount') }}</label>

                                <div class="col-md-6">
                                    <input id="discount"
                                           type="number"
                                           class="form-control @error('discount') is-invalid @enderror"
                                           name="discount"
                                           value="{{ $product->discount ?? 0 }}"
                                           min="0"
                                           max="100"
                                           required>

                                    @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                                <div class="col-md-6">
                                    <input id="quantity"
                                           type="number"
                                           class="form-control @error('quantity') is-invalid @enderror"
                                           name="price"
                                           value="{{ $product->quantity ?? 0 }}"
                                           min="0"
                                           required>

                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @include('admin.products.parts.images')

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
