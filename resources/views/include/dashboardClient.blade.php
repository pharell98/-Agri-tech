<div class="col-lg-3">
    <div class="user-profile-sidebar">
        <div class="user-profile-sidebar-top">
            <div class="user-profile-img">
                <img src="/front/images/person_1.jpg" alt="">
                <button type="button" class="profile-img-btn"><i class="fa-solid fa-camera"></i></button>
                <input type="file" class="profile-img-file">
            </div>
            <h5>{{ Auth::user()->name }}</h5>
            <p>{{ Auth::user()->email }}
            </p>
        </div>
        <ul class="user-profile-sidebar-list">
            <li><a class="active" href="{{route('client.dashboard')}}"><i class="fa-solid fa-gauge"></i>
                    Dashboard</a></li>
            <li><a href="{{route('client.profile')}}"><i class="far fa-user"></i> Mon Profil</a></li>
            <li><a href="{{route('client.contact')}}"><i class="fa-solid fa-layer-group"></i>Contacter</a>
            </li>
            <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i> Déconnecter</a></li>
        </ul>
    </div>
</div>
<script src="https://kit.fontawesome.com/c202f6b37c.js" crossorigin="anonymous"></script>

