<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Login</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../login/Login.php">Login</a></li>
            <li><a class="dropdown-item" href="../login/Logout.php">Logout</a></li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="../register/Registration.php">Register</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="../handlers/ProductSearchHandler.php">Products</a>
        </li>
        <li class="nav-item">
        	<a class="nav-link" href="../cart/ShowCart.php">Cart</a>
        </li>
        <li class="nav-item dropdown">
        	<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Admin</a>
        	<ul class="dropdown-menu" aria-labeledby="navbarDropdown">
        		<li><a class="dropdown-item" href="../handlers/UsersHandler.php">Users</a></li>
        		<li><a class="dropdown-item" href="../admin/AddUser.php">Add Users</a></li>
        		<li><a class="dropdown-item" href="../handlers/ProductAdminHandler.php">Products</a></li>
        		<li><a class="dropdown-item" href="../admin/AddProduct.php">Add Products</a></li>
        	</ul>
        </li>
        <li class="nav_item">
        	<a class="nav-link" href="../reports/OrderReport.php">Orders Report</a>
        </li>
        <li class="nav_item">
        	<a class="nav-link" href="../api/OrderAPI.php">Orders API</a>
        </li>
      </ul>
    </div>
  </div>
</nav>