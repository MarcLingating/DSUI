<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* CSS styles for responsiveness */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }
    
    /* Navbar styles */
    .navbar {
      background-color: #333;
      overflow: hidden;
    }
    
    .navbar a {
      float: left;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }
    
    .navbar a:hover {
      background-color: #ddd;
      color: black;
    }
    
    .dropdown {
      float: left;
      overflow: hidden;
    }
    
    .dropdown .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown:hover .dropdown-content {
      display: block;
    }
    
    /* Content section styles */
    .content {
      padding: 20px;
    }
    
    /* Responsive styles */
    @media screen and (max-width: 600px) {
      .navbar a, .dropdown {
        float: none;
        display: block;
        text-align: left;
      }
      
      .navbar a {
        padding: 10px;
      }
      
      .dropdown-content {
        position: relative;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <a href="#"><img src="logo.png" alt="Logo" style="height: 20px;"> SOCMOBNET Social Mobilization and Network</a>
    <a href="#">Home</a>
    <a href="#">Announcement</a>
    <div class="dropdown">
      <a href="#">Resources</a>
      <div class="dropdown-content">
        <a href="#">Downloads</a>
        <a href="#">Issuances</a>
      </div>
    </div>
    <div class="dropdown">
      <a href="#">About</a>
      <div class="dropdown-content">
        <a href="#">Mission</a>
        <a href="#">Vision</a>
      </div>
    </div>
    <a href="#">Contact</a>
    <a href="#"><img src="login-icon.png" alt="Login" style="height: 20px;"></a>
  </div>

  <!-- Content section -->
  <div class="content">
    <div>
      <h2>Transparency Seal</h2>
      <img src="transparency-seal.png" alt="Transparency Seal" style="width: 200px;">
    </div>
    <div>
      <h2>FOI Seal</h2>
      <img src="foi-seal.png" alt="FOI Seal" style="width: 200px;">
    </div>
    <div>
      <h2>Section Title</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a erat elit. Proin id justo in est commodo semper. Vestibulum tincidunt vehicula magna eu egestas. Nulla facilisi. Morbi non lectus tincidunt, elementum tellus eu, scelerisque tortor. Donec aliquam diam a magna tristique rhoncus. Fusce ut magna id risus egestas auctor a nec urna. Curabitur accumsan enim nec iaculis pretium. Curabitur nec vestibulum nisi. Ut consectetur auctor posuere.</p>
    </div>
  </div>
</body>
</html>
