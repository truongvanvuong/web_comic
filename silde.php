<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/silde.css">
  <title>Document</title>
</head>
<body>
  <div class="silde">
    <div class="slideshow-container">
      <div class="mySlides fade">
        <div class="numbertext">1/3</div>
        <img src="./assets/img/banner__2.jpg" class="silde__img">
      </div>
      <div class="mySlides fade">
        <div class="numbertext">2/3</div>
        <img src="./assets/img/85b3bda04de563c531f3334ad61b5e7a.gif "class="silde__img">
      </div>
      <div class="mySlides fade">
        <div class="numbertext">3/3</div>
        <img src="./assets/img/monplusgrandsecret.webp" class="silde__img">
      </div>
      <div class="dot-list">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
     </div>
    </div>
    <div class="slide__img-banner">
      <div class="silde__img-list">
        <img src="./assets/img/banner_nho.jpg" alt="" class="silde__img-item">
      </div>
      <div class="silde__img-list">
        <img src="./assets/img/0071_000_en-us.jpg" alt="" class="silde__img-item">
      </div>
    </div>
  </div>
  <script>
  let slideIndex = 0;
  showSlides();
  function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 6000); 
  }
</script>
</body>
</html>