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
            //Setup Sections on Nav Bar
            while($section = mysqli_fetch_assoc($sections)) {
              $nav = "<a href=\"#section" . $section['ord'] . "\">";
              $nav .= '<li id="S' . $section['ord'];
              $nav .= '" class="menu__link" data-id="section';
              $nav .= $section['ord'] . '">';
              $nav .= $section['section'] . '</li></a>';
              echo $nav;
            }
            //Setup Edit and Setup on Nav bar
              $nav = '<button onclick="clickNavBarBtn()"><div class="tooltip"><img id="btnEdit" class="btn navbarBtn menu__lin" src="images\button_edit.png" alt="Configuation" hspace="2"><span class="tooltiptext">Edit</span></div></button>';
              $nav .= '<div class="tooltip"><img id="btnSetup" class="btn navbarBtn menu__lin" src="images\button_setup.png" alt="Configuation" hspace="2"><span class="tooltiptext">Config</span></div>';
              echo $nav;
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
          // Set section1 to 'your-active-class'
          if ($loop == 1) {
            $main .= '<section id="section' . $section['ord'] . '" data-nav=' . $section['section'] . ' class="your-active-class">';
            $loop = 2;
          }else {
            $main .= '<section id="section' . $section['ord'] . '" data-nav=' . $section['section'] . '>';
          }

          $main .= '<div class="landing__container">';
          // $main .= '<div class=flyingH2><h2>' . $section['section'] . '</h2></div>';
          $main .= '<div class="section">';
          $main .= '<button onclick="clickEditBtn(' . $section['id'] . ')"><img id="btnSection' . $section['id'] . '" class="btnEdit btn" src="images\button_edit.png" alt="Edit" hspace="2"></button>';
          $main .= '<button onclick="clickOKBtn("section' . $section['id'] . '")"><img id="btnOKSec' . $section['id'] . '" class="btnOK btn" src="images\button_OK.png" alt="OK" hspace="2"></button>';
          $main .= '<input type="text" id="Sec' . $section['ord'] . '" value="' . $section['section'] . '" class="h2" readonly></div>';
          $main .= get_article(SHARED_PATH . '/articles/' . $section['section'] . '0.html');

  // Loop Through SubSections
          $subSections = query_db("sub_sections", "ord", "ASC", "section_id", $section['ord']);
          while($subSection = mysqli_fetch_assoc($subSections)) {

            if (substr($subSection['photo'],0,4) != "GRID") {
        //Regular Article Layout
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
              }else {
          //Photo GRID Layout
              $gridName = substr($subSection['photo'],5);
              //Loop through photos

              $main .= '<div class="gallery_container">';
                //Add subsection Title and detail
                $main .= '<div class="gallery_detail">';
                $main .= '<h3>' . $subSection['heading_1'] . '</h3>';
                if ($subSection['heading_2'] != NULL) {
                  $main .= '<p>' . $subSection['heading_2'] . '</p';
                }
                $main .= '</div>';
                $main .= '<div class="photoRow link_hover">';
                //Loop through photos and add to grid
                $column = 1; // control photo column grid
                $count = 1;
                // $main .= count(glob(PUBLIC_PATH . '/images/' . $gridName . '*.*'));
//NEED TO CHANGE TO foreach loop
                while (glob(PUBLIC_PATH . '/images/' . $gridName . $count . '.*') != NULL) {
                  // $main .= '<p>' . $count . '</p>';
                  if ($column == 1) {
                    $main .= '<div class="photoCol">';
                    $main .= '<a href="' . glob('images/' . $gridName . $count . '.*')[0] . '"  target="_blank">';
                    $main .= '<img src="' . glob('images/' . $gridName . $count . '.*')[0] . '"></a>';
                    $column = 2;
                  } else {
                    $main .= '<a href="' . glob('images/' . $gridName . $count . '.*')[0] . '"  target="_blank">';
                    $main .= '<img src="' . glob('images/' . $gridName . $count . '.*')[0] . '"></a>';
                    $main .= '</div>';
                    $column = 1;
                  }
                  $count ++;
                }
                $main .= '</div>';  //photoRow div
              $main .= '</div>';  //gallery_container div
              }
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
