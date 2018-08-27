<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">

        <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
        </div>

        <div class="sidebar-header">
            <h3>Bootstrap Sidebar</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Dummy Heading</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
            </div>
        </nav>
    </div>
    <!-- Dark Overlay element -->
    <div class="overlay"></div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		theme: "minimal"

		$('#dismiss, .overlay').on('click', function() {
			$('#sidebar').removeClass('active');
			$('.overlay').removeClass(('active'));
		})

		$('#sidebarCollapse').on('click', function() {
			$('#sidebar').addClass('active');
			$('.collapse.in').toggleClass('in');
			$('a[aria-expanded=true]').attr('aria-expanded', 'false');
		});
	});
</script>