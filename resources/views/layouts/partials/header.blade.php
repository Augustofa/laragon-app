<nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="dropdown @if (str_contains(Route::current()->getName(), 'products')) active @endif">
                    <a class="nav-link dropdown-toggle" href={{ route('products.index') }} id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produtos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href={{ route('products.index') }}>Listar</a>
                        <a class="dropdown-item" href={{ route('products.create') }}>Cadastrar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                @if(Auth::user()->hasRole('Administrator'))
                    <li class="dropdown @if (str_contains(Route::current()->getName(), 'category')) active @endif">
                        <a class="nav-link dropdown-toggle" href={{ route('category.index') }} id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categoria
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href={{ route('category.index') }}>Listar</a>
                            <a class="dropdown-item" href={{ route('category.create') }}>Cadastrar</a>
                        </div>
                    </li>
                @endif
                @if(Auth::user()->hasRole('Administrator'))
                    <li class="dropdown @if (str_contains(Route::current()->getName(), 'order')) active @endif">
                        <a class="nav-link dropdown-toggle" href={{ route('order.index') }} id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pedidos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href={{ route('order.index') }}>Listar</a>
                            <a class="dropdown-item" href={{ route('order.create') }}>Cadastrar</a>
                        </div>
                    </li>
                @endif
            </ul>
            <div class="">
                <ul class="navbar-nav mr-auto">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href={{ route('profile.edit') }}> {{ __('Profile') }}</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href={{ route('logout') }}
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
