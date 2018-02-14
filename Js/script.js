//9=insert image canvas
var color = "black";
var isClicked = false;
var isRect = false;

function draw() {
    var drawing = document.getElementById("myCanvas");
    var con = drawing.getContext("2d");
    var image2 = new Image();
    image2.src = "Imagini/cat.png";


    con.drawImage(image2, 100, 100, 40, 50);
}

//-------------------move image----------------------------------

//object of the element to be moved
_item = null;
_imageDog = null;
//stores x & y co-ordinates of the mouse pointer
mouse_x = 0; 
mouse_y = 0;

// stores top,left values (edge) of the element
ele_x = 0;
ele_y = 0;

//bind the functions
function move_init() {
    document.onmousemove = _move;
    document.onmouseup = _stop;
}

//destroy the object when we are done
function _stop() {
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    var imageObj = new Image();
    imageObj.src = "Imagini/dog.png";
    imageObj.onload = function() {

    };

    _imageDog = imageObj;

    _item = null;
}

function _move(e) {


        mouse_x = document.all ? window.event.clientX : e.pageX;
        mouse_y = document.all ? window.event.clientY : e.pageY;
        if (_item != null) {
            _item.style.left = (mouse_x - ele_x) + "px"; 
            _item.style.top = (mouse_y - ele_y) + "px";
        }
    }

    //will be called when use starts dragging an element
	
function _move_item(ele) {
    //store the object of the element which needs to be moved
    _item = ele;
    ele_x = mouse_x - _item.offsetLeft;
    ele_y = mouse_y - _item.offsetTop;

}

//-------------------------draw line---------------------------

(function() {

    // Get a regular interval for drawing to the screen
    window.requestAnimFrame = (function(callback) {
        return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimaitonFrame ||
            function(callback) {
                window.setTimeout(callback, 1000 / 60);
            };
    })();

    // Set up the canvas
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    ctx.lineWith = 2;
    ctx.strokeStyle = color;


    // Set up mouse events for drawing
    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;

    canvas.addEventListener("mousedown", function(e) {
        drawing = true;
        lastPos = getMousePos(canvas, e);
    }, false);

    canvas.addEventListener("mouseup", function(e) {
        drawing = false;
    }, false);

    canvas.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas, e);
    }, false);

    // Set up touch events for mobile, etc
    canvas.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas, e);
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);
    canvas.addEventListener("touchend", function(e) {
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
    }, false);
    canvas.addEventListener("touchmove", function(e) {
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);

    // Prevent scrolling when touching the canvas
    document.body.addEventListener("touchstart", function(e) {
        if (e.target == canvas) {
            e.preventDefault();
        }
    }, false);
    document.body.addEventListener("touchend", function(e) {
        if (e.target == canvas) {
            e.preventDefault();
        }
    }, false);
    document.body.addEventListener("touchmove", function(e) {
        if (e.target == canvas) {
            e.preventDefault();
        }
    }, false);

    // Get the position of the mouse relative to the canvas
    function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        return {
            x: mouseEvent.clientX - rect.left,
            y: mouseEvent.clientY - rect.top
        };
    }

    // Get the position of a touch relative to the canvas
    function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        return {
            x: touchEvent.touches[0].clientX - rect.left,
            y: touchEvent.touches[0].clientY - rect.top
        };
    }

    // Draw to the canvas
    function renderCanvas() {
        if (drawing) {
            ctx.beginPath();

            if (isRect) {
                ctx.rect(mousePos.x, mousePos.y, 50, 50);
            } else {
                ctx.moveTo(lastPos.x, lastPos.y);
                ctx.lineTo(mousePos.x, mousePos.y);
            }
            ctx.stroke();
            ctx.closePath();
            lastPos = mousePos
        }
    }

    function clearCanvas() {
        canvas.width = canvas.width;
    }

    var btn = document.getElementById("button_aside");
    btn.addEventListener("click", function(e) {
        isClicked = !isClicked;
        isRect = false;
        // Allow for animation
        (function drawLoop() {
            if (isClicked) {
                requestAnimFrame(drawLoop);
                renderCanvas();
            }
        })();

    }, false);
})();
//-------------------get color----------

function changeColor(color) {
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    ctx.strokeStyle = color;
    ctx.lineWith = 2;
}


function ioana(val) {
        isRect = val;
    }

//------------------------reload page ------------------------
function New() {
        location.reload();
    }
//-----------------------load image----------------------------------
var image = document.getElementById('imageLoader');
imageLoader.addEventListener('change', handleImage, false);
var canvas = document.getElementById('myCanvas');
var ctx = canvas.getContext('2d');


function handleImage(e) {


        var reader = new FileReader();
        reader.onload = function(event) {
                var img = new Image();
                img.onload = function() {
                    ctx.drawImage(img, 0, 0);
                }
                img.src = event.target.result;
            }
        reader.readAsDataURL(e.target.files[0]);
    }

//---------------------save file---img------------------------

function my_download(e) {
    var canvas = document.getElementById("myCanvas");
    var dataURL = canvas.toDataURL('image/png');
    e.href = dataURL;
}