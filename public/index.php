<?php require_once('../private/initialize.php'); ?>

<?php $Company = 'BC-Designs' ?>
<?php $page_title = $Company . 'Portfolio' ?>
<?php include(SHARED_PATH . '/header.php') ?>

  <body>

    <header class="page__header">
      <h1>Belinda Caylor</h1>
      <nav class="navbar__menu">

        <ul id="navbar__list"></ul>
      </nav>
    </header>

    <main>
      <section id="section1" data-nav="Projects" class="your-active-class">
        <div class="landing__container">
          <div class=flyingH2><h2>Projects</h2></div>

          <div class="project_container">
            <div class="project_photo link_hover">
              <a href="images\TravelApp.jpg"  target="_blank">
              <img src='images\TravelApp.jpg' alt="Travel App"></a>
            </div>
            <div class="project_detail">
              <h3><a href="https://travel-app-bcaylor.herokuapp.com/"  target="_blank">Travel App</a></h3>
              <h4>February 2020</h4>
              <ul>
                <li>Single page, responsive web application hosted on <a href="https://travel-app-bcaylor.herokuapp.com/">Heroku</a>.</li>
                <li>Developed app takes user travel information <br>and returns destination photo and weather information.</li>
                <li>Technologies used: JavaScript, Node.js, Webpack, <br>RESTful API, HTML5, CSS, Jest, Service Workers</li>
                <li><a href="https://github.com/bel-caylor/travel-app2"  target="_blank">GitHub Link</a></li>
              </ul>
            </div>
          </div>

          <div class="project_container">
            <div class="project_photo link_hover">
              <a href="images\BCPortfolio.jpg"  target="_blank">
              <img src='images\BCPortfolio.jpg' alt="Portfolio"></a>
            </div>
            <div class="project_detail">
              <h3>Portfolio Website</h3>
              <h4>February 2020</h4>
              <ul>
                <li>Single page, responsive webpage hosted on Heroku.</li>
                <li>Technologies used: CSS Animation, HTML5, SASS, JavaScript, Webpack</li>
                <li><a href="https://github.com/bel-caylor/BC-Designs"  target="_blank">GitHub Link</a></li>
              </ul>
            </div>
          </div>

          <div class="project_container">
            <div class="project_photo link_hover">
              <a href="images\BCPartyDesigns.jpg"  target="_blank">
              <img src='images\BCPartyDesigns.jpg' alt="BC Party"></a>
            </div>
            <div class="project_detail">
              <h3>E-Commerce App</h3>
              <h4>January 2020 - Current</h4>
              <ul>
                <li>Web index with product line and filtering links.</li>
                <li>Technologies used: HTML5, CSS</li>
                <li><a href="https://github.com/bel-caylor/travel-app2"  target="_blank">GitHub Link</a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section id="section2" data-nav="Education">
        <div class="landing__container">
          <div class=flyingH2><h2>Education</h2></div>
                <p>Continued learning and development are extremely important to me.
                The wealth of knowlegde and concepts available online are incredible.
                My favorites are <a href='https://www.udacity.com/' target="_blank">Udacity.com</a>,
                <a href='https://www.lynda.com/' target="_blank">Lynda.com</a> and
                <a href='https://education.gale.com/l-scccld_main' target="_blank">Gale Courses</a>.
              </p>

          <div class="project_container">
            <div class="project_photo">
              <img src='images\Udacity5.jpg' alt="Udacity">
            </div>
            <div class="project_detail">
              <h3>Udacity - Nanodegree</h3>
              <h4>Front End Developer</h4>
              <h5>Graduated - February 2020</h5>
              <ul>
                <li>JavaScript, HTML5, CSS, Node.js</li>
                <li>Webpack, RESTfulAPI, Jest</li>
                <li>Acheived highest level Project Expert Award <br>by getting 5 projects approved within one month.</li>
              </ul>
            </div>
          </div>

          <div class="project_container">
            <div class="project_photo ">
              <img src='https://library.nashville.org/sites/default/files/lynda-dot-com-3.png' alt="Lynda.com">
            </div>
            <div class="project_detail">
              <h3><a href='https://www.lynda.com/' target="_blank">Lynda</a></h3>
              <h4>Continued Education - Favorites</h4>
              <ul>
                <li class="tightLines">WordPress: Workflows - February 2020</li>
                <li class="tightLines">WordPress 5 Essential Training - February 2020</li>
                <li class="tightLines">Test Automation Foundations - November 2019</li>
                <li class="tightLines">Programming Foundations: Software Testing/QA - November 2019</li>
                <li class="tightLines">Six Sigma Foundations - October 2019</li>
                <li class="tightLines">Software Development Life Cycle (SDLC) - October 2019</li>
                <li class="tightLines">Managing Your Personal Investments - July 2019</li>
              </ul>
            </div>
          </div>

          <div class="project_container no_background">
            <div class="project_photo ">
              <img class="no_background" src='https://upload.wikimedia.org/wikipedia/en/thumb/4/49/University_of_Iowa_seal.svg/1200px-University_of_Iowa_seal.svg.png' alt="University of Iowa">
            </div>
            <div class="project_detail">
              <h3><a href='https://uiowa.edu/' target="_blank">University of Iowa</a> - BSE</h3>
              <h4>Chemical Engineering<h4>
              <h5>June 1993</h5>
            </div>
          </div>

        </div>
      </section>

    </main>

<?php include(SHARED_PATH . '/footer.php') ?>
