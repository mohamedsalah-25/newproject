<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="template/assets/css/animate.css">
  	<!-- mean menu css -->
  	<link rel="stylesheet" href="template/assets/css/meanmenu.min.css">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="template/assets/img/oppa logo.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
      @include('admin.navbar')
        <!-- BODY -->
        <div class="col-md-8 grid-margin stretch-card pt-5">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-between">
                <h4 class="card-title mb-1">Orders</h4>
                <p class="text-muted mb-1">Order details</p>
              </div>
              <div class="row">
                @foreach($myorder as $item)
                <div class="col-12">
                  <div class="preview-list">
                    <div class="preview-item border-bottom">
                      <div class="preview-thumbnail">
                      </div>
                      <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                          <h6 class="preview-subject">{{$item->product_name}}</h6>
                          <p class="text-muted mb-0">orderd by : {{$item->username}}</p>
                        </div>
                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                          <p class="text-muted">{{$item->created_at}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                      @endforeach

                </div>
              </div>
              <div style="text-align: center;" >
                    <a>  {{ $myorder->links() }}</a>
              </div>
            </div>
          </div>
        </div>
        <!--END BODY-->
          <!-- partial -->
        </div>

        <!-- main-panel ends -->
      </div>

      <!-- page-body-wrapper ends -->
    </div>


    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>

</html>
