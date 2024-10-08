<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('cars.addTitle') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: "Lato", sans-serif;
        }
    </style>
</head>

<body>
    <main>
        <div class="container my-5">
            <div class="bg-light p-5 rounded">
                <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
                <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">Arabic</a>
                <h2 class="fw-bold fs-2 mb-5 pb-2">{{ __('validation.attributes.addHeading') }}</h2>
                <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="px-md-5">
                    @csrf
                    <div class="form-group mb-3 row">
                        <label for="" class="form-label col-md-2 fw-bold text-md-end">{{ __('validation.attributes.Transltitle') }} :</label>
                        <div class="col-md-10">
                            <input type="text" placeholder="{{__('validation.attributes.placeholder.title')}}" class="form-control py-2" name="carTitle"
                                value="{{ old('carTitle') }}" />
                            @error('carTitle')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="" class="form-label col-md-2 fw-bold text-md-end">{{ __('validation.attributes.Translprice') }}:</label>
                        <div class="col-md-10">
                            <input type="text" step="0.1" placeholder="{{ __('validation.attributes.placeholder.price') }}" class="form-control py-2"
                                name="price" value="{{ old('price') }}" />
                            @error('price')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="category" class="form-label col-md-2 fw-bold text-md-end">{{ __('validation.attributes.Translcategory') }}:</label>
                        <div class="col-md-10">
                            <select name="category_id" id="category" class="form-control">
                                <option value="">{{ __('validation.attributes.placeholder.category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="" class="form-label col-md-2 fw-bold text-md-end">{{ __('validation.attributes.Transldesc') }}:</label>
                        <div class="col-md-10">
                            <textarea id="" cols="30" rows="5" class="form-control py-2" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="image" class="form-label col-md-2 fw-bold text-md-end">{{ __('validation.attributes.Translimg') }}:</label>
                        <div class="col-md-10">
                            <input type="file" id="image" name="image" required="required"
                                class="form-control">
                            @error('image')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="form-group mb-3 row">
                        <label for="" class="form-label col-md-2 fw-bold text-md-end">{{ __('validation.attributes.Translpublish') }}:</label>
                        <div class="col-md-10">
                            <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="published"
                                value="1" {{ old('published') ? 'checked' : '' }}>
                        </div>
                        @error('published')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-md-end">
                        <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                            {{ __('validation.attributes.Transladd') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
