<?= $this->extend('layout/template'); ?>



<?= $this->section('content'); ?>


<div class="teks">
    <h1>Welcome to My Portflio <br>
        I'am <span>A.iksan Adi Kusuma</span></h1>
    <p>To find out more details, please download the CV below
        <br>
        accusamus dolor excepturi tempore vero nisi praesentium aperiam autem!
    </p>

    <a href="#about"> <button type="button" class="btn btn-secondary">About Me</button></a>
</div>

<div class="image">
    <img src="/img/shape.png" class="shape">
    <img src="/img/andisfix.png" class="andis">
</div>


<div class="about" id="about">
    <div class="container">
        <h1 class="title">About Me</h1>
        <div class="about-content">
            <div class="column left">
                <img src="img/about.jpeg" alt="">
            </div>
            <div class="column right">
                <div class="text">I'am A.Iksan Adi kusuma and I'am <span></span>

                </div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt reprehenderit ab placeat. Facere natus totam, officia illo laboriosam perferendis minus.</p>
                <a href=""> <button type="button" class="btn btn-secondary">Download CV</button></a>

            </div>
        </div>

    </div>
</div>


<div id="skill">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <h1>Software</h1>
                <div class="carousel-item active">
                    <img src="img/ai.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/ai.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/ai.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>


    </div>


    <div id="contact">
        <div class="container">
            <h1>Contact Me</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam quidem voluptate, illum accusantium tenetur ipsum minima saepe sed impedit ex reprehenderit enim aut voluptates. Dicta dolorem enim veniam quae, repellat omnis maiores rem aut assumenda tenetur aliquid tempore minima voluptatem repudiandae ducimus eius animi illo hic sint? Aut dolor repellendus vel nam, voluptate impedit totam praesentium assumenda magnam atque pariatur harum qui suscipit dolorem, necessitatibus repudiandae perspiciatis ipsam voluptatem, quia quis. Beatae architecto molestias consectetur at error, animi minus quisquam impedit harum nesciunt explicabo. Praesentium rem hic dolor delectus quae, est modi, nostrum ducimus ullam a autem. Aspernatur, placeat. Minus facere possimus animi consectetur cupiditate iste quas optio odio reprehenderit earum! Consectetur, ut fuga. Sint vel a illum minus, veritatis nesciunt perspiciatis sunt, distinctio ut vitae laudantium delectus facere ea cumque odio nostrum quaerat, unde quisquam eum minima consectetur! Illo quod magnam voluptate ab officia consectetur odit dolorum praesentium repudiandae quisquam magni, quidem eaque repellendus, rem, vel tempora? Nostrum, repellat voluptatum. Accusantium est officia, cum magni adipisci incidunt nesciunt sapiente deserunt! Eligendi ratione illum accusantium totam? Natus eveniet molestiae unde in optio harum porro commodi tempore atque et laboriosam nulla aspernatur consequatur molestias expedita, similique provident repellendus veritatis, libero cupiditate.</p>
        </div>


    </div>
    <?= $this->endsection(); ?>