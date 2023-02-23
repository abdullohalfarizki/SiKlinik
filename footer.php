<!-- FOOTER -->
<footer class="py-5 px-5">
    <div class="container">
        <div class="row gy-4 justify-content-between">
            <div class="col-sm-4">
                <h4 class="fw-bold" data-aos="fade-right">LOCATION</a></h4>
                <p class="lead mt-4" data-aos="fade-up" data-aos-delay="200">Jl. Purwasari, Karawang
                    <br>Jawa Barat.
                </p>
            </div>
            <div class="col-sm-4">
                <div class="social-icons" data-aos="fade-up">
                    <h4 class="fw-bold mb-4">SOCIAL MEDIA</a></h4>
                    <a href="#"><i class="lab la-twitter"></i></a>
                    <a href="#"><i class="lab la-instagram"></i></a>
                    <a href="#"><i class="lab la-facebook"></i></a>
                    <a href="#"><i class="lab la-github"></i></a>
                </div>
            </div>
            <div class="col-auto">
                <div class="social-icons mt-4" data-aos="fade-up">
                    <h4 class="fw-bold">CONTACT</a></h4>
                    <p class="lead mt-4 mt-4" data-aos="fade-up" data-aos-delay="200">
                        +62 838 7465 <br>
                        abduloh2109@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- //FOOTER -->

<script src="assets/user/js/bootstrap.bundle.min.js"></script>
<script src="assets/user/js/aos.js"></script>
<script src="assets/user/js/main.js"></script>
</body>

</html>

<!-- Alert Js -->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>