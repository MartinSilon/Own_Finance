<nav class="navbar navbar-expand-lg navbar-light pt-3 px-2" id="nav">
    <div class="container-fluid">

        <button class="navbar-toggler rounded-circle p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <div style="width: 15px; height: 15px">
                <i class="fa-solid fa-caret-down" style="color: #ffffff;"></i>
            </div>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav py-3 d-flex flex-row align-items-between justify-content-start gap-5  ">
                <li class="nav-item" id="home-nav-item">
                    <a class="nav-link text-uppercase" href="/" role="tab" aria-controls="home0" aria-selected="true">
                        Domov
                    </a>
                </li>
                <li class="nav-item" id="settings-nav-item">
                    <a class="nav-link text-uppercase" href="/settings" role="tab" aria-controls="settings0" aria-selected="false">
                        <i class="fa-solid fa-gear" style="color: #ffffff;"></i>
                        Nastavenia
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

<script>
    const currentUrl = window.location.pathname;
    if (currentUrl === "/") {
        document.getElementById("home-nav-item").classList.add("active");
    } else if (currentUrl === "/settings") { // Použi správnu syntax 'else if'
        document.getElementById("settings-nav-item").classList.add("active");
    }
</script>

