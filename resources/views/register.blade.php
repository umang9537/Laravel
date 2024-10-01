<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
        <div class="alert alert-{{ $msg }} alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{ Session::get('alert-' . $msg) }}
        </div>
    @endif
    @endforeach
</div>

<div class="container mt-3">
  <h2>Register</h2>
  @if($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif

  <form action="{{url('registeruser')}}"  method="POST">
    @csrf
      <div class="mb-3">
        <label for="name">Name:</label>
        <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" required value="{{old('name')}}">
      </div>

      <div class="mb-3">
        <label for="email">Email:</label>
        <input type="text"  class="form-control" placeholder="Enter Email" name="email" id="email" required value="{{old('email')}}">
      </div>
{{--       
      <label for="name"><b>Gender</b></label><br>
      <!-- Male Radio Button -->
      <input type="radio" id="html" name="gender" value="Male" 
          {{ old('gender') == 'Male' ? 'checked' : '' }}>
      <label for="html">Male</label><br>

      <!-- Female Radio Button -->
      <input type="radio" id="css" name="gender" value="Female" 
          {{ old('gender') == 'Female' ? 'checked' : '' }}>
      <label for="css">Female</label><br>

      <label for="name"><b>Hobbies</b></label><br>
      <!-- Music Checkbox -->
      <input type="checkbox" id="hobbi" name="hobbi[]" value="Music" 
          {{ in_array('Music', old('hobbi', [])) ? 'checked' : '' }}>
      <label for="hobbi">Music</label><br>

      <!-- Reading Checkbox -->
      <input type="checkbox" id="hobbi" name="hobbi[]" value="Reading" 
          {{ in_array('Reading', old('hobbi', [])) ? 'checked' : '' }}>
      <label for="hobbi">Reading</label><br>

      <!-- Traveling Checkbox -->
      <input type="checkbox" id="Traveling" name="hobbi[]" value="Traveling" 
          {{ in_array('Traveling', old('hobbi', [])) ? 'checked' : '' }}>
      <label for="hobbi">Traveling</label><br><br> --}}
    

      <div class="mb-3">
        <label for="psw">Password:</label>
        <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password" required value="{{old('password')}}">
      </div>

      <div class="mb-3">
        <label for="psw-repeat">Repeat Password:</label>
        <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required value="{{old('psw-repeat')}}">
      </div>

      <p>Already have an account? <a href="{{ url('/login') }}">Sign in</a>.</p>

      <button type="submit" class="btn btn-primary">Sign up</button>
  </form>
</div>
</body>
</html>
