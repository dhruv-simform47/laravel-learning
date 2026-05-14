<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    
    @if(isset($userName))
    <nav>
        <a href="/home">Home</a>
        <a href="/base/dhruv">Base</a>
        <a href="/">Index</a>
    </nav>
  
    <div>
        Logged In As : {{$userName}}
    </div>
    @else
    <nav>
        <a href="/admin/login">Login</a>
        <a href="/admin/login">Register</a>
    </nav>
    
    @endif
</div>