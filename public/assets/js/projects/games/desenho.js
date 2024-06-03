window.addEventListener("load", async() => {
    const select = async(element) => document.querySelector(element);
    const selectAll = async(element) => document.querySelectorAll(element);

    const getAllColors = selectAll("[data-color]");
    const infoScreen = select(".info-screen");
    const getScreen = select("#tela");

    let context = getScreen.getContext("2d");
    let currentColor = "rgba(0,0,0,1)";
    let canDraw = false;
    let mouseX = 0;
    let mouseY = 0;

    const sizeScreen = async() => {
        let w = infoScreen.offsetWidth - 36;
        let h = w / 2;

        getScreen.setAttribute("width", w);
        getScreen.setAttribute("height", h);
    };

    const colorClickEvent = async(e) => {
        let getColor = e.target.getAttribute("data-color");
        currentColor = getColor;

        select(".color.active").classList.remove("active");
        e.target.classList.add("active");
    };

    getAllColors.forEach((element) => {
        element.addEventListener("click", colorClickEvent);
    });

    const mouseDowEvent = async(e) => {
        canDraw = true;
        mouseX = e.pageX - getScreen.offsetLeft;
        mouseY = e.pageY - getScreen.offsetTop;
    };

    const mouseMoveEvent = async(e) => {
        if (canDraw) {
            draw(e.pageX, e.pageY);
        }
    };

    const mouseUpEvent = async() => {
        canDraw = false;
    };

    const draw = async(x, y) => {
        let pointX = x - getScreen.offsetLeft;
        let pointY = y - getScreen.offsetTop;

        context.beginPath();
        context.lineWidth = 5;
        context.lineJoin = "round";
        context.moveTo(mouseX, mouseY);
        context.lineTo(pointX, pointY);
        context.closePath();
        context.strokeStyle = currentColor;
        context.stroke();

        mouseX = pointX;
        mouseY = pointY;
    };

    getScreen.addEventListener("mousedown", mouseDowEvent);
    getScreen.addEventListener("mousemove", mouseMoveEvent);
    getScreen.addEventListener("mouseup", mouseUpEvent);

    await sizeScreen();
});
