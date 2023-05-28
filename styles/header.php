<?php 
?>

header {
  width: 100%;
  margin-bottom: 3em;
  height: 80px;
  background: var(--accent-darker);
}

#header__home,
#header__jobs,
#header__about {
  background: none;
  height: 100vh;
}

#header__home::before,
#header__about::before,
#header__jobs::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  height: 100%;
  width: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  z-index: -1;
}

#header__home::before {
  background-image: url("images/banner__home.jpg");
  filter: brightness(50%);
}

#header__about::before {
  background-image: url("images/banner__about.jpg");
  filter: brightness(50%);
}

#header__jobs::before {
  background-image: url("images/banner__jobs.jpg");
  filter: brightness(50%);
}

#navbar {
  box-shadow: rgba(216, 222, 233, 0.15) 0px 5px 10px 0px;
  width: 100%;
  height: 80px;
  padding: 0.6em 10%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: var(--bg);
  position: relative;
}

nav {
  position: absolute;
  right: 4rem;
  display: table;
  width: 800px;
  height: 1rem;
}

nav a {
  position: relative;
  width: 20%;
  display: table-cell;
  text-align: left;
  text-decoration: none;
  padding: 10px 20px;
  transition: 0.2s ease color;
  font-size: 0.8em;
}

nav a:before,
nav a:after {
  content: "";
  position: absolute;
  border-radius: 50%;
  transform: scale(0);
  transition: 0.2s ease transform;
}

nav a:before {
  top: 0;
  left: 10px;
  width: 6px;
  height: 6px;
}

nav a:after {
  top: 5px;
  left: 18px;
  width: 4px;
  height: 4px;
}

nav a:nth-child(1):before {
  background-color: yellow;
}

nav a:nth-child(1):after {
  background-color: red;
}

nav a:nth-child(2):before {
  background-color: #00e2ff;
}

nav a:nth-child(2):after {
  background-color: #89ff00;
}

nav a:nth-child(3):before {
  background-color: purple;
}

nav a:nth-child(3):after {
  background-color: palevioletred;
}

nav a:nth-child(4):before {
  background-color: grey;
}

nav a:nth-child(4):after {
  background-color: var(--accent);
}

nav a:nth-child(5):before {
  background-color: royalblue;
}

nav a:nth-child(5):after {
  background-color: aliceblue;
}

#indicator {
  position: absolute;
  bottom: 0;
  width: 30px;
  height: 3px;
  background-color: var(--bg);
  border-radius: 5px;
  transition: 0.2s ease left;
}

nav a:nth-child(1).nav-link__current ~ #indicator {
  left: 0%;
}
nav a:nth-child(2).nav-link__current ~ #indicator {
  left: 20%;
}
nav a:nth-child(3).nav-link__current ~ #indicator {
  left: 40%;
}
nav a:nth-child(4).nav-link__current ~ #indicator {
  left: 60%;
}
nav a:nth-child(5).nav-link__current ~ #indicator {
  left: 80%;
}

#navbar nav a:hover,
#navbar #logo:hover {
  color: var(--accent2);
}

nav a:hover:before,
nav a:hover:after {
  transform: scale(1);
}

nav a:nth-child(1):hover ~ #indicator {
  left: 0%;
  background: linear-gradient(130deg, yellow, red);
}

nav a:nth-child(2):hover ~ #indicator {
  left: 20%;
  background: linear-gradient(130deg, #00e2ff, #89ff00);
}

nav a:nth-child(3):hover ~ #indicator {
  left: 40%;
  background: linear-gradient(130deg, purple, palevioletred);
}

nav a:nth-child(4):hover ~ #indicator {
  left: 60%;
  background: linear-gradient(130deg, grey, var(--accent));
}

nav a:nth-child(5):hover ~ #indicator {
  left: 80%;
  background: linear-gradient(130deg, royalblue, aliceblue);
}

#banner {
  height: calc(100vh - 60px);
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 25px;
  color: var(--bg);
  text-shadow: 1px 1px 2px var(--accent-darker);
  text-align: center;
}

/* For tablet and phone */
#menu--checker__label {
  display: none;
	overflow: hidden;
}

#menu--checker__label .menu {
  position: absolute;
  right: 0px;
  top: 0px;
  width: 80px;
  height: 80px;
  z-index: 100;
  transition: 0.5s ease-in-out;
  box-shadow: 0 0 0 0 var(--bg), 0 0 0 0 var(--bg);
  cursor: pointer;
	border-bottom-left-radius: 100%;
  background: var(--bg);
}

#menu--checker__label .hamburger {
  position: absolute;
  top: 33px;
  right: 20px;
  width: 30px;
  height: 2px;
  background: var(--accent-lighter);
  display: block;
  transform-origin: center;
  transition: 0.5s ease-in-out;
}

#menu--checker__label .hamburger:after,
#menu--checker__label .hamburger:before {
  transition: 0.5s ease-in-out;
  content: "";
  position: absolute;
  display: block;
  width: 100%;
  height: 100%;
  background: var(--accent-lighter);
}

#menu--checker__label .hamburger:before {
  top: -10px;
}

#menu--checker__label .hamburger:after {
  bottom: -10px;
}

#menu--checker {
  display: none;
}

#menu--checker:checked + #menu--checker__label {
  height: 100vh;
  width: 100vw;
}

#menu--checker:checked + #menu--checker__label .menu {
  box-shadow: 0 0 0 100vw var(--bg), 0 0 0 100vh var(--bg);
  border-radius: 0;
}

#menu--checker:checked + #menu--checker__label .menu .hamburger {
  transform: rotate(45deg);
}

#menu--checker:checked + #menu--checker__label .menu .hamburger:after {
  transform: rotate(90deg);
  bottom: 0;
}

#menu--checker:checked + #menu--checker__label .menu .hamburger:before {
  transform: rotate(90deg);
  top: 0;
}

@media only screen and (max-width: 1000px) {
  #menu--checker__label {
    display: block;
  }

  nav {
    transition: 0.3s ease-in-out opacity;
    opacity: 0;
    position: absolute;
    height: 360px;
    width: 200px;
    top: calc(50vh - 180px);
    left: calc(50vw - 100px);
    color: var(--accent-darker);
    display: flex;
    flex-direction: column;
    z-index: 0;
    z-index: 101;
		pointer-events: none;
  }

  #indicator {
    background-color: var(--accent-darker);
  }

  nav a {
    font-size: 1.5em;
    width: 100%;
    height: 20%;
  }

  nav a:nth-child(1).nav-link__current ~ #indicator {
    left: 10px;
    top: calc(0% + 40px);
  }
  nav a:nth-child(2).nav-link__current ~ #indicator {
    left: 10px;
    top: calc(20% + 40px);
  }
  nav a:nth-child(3).nav-link__current ~ #indicator {
    left: 10px;
    top: calc(40% + 40px);
  }
  nav a:nth-child(4).nav-link__current ~ #indicator {
    left: 10px;
    top: calc(60% + 40px);
  }
  nav a:nth-child(5).nav-link__current ~ #indicator {
    left: 10px;
    top: calc(80% + 40px);
  }

  nav a:nth-child(1):hover ~ #indicator {
    left: 10px;
    top: calc(0% + 40px);
    background: linear-gradient(130deg, yellow, red);
  }

  nav a:nth-child(2):hover ~ #indicator {
    left: 10px;
    top: calc(20% + 40px);
    background: linear-gradient(130deg, #00e2ff, #89ff00);
  }

  nav a:nth-child(3):hover ~ #indicator {
    left: 10px;
    top: calc(40% + 40px);
    background: linear-gradient(130deg, purple, palevioletred);
  }

  nav a:nth-child(4):hover ~ #indicator {
    left: 10px;
    top: calc(60% + 40px);
    background: linear-gradient(130deg, grey, var(--accent));
  }

  nav a:nth-child(5):hover ~ #indicator {
    left: 10px;
    top: calc(80% + 40px);
    background: linear-gradient(130deg, royalblue, aliceblue);
  }

  #menu--checker:checked + #menu--checker__label + nav {
    opacity: 1;
		pointer-events: visible;
  }
}

