<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Responsive Portfolio</title>
  <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, black, grey);
}

.container {
    background: linear-gradient(to right, grey, black, black, rgb(98, 68, 68), black);
    border-radius: 15px;
}

nav {
    background-color: #111;
    color: white;
    padding: 10px 20px;
    position: relative;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

h1 {
    font-weight: bold;
    font-size: 32px;
    color: rgb(207, 206, 206);
}

.seaarch input {
    padding: 5px;
    width: 200px;
    border-radius: 5px;
}

/* Hide checkbox */
#nav-toggle {
    display: none;
}

/* Hamburger icon */
.nav-toggle-label {
    display: none;
    flex-direction: column;
    cursor: pointer;
    gap: 5px;
}

.nav-toggle-label span {
    height: 3px;
    width: 25px;
    background: white;
    border-radius: 2px;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav-links a {
    text-decoration: none;
    color: white;
    padding: 8px 10px;
    display: block;
}

.nav-links a:hover {
    background-color: #333;
    border-radius: 4px;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    background-color: #222;
    list-style: none;
    min-width: 150px;
}

.nav-links li:hover .dropdown-menu {
    display: block;
}

.dropdown-menu a {
    padding: 8px 12px;
}

.section-image {
    text-align: center;
    padding: 30px;
    border-radius: 15px;
    border-bottom: 4px solid black;
}

.profil-image {
    width: 200px;
    height: 200px;
    padding: 6px;
    border-radius: 100%;
    object-fit: cover;
    background: linear-gradient(to right, black, white, red, black);
}

.section-image h2 {
    color: white;
    text-transform: capitalize;
    font-style: italic;
    font-size: 32px;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .nav-toggle-label {
        display: flex;
    }

      .nav-links {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #111;
        flex-direction: column;
        display: none;
    }

      .nav-links li {
        width: 100%;
        border-top: 1px solid #222;
    }

      #nav-toggle:checked + .nav-toggle-label + .nav-links {
        display: flex;
    }

      .dropdown-menu {
        position: static;
    }

      .nav-links li:hover .dropdown-menu {
        display: none;
    }

      .nav-links li:focus-within .dropdown-menu {
        display: block;
    }
}

@keyframes animation1 {
  0% {
    opacity: 0;
    transform: translatey(-30px);
  }
  100% {
    opacity: 1;
    transform: translatex(0);
  }
}

.container {
  animation: animation1 1s ease forwards;
  opacity: 0; /* Biar tidak langsung muncul */
  animation-delay: 0.1s; /* Delay agar lebih smooth */
}

  </style>
</head>
<body>
  <div class="container">
    <nav>
      <div class="nav-container">
        <h1>MyWeb</h1>
        <div class="seaarch">
          <input type="search" placeholder="Search" id="search">
        </div>
        <input type="checkbox" id="nav-toggle" />
        <label for="nav-toggle" class="nav-toggle-label">
          <span></span>
          <span></span>
          <span></span>
        </label>
        <ul class="nav-links">
          <li><a href="#">Home</a></li>
          <li><a href="#About">About Me</a></li>
          <li tabindex="0">
            <a href="#">Question ▼</a>
            <ul class="dropdown-menu">
              <li><a href="#">Sport Training</a></li>
              <li><a href="#">MY Life</a></li>
              <li><a href="#">Healthy Food</a></li>
            </ul>
          </li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </nav>

    <div class="section-image">
      <img src="./asset/Profile.jpg" alt="Profile Image" class="profil-image" />
      <h2>Dani Setiawan</h2>
    </div>
  </div>
</body>
</html>
