<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Job Postings</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../Views/Home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Views/AboutUS.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile">Profile</a>
      </li>
     <?php 
     if (isset($_SESSION["role"]) && $_SESSION["role"]==1)
     {
         
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../Views/AddBook.php"></a>
          <a class="dropdown-item" href="../Views/admin.php">View Jobs</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="displayUser">Show All Users</a>
		  <a class="dropdown-item" href="../Views/ShowOrder_Admin.php">Show All Listings</a>
		  <a class="dropdown-item" href="../Views/SearchOrderbydate.php">Show Order By Date</a>
		  
        </div>
        </div>
      </li>
      <?php 
      }
      ?>
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Job by Title" aria-label="Search" name ="search" >
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <form class="form-inline my-2 my-lg-0" action="doLogout">
      <button class="btn btn-outline-success my-2 my-sm-0"  type="submit">Log Out</button>
    </form>
  </div>
</nav>

 