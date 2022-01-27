<template>
    <footer>
        <div class="footer__wrapper container flex">
            <div class="footer__logo">
                <div class="logo-mps">
                    <a href="/">
                        <img src="assets/img/logo/logo-mps-footer.svg" alt="логотоп">
                    </a>
                </div>
                <div class="logo-orphan">
                    <a href="https://www.facebook.com/orphandisua" target="_blank">
                        <img src="assets/img/logo/logo-orphan-footer.svg" alt="логотоп">
                    </a>
                </div>
            </div>
            <div class="footer__contacts">
                <ul>
                    <span>Контактна інформація</span>
                    <li>
                        <span>"Мукополісахаридоз в Укріїні"</span>
                        <a href="mailto:mpsinua2021@gmail.com" class="mail-icon">mpsinua2021@gmail.com</a>
                    </li>
                    <li>
                        <a href="tel:+380000000000" class="phone-icon">+38 (000) 00 00 000 Дронь Оксана</a>
                    </li>
                    <li>
                        <a href="tel:+380997034193" class="phone-icon">+38 (099) 70 34 193 Гордєєва Юлія</a>
                    </li>
                    <li>
                        <a href="tel:+380000000000" class="phone-icon">+38 (000) 00 00 000 Валівко Юлія</a>
                    </li>
                    <li>
                        <span>ГС "Орфанні захворювання України</span>
                        <a href="mailto:rareorgua@gmail.com" class="mail-icon">rareorgua@gmail.com</a>
                    </li>
                    <li>
                        <a href="tel:+380674658142" class="phone-icon">+38 (067) 46 58 142 Кулеша Тетяна</a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/groups/174910413207284" class="fb-icon" target="_blank">
                            <span>Наша група в Facebook</span>
                        </a>
                    </li>
                </ul>
            </div>
            <nav class="footer__menu">
                <nav-bar>
                    <span>Основні посилання</span>
                </nav-bar>
            </nav>
        </div>
        <div class="copyright">&copy; 2021 Всі права захищено</div>
    </footer>
</template>

<script>

export default {
name: "TheFooter",

}
</script>

<style scoped>

    footer {
        padding-top: 50px;
    }
    @media (max-width: 767px) {
    footer {
        padding-top: 30px;
        }
    }
    .footer__menu ul {
        display: block;
    }

</style>
