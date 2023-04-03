
  $(document).ready(function () {
    // Enable the navbar to open and close on mobile devices
    $('.navbar-toggler').on('click', function () {
      $('.sidebar').collapse('hide');
    });

    $('.sidebar .collapse').on('show.bs.collapse', function () {
      $(this).prev('.list-group-item').addClass('active');
    });

    $('.sidebar .collapse').on('hide.bs.collapse', function () {
      $(this).prev('.list-group-item').removeClass('active');
    });
  });
