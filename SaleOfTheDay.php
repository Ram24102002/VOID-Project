<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stacked Cards</title>
  <!--Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <style>
    body {
      width: 100%;
      height: fit-content;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    .stack-area {
      width: 100%;
      height: 300vh;
      position: relative;
      background: url(/assets/imgs/animeBackground.png) no-repeat center center fixed;
      /* Replace with your anime background image URL */
      background-size: cover;
      display: flex;
    }

    .left {
      height: 100vh;
      flex-basis: 50%;
      position: sticky;
      top: 0;
      left: 0;
    }

    .right {
      height: 100vh;
      flex-basis: 50%;
      position: sticky;
      top: 0;
    }

    /*Styling for the left elements content starts here...*/
    .left {
      display: flex;
      align-items: center;
      justify-content: center;
      box-sizing: border-box;
      align-items: center;
      flex-direction: column;
    }

    .title {
      width: 420px;
      font-size: 84px;
      font-family: poppins;
      font-weight: 700;
      line-height: 88px;
      color: white;
      /* Adjust text color for better visibility */
    }

    .sub-title {
      width: 420px;
      font-family: poppins;
      font-size: 14px;
      margin-top: 30px;
      color: white;
      /* Adjust text color for better visibility */
    }

    .sub-title button {
      font-family: poppins;
      font-size: 14px;
      padding: 15px 30px;
      background: black;
      color: white;
      border-radius: 8mm;
      border: none;
      outline: none;
      cursor: pointer;
      margin-top: 20px;
    }

    /*Styling for the left elements content ends here...*/

    .card {
      width: 350px;
      height: 450px;
      border-radius: 25px;
      margin-bottom: 10px;
      position: absolute;
      top: calc(50% - 175px);
      left: calc(50% - 175px);
      transition: 0.5s ease-in-out;
      background: rgba(255, 255, 255);
      /* Semi-transparent white background for better readability */
    }

    .card:nth-child(1) {
      background: rgba(225, 225, 225);
      /* Semi-transparent colors */
    }

    .card:nth-child(2) {
      background: rgba(225, 225, 225);
    }

    .card:nth-child(3) {
      background: rgba(225, 225, 225);
    }


    /*Styling for the card content starts here...*/
    .card {
      box-sizing: border-box;
      padding: 35px;
      display: flex;
      justify-content: space-between;
      flex-direction: column;
    }

    .sub {
      font-family: poppins;
      font-size: 20px;
      font-weight: 700;
    }

    .content {
      font-family: poppins;
      font-size: 44px;
      font-weight: 700;
      line-height: 54px;
    }

    /*Styling for the card content ends here...*/

    .away {
      transform-origin: bottom left;
    }
  </style>
</head>

<body>
  <div class="stack-area">
    <div class="left">
      <div class="title">Our Features</div>
      <div class="sub-title">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente qui
        quis, facere, cupiditate, doloremque natus ex perspiciatis ratione hic
        corrupti adipisci ea doloribus!
        <br />
        <button>See More Details</button>
      </div>
    </div>
    <div class="right">
      <div class="card">
        <div class="sub">T-shirt</div>
        <div class="content">New Trendy t-shirt at 30% OFF</div>
      </div>
      <div class="card">
        <div class="sub">T-shirt</div>
        <div class="content">New Trendy t-shirt at 30% OFF</div>
      </div>
      <div class="card">
        <div class="sub">T-shirt</div>
        <div class="content">New Trendy t-shirt at 30% OFF</div>
      </div>

    </div>
  </div>

  <script>
    let cards = document.querySelectorAll(".card");

    let stackArea = document.querySelector(".stack-area");

    function rotateCards() {
      let angle = 0;
      cards.forEach((card, index) => {
        if (card.classList.contains("away")) {
          card.style.transform = `translateY(-120vh) rotate(-48deg)`;
        } else {
          card.style.transform = ` rotate(${angle}deg)`;
          angle = angle - 10;
          card.style.zIndex = cards.length - index;
        }
      });
    }

    rotateCards();

    window.addEventListener("scroll", () => {
      let distance = window.innerHeight * 0.7;

      let topVal = stackArea.getBoundingClientRect().top;

      let index = -1 * (topVal / distance + 1);

      index = Math.floor(index);

      for (i = 0; i < cards.length; i++) {
        if (i <= index) {
          cards[i].classList.add("away");
        } else {
          cards[i].classList.remove("away");
        }
      }
      rotateCards();
    });
  </script>
</body>

</html>