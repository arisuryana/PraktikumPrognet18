<ul class="list">
    <li class="header">MAIN</li>

    @if (Auth::user())
        <li class="@yield('home')"><a href="{{ route('home')}}"><i class="icon-home"></i><span>Home</span></a></li>
    @else
        <li class="@yield('home')"><a href="/"><i class="icon-home"></i><span>Home</span></a></li>
    @endif

    <li class="@yield('shopping')"><a href="/menu"><i class="icon-bag"></i><span>Shopping</span></a></li>

    <li class="@yield('cart')"><a href="/cart"><i class="icon-basket"></i><span>Cart</span></a></li>

    @if (Auth::guard('web')->check())
        <li class="@yield('invoice')"><a href="/invoice"><i class="icon-book-open"></i><span>Invoice</span></a></li>
    @endif         
</ul>