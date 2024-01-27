<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <i class="fa-solid fa-bars"></i>
        </button>
        <a class="header-brand d-md-none" href="#">
            <img src="https://www.retinasoft.com.bd/assets/img/its/logo/RS%20Logo%202021-01.png" alt="logo" width="118px" height="46px">
        </a>


        <ul class="header-nav ms-3">
            <li class="nav-item dropdown">
                <a class="nav-link py-0" data-coreui-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md"><img class="avatar-img" src="https://scontent.fdac7-1.fna.fbcdn.net/v/t39.30808-6/277296991_2787841368186975_4206095999103910359_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=efb6e6&_nc_ohc=Ijh-QzC3bHMAX93Sq0R&_nc_ht=scontent.fdac7-1.fna&oh=00_AfB7pGcAFtdfY6a3yus2Yo2f-f0dl7XSNQb8KaZ5NmeZIw&oe=65B6F111" alt="user image"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Account</div>
                    </div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket icon me-2"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <div class="header-divider"></div>
</header>
