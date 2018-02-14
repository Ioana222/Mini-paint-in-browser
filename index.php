<?php session_start(); ?>
<!DOCTYPE html>
<html id="content">
   <head>
      <title>
         My Paint Studio
      </title>
      <meta charset="UTF-8"/>
      <link rel="stylesheet" type="text/css" href="Css/stil.css"/>
      <script type="text/javascript" src="Js/script2.js"></script>
   </head>
   <body id="body" onload="move_init()">
      <header>
      </header>
      <section id="MainSection">
         <?php if (!isset($_SESSION['utilizator'])) {?>
         <br><br><br><br><br><br>
         <form action="Conectare/login.php" method="POST">
            <span id="span_login">Username:</span> <input id="input_text" type="text" name="username" maxlength="6" required="required"  onkeyup="showHint(this.value)" />
            <br> <br>
            <span id="span_login">Password:</span> <input id="input_text" type="password" name="password"/>
            <p>Suggestions: <span id="txtHint"></span></p>
            <br>
            <p>Pentru testare utilizati:<br><code> Username<i>:ioana</i> <br>Password:<i>cata</i></code></p>
            <br><br>
            <input id="input_button" type="submit" value="Login"/>
            <br><br>
         </form>
         <?php
            if (isset($_SESSION['eroare'])) {
                echo $_SESSION['eroare'];
                unset($_SESSION['eroare']);
            }
            } else {
            ?>
         <nav>
            <ul id="nav">
               <li><a class="hsubs" href="#">Paint a dream</a>
               </li>
               <li>
                  <a class="hsubs" href="#">File</a>
                  <ul class="subs">
                     <li><a href="#" onclick="New()">New</a></li>
                     <li id="loader"><input type="file" id="imageLoader" name="imageLoader" /></li>
                     <li><a onclick="my_download(this)" href="#" target="_blank" class="button" id="btn-download" download="my_work">Download</a></li>
                  </ul>
               </li>
               <li>
                  <form action="Conectare/logout.php">
                     <br> <input type="submit" id="output_buttonn" value="Logout"/>
                  </form>
               </li>
               <div id="lavalamp"></div>
            </ul>
         </nav>
         <aside id="aside_left">
            <button class="button_aside" id="button_aside" ><img src="Imagini/pencil.png" id="image_button"></button>
            <button class="button_aside" onclick="ioana(true)"  ><img src="Imagini/rectangle.png" id="image_button"></button>
            <br>
            <button id="red" style="background:red; width:50px; height:50px; " onclick = "changeColor('red')"></button>
            <button id="pink" style="background:pink; width:50px; height:50px;" onclick = "changeColor('pink')"></button>
            <button id="fuchsia" style="background:fuchsia; width:50px; height:50px;" onclick = "changeColor('fuchsia')"></button>
            <button id="orange" style="background:orange; width:50px; height:50px;" onclick = "changeColor('orange')"></button>
            <button id="yellow" style="background:yellow; width:50px; height:50px; " onclick = "changeColor('yellow')"></button>
            <button id="lime" style="background:lime; width:50px; height:50px; " onclick = "changeColor('lime')"></button>
            <button id="green" style="background:green; width:50px; height:50px; " onclick = "changeColor('green')"></button>
            <button id="blue" style="background:blue; width:50px; height:50px;" onclick = "changeColor('blue')"></button> 
            <button id="purple" style="background:purple; width:50px; height:50px; " onclick = "changeColor('purple')"></button>
            <button id="gray" style="background:gray; width:50px; height:50px; " onclick = "changeColor('gray')"></button>
            <button id="black" style="background:black; width:50px; height:50px;" onclick = "changeColor('black')"></button>
            <button id="white" style="background:white; width:50px; height:50px; " onclick = "changeColor('white')"></button>
            <br><br><br>
            <span id="cat" style="width:50px; height:50px;"onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/circle.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="cat" style="width:50px; height:50px;"onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/circle.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="cat" style="width:50px; height:50px;"onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/circle.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <br>
            <span id="cat" style="width:50px; height:50px;"onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/triangle.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="cat" style="width:50px; height:50px;"onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/triangle.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="cat" style="width:50px; height:50px;"onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/triangle.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
         </aside>
         <canvas id="myCanvas" height="650" width="1050" onclick="showCoords(event)">
            <script type="text/javascript" src="Js/script.js"></script>
         </canvas>
         <aside id="aside_right">
            <span id="cat" style="width:50px; height:50px;"onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/cat.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="cat2" style="width:50px; height:50px;"onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/cat.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="cat3" style="width:50px; height:50px;"onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/cat.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <br><br><br>
            <span id="dog" style="width:50px; height:50px;" onmousedown="_move_item(this);" ><img id="imagine_button" src="Imagini/dog.png" width="50" height="50" onmousedown="_move_item(this);" /></span>
            <span id="dog2" style="width:50px; height:50px;" onmousedown="_move_item(this);" ><img id="imagine_button" src="Imagini/dog.png" width="50" height="50" onmousedown="_move_item(this);" /></span>
            <span id="dog3" style="width:50px; height:50px;" onmousedown="_move_item(this);" ><img id="imagine_button" src="Imagini/dog.png" width="50" height="50" onmousedown="_move_item(this);" /></span>
            <br><br><br>
            <span id="flower" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/flower.png" width="50" height="50" onmousedown="_move_item(this);" /></span>
            <span id="flower2" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/flower.png" width="50" height="50" onmousedown="_move_item(this);" /></span>
            <span id="flower3" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/flower.png" width="50" height="50" onmousedown="_move_item(this);" /></span>
            <br><br><br>
            <span id="tree" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/tree.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="tree2" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/tree.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="tree3" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/tree.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <br><br><br>
            <span id="children" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/children.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="children2" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/children.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="children3" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/children.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <br><br><br>
            <span id="dino" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/dino.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="dino2" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/dino.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="dino3" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/dino.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <br><br><br>
            <span id="sheep" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/sheep.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="sheep2" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/sheep.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="sheep3" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/sheep.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <br><br><br>
            <span id="fish" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/fish.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="fish2" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/fish.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="fish3" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/fish.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <br><br><br>
            <span id="sun" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/sun.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="sun2" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/sun.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="sun3" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/sun.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <br><br><br>
            <span id="cloud" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/cloud.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="cloud2" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/cloud.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
            <span id="cloud3" style="width:50px; height:50px;" onmousedown="_move_item(this);"><img id="imagine_button" src="Imagini/cloud.png" width="50" height="50" onmousedown="_move_item(this);"/></span>
         </aside>
         <?php } ?>
      </section>
      </div>
   </body>
</html>