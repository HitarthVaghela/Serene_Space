<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Home Page</title>

    <link rel="stylesheet" href="home.css" />

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap"
    />
  </head>

  <body>
    <header class="header">
      <?php
session_start();
?>

<div class="nav">
    <ul>
        <li class="logo"></li>
        <li class="name">
            <h3><a href="../home/home.php">Serene Space</a></h3>
        </li>
        <li><a href="../home/home.php">Home</a></li>
        <li class="nav-link">
            <a href="#">Services</a>
            <ul class="dropdown">
                <li><a href="../Psy_main/Psy-main.php">Doctor's Profiles</a></li>
            </ul>
        </li>
        <li><a href="../abt_us/about_us.html">About</a></li>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <!-- Show "Logout" if the user is logged in -->
            <li class="login-button"><a href="../login_signup/logout.php" style="color: white;">Logout</a></li>
        <?php else: ?>
            <!-- Show "Login/Sign-up" if the user is not logged in -->
            <li class="login-button"><a href="../login_signup/signup.php" style="color: white;">Login/Sign-up</a></li>
        <?php endif; ?>
    </ul>
</div>
    </header>

    <main class="main">
      <div class="upr-part">
        <div class="lpr">
          <h1>Trust Serene Space with your mental health</h1>

          <h4>
            Our mission is simple: to help you feel better, get better and stay
            better.

            <br /><br />

            We bring together self-care, support from qualified therapists and
            psychiatrists, as well as community access to deliver the best
            quality mental healthcare for your needs.
          </h4>
          <?php     
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
              ?> <a href="../Psy_main/Psy-main.php">Consult a Psychiatrist now</a>
          <?php }
            else{ ?> <a href="../login_signup/signup.php">Consult a Psychiatrist now</a>
          <?php }?>

            
        </div>

        <div class="rpr"></div>
      </div>

      <div class="nxt-1">
        <div class="tit">
          <h1>Why Serene Space</h1>
          <br />
          <h4>
            Our platform is built by psychiatrists, therapists, and mental
            health experts with immense global experience.
          </h4>
        </div>
        <div class="ele-grp">
          <div class="ele">
            <div class="img-1"></div>
            <div class="cont">
              <h3>Integrated mental healthcare</h3>
              <br />
              <h5>
                Access self-care tools, community support, and in-person or
                online therapy and psychiatry services.
              </h5>
            </div>
          </div>
          <div class="ele">
            <div class="img-2"></div>
            <div class="cont">
              <h3>Grounded in science</h3>
              <br />
              <h5>
                Our mental health care options are based on scientifically
                proven treatments & clinically validated approaches.
              </h5>
            </div>
          </div>
          <div class="ele">
            <div class="img-3"></div>
            <div class="cont">
              <h3>Personalised support</h3>
              <br />
              <h5>
                Our treatment plans are tailored to your unique needs, so you
                can get the right care at the right time.
              </h5>
            </div>
          </div>
          <div class="ele">
            <div class="img-4"></div>
            <div class="cont">
              <h3>Round the clock support</h3>
              <br />
              <h5>
                Our mental healthcare offerings and services can be accessed
                from wherever you might be, all 7 days a week.
              </h5>
            </div>
          </div>
        </div>
      </div>

      <div class="nxt-2">
        <div class="cont-tit">
          <h1>What are you struggling with?</h1>

          <br /><br />

          <h4>
            Serene Space is here to support you with all your mental health
            needs.
          </h4>
        </div>

        <div class="cont-outr">
          <div class="card">
            <div class="upr">
              <img src="./home_images/alcohol-addiction.svg" alt="" />

              <h3>Alcohol Addiction</h3>
            </div>

            <br />

            <div class="lwr">
              <h5>
                Is your use of alcohol interfering with your ability to lead
                your life fully? You can find the right support.
              </h5>

              <br />

              <a href="../Quiz/AlcoholAddiction/alcohol.php">Take a quiz -></a>
            </div>
          </div>

          <div class="card">
            <div class="upr">
              <img src="./home_images/rain.svg" alt="" />

              <h3>Depression</h3>
            </div>

            <br />

            <div class="lwr">
              <h5>
                Do you feel like your sadness just won’t go away, and it is hard
                to find a way ahead? We can help.
              </h5>

              <br />

              <a href="../Quiz/Depression/depression.php">Take a quiz -></a>
            </div>
          </div>

          <div class="card">
            <div class="upr">
              <img src="./home_images/wool.svg" alt="" />

              <h3>General Anxiety Disorder (GAD)</h3>
            </div>

            <br />

            <div class="lwr">
              <h5>
                Do you often feel restless, worried or on-edge? Let us help you
                on how to cope better.
              </h5>

              <br />

              <a href="../Quiz/GAD/gadhtml.php">Take a quiz -></a>
            </div>
          </div>

          <div class="card">
            <div class="upr">
              <img src="./home_images/social-anxiety.svg" alt="" />

              <h3>Social Anxiety</h3>
            </div>

            <br />

            <div class="lwr">
              <h5>
                Do social settings make you anxious and fearful? We can help you
                cope with social situations better.
              </h5>

              <br />

              <a href="../Quiz/social_anxiety/social_anxiety.php"
                >Take a quiz -></a
              >
            </div>
          </div>

          <div class="card">
            <div class="upr">
              <img src="./home_images/tobacco-addiction.svg" alt="" />

              <h3>Tobacco Addiction</h3>
            </div>

            <br />

            <div class="lwr">
              <h5>
                Have you tried multiple times to quit tobacco, but are finding
                it difficult? It is possible to be tobacco-free and recover
                completely.
              </h5>

              <br />

              <a href="../Quiz/Tobacco/TobbacoAddiction.php">Take a quiz -></a>
            </div>
          </div>

          <div class="card">
            <div class="upr">
              <img src="./home_images/womens-health.svg" alt="" />

              <h3>Women's Health</h3>
            </div>

            <br />

            <div class="lwr">
              <h5>
                Is your mental health taking a toll due to hormonal, sexual or
                fertility concerns? We can help improve your well-being.
              </h5>

              <br />

              <a href="../Quiz/WomenHealth/WomenHealthAssessment.php"
                >Take a quiz -></a
              >
            </div>
          </div>

          <div class="card">
            <div class="upr">
              <img src="./home_images/ocd.svg" alt="" />

              <h3>Obsessive Compulsive Disorder (OCD)</h3>
            </div>

            <br />

            <div class="lwr">
              <h5>
                Are unwanted thoughts making you anxious and engage in unhelpful
                behaviors? You can find ways to cope.
              </h5>

              <br />

              <a href="../Quiz/OCD/OCDAssessment.php">Take a quiz -></a>
            </div>
          </div>

          <div class="card">
            <div class="upr">
              <img src="./home_images/bipolar.svg" alt="" />

              <h3>Bipolar Disorder</h3>
            </div>

            <br />

            <div class="lwr">
              <h5>
                Do you struggle with periods of intense happiness, followed by
                intense sadness? You can find the care you need with us.
              </h5>

              <br />

              <a href="../Quiz/BiPolar/bipolar.php">Take a quiz -></a>
            </div>
          </div>

          <div class="card">
            <div class="upr">
              <img src="./home_images/adhd.svg" alt="" />

              <h3>Adult ADHD</h3>
            </div>

            <br />

            <div class="lwr">
              <h5>
                Have you always struggled with difficulty focusing, being
                restless, or impulsivity? There are ways to manage it better.
              </h5>

              <br />

              <a href="../Quiz/ADHD/ADHDAssessment.php">Take a quiz -></a>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="footer">
      <div class="footer-container">
        <div class="footer-section">
          <h3>Serene Space</h3>
          <p>Your mental well-being, our priority.</p>
        </div>
        <div class="footer-section">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="../abt_us/about_us.html">About</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>Contact Us</h4>
          <p>Email: <a href="mailto:serenespace01@gamil.com">serenespace01@gamil..com</a></p>
        </div>
      </div>
      <p>&copy; 2024 Serene Space. All rights reserved.</p>
    </footer>
  </body>
</html>
