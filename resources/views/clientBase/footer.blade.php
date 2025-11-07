    <!-- فوتر -->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-col">
                <h3>درباره ما</h3>
                <p style="color: #666; line-height: 1.6;">اربعین تنها یک روز در سال نیست، یک روش زندگی است. این نهضت، دعوتی است برای همه انسان ها تا در هر کجای جهان، هر شب جمعه با هر نیت خیری، قدمی برداریم تا شاهد برکات اربعین به صورت هفتگی باشیم.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-telegram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h3>چگونه مشارکت کنیم؟</h3>
                <p style="color: #666; line-height: 1.6;">موکب دار شو!<br>سهم تو در این جریان عشق چیه؟</p>
            </div>
            <div class="footer-col">
                <h3>دسته‌بندی‌ها</h3>
                <ul class="footer-links">
                    @foreach($category as $title)
                        <li><a href="{{ $title->slug }}">{{ $title->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-col">
                <h3>تماس با ما</h3>
                <ul class="footer-links">
                    <li><i class="fas fa-map-marker-alt"></i> مشهد ........</li>
                    <li><i class="fas fa-phone"></i> ۰۵۱-۱۲۳۴۵۶۷۸</li>
                    <li><i class="fas fa-envelope"></i> info@news-site.com</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            © ۱۴۰۴ مثل اربعین . تمامی حقوق محفوظ است.
        </div>
    </footer>