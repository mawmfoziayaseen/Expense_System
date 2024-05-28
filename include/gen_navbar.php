<nav class="navbar navbar-expand-lg shadow bg-body-tertiary px-md-4">
  <div class="container-fluid">
    <a class="navbar-brand md-5" href="index.php">Expense</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="register_user.php">Add Users</a></li>
            <li><a class="dropdown-item" href="display_reg_users.php">All Users</a></li>
            
            
          
          </ul>
      
      </ul>
      <div>
      <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="bi fs-4 bi-person-circle me-3"></i><span><?php echo ucfirst($_SESSION['name']); ?></span>
  </a>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Profile</a></li>
    <li><a class="dropdown-item" href="logout.php">Log out</a></li>
   
  </ul>
</div>
      </div>
    </div>
  </div>
</nav>