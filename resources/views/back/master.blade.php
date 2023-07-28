<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets-back') }}/"
  data-template="vertical-menu-template-free"
>
@include('back.partials.master.head')


  <body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
	  <div class="layout-container">
		<!-- Menu -->

		@include('back.partials.master.sidebar')
		<!-- / Menu -->

		<!-- Layout container -->
		<div class="layout-page">
		  <!-- Navbar -->

		  @include('back.partials.master.header')

		  <!-- / Navbar -->

		  <!-- Content wrapper -->
		  <div class="content-wrapper">
			<!-- Content -->

			<div class="container-xxl flex-grow-1 container-p-y">
			  <div class="row">

				@yield('content')
                
			</div>
			<!-- / Content -->

	        @include('back.partials.master.footer')

			<div class="content-backdrop fade"></div>
		  </div>
		  <!-- Content wrapper -->
		</div>
		<!-- / Layout page -->
	  </div>

	  <!-- Overlay -->
	  <div class="layout-overlay layout-menu-toggle"></div>
	</div>
	<!-- / Layout wrapper -->



   @include('back.partials.master.scripts')
  </body>
</html>
