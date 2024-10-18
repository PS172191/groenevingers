<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="footer-logo">
                    <img class="footer-img" src="{{ asset('images/LogoGV.png') }}" alt="logogroenevingers">
                    <h3 class="footer-logo-tekst">Groene Vingers</h3>
                </div>

                <div class="footer-Nieuwsbrief">
                    <h3>Meld je aan voor onze</h3>
                    <h3>Nieuwsbrief</h3>
                    <div class="footer-Nieuwsbrief-input">
                        <input placeholder="E-mailadres" type="text">
                        <input class="button-primary" type="button" value="Aanmelden">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 footer-top-padding">
                <span class="body-XL">Navigatie</span>
                <div class="footer-Navigatie body-LG">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('contact') }}">Contact</a>
                    <a href="{{ route('vacancies.index') }}">Vacatures</a>
                    <a href="{{ route('products.index') }}">Producten</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 footer-top-padding">
                <span class="body-XL">Contact</span>
                <div class="footer-contact-info">
                    <div>
                        <i class="fa-solid fa-envelope"></i>
                        <span class="body-LG">GroeneVingers@gmail.com</span>
                    </div>

                    <div class="footer-contact-social">
                        <a href="http://twitter.com/" class="footer-contact-social-rond">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/" class="footer-contact-social-rond">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="https://www.instagram.com/" class="footer-contact-social-rond">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/" class="footer-contact-social-rond">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 footer-top-padding"  >
                <div >
                    <span class="body-XL">Openingstijden</span>
                    <div id="doel" class="footer-Openinghours body-LG">
                        <li>Maandag: Gesloten</li>
                        <li>Dinsdag: 09:00 - 18:00 uur</li>
                        <li>Woensdag: 09:00 - 18:00 uur</li>
                        <li>Donderdag: 09:00 - 21:00 uur</li>
                        <li>Vrijdag: 09:00 - 18:00 uur</li>
                        <li>Zaterdag: 09:00 - 17:00 uur</li>
                        <li>Zondag: 09:00 - 17:00 uur</li>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <div class="container">
        <div class="footer-copyright-voorwaarden">

            <div class="footer-copyright">
                <i class="fa-regular fa-copyright"></i>
                <span>GroeneVingers 2024</span>
            </div>
            <a class="footer-voorwaarden" href="{{ route('terms')}}">Algemene Voorwaarden</a>
        </div>
    </div>
</footer>
