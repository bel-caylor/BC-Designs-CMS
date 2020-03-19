<?php require_once('../private/initialize.php'); ?>

<?php
  $name = "Belinda Caylor";
  $sections = query_db("sections", "ord");
 ?>

<?php $Company = 'BC-Designs' ?>
<?php $page_title = $Company . 'Portfolio' ?>
<?php include(SHARED_PATH . '/header.php') ?>

  <body>

    <header class="page__header">
      <h1><?php echo $name ?></h1>
      <nav class="navbar__menu">
        <ul id="navbar__list">
          <!-- Setup Navigation -->
          <?php
            while($section = mysqli_fetch_assoc($sections)) {
              $nav = "<a href=\"#section" . $section['ord'] . "\">";
              $nav .= '<li id="S' . $section['ord'];
              $nav .= '" class="menu__link" data-id="section';
              $nav .= $section['ord'] . '">';
              $nav .= $section['section'] . '</li></a>';
              echo $nav;
            }
            mysqli_free_result($sections);
           ?>

        </ul>
      </nav>
    </header>

    <main>
      <?php
        $sections = query_db("sections", "ord");
        $main = '';
        $loop = 1;
// Loop Throuhg Sections
        while($section = mysqli_fetch_assoc($sections)) {
// Section
          // Set section1 to 'your-active-class'
          if ($loop == 1) {
            $main .= '<section id="section' . $section['ord'] . '" data-nav=' . $section['section'] . ' class="your-active-class">';
            $loop = 2;
          }else {
            $main .= '<section id="section' . $section['ord'] . '" data-nav=' . $section['section'] . '>';
          }

          $main .= '<div class="landing__container">';
          $main .= '<div class=flyingH2><h2>' . $section['section'] . '</h2></div>';
          $main .= get_article(SHARED_PATH . '/articles/' . $section['section'] . '0.html');

  // Loop Through SubSections
          $subSections = query_db("sub_sections", "ord", "ASC", "section_id", $section['ord']);
          while($subSection = mysqli_fetch_assoc($subSections)) {
            $main .= '<div class="project_container">';
            // Photo
              if ($subSection['photo'] != NULL) {
                  $main .= '<div class="project_photo link_hover">';
                  if (substr($subSection['photo'],0,4) == "http") {
                    $main .= '<a href="' . $subSection['photo'] . '"  target="_blank">';
                    $main .= '<img src="' . $subSection['photo'] . '" alt="' . $subSection['heading_1'] . '"></a>';

                  }else {
                    $main .= '<a href="images\\' . $subSection['photo'] . '"  target="_blank">';
                    $main .= '<img src="images\\' . $subSection['photo'] . '" alt="' . $subSection['heading_1'] . '"></a>';
                  }
                  $main .= '</div>';
                }
            //Detail
                $main .= '<div class="project_detail">';
                $main .= '<h3>' . $subSection['heading_1'] . '</h3>';
                if ($subSection['heading_2'] != NULL) {
                  $main .= '<h4>' . $subSection['heading_2'] . '</h4>';
                }
                if ($subSection['heading_3'] != NULL) {
                  $main .= '<h5>' . $subSection['heading_3'] . '</h5>';
                }
            //Article
                $main .= get_article(SHARED_PATH . '/articles/' . $section['section'] . $subSection['article']);
                $main .= '</div>';  //End Detail
              $main .= '</div>';  //project container
          }


          $main .= '</div>';  //landing_container
          $main .= '</section>';
        }
        echo $main;
       ?>


      <?php
        mysqli_free_result($sections);
       ?>
    </main>

<?php include(SHARED_PATH . '/footer.php') ?>
