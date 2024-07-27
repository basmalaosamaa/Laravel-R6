<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Class</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    /* Set Lato font for all elements */
    * {
      font-family: "Lato", sans-serif;
    }

    /* Style the form container with a rounded border and some padding */
    .form-container {
      background-color: #f8f9fa;
      border-radius: 10px; /* Adjust border radius as desired */
      padding: 20px;
    }
  </style>
</head>

<body>
  <main>
    <div class="container my-5">
      <div class="form-container">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Class</h2>
        <form action="{{route('class.update' , $class['id'])}}" method="POST" class="px-md-5">
          @csrf
          @method('put')
        <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">Class Name:</label>
            <div class="col-md-10">
              <input type="text" placeholder="Enter Class Name.." class="form-control py-2" name="className" value="{{$class->className}}" />
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label for="capacity" class="form-label col-md-2 fw-bold text-md-end">Capacity:</label>
            <div class="col-md-10">
              <input type="number" id="capacity" name="capacity" min="1" required class="form-control py-2" value="{{$class->capacity}}">
            </div>
          </div>

          <div class="form-group mb-3 row">
            <label for="price" class="form-label col-md-2 fw-bold text-md-end">Price:</label>
            <div class="col-md-10">
              <input type="number" id="price" name="price" min="0" step="0.01" required class="form-control py-2" value="{{$class->price}}">
            </div>
          </div>
          
          <div class="form-group mb-3 row">
            <label for="timeFrom" class="form-label col-md-2 fw-bold text-md-end">Time From:</label>
            <div class="col-md-10">
              <input type="time" id="timeFrom" name="timeFrom" required class="form-control py-2" value="{{ $class->timeFrom }}" >
            </div>
          </div>
          
          <div class="form-group mb-3 row">
            <label for="timeTo" class="form-label col-md-2 fw-bold text-md-end">Time To:</label>
            <div class="col-md-10">
              <input type="time" id="timeTo" name="timeTo" required class="form-control py-2" value="{{ $class->timeTo }}">
            </div>
          </div>

          <div class="form-group mb-3 row">
            <label for="isFulled" class="form-label col-md-2 fw-bold text-md-end">Is Fulled:</label>
            <div class="col-md-10">
              <input type="checkbox" id="isFulled" name="isFulled" class="form-check-input" style="padding: 0.7rem;" @checked($class->isFulled) >
            </div>
          </div>
          <div class="text-md-end">
            <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
              update Class
            </button>
          </div>
          </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
