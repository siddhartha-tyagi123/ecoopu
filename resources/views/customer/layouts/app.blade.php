<!DOCTYPE html>
<html lang="en">
@include('customer.layouts.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('customer.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('customer.layouts.footer')
</body>
</html>
