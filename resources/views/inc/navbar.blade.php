<style>
  /* Container navbar dengan neomorphism */
  .header-combined {
    position: fixed;
    top: 0;
    width: 100%;
    height: 70px;
    background: #e0e0e0; /* Warna dasar abu terang untuk neomorphism */
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    box-sizing: border-box;
    z-index: 1030;

    /* Neomorphism shadow */
    box-shadow:
      6px 6px 12px #bebebe,
      -6px -6px 12px #ffffff;
    border-radius: 15px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  /* Bagian kiri navbar */
  .header-left {
    display: flex;
    align-items: center;
    gap: 20px;
  }

  /* Sidebar toggle icon dengan efek neomorphism */
  .sidebarCollapse {
    cursor: pointer;
    padding: 10px;
    border-radius: 12px;
    box-shadow:
      3px 3px 6px #bebebe,
      -3px -3px 6px #ffffff;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
  }
  .sidebarCollapse:hover {
    box-shadow:
      inset 3px 3px 6px #bebebe,
      inset -3px -3px 6px #ffffff;
  }
  .sidebarCollapse svg {
    stroke: #555;
  }

  /* Logo */
  .navbar-logo {
    height: 32px;
    width: auto;
    filter: drop-shadow(0 0 2px rgba(0,0,0,0.1));
    border-radius: 8px;
  }

  /* Brand text */
  .theme-text a {
    color: #555;
    font-weight: 700;
    font-size: 1.4rem;
    text-decoration: none;
    user-select: none;
    transition: color 0.3s ease;
  }
  .theme-text a:hover {
    color: #ff6f61;
  }

  /* Breadcrumb */
  nav[aria-label="breadcrumb"] {
    margin-left: 15px;
  }
  .breadcrumb {
    margin: 0;
    padding: 0;
    font-size: 0.9rem;
    list-style: none;
    display: flex;
    gap: 8px;
  }
  .breadcrumb li {
    white-space: nowrap;
    position: relative;
  }
  .breadcrumb li::after {
    margin-left: 8px;
  }
  .breadcrumb li:last-child::after {
    content: "";
    margin: 0;
  }

  /* Bagian kanan navbar (user profile dropdown) */
  .header-right {
    position: relative;
    user-select: none;
  }

  .user-profile-dropdown .nav-link {
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    font-size: 1rem;
    color: #555;
    padding: 10px 16px;
    border-radius: 20px;
    background: #e0e0e0;
    box-shadow:
      6px 6px 8px #bebebe,
      -6px -6px 8px #ffffff;
    transition: all 0.3s ease;
  }
  .user-profile-dropdown .nav-link:hover,
  .user-profile-dropdown .nav-link:focus {
    box-shadow:
      inset 6px 6px 8px #bebebe,
      inset -6px -6px 8px #ffffff;
    color: #ff6f61;
  }

  .dropdown-menu {
    background: #e0e0e0;
    border-radius: 15px;
    border: none;
    padding: 10px 0;
    box-shadow:
      6px 6px 12px #bebebe,
      -6px -6px 12px #ffffff;
    margin-top: 8px;
    min-width: 180px;
    right: 0;
  }

  .dropdown-item a {
    color: #555;
    padding: 8px 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.85rem;
    border-radius: 8px;
    background: #e0e0e0;
    box-shadow:
        2px 2px 4px #bebebe,
        -2px -2px 4px #ffffff;
    transition: all 0.3s ease;
    }

    .dropdown-item a:hover {
    background: #e0e0e0;
    color: #ff6f61;
    box-shadow:
        inset 2px 2px 4px #bebebe,
        inset -2px -2px 4px #ffffff;
    transform: translateY(-1px);
    }


  .dropdown-item svg {
    stroke-width: 2.5;
  }
</style>

<header class="header-combined">
  <div class="header-left">
    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom" aria-label="Toggle sidebar" title="Toggle Sidebar">
      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" 
           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" 
           stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu" aria-hidden="true">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
    </a>

    <ul class="navbar-item theme-brand" style="display: flex; align-items: center; gap: 10px; margin:0; padding:0; list-style:none;">
        <li class="nav-item theme-logo">
            <a href="{{ route('dashboard') }}" title="Dashboard" style="display: flex; align-items: center;">
            <img src="{{ asset('pharmacy.png') }}" class="navbar-logo" alt="Apotek Logo" />
            </a>
        </li>
        <li class="nav-item theme-text">
            <a href="{{ route('dashboard') }}" class="nav-link" title="Dashboard" style="font-size: 1.4rem; font-weight: bold; color: #555; text-decoration: none;">Apotek</a>
        </li>
    </ul>


    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        {{ set_breadcrumb($page_name, $category_name) }}
      </ol>
    </nav>
  </div>

  <div class="header-right">
    <ul class="navbar-item flex-row" style="margin:0; padding:0; list-style:none;">
      <li class="nav-item dropdown user-profile-dropdown" style="position: relative;">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #555;" aria-label="User profile dropdown">
          {{ Auth::user()->nama }}
        </a>
        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown" style="right: 0; padding: 6px 0; min-width: 140px; border-radius: 12px; box-shadow: 3px 3px 6px #bebebe, -3px -3px 6px #ffffff; background: #e0e0e0;">
        <div class="dropdown-item" style="padding: 0 10px;">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            aria-label="Sign out"
            style="display: flex; align-items: center; padding: 8px 10px; font-size: 0.85rem; border-radius: 8px; text-decoration: none; color: #555; background: #e0e0e0; box-shadow: 2px 2px 4px #bebebe, -2px -2px 4px #ffffff; transition: all 0.3s ease;">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-log-out" style="margin-right: 6px;">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
            Sign Out
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </div>

      </li>
    </ul>
  </div>
</header>
