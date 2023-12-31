<!DOCTYPE HTML>

<html>

<head>
	<title>Landed by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="{{url('/assets')}}/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="{{url('/assets')}}/css/noscript.css" />
	</noscript>
	@yield('css')
</head>


<body class="is-preload landing">
	<div id="page-wrapper">

		<!-- Header -->
		<header id="header">
			<h1 id="logo"><a href="{{route('home')}}">EnglishWeb</a></h1>
			<nav id="nav">
				<ul><li><a href="index.html">Home</a></li>
					<li><a href="{{route('word.search')}}">Tìm kiếm từ vựng</a></li>
					<li><a href="{{route('videos.listvideo')}}">Khóa học</a></li>
					<!-- <li>
						<a href="#">Layouts</a>
						<ul>
							<li><a href="left-sidebar.html">test1 </a></li>
							<li><a href="right-sidebar.html">test2</a></li>
							<li><a href="{{route('now')}}">No Sidebar</a></li>
							<li>
								<a href="#">Submenu</a>
								<ul>
									<li><a href="#">Option 1</a></li>
									<li><a href="#">Option 2</a></li>
									<li><a href="#">Option 3</a></li>
									<li><a href="#">Option 4</a></li>
								</ul>
							</li>
						</ul>
					</li> -->
					<li><a href="{{route('startQuiz')}}">testonline</a></li>

					<li>
						@if(Auth::check())
						<a href="" class="button primary">{{Auth::user()->name}}</a>
						<ul>
							<li><a href="{{route('logoutt')}}">logout</a></li>
							<li><a href="">setting</a></li>

						</ul>
						@else
						<a href="{{route('register')}}" class="button primary">Sign up</a>
						@endif



					</li>
				</ul>
			</nav>
		</header>
		<div class="wrapper">
			@yield('test')
		</div>
		<!-- Footer -->
		<footer id="footer">
			<ul class="icons">
				<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
				<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
				<li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
			</ul>
			<ul class="copyright">
				<li>&copy; Untitled. All rights reserved.</li>
				<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
			</ul>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="{{url('/assets')}}/js/jquery.min.js"></script>
	<script src="{{url('/assets')}}/js/jquery.scrolly.min.js"></script>
	<script src="{{url('/assets')}}/js/jquery.dropotron.min.js"></script>
	<script src="{{url('/assets')}}/js/jquery.scrollex.min.js"></script>
	<script src="{{url('/assets')}}/js/browser.min.js"></script>
	<script src="{{url('/assets')}}/js/breakpoints.min.js"></script>
	<script src="{{url('/assets')}}/js/util.js"></script>
	<script src="{{url('/assets')}}/js/main.js"></script>

</body>

</html>