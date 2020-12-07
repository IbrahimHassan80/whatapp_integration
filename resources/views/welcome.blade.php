<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
      </div>
    @endif
    
    {{-- messages send --}}
    @foreach($message as $messages)
    <div class="col-md-3 alert alert-warning" role="alert">
        {{$messages -> message}}
      </div>
    @endforeach
    {{-- ------------ --}}
    <form method="post" action="{{route('whatss.message')}}">
        @csrf
        <div class="form-group col-md-3">
          <label for="exampleInputEmail1">your Whats message</label>
          <input type="text" class="form-control" name="message">
          <button type="submit" class="btn btn-success ">Send</button>
        </div>
      </form>
    
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>