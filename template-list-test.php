<?php
  /**
   * The template for displaying all pages
   * Template Name: List Test Page
   * This is the template that displays all pages by default.
   * Please note that this is the WordPress construct of pages
   * and that other 'pages' on your WordPress site may use a
   * different template.
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package cyberize-app-dev
   */

  get_header('loggedout');

?>

<main id="primary" class="site-main container-fluid">
  <h1 class="text-center">LIST TEST PAGE</h1>
  <hr>
  <section class="col-6 mx-auto">

    <input class="form-control mb-2" type="text" name="user-name" id="user-name" placeholder="Name">
    <input class="form-control mb-2" type="text" name="user-email" id="user-email" placeholder="Email">
    <input class="form-control mb-2" type="text" name="user-phone" id="user-phone" placeholder="Phone">
    <button class="btn btn-danger" id="join-page-redirect-btn" data-origin="fake-list-page">
      Go To Join Page
    </button>
  </section>

</main><!-- #main -->

<?php
get_footer();