<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Tourism Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
<link rel="stylesheet" href="css/style1.css">
<link href="css/style.css" rel='stylesheet' type='text/css' /><link rel="stylesheet" href="css/style.css">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js" type="text/javascript"></script>
</head>
<body>
<?php include('includes/header.php');?>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content" style="font-weight:bolder;">
        <h3 style="font-size:40px;">Welcome to our Travel Agency</h3>
        <p style="font-size:40px;">We Make Travel Fun</p>
        <a href="#" class="btn">discover more</a>
    </div>
    <div class="video-container">
        <video src="img/vid-1.mp4" id="video-slider" loop autoplay muted></video>
    </div>

</section>

<!-- home section ends -->
 <!-- packages section starts  -->
 <section class="packages container-fluid" id="packages">

<h1 class="heading">
    <span>p</span>
    <span>a</span>
    <span>c</span>
    <span>k</span>
    <span>a</span>
    <span>g</span>
    <span>e</span>
    <span>s</span>
</h1>
<div class="box-container">
    <div class="box">
        <img src="img/pokhara.png" alt="">
        <div class="content">
            <h3> <i class="fa fa-map-marker" aria-hidden="true"></i> Pokhara </h3>
            <p>Pokhara is the second most visited city in Nepal, as well as one of the most popular tourist destinations. It is famous for its tranquil atmosphere and the beautiful surrounding countryside. Pokhara lies on the shores of Phewa Lake. </p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> RS 10000.00 <span>RS 12000.00</span> </div>
            <a href="package-list.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
        <img src="img/chitwan.png" alt="">
        <div class="content">
            <h3> <i class="fa fa-map-marker" aria-hidden="true"></i> Chitwan </h3>
            <p>Nestled at the foot of the Himalayas, Chitwan has a particularly rich flora and fauna and is home to one of the last populations of single-horned Asiatic rhinoceros and is also one of the last refuges of the Bengal Tiger.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> RS 9000.00 <span>RS 11000.00 </span> </div>
            <a href="package-list.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
        <img src="img/mustang.png" alt="">
        <div class="content">
            <h3> <i class="fa fa-map-marker" aria-hidden="true"></i>Mustang  </h3>
            <p>Mustang was an ancient forbidden kingdom, bordered by the Tibetan Plateau and sheltered by some of world's tallest peaks, including 8000-meter tall Annapurna and Dhaulagiri. Strict regulations of tourists here have aided in maintaining Tibetan traditions.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> RS 15000.00 <span>RS 18000.00 </span> </div>
            <a href="package-list.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
        <img src="img/dubai.png" alt="">
        <div class="content">
            <h3> <i class="fa fa-map-marker" aria-hidden="true"></i>Dubai</h3>
            <p>Dubai is a city and emirate in the United Arab Emirates known for luxury shopping, ultramodern architecture and a lively nightlife scene.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> RS 35000.00 <span>RS 42000.00 </span> </div>
            <a href="package-list.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
        <img src="img/paris.png" alt="">
        <div class="content">
            <h3> <i class="fa fa-map-marker" aria-hidden="true"></i>Paris</h3>
            <p>Paris is always alive and pulsating. This vibrant city is a kaleidoscope of art, literature, film, architecture, and whatnot. Paris is portrayed as the city of lights (“La Ville-Lumière”), the city of love, and the city of fashion, and is one of the richest cities in the world.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> RS 49000.00 <span>RS 52000.00 </span> </div>
            <a href="package-list.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
        <img src="img/Bhutan.png" alt="">
        <div class="content">
            <h3> <i class="fa fa-map-marker" aria-hidden="true"></i> Bhutan </h3>
            <p>BHUTAN, A country of Buddhism, is located in the Himalayas, between the Tibet Autonomous of China and India. With their natural scenery and their culture and tradition they attracts tourism. Bhutan is the unique country both culturally and environmentally.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> RS 39000.00 <span>RS 45000.00 </span> </div>
            <a href="package-list.php" class="btn">book now</a>
        </div>
    </div>
    <div class="box">
        <img src="img/switzerland.png" alt="">
        <div class="content">
            <h3> <i class="fa fa-map-marker" aria-hidden="true"></i> Switzerland </h3>
            <p>SWITZERLAND, a country renowned for its neutrality and stunning landscapes, is located in Central Europe, bordered by France, Germany, Italy, Austria, and Liechtenstein. With its breathtaking natural scenery, rich cultural heritage, and tradition of hospitality, Switzerland attracts tourists from all over the world. </p>           
             <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> RS 50000.00 <span>RS 59000.00 </span> </div>
            <a href="package-list.php" class="btn">book now</a>
        </div>
    </div>
    <div class="box">
        <img src="img/manang.png" alt="">
        <div class="content">
            <h3> <i class="fa fa-map-marker" aria-hidden="true"></i> Manang </h3>
            <p>MANANG, a picturesque town in Nepal, is located in the heart of the Himalayas. Known for its stunning landscapes, rich cultural heritage, and vibrant traditions, Manang attracts adventurers and trekkers from around the world. </p>
<div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> RS 19000.00 <span>RS 22000.00 </span> </div>
            <a href="package-list.php" class="btn">book now</a>
        </div>
    </div>

