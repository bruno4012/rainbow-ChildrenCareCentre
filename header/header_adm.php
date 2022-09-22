<!--PUBLIC-->
<!--Session start, connect.php, links to all pages appropriate to-->
<!--the user level. Prevent unauthenticated users from accessing-->
<!--in appropriate content.-->
<!--The header should contain a navigation bar-->
<!--The header should query the page table to populate a-->
<!--dropdown with the name of all accessible pages-->
<!--A user login box supporting both parent and admin login-->
<!--You can choose to have one header which programmatically-->
<!--adapts to who is logged in or have 3 different header files-->
<nav class="navbar navbar-expand-md navbar-dark fixed-top ">
    <div class="container-fluid"><div class="mobileBtn">  <a class="navbar-brand" href="index.php"><img src="images/logo/logo.png"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button></div>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="babies.php">Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="testimonial.php">Testimonial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact_us.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registration.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_dash.php">Admin Control</a>
          </li>
        </ul>
      </div>
        <form class="d-flex space_btn" action="logout.php">
          <button class="btn btn-outline-success" type="submit">log out</button>
        </form>
    </div>
  </nav>
