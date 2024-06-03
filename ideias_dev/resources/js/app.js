import './bootstrap';

const validator = {
    select: async (element) => {return document.querySelector(element)},
    selectAll: async (element) => {return document.querySelectorAll(element)},
}

document.addEventListener('DOMContentLoaded', async (event) => {
    console.log(`DOCUMENTO: ${event.timeStamp} ms para carregar!`)
})

window.addEventListener('load', async (event) => {
    console.log(`PÁGINA: ${event.timeStamp} ms para carregar!`)
})
