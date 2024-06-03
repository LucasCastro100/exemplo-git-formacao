// import "./bootstrap.js"

const validator = {
    select: (element) => document.querySelector(element),
    selectAll: (element) => document.querySelectorAll(element),
    tableDataJson: {
        itens: [],
        itensPerPage: [],
        itensFilter: [],
        titles: [],
        cutVector: 5,
        paginate: 0,
        codFabrs: [],
        marcas: [],
    },
};

window.addEventListener("load", async(event) => {
    console.log(`PÁGINA: ${event.timeStamp} ms para carregar!`);

    const handleFile = async(e) => {
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = async(e) => {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, { type: "array" });
            const sheetName = workbook.SheetNames[0];
            const sheet = workbook.Sheets[sheetName];
            const jsonDataTable = XLSX.utils.sheet_to_json(sheet, {
                header: "auto",
            });
            validator.tableDataJson.itens = jsonDataTable;
            await insertTable(validator.tableDataJson.itens);
        };

        reader.readAsArrayBuffer(file);
    };

    const insertTableHeader = async(header) => {
        return new Promise((resolve, reject) => {
            setTimeout(async() => {
                const tableHead = validator.select(
                    "table.table-list thead tr"
                );
                let htmlHead = "";

                tableHead.innerHTML = "";
                header.forEach((title) => {
                    htmlHead += `<th class="bold text-center">${title.toUpperCase()}</th>`;
                });
                tableHead.innerHTML += htmlHead;

                resolve();
            }, 750);
        });
    };

    const insertTableBody = async(body) => {
        return new Promise((resolve, reject) => {
            setTimeout(async() => {
                const tableBody = validator.select(
                    "table.table-list tbody"
                );
                let htmlBody = "";
                tableBody.innerHTML = "";

                if (body != '') {
                    body[validator.tableDataJson.paginate].forEach((item) => {
                        htmlBody += `<tr>`;
                        validator.tableDataJson.titles.forEach((key) => {
                            htmlBody += `<td>${(item[key] =
                                item[key] == "" ? "---" : item[key])}</td>`;
                        });
                        htmlBody += `</tr>`;
                    });
                } else {
                    htmlBody = `<tr><th colspan="${validator.tableDataJson.titles.length}">OPS... Produto não encontrado!</th></tr>`
                }

                tableBody.innerHTML = htmlBody;

                resolve();
            }, 250);
        });
    };

    const setItensPerPage = async(itens) => {
        validator.tableDataJson.itensPerPage = [];
        return new Promise((resolve, reject) => {
            setTimeout(async() => {
                for (
                    var i = 0; i < itens.length; i = i + validator.tableDataJson.cutVector
                ) {
                    validator.tableDataJson.itensPerPage.push(
                        itens.slice(i, i + validator.tableDataJson.cutVector)
                    );
                }
                resolve();
            }, 750);
        });
    };

    const insertTable = async(values) => {
        try {
            validator.tableDataJson.titles = Object.keys(values[0]);

            await loading("flex", "none");
            await insertTableHeader(validator.tableDataJson.titles);
            await setItensPerPage(validator.tableDataJson.itens);
            await insertTableBody(validator.tableDataJson.itensPerPage);
            await getCodFabr();
            await getMarca();
            await listCodFabricantes(validator.tableDataJson.codFabrs);
            await listMarcas(validator.tableDataJson.marcas);
            await listPagination()
            await loading("none", "flex");
        } catch (error) {
            console.log(error);
        }
    };

    const getCodFabr = async() => {
        return new Promise((resolve, reject) => {
            setTimeout(async() => {
                const codFabr = Array.from(
                    new Set(
                        validator.tableDataJson.itens.map(
                            (item) => item.codigo_fabricante
                        )
                    )
                );

                const newCodFabrs = codFabr.filter(
                    (item, index) => codFabr.indexOf(item) === index
                );

                validator.tableDataJson.codFabrs = newCodFabrs.sort();
                resolve();
            }, 500);
        });
    };

    const getMarca = async() => {
        return new Promise((resolve, reject) => {
            setTimeout(async() => {
                const marca = Array.from(
                    new Set(
                        validator.tableDataJson.itens.map((item) => item.marca)
                    )
                );

                const newMarcas = marca.filter(
                    (item, index) => marca.indexOf(item) === index
                );

                validator.tableDataJson.marcas = newMarcas.sort();
                resolve();
            }, 500);
        });
    };

    const listCodFabricantes = async(list) => {
        return new Promise((resolve, reject) => {
            setTimeout(async() => {
                const listCodFabricantes = validator.select(
                    "#listCodFabr"
                );
                let options = "";

                listCodFabricantes.innerHTML = "";
                list.forEach((itens) => {
                    options += `<option value="${itens}"></option>`;
                });
                listCodFabricantes.innerHTML = options;

                resolve();
            }, 500);
        });
    };

    const listMarcas = async(list) => {
        return new Promise((resolve, reject) => {
            setTimeout(async() => {
                const listMarcas = validator.select("#listMarcas");
                let options = "";

                listMarcas.innerHTML = "";
                list.forEach((itens) => {
                    options += `<option value="${itens}"></option>`;
                });
                listMarcas.innerHTML = options;

                resolve();
            }, 500);
        });
    };

    const loading = async(load, table) => {
        return new Promise((resolve, reject) => {
            setTimeout(async() => {
                const loading = validator.select(".loading");
                const loadingTable = validator.select(".loading-table");

                loading.style.display = `${load}`;
                loadingTable.style.display = `${table}`;
                resolve();
            }, 500);
        });
    };

    const listPagination = async() => {
        const pagination = validator.select('ul.pagination')
        let htmlPagination = ''
        return new Promise((resolve, reject) => {
            setTimeout(async() => {
                htmlPagination += validator.tableDataJson.paginate > 3 ? `<li class="page-item" data-page="1">
                <p class="page-link"  title="Primeira">Previous</p></li>` : ''

                for (let i = validator.tableDataJson.paginate; i < validator.tableDataJson.itensPerPage.length; i++) {
                    htmlPagination += `<li class="page-item" data-page="${i}"><p class="page-link">1</p></li>`
                }

                htmlPagination += validator.tableDataJson.paginate > validator.tableDataJson.itensPerPage - 4 ? `<li class="page-item" data-page="${validator.tableDataJson.itensPerPage}">
                <p class="page-link" title="Última">Previous</p></li>` : ''

                pagination.innerHTML = htmlPagination
                resolve();
            }, 250);
        });


    }

    const formFilters = async(event) => {
        event.preventDefault();

        const formData = new FormData(formSubmit);

        return new Promise((resolve, reject) => {
            setTimeout(async() => {
                listFilters(
                    parseInt(formData.get("perPage")),
                    validator.tableDataJson.paginate,
                    formData.get("codFabr"),
                    formData.get("marca"),
                    formData.get("desc")
                );
                resolve();
            }, 300);
        });
    };

    const listFilters = async(
        itensPage,
        page,
        itenCodFabr,
        itenMarca,
        itenDesc
    ) => {
        return new Promise((resolve, reject) => {
            let newVector = [];
            setTimeout(async() => {
                validator.tableDataJson.cutVector = itensPage;
                validator.tableDataJson.paginate = page;

                itenDesc = itenDesc.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "")
                const explodeItenDesc = itenDesc.split(' ')

                newVector = itenCodFabr != '' ? validator.tableDataJson.itens.filter(item => item.codigo_fabricante == itenCodFabr) : validator.tableDataJson.itens
                newVector = itenMarca != '' ? newVector.filter(item => item.marca == itenMarca) : newVector
                explodeItenDesc.map(itemDesc => newVector = itenDesc != '' ? newVector.filter(item => item.descricao_do_produto.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").includes(itemDesc)) : newVector)

                validator.tableDataJson.itensFilter = newVector;
                console.log(validator.tableDataJson)

                await loading("flex", "none");
                await insertTableHeader(validator.tableDataJson.titles);
                await setItensPerPage(validator.tableDataJson.itensFilter);
                await insertTableBody(validator.tableDataJson.itensPerPage);
                await listPagination()
                await loading("none", "flex");
                resolve();
            }, 500);
        });
    };

    const fileInput = validator.select("#fileInput");
    const formSubmit = validator.select("form.filters");

    fileInput.addEventListener("change", handleFile);
    formSubmit.addEventListener("submit", formFilters);
});