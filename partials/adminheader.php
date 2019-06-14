<style>
      

  #mainNav {
  position: relative;
  font-family: 'Raleway', sans-serif;
}

.logo_pic {
 /* Frame */

  position: absolute;
  height: 75px;
  left: 35px;
  top: 33px;

  }

  .responsive {
  width: 100%;
  height: auto;
}


.nav-item:hover .paw {
  display: inline;
  color: white;
}

.paw {
	display: none;
}

#mainNav .navbar-toggler {
  font-size: 12px;
  text-transform: uppercase;
  color: #343a40;
}

#mainNav .navbar-nav > li.nav-item > a {
  font-size: 16px;
  font-weight: bold;
  letter-spacing: 1px;
}

@media only screen and (min-width: 992px) {
  #mainNav {
    background: gray;
  }
  #mainNav .navbar-nav > li.nav-item > a {
    padding: 10px 20px;
    color: #fff;
  }
  #mainNav .navbar-nav > li.nav-item > a:focus, #mainNav .navbar-nav > li.nav-item > a:hover {
    background: #555; 
  }
}

@media only screen and (min-width: 992px) {
  #mainNav {
    -webkit-transition: background-color 0.2s;
    transition: background-color 0.2s;
    /* Force Hardware Acceleration in WebKit */
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    -webkit-backface-visibility: hidden;
  }
  #mainNav.is-fixed {
    /* when the user scrolls down, we hide the header right above the viewport */
    position: fixed;
    top: -67px;
    -webkit-transition: -webkit-transform 0.2s;
    transition: -webkit-transform 0.2s;
    transition: transform 0.2s;
    transition: transform 0.2s, -webkit-transform 0.2s;
    border-bottom: 1px solid white;
    background-color: rgba(255, 255, 255, 0.9);
  }
  #mainNav.is-fixed{
    color: #212529;
  }
  }
  #mainNav.is-fixed .navbar-nav > li.nav-item > a {
    color: #212529;
  }
  #mainNav.is-fixed .navbar-nav > li.nav-item > a:focus, #mainNav.is-fixed .navbar-nav > li.nav-item > a:hover {
    color: #0085A1;
  }
}
      </style>

      

        <div id="headerlogo">
            <table>
                <tr>
                    <td id="logo"><a  href="index.php">
            <img class="logo_pic" src="images\logo.png"></td>
                   
         </table></tr>
        </div>
        
