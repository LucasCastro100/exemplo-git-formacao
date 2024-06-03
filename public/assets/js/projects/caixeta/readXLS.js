// import axios from 'axios';
// window.axios = axios;

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const select = (element) => document.querySelector(element);
const selectAll = (element) => document.querySelectorAll(element);

let urlPage = window.location.href.split("/").filter((url) => url != "");
urlPage = urlPage[urlPage.length - 1];
console.log(urlPage)

let tableDataJson = {
    itens: [],
    itensPerPage: [],
    itensFilter: [],
    titles: [],
    cutVector: 5,
    paginate: 0,
    filterProduto: [],
    filterMarca: [],
    filterFamilia: [],
};

window.addEventListener("load", async(event) => {
    let seconds = event.timeStamp / 1000;
    console.log(`READ_XLS: ${seconds.toFixed(2)} segundos para carregar!`);

    if (select(`[data-page]`)) {
        select(`[data-page="${urlPage}"]`).classList.add("pageActive");
    }

    if (select(".table-list")) {
        const convertXLSXToJson = async(url) => {
            try {
                const response = await fetch(url);
                const blob = await response.blob();

                const reader = new FileReader();
                reader.readAsArrayBuffer(blob);

                return new Promise((resolve, reject) => {
                    reader.onload = function() {
                        let newRange = urlPage == "cap" ? 1 : 3;
                        const cap = [
                            "produto",
                            "descricao",
                            "marca",
                            "preco",
                            "estoque",
                            "localizacao",
                            "promoc_preco_varejo",
                        ];
                        const bap = [
                            "produto",
                            "descricao",
                            "locacao",
                            "familia",
                            "estoque",
                            "preco",
                            "unidade",
                        ];
                        const pca = [
                            "produto",
                            "descricao",
                            "locacao",
                            "familia",
                            "estoque",
                            "preco",
                            "unidade",
                        ];

                        let newHeaders =
                            urlPage == "cap" ?
                            cap :
                            urlPage == "bap" ?
                            bap :
                            pca;

                        tableDataJson.titles = newHeaders;
                        const data = new Uint8Array(reader.result);
                        const workbook = XLSX.read(data, { type: "array" });

                        const firstSheetName = workbook.SheetNames[0];
                        const jsonData = XLSX.utils.sheet_to_json(
                            workbook.Sheets[firstSheetName], {
                                header: newHeaders,
                                range: newRange,
                                raw: false,
                                defval: "",
                            }
                        );

                        resolve(jsonData);
                    };

                    reader.onerror = function() {
                        reject(reader.error);
                    };
                });
            } catch (error) {
                console.error("Ocorreu um erro:", error);
                throw error;
            }
        };

        const insertTableHeader = async(header) => {
            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    const tableHead = select("table.table-list thead tr");
                    let htmlHead = "";

                    tableHead.innerHTML = "";
                    header.forEach((title) => {
                        htmlHead += `<th class="bold text-center">${title
                            .toUpperCase()
                            .replaceAll("_", " ")}</th>`;
                    });
                    tableHead.innerHTML += htmlHead;

                    resolve();
                }, 200);
            });
        };

        const insertTableBody = async(body) => {
            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    const tableBody = select("table.table-list tbody");
                    let htmlBody = "";
                    tableBody.innerHTML = "";

                    if (body != "") {
                        body[tableDataJson.paginate].forEach((item) => {
                            htmlBody += `<tr>`;
                            tableDataJson.titles.forEach((key) => {
                                htmlBody += `<td>${(item[key] =
                                    item[key] == "" ? "---" : item[key])}</td>`;
                            });
                            htmlBody += `</tr>`;
                        });
                    } else {
                        htmlBody = `<tr><th colspan="${tableDataJson.titles.length}">OPS... Produto não encontrado!</th></tr>`;
                    }

                    tableBody.innerHTML = htmlBody;

                    resolve();
                }, 200);
            });
        };

        const setItensPerPage = async(itens) => {
            tableDataJson.itensPerPage = [];
            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    for (
                        var i = 0; i < itens.length; i = i + tableDataJson.cutVector
                    ) {
                        tableDataJson.itensPerPage.push(
                            itens.slice(i, i + tableDataJson.cutVector)
                        );
                    }
                    resolve();
                }, 200);
            });
        };

        const insertTable = async(values) => {
            await loading("flex", "none");
            await insertTableHeader(tableDataJson.titles);
            await setItensPerPage(tableDataJson.itens);
            await insertTableBody(tableDataJson.itensPerPage);
            await getProduct();
            await getMarca();
            await listProduct(tableDataJson.filterProduto);
            await listDataListPage();
            await listPagination(
                tableDataJson.itensPerPage.length,
                tableDataJson.paginate
            );
            await loading("none", "flex");
        };

        const getProduct = async() => {
            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    const product = Array.from(
                        new Set(tableDataJson.itens.map((item) => item.produto))
                    );

                    const newfilterProduto = product.filter(
                        (item, index) => product.indexOf(item) === index
                    );

                    tableDataJson.filterProduto = newfilterProduto.sort();
                    resolve();
                }, 200);
            });
        };

        const getMarca = async() => {
            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    const marca = Array.from(
                        new Set(tableDataJson.itens.map((item) => item.marca))
                    );

                    const newMarcas = marca.filter(
                        (item, index) => marca.indexOf(item) === index
                    );

                    tableDataJson.filterMarca = newMarcas.sort();
                    resolve();
                }, 200);
            });
        };

        const getFamilia = async() => {
            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    const familia = Array.from(
                        new Set(tableDataJson.itens.map((item) => item.familia))
                    );

                    const newFamilias = familia.filter(
                        (item, index) => familia.indexOf(item) === index
                    );

                    tableDataJson.filterFamilia = newFamilias.sort();
                    resolve();
                }, 200);
            });
        };

        const listProduct = async(list) => {
            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    const listProduct = select("#listProduct");
                    let options = "";

                    listProduct.innerHTML = "";
                    list.forEach((itens) => {
                        options += `<option value="${itens}"></option>`;
                    });
                    listProduct.innerHTML = options;

                    resolve();
                }, 200);
            });
        };

        const listMarcas = async(list) => {
            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    const listMarcas = select("#listMarcas");
                    let options = "";

                    listMarcas.innerHTML = "";
                    list.forEach((itens) => {
                        options += `<option value="${itens}"></option>`;
                    });
                    listMarcas.innerHTML = options;

                    resolve();
                }, 200);
            });
        };

        const listFamilias = async(list) => {
            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    const listMarcas = select("#listFamilias");
                    let options = "";

                    listMarcas.innerHTML = "";
                    list.forEach((itens) => {
                        options += `<option value="${itens}"></option>`;
                    });
                    listMarcas.innerHTML = options;

                    resolve();
                }, 200);
            });
        };

        const listDataListPage = async() => {
            if (urlPage != "cap") {
                await getFamilia();
                await listFamilias(tableDataJson.filterFamilia);
            } else {
                await getMarca();
                await listMarcas(tableDataJson.filterMarca);
            }
        };

        const listPagination = async(totalPage, currentPage) => {
            const pagination = select("ul.pagination");
            let pages = [];
            let htmlPaginate = "";
            pagination.innerHTML = "";

            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    if (totalPage > 0) {
                        pages.push(1);

                        if (currentPage === 0) {
                            for (let i = currentPage + 2; i <= 7; i++) {
                                if (i <= totalPage) {
                                    pages.push(i);
                                }
                            }
                        } else {
                            for (
                                let i = currentPage - 2; i <= currentPage + 4; i++
                            ) {
                                if (i > 1 && i < totalPage) {
                                    pages.push(i);
                                }
                            }
                        }

                        pages.push(totalPage);

                        pages = pages.filter(
                            (item, index) => pages.indexOf(item) === index
                        );

                        pages.forEach((item, indice) => {
                            htmlPaginate += `<li class="page-item ${
                                tableDataJson.paginate + 1 == item
                                    ? "pageActive"
                                    : ""
                            }" data-page=${
                                item - 1
                            }><p class="page-number">${item}</p></li>`;
                        });

                        pagination.innerHTML = htmlPaginate;
                    }
                    resolve();
                }, 200);
            });
        };

        const loading = async(load, table) => {
            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    const loading = select(".loading");
                    const loadingTable = select(".loading-table");

                    loading.style.display = `${load}`;
                    loadingTable.style.display = `${table}`;
                    resolve();
                }, 200);
            });
        };

        const formFilters = async() => {
            const divFilter = selectAll("div.filters [name]");

            const filter = {
                perPage: parseInt(divFilter[0].value),
                product: divFilter[1].value,
                desc: divFilter[2].value
                    .toLowerCase()
                    .normalize("NFD")
                    .replace(/[\u0300-\u036f]/g, ""),
                marcaORfamily: divFilter[3].value,
                url: urlPage,
            };

            return new Promise((resolve, reject) => {
                setTimeout(async() => {
                    listFilters(
                        filter.perPage,
                        filter.product,
                        filter.marcaORfamily,
                        filter.desc,
                        filter.url
                    );
                    resolve();
                }, 200);
            });
        };

        const listFilters = async(
            itensPage,
            itenProduct,
            itenMarcaFamily,
            itenDesc,
            itenPage
        ) => {
            return new Promise((resolve, reject) => {
                let newVector = [];
                setTimeout(async() => {
                    tableDataJson.cutVector = itensPage;
                    const explodeItenDesc =
                        itenDesc.split(" ").length > 0 ?
                        itenDesc.split(" ") : [itenDesc];

                    newVector =
                        itenProduct != "" ?
                        tableDataJson.itens.filter(
                            (item) => item.produto == itenProduct
                        ) :
                        tableDataJson.itens;

                    explodeItenDesc.map(
                        (itemDesc) =>
                        (newVector =
                            itenDesc != "" ?
                            newVector.filter((item) =>
                                item.descricao
                                .toLowerCase()
                                .normalize("NFD")
                                .replace(/[\u0300-\u036f]/g, "")
                                .includes(itemDesc)
                            ) :
                            newVector)
                    );

                    if (itenPage != "cap") {
                        newVector =
                            itenMarcaFamily != "" ?
                            newVector.filter(
                                (item) => item.familia == itenMarcaFamily
                            ) :
                            newVector;
                    } else {
                        newVector =
                            itenMarcaFamily != "" ?
                            newVector.filter(
                                (item) =>
                                item.marca == itenMarcaFamily
                            ) :
                            newVector;
                    }

                    tableDataJson.itensFilter = newVector;

                    await loading("flex", "none");
                    await insertTableHeader(tableDataJson.titles);
                    await setItensPerPage(tableDataJson.itensFilter);
                    await insertTableBody(tableDataJson.itensPerPage);
                    await listPagination(
                        tableDataJson.itensPerPage.length,
                        tableDataJson.paginate
                    );
                    await loading("none", "flex");
                    resolve();
                }, 200);
            });
        };

        await convertXLSXToJson(`/assets/files/${urlPage}/${urlPage}_table.xls`)
            .then((jsonData) => {
                tableDataJson.itens = jsonData;
                insertTable(tableDataJson.itens);
            })
            .catch((error) => {
                console.error("Ocorreu um erro ao converter o arquivo:", error);
            });

        const formSubmit = select("div.filters input[type='submit']");

        formSubmit.addEventListener("click", () => {
            tableDataJson.paginate = 0;
            formFilters();
        });
    }
});
