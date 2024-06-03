<header>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul>
                        @if (Auth::user()->permission_id == 1)
                            <li><a href="{{ route('dashBoard.index')}}" data-page="dashboard" class="">DASHBOARD</a></li>
                            <li><a href="{{ route('admin.service', ['url' => 'cap']) }}" data-page="cap" class="">CAP</a></li>
                            <li><a href="{{ route('admin.service', ['url' => 'bap']) }}" data-page="bap" class="">BAP</a></li>
                            <li><a href="{{ route('admin.service', ['url' => 'pca']) }}" data-page="pca" class="">PCA</a></li>
                        @endif

                        {{-- <li><a href="{{ route('')}}">USUARIOS</a></li> --}}
                        <li><a href="{{ route('admin.logout') }}">SAIR</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</header>
