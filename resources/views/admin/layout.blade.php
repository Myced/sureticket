<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Sure Ticket Admin Panel</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="T N CED"/>

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- include template stylesheets -->
    @include('admin.includes.stylesheets')

    <!-- //now page custom styles go here  -->
    @yield('styles')




</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active pimary-color-red">

        @include('admin.includes.topnav')

		@include('admin.includes.leftsidebar')

		@include('admin.includes.rightsidebar')

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">

                <!-- yield the page content here  -->
                @yield('content')


			</div>

			@include('admin.includes.footer')

		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

	<!-- JavaScript -->

    @include('admin.includes.scripts')

    <!-- include the script for notifications  -->
    @include('admin.includes.notification')

    <!-- //yeild additional scripts needed by the page  -->
    @yield('scripts')



	<!-- Init JavaScript -->
	<script src="/admin/dist/js/init.js"></script>
</body>

</html>
