{{--<h1> Hello {{$name}}</h1>--}}

{{--{{$users}}--}}


<?php
// echo "test";
//  foreach ($users as $user){
//      echo $user."<br>";
//  }
//
//?>

<ul style="font-size: larger">
@foreach($users as $user)
   <li> {{$user}} </li>
@endforeach
</ul>
