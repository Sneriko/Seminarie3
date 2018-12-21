<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">TWR</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/Home/index">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Calendar/index">Calendar</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/Recipe/show?id=Swedish Meatballs">Swedish Meatballs</a>
                    <a class="dropdown-item" href="/Recipe/show?id=Pancakes">Pancakes</a>
                </div>
            </li>
        </ul>
        <?php
        if(!isset($_SESSION['id'])) {

            echo '<form class="form-inline my-2 my-lg-0" action="/LogIn/logIn" method="post">
            <input class="form-control mr-sm-2" type="text" placeholder="Username" aria-label="Username" name="Username">
            <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Password" name="Password">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
            </form>
            <form class="form-inline my-2 my-lg-0" action="/SignIn/index">
                <button class="btn btn-outline-success my-2 my-sm-0" style="margin-left: 3px" type="submit">Sign in</button>
            </form>';
        }

        if(isset($_SESSION['id'])) {
            echo '<form class="form-inline my-2 my-lg-0" action="/LogOut/logOut">
                <button class="btn btn-outline-success my-2 my-sm-0" style="margin-left: 3px" type="submit">Logout</button>
            </form>';
        }
        ?>

    </div>
</nav>
