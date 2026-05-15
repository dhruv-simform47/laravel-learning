<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    
    @if(isset($email))
    <nav>
        <a href="{{ URL::to('home')}}">Home</a>
        {{-- <a href="  ">Base</a> --}}
        <a href=" {{ URL::to('base',[$email]) }}">Base</a>
        
        <a href="{{ URL::to('/') }}">Index</a>
    </nav>
  
    <div>
        Logged In As : {{$email}}
    </div>
    @else
    <nav>
        <a href="/admin/login">Login</a>
        <a href="/admin/login">Register</a>
    </nav>
    
    @endif
</div>