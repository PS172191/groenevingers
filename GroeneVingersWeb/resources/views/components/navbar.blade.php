<nav>
    <div class="menu-icon">
        <span class="fas fa-bars"></span>
    </div>
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/LogoGV.png') }}" alt="Logo GroeneVingers">
            <h2>GroeneVingers</h2>
        </a>
    </div>
    <div class="search-icon">
        <span class="fas fa-search"></span>
    </div>
    <div class="cancel-icon">
        <span class="fas fa-times"></span>
    </div>
    <form action="{{ route('search') }}" method="GET">
        <input type="search" name="query" class="search-data" placeholder="Zoeken..." required>
        <button type="submit" class="fas fa-search"></button>
    </form>
    <div class="nav-items">
        <li><a class="body-xl" href="{{ route('products.index') }}" id="products-link">Producten</a></li>
        <li><a class="body-xl" href="{{ route('vacancies.index') }}" id="jobs-link">Vacatures</a></li>
        @if (optional(auth()->user())->role_id == 1)
            <li><a class="body-xl" href="{{ route('managementDashboard') }}" id="login-link">Dashboard</a></li>
        @elseif(optional(auth()->user())->role_id == 2)
            <li><a class="body-xl" href="{{ route('employeeDashboard') }}" id="login-link">Dashboard</a></li>
        @elseif(optional(auth()->user())->role_id == 3)
            <li><a class="body-xl" href="{{ route('customerDashboard') }}" id="login-link">Dashboard</a></li>
        @else
            <li><a class="body-xl" href="{{ route('login') }}" id="login-link">Login</a></li>
        @endif
        <li><a class="body-xl" href="{{ route('contact') }}" id="contact-link">Contact</a></li>
    </div>

    {{-- <div class="main-container">
        <div class="message">
            <div class="main-message">
                @if (session('language_switched'))
                    <p>You have switced to <span class="language">
                @endif
                {{ session('language_switched') }}
                </span></p>
                <div class="text-message">
                    <p>{{ __('messages.welcome') }}</p>
                </div>
            </div>
        </div>
        <div class="switch">
            @include('components.language-switch')
        </div>
    </div> --}}
</nav>

<script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = () => {
        items.classList.add("active");
        menuBtn.classList.add("hide");
        searchBtn.classList.add("hide");
        cancelBtn.classList.add("show");
    };
    cancelBtn.onclick = () => {
        items.classList.remove("active");
        menuBtn.classList.remove("hide");
        searchBtn.classList.remove("hide");
        cancelBtn.classList.remove("show");
        form.classList.remove("active");
        cancelBtn.style.color = "#ff3d00";
    };
    searchBtn.onclick = () => {
        form.classList.add("active");
        searchBtn.classList.add("hide");
        cancelBtn.classList.add("show");
    };

    // function changeLanguage(language) {
    //     if (language === 'nl') {
    //         document.getElementById('products-link').textContent = 'Producten';
    //         document.getElementById('jobs-link').textContent = 'Vacatures';
    //         document.getElementById('login-link').textContent = 'Aanmelden';
    //         document.getElementById('contact-link').textContent = 'Contact';
    //     } else if (language === 'en') {
    //         document.getElementById('products-link').textContent = 'Products';
    //         document.getElementById('jobs-link').textContent = 'Jobs';
    //         document.getElementById('login-link').textContent = 'Login';
    //         document.getElementById('contact-link').textContent = 'Contact';
    //     } else if (language === 'fr') {
    //         document.getElementById('products-link').textContent = 'Produits';
    //         document.getElementById('jobs-link').textContent = 'Emplois';
    //         document.getElementById('login-link').textContent = 'Connexion';
    //         document.getElementById('contact-link').textContent = 'Contact';
    //     } else if (language === 'de') {
    //         document.getElementById('products-link').textContent = 'Produkte';
    //         document.getElementById('jobs-link').textContent = 'Stellenangebote';
    //         document.getElementById('login-link').textContent = 'Anmelden';
    //         document.getElementById('contact-link').textContent = 'Kontakt';
    //     }
    //     // Voeg hier meer talen toe met extra "else if" blokken
    // }
</script>
