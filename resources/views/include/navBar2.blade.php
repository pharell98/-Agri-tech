<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{url('/admin')}}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="/back/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>c
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{url('/admin')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-keyboard me-2"></i>formulaires</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('categories.create') }}" class="dropdown-item">Ajout Categorie</a>
                    <a href="{{ route('produits.create') }}" class="dropdown-item">Ajout Produit</a>
                    <a href="{{ route('sliders.create') }}" class="dropdown-item">Ajout Slider</a>
                </div>
            </div>
            <a href="ajoutFournisseur.html" class="nav-item nav-link"><i class="fa fa-truck"></i> Ajout fournisseur</a>
            <a href="ajoutAdmin.html" class="nav-item nav-link"><i class='fa fa-user-edit me-2'></i>Ajout Admin</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('categories.index') }}" class="dropdown-item">Categorie</a>
                    <a href="{{ route('produits.index') }}" class="dropdown-item">Produit</a>
                    <a href="{{route('sliders.index')}}" class="dropdown-item">Slider</a>
                    <a href="listeFournisseur.html" class="dropdown-item">fournisseur</a>
                </div>
            </div>
        </div>
    </nav>
</div>