</div>


</section>


<!-- packages section ends -->

<!-- services section starts  -->

<section class="services" id="services">

<h1 class="heading">
    <span>s</span>
    <span>e</span>
    <span>r</span>
    <span>v</span>
    <span>i</span>
    <span>c</span>
    <span>e</span>
    <span>s</span>
</h1>

<div class="box-container">

    <div class="box">
        <i class="fas fa-hotel"></i>
        <h3>affordable hotels</h3>
        <p>Discover unbeatable comfort and value with our handpicked selection of affordable hotels, tailored for budget-conscious travelers. Experience convenience without compromise with our travel company's affordable accommodation options.</p>
    </div>
    <div class="box">
        <i class="fas fa-utensils"></i>
        <h3>food and drinks</h3>
        <p>Enhance your travel experience with our carefully curated selection of delicious foods and refreshing drinks, perfect for your journey. From gourmet snacks to premium beverages, savor every moment with our travel and tourism company.</p>
    </div>
    <div class="box">
        <i class="fas fa-bullhorn"></i>
        <h3>safty guide</h3>
        <p>Prioritize safety on your travels with our concise guide, outlining essential precautions and emergency procedures. From destination-specific tips to general travel safety advice, ensure a worry-free journey with our expert recommendations.</p>
    </div>
    <div class="box">
        <i class="fas fa-globe-asia"></i>
        <h3>around the world</h3>
        <p>Discover the globe with our travel company's curated around-the-world expeditions. Unravel diverse cultures and landscapes in one seamless adventure.</p>
    </div>
    <div class="box">
        <i class="fas fa-plane"></i>
        <h3>fastest travel</h3>
        <p>Embark on unparalleled expeditions with our travel company, offering access to the fastest modes of transportation worldwide. From supersonic flights to high-speed trains, we accelerate your journey, delivering unmatched efficiency and luxury for your travel aspirations.</p>
    </div>
    <div class="box">
        <i class="fas fa-hiking"></i>
        <h3>adventures</h3>
        <p>For your next adventure, trust our tourism company to provide exhilarating experiences and seamless travel arrangements. From breathtaking destinations to personalized itineraries, we ensure unforgettable journeys tailored to your preferences.</p>
    </div>

</div>

</section>

<!-- services section ends -->

<!-- gallery section starts  -->

<section class="gallery container" id="gallery">

<h1 class="heading">
    <span>g</span>
    <span>a</span>
    <span>l</span>
    <span>l</span>
    <span>e</span>
    <span>r</span>
    <span>y</span>
</h1>

<div class="box-container">

    <div class="box">
        <img src="img/pokhara.png" alt="">
        <div class="content">
            <h3>Pokhara</h3>
            <p>Pokhara, nestled in the Himalayas of Nepal, offers stunning lakes, majestic mountains, and adventurous treks.</p>
            <a href="package-details.php?pkgid=1" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/chitwan.png" alt="">
        <div class="content">
            <h3>chitwan</h3>
            <p>Chitwan, located in Nepal's subtropical lowlands, is renowned for its lush national parks and diverse wildlife, including rare one-horned rhinos.</p>
            <a href="package-list.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/second.png" alt="">
        <div class="content">
            <h3>Bhaktapur</h3>
            <p>Bhaktapur, an ancient city in Nepal's Kathmandu Valley, is famed for its well-preserved medieval architecture, intricate wood carvings, and vibrant culture</p>
            <a href="package-list.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/third.png" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Nepal, nestled in the Himalayas, is a land of breathtaking mountain vistas, rich cultural heritage, and spiritual enlightenment.</p>
            <a href="package-list.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/mustang.png" alt="">
        <div class="content">
            <h3>Mustang</h3>
            <p>Mustang, a remote region of Nepal, captivates with its rugged landscapes, ancient Tibetan culture, and mystical allure.</p>
            <a href="package-list.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/dubai.png" alt="">
        <div class="content">
            <h3>Dubai</h3>
            <p>Dubai, a cosmopolitan city in the UAE, dazzles with its modern skyline, luxury shopping, and vibrant entertainment.</p>
            <a href="package-list.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/Bhutan.png" alt="">
        <div class="content">
            <h3>Bhutan</h3>
            <p>Bhutan, nestled in the Eastern Himalayas, enchants with its pristine landscapes, rich Buddhist heritage, and commitment to Gross National Happiness.</p>
            <a href="package-list.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/paris.png" alt="">
        <div class="content">
            <h3>Paris</h3>
            <p>Paris, the City of Light, mesmerizes with its iconic landmarks, romantic ambiance, and unparalleled art and culture.</p>
            <a href="package-list.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/switzerland.png" alt="">
        <div class="content">
            <h3>Switzerland</h3>
            <p>Switzerland, famed for its alpine beauty, offers a perfect blend of nature, culture, and adventure.</p>
            <a href="package-list.php" class="btn">see more</a>
        </div>
    </div>

</div>

</section>

<!-- gallery section ends -->

<?php include('includes/footer.php'); ?>
<!-- signup -->
<?php include('includes/signup.php'); ?>
<!-- //signup-->
<!-- signin -->
<?php include('includes/signin.php'); ?>
<!-- //signin -->
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>