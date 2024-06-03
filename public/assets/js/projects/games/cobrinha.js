window.addEventListener("load", async() => {
    const select = async(element) => document.querySelector(element);
    const selectAll = async(element) => document.querySelectorAll(element);

    //SELECTORS
    const playBoard = await select(".play-board");
    const scoreElement = await select(".score");
    const highScoreElement = await select(".high-score");
    const controlsElement = await selectAll(".controls i");

    //LETS
    let gameOver = false;
    let food = { x: 0, y: 0 };
    let worm = { x: 5, y: 10 };
    let wormBody = [];
    let velocity = { x: 0, y: 0 };
    let boardPosition = { x: 0, y: 25 };
    let score = 0;
    let setTimeoutID;
    let sizePlayerBoard = {
        w: playBoard.clientWidth,
        h: playBoard.clientHeight,
        d: parseFloat(
            (playBoard.clientWidth / playBoard.clientHeight).toFixed(2)
        ),
    };

    let highScore = JSON.parse(localStorage.getItem("high-score")) || [];
    highScoreElement.innerText = `Maior Pontuação: ${highScore}`;

    const changeFoodPosition = async() => {
        boardPosition.x = parseInt(
            (boardPosition.y * sizePlayerBoard.d).toFixed(0)
        );

        playBoard.style.gridTemplate =
            "repeat(" +
            boardPosition.y +
            ", 1fr) / repeat(" +
            boardPosition.x +
            ", 1fr)";

        food.x = Math.floor(Math.random() * boardPosition.x) + 1;
        food.y = Math.floor(Math.random() * boardPosition.y) + 1;

        console.log(boardPosition, sizePlayerBoard, food);
    };

    const handleGameOver = async() => {
        clearInterval(setTimeoutID);
        alert("Game Over... Clique em OK e inicie outra partida");
        location.reload();
    };

    const changeDirection = async(k) => {
        //a
        if (k.keyCode === 87 && velocity.y != 1) {
            velocity.x = 0;
            velocity.y = -1;

            //d
        } else if (k.keyCode === 68 && velocity.x != -1) {
            velocity.x = 1;
            velocity.y = 0;

            //s
        } else if (k.keyCode === 83 && velocity.y != -1) {
            velocity.x = 0;
            velocity.y = 1;

            //a
        } else if (k.keyCode === 65 && velocity.x != 1) {
            velocity.x = -1;
            velocity.y = 0;
        }
    };

    controlsElement.forEach((key) => {
        key.addEventListener(
            "click",
            async() =>
            await changeDirection({ keyCode: parseInt(key.dataset.key) })
        );
    });

    const initGame = async() => {
        if (gameOver) return await handleGameOver();
        let htmlMarkup = `<div class="food" style="grid-area: ${food.y} / ${food.x}"></div>`;

        if (worm.x === food.x && worm.y === food.y) {
            await changeFoodPosition();
            wormBody.push([food.x, food.y]);

            score++;

            highScore = score >= highScore ? score : highScore;
            localStorage.setItem("high-score", highScore);
            scoreElement.innerText = `Pontos: ${score}`;
        }

        for (let i = wormBody.length - 1; i > 0; i--) {
            wormBody[i] = wormBody[i - 1];
        }

        wormBody[0] = [worm.x, worm.y];

        worm.x += velocity.x;
        worm.y += velocity.y;

        if (
            worm.x <= 0 ||
            worm.x > boardPosition.x ||
            worm.y <= 0 ||
            worm.y > boardPosition.y
        ) {
            gameOver = true;
        }

        for (let i = 0; i < wormBody.length; i++) {
            htmlMarkup += `<div class="head" style="grid-area: ${wormBody[i][1]} / ${wormBody[i][0]}"></div>`;
            if (
                i !== 0 &&
                wormBody[0][0] === wormBody[i][0] &&
                wormBody[0][1] === wormBody[i][1]
            ) {
                gameOver = true;
            }
        }

        playBoard.innerHTML = htmlMarkup;
    };

    await changeFoodPosition();
    setTimeoutID = setInterval(async() => {
        initGame();
    }, 125);

    window.addEventListener("keydown", async() => {
        await changeDirection();
    });
});
