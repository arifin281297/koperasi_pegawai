<div class="container">
  <h1 class="first-four">4</h1>
  <div class="cog-wheel1" style="animation: gear_move1 10s infinite;">
    <img src="<?= base_url('back/gear.webp') ?>" class="cogImage image1" alt="">
  </div>

  <div class="cog-wheel2" style="animation: gear_move2 10s infinite;">
    <img src="<?= base_url('back/gear.webp') ?>" class="cogImage image2" alt="">
  </div>
  <h1 class="second-four">4</h1>
  <p class="wrong-para">Uh Oh! Page not found!</p>
</div>

<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet");

  @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    overflow: hidden;
    background-color: #f4f6ff;
  }

  .container {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Poppins", sans-serif;
    position: relative;
    left: 6vmin;
    text-align: center;
  }

  .cog-wheel2 {
    position: relative;
    right: 6vmin;
    bottom: 16.7vmin;
    transform: rotate(-31deg);
  }

  .cogImage {
    width: 250px;
    height: auto;
  }

  .image1 {
    filter: invert(80%) sepia(100%) saturate(9000%) hue-rotate(0deg);
  }

  .image2 {
    filter: contrast(0.5);
  }

  @keyframes gear_move1 {
    100% {
      transform: rotate(360deg);
    }
  }

  @keyframes gear_move2 {
    100% {
      transform: rotate(-391deg);
    }
  }


  h1 {
    color: #142833;
  }

  .first-four {
    position: relative;
    left: 1vmin;
    font-size: 40vmin;
  }

  .second-four {
    position: relative;
    right: 15vmin;
    z-index: -1;
    font-size: 40vmin;
  }

  .wrong-para {
    font-family: "Montserrat", sans-serif;
    position: absolute;
    bottom: 15vmin;
    padding: 3vmin 12vmin 3vmin 3vmin;
    font-weight: 600;
    color: #092532;
  }
</style>

<script>
  let t1 = gsap.timeline();
  let t2 = gsap.timeline();
  let t3 = gsap.timeline();

  t1.to(".cog1", {
    transformOrigin: "50% 50%",
    rotation: "+=360",
    repeat: -1,
    ease: Linear.easeNone,
    duration: 8
  });

  t2.to(".cog2", {
    transformOrigin: "50% 50%",
    rotation: "-=360",
    repeat: -1,
    ease: Linear.easeNone,
    duration: 8
  });

  t3.fromTo(".wrong-para", {
    opacity: 0
  }, {
    opacity: 1,
    duration: 1,
    stagger: {
      repeat: -1,
      yoyo: true
    }
  });
</script>