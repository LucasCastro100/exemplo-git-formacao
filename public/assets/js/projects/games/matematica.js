window.addEventListener("load", async() => {
    /*INICIO CLASSES*/
    class getDateTime {
        constructor() {
            this.date = new Date();

            this.currentDay =
                this.date.getDate() < 10 ?
                "0" + this.date.getDate() :
                this.date.getDate();
            this.currentMonth =
                this.date.getMonth() + 1 < 10 ?
                "0" + (this.date.getMonth() + 1) :
                this.date.getMonth() + 1;
            this.currentYear = this.date.getFullYear();
            this.currentHour =
                this.date.getHours() < 10 ?
                "0" + this.date.getHours() :
                this.date.getHours();
            this.currentMinutes =
                this.date.getMinutes() < 10 ?
                "0" + this.date.getMinutes() :
                this.date.getMinutes();
            this.currentSeconds =
                this.date.getSeconds() < 10 ?
                "0" + this.date.getSeconds() :
                this.date.getSeconds();
        }

        setCreatedDate() {
            return (this.currentSaveDate = `${this.currentDay}/${this.currentMonth}/${this.currentYear}`);
        }

        setCreatedHour() {
            return (this.currentSaveDate = `${this.currentHour}:${this.currentMinutes}:${this.currentSeconds}`);
        }

        setToday() {
            return (this.currentSaveDate = `${this.currentYear}-${this.currentMonth}-${this.currentDay}`);
        }

        getYear() {
            return (this.currentYear = this.date.getFullYear());
        }
    }
    /*FIM CLASSES*/

    const select = (element) => document.querySelector(element);
    const selectAll = (element) => document.querySelectorAll(element);
    const success = select(".success");
    const error = select(".error");
    const alterOperations = selectAll("[data-operation]");
    const qtdOperations = selectAll("[data-qtdOperation]");
    const valuesCalcs = selectAll('[data-calc="value"]');
    const symbolCalcs = selectAll('[data-calc="symbol"]');
    const result = select('[data-calc="result"]');
    const getBtn = selectAll("[data-btn]");
    const getBtnCheck = getBtn[1];
    const getBtnGenerate = getBtn[0];
    const showTitleResults = select(".showResults h4");
    const showListResults = select(".showResults ul");
    const inputDate = select('input[type="date"]');
    const formFilter = select('[data-form="filterResult"]');
    const inputNumberElement = selectAll('section.calc input[type="number"]');

    let listOperations =
        JSON.parse(localStorage.getItem("infoOperations")) || [];

    let getSuccess = 0;
    let getError = 0;
    let firstValue = 0;
    let secondValue = 0;
    let getResult = 0;
    let validateCalc = 0;
    let qtdGenerateCalcs = 0;
    let getOperation = "";
    let getSymbol = "";
    let saveResult = "";
    let typeAlert = "";

    let randomNumber = [10, 10];
    let arrayResults = [];
    let arraySuccess = [];
    let arrayError = [];
    let arrayValuesCalc = [];
    let arrayNameOperation = [
        { symbol: "+", name: "Soma" },
        { symbol: "-", name: "Subtração" },
        { symbol: "x", name: "Multiplicação" },
        { symbol: "/", name: "Divisão" },
    ];

    if (alterOperations.length > 0) {
        alterOperations.forEach((item) => {
            item.addEventListener("click", () => {
                alterOperations.forEach((removeClass) => {
                    removeClass.classList.remove("active");
                });

                item.classList.add("active");
                getOperation = item.getAttribute("data-operation");
                setSymbolCalc(getOperation);
            });
        });
    }

    if (inputNumberElement.length > 0) {
        inputNumberElement.forEach((item) => {
            item.addEventListener("change", () => {
                randomNumber[item.dataset.numberInput] = parseInt(item.value);
            });
        });
    }

    const setSymbolCalc = (operation) => {
        symbolCalcs[0].setAttribute("data-value", operation);
        getSymbol = symbolCalcs[0].getAttribute("data-value");
        symbolCalcs[0].innerText = getSymbol;
    };

    const checkCalc = (x, y, o, r) => {
        if (r == NaN) {
            alert("Insira algum valor no campo");
        } else {
            switch (o) {
                case "+":
                    validateCalc = x + y;
                    break;

                case "-":
                    validateCalc = x - y;
                    break;

                case "/":
                    validateCalc = x / y;
                    break;

                case "x":
                    validateCalc = x * y;
                    break;
            }

            validateCalc = validateCalc.toFixed(3);

            saveResult = `${x} ${o} ${y} = ${r}`;

            if (r == validateCalc) {
                typeAlert = "success";

                alert("Acertou");
                getSuccess += 1;
                success.innerText = `Acertos: ${getSuccess}`;

                generateValues();
                result.value = "";
                qtdGenerateCalcs = 0;
            } else {
                typeAlert = "error";

                alert("Errou");
                getError += 1;
                error.innerText = `Erros: ${getError}`;
            }
        }

        saveResults();
    };

    if (getBtn.length > 0) {
        getBtnGenerate.addEventListener("click", () => {
            qtdGenerateCalcs += 1;

            if (qtdGenerateCalcs >= 5) {
                qtdGenerateCalcs = 5;
                alert(
                    "Você ja gerou valores demais, tente responder a equação!"
                );
            } else {
                generateValues();
                result.value = "";
            }
        });

        getBtnCheck.addEventListener("click", () => {
            getValuesOperation();
        });
    }

    if (inputDate) {
        let newDate = new getDateTime();

        inputDate.setAttribute("value", newDate.setToday());
        inputDate.setAttribute("min", `${newDate.getYear()}-01-01`);
        inputDate.setAttribute("max", `${newDate.getYear()}-12-31`);
    }

    const getValuesOperation = () => {
        firstValue = parseFloat(valuesCalcs[0].value);
        secondValue = parseFloat(valuesCalcs[1].value);
        getSymbol = symbolCalcs[0].getAttribute("data-value");
        getResult = parseFloat(result.value);

        if (isNaN(getResult)) {
            alert(
                "O campo onde deve ir o resultado da operação está vazio, insira algum valor!"
            );
        } else {
            checkCalc(firstValue, secondValue, getSymbol, getResult);
        }
    };

    const saveResults = () => {
        let newDate = new getDateTime();

        listOperations.push({
            uuid: Math.random().toString(36).substring(2, 16),
            operation: getSymbol,
            expresion: saveResult,
            alert: typeAlert,
            createdDate: newDate.setCreatedDate(),
            createdHour: newDate.setCreatedHour(),
        });

        localStorage.setItem("infoOperations", JSON.stringify(listOperations));
    };

    const getDadosFormFilter = (event) => {
        event.preventDefault();

        getFormFilter = new FormData(formFilter);

        operationFilter = getFormFilter.get("selectOperation");
        resultFilter = getFormFilter.get("resultOperation");
        dateFilter = getFormFilter.get("dateOperation");

        showArrayResults(operationFilter, resultFilter, dateFilter);
    };

    const showArrayResults = (fo, fr, fd) => {
        /*esses parametros sao relacionados aos filter acima*/
        showTitleResults.innerText = "Resultados";

        let symbolOperation = "";
        let checkItem = "";
        let newDate = [];
        let filterVector = [];
        arrayResults = [];

        if (fr == "all") {
            filterVector = listOperations;
        } else {
            filterVector = listOperations.filter((type) => type.alert == fr);
        }

        if (fo == "all") {
            filterVector = filterVector;
        } else {
            symbolOperation = arrayNameOperation[fo].symbol;
            filterVector = filterVector.filter(
                (type) => type.operation == symbolOperation
            );
        }

        fd = fd.split("-");
        newDate = `${fd[2]}/${fd[1]}/${fd[0]}`;

        filterVector = filterVector.filter(
            (type) => type.createdDate == newDate
        );

        arrayResults = filterVector;

        let showFilters = "";
        if (arrayResults.length > 0) {
            arrayResults.map((item, indice) => {
                let nameOperation;
                checkItem = item.alert == "success" ? "Correto" : "Errado";

                arrayNameOperation.map((symbols, indice) => {
                    if (item.operation == symbols.symbol) {
                        nameOperation = symbols.name;
                    }
                });

                showFilters += `<li class="col-xxl-3 col-lg-4 col-md-6 col-12"><div class="info-li d-flex flex-direction-column">`;
                showFilters += `<div class="d-flex flex-direction-row align-center"><p class="bold">Operação:</p>  <p>${nameOperation}</p></div>`;
                showFilters += `<div class="d-flex flex-direction-row align-center"><p class="bold">Expressão:</p> <p>${item.expresion} | ${checkItem}</p></div>`;
                showFilters += `<div class="d-flex flex-direction-row align-center"><p class="bold">Data:</p> <p>${item.createdDate} - ${item.createdHour}</p></div>`;
                showFilters += `</div></li>`;
            });
        } else {
            showTitleResults.innerText = "";
            showFilters =
                '<li class="col-12"><p class="bold">Nenhum registro foi encontrado, realize uma operação!</p></li>';
        }

        showListResults.innerHTML = showFilters;
        console.log(fo, fr, fd, arrayResults);
    };

    const generateValues = () => {
        arrayValuesCalc = [];

        for (let i = 0; i < 2; i++) {
            arrayValuesCalc.push(
                Math.floor(Math.random() * randomNumber[i] + 1)
            );
        }

        valuesCalcs[0].value = arrayValuesCalc[0];
        valuesCalcs[1].value = arrayValuesCalc[1];
    };

    const letters = (letter) => {
        keyLetter = letter.keyCode;

        if (keyLetter == 13) {
            getValuesOperation();
        }
    };

    const deleteCaracter = (caracter) => {
        letter = caracter.target.value.replace(/[^0-9\.-]/g, "");
        result.value = letter;
    };

    /*INICIO FUNÇÕES SENDO CHAMADAS PELA TELA*/
    generateValues();
    window.addEventListener("keyup", letters);
    /*FIM FUNÇÕES SENDO CHAMADAS PELA TELA*/
});