<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li id="myStoreLink">
				<a href="product.php">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Sản phẩm</span>
				</a>
			</li>
			<li>
				<a href="categories.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Danh mục</span>
				</a>
			</li>
			<li>
				<a href="pay_infor.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Hóa đơn</span>
				</a>
			</li>
			<li>
				<a href="account.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Thông tin tài khoản</span>
				</a>
			</li>
			<li>
				<a href="deal.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Giảm giá</span>
				</a>
			</li>
			<li>
				<a href="menu.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Menu</span>
				</a>
			</li>
			<li>
				<a href="notify.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Bảng thông báo</span>
				</a>
			</li>
			<li>
				<a href="user.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Quản lí người dùng</span>
				</a>
			</li>
			<li>
				<a href="update_balance.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Xác nhận nạp tiền</span>
				</a>
			</li>
			<li>
				<a href="feedback.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Bình luận</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main id="main-content">
            <?php
            include('main/deal.php');
            ?>

				</main>

				
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	


</body>

</html>