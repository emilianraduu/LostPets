<header>
    <div class="logo">
        <a href=".">
            <h2>LostPets</h2>
        </a>
    </div>
    <div class="links">
        <div class="selection hidden right" id="rmBtn">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
        <div class="selection">
            <a href="./login">
            <i class="fas fa-sign-in-alt"></i>
                Login
            </a>
        </div>
        <!-- <div class="selection">
            <a href="./profile">
                <div class="profile-img"></div>
                Emilian Radu
            </a>
        </div> -->
    </div>
    <div class="selection hidden" id="mobile">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>

    <script>
        let menuBtn = document.getElementById('mobile');
        let rmBtn = document.getElementById('rmBtn');
        let menu = document.querySelector('.links');

        menuBtn.addEventListener('click', () => {
            menu.classList.add('show');
        });
        rmBtn.addEventListener('click', () => {
            menu.classList.remove('show');
        });
    </script>

</header>