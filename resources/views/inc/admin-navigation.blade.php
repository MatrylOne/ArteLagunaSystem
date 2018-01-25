<!--.Nawigacja-->
<div class="container mt-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{url('/admin')}}">Panel Administracyjny</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/users')}}">Konta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/awards')}}">Nagrody</a>
                </li>
            </ul>
        </div>
    </nav>