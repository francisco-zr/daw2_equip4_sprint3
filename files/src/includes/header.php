<div class="navbar navbar-expand-sm p-0" id="header-logo">
  <div class="container-fluid d-flex flex-row justify-content-between navbar-nav ">
    <div class="p-2" id="logo">
      <li class="nav-item"><a class="nav-link" href="#"><img src="../img/logo_pymeshield.png" alt="Logo" class="d-inline-block align-text-middle">
          pymeshield</a></li>
    </div>
    <!--Ruptura del responsive en 576px a 575px-->
    <div class="p-2">
      <div class="container" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2" style="--bs-scroll-height: 100px;">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="menu-dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user"></i>
            </a>
            <ul class="dropdown-menu" id="menu-user">
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-address-card"></i>Editar
                  Perfil</a></li>
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-language"></i>Idioma</a>
              </li>
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-right-from-bracket"></i>Cerrar Sesión</a>
              </li>
              <li>
                <hr class="dropdown-divider">
                <i class="theme-icon-active">
                  <use href="#circle-half"></use>
                </i>Tema
              </li>
              <li>
                <button type="button" class="dropdown-item" data-bs-theme-value="light">
                  <i class="fa-solid fa-sun opacity-50 theme-icon">
                    <use href="#sun-fill"></use>
                  </i>
                  Claro
                  <svg class="bi ms-auto d-none">
                    <use href="#check2"></use>
                  </svg>
                </button>
              </li>
              <li>
                <button type="button" class="dropdown-item" data-bs-theme-value="dark">
                  <i class="fa-solid fa-moon opacity-50 theme-icon">
                    <use href="#moon-stars-fill"></use>
                  </i>
                  Oscuro
                  <svg class="bi ms-auto d-none">
                    <use href="#check2"></use>
                  </svg>
                </button>
              </li>
              <li>
                <button type="button" class="dropdown-item active" data-bs-theme-value="auto">
                  <i class="fa-solid fa-circle-half-stroke opacity-50 theme-icon">
                    <use href="#circle-half"></use>
                  </i>
                  Auto
                  <svg class="bi ms-auto d-none">
                    <use href="#check2"></use>
                  </svg>
                </button>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../../public/acceptarTascaDefinitiu.php"><i class="fa-solid fa-shield-halved"></i>Modo User</a></li>
            </ul>
          </li>
      </div>
    </div>
  </div>
</div>
<!--Header Logo-->
<nav class="navbar navbar-expand-lg p-0" id="main-navbar" data-bs-theme="light">
  <div class="container-fluid">
    <span class="p-2">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button></span>
    <div class="collapse navbar-collapse p-0" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#"><i class="fa-solid fa-house"></i>Inicio</a></li>
        <li class="nav-item"><a class="nav-link <?php if (basename($_SERVER['SCRIPT_NAME']) == 'formularisAPD.php') echo 'active'; ?>" href="../../public/formularisAPD.php"><i class="fa-solid fa-diagram-project"></i>Formularis APD</a></li>
        <li class="nav-item"><a class="nav-link <?php if (basename($_SERVER['SCRIPT_NAME']) == 'FormulariPresupost.php') echo 'active'; ?>" href="#"><i class="fa-solid fa-square-poll-vertical"></i>Presupuestar Tareas</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fa-solid fa-book"></i>EVA</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fa-solid fa-qrcode"></i>QR</a>
        </li>
      </ul>
    </div>
</nav>
<!--Header Menu-->