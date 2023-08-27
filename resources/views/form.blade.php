<h2>Text input fields</h2>

<form action="/submit" method="post">
    @csrf
    <input type="text" name="email" placeholder="enter ur email"><br><br>
    <input type="text" name="password" placeholder="password"><br><br>
    <input type="hidden" name="referal_key" value="662">
    <input type="hidden" name="start_position" value="923">

    
    <button type="submit">Submit</button>
</form>
@if($errors->any())
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
@endif