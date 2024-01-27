<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">

            <img class="sidebar-brand-full" src="https://www.retinasoft.com.bd/assets/img/its/logo/RS%20Logo%202021-01.png" alt="logo" width="118px" height="46px">
            <img class="sidebar-brand-narrow" src="https://www.retinasoft.com.bd/assets/img/its/logo/RS%20Logo%202021-01.png" alt="logo" width="46px" height="46px">

        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-gauge nav-icon"></i> Dashboard</a>
            </li>
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <i class="fa-solid fa-users nav-icon"></i> User</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="{{route('users.create')}}"><span class="nav-icon"></span> Add Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('users.index')}}"><span class="nav-icon"></span> All Users</a></li>
                </ul>
            </li>

            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <i class="fa-solid fa-arrow-up nav-icon"></i> Incomes</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="{{ route('income.create') }}"><span class="nav-icon"></span>Add Incomes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('income.index') }}"><span class="nav-icon"></span> All Incomes</a></li>
                </ul>
            </li>
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <i class="fa-solid fa-arrow-down nav-icon"></i> Expenses</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="{{ route('expense.create') }}"><span class="nav-icon"></span>Add Expenses</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('expense.index') }}"><span class="nav-icon"></span> All Expenses</a></li>
                </ul>
            </li>
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <i class="fa-solid fa-money-bill-wave nav-icon"></i> Lend</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="{{ route('lend.create') }}"><span class="nav-icon"></span> Add Lend</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('lend.index') }}"><span class="nav-icon"></span> All Lend</a></li>
                </ul>
            </li>


        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>


