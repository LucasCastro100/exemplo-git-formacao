const select = (element) => document.querySelector(element);
const selectAll = (element) => document.querySelectorAll(element);

window.addEventListener("load", async (event) => {
    let seconds = event.timeStamp / 1000;
    console.log(`WEB: ${seconds.toFixed(2)} segundos para carregar!`);

    const navs = selectAll('[data-scrool]')

    navs.forEach(nav => {
        nav.addEventListener('click', () => {
            let section = document.getElementById(nav.dataset.scrool);
            section.scrollIntoView({ behavior: 'smooth' });
        })
    })
})