window.onload = () => {
    const select = element => document.querySelector(element)
    const selectAll = element => document.querySelectorAll(element)

    const startBtn = select('[btn-event="start"]')
    const stopBtn = select('[btn-event="stop"]')
    const checkBtn = select('[btn-event="check"]')
    //const dowloadBtn = select('[btn-event="dowload"]')

    startBtn.disabled = false
    stopBtn.disabled = true
    checkBtn.disabled = true

    let newString = select('.string')
    let output = select('.output')
    let response = select('.response')
    let vectorLetters = []
    let transcript
    let vectorStrings = []
    let randomNumber = 0

    vectorStrings = ['Amor', 'Casa', 'Amora', 'Trem', 'Escola', 'Igreja', 'Bola', 'Professora', 'Iguana']

    if (window.webkitSpeechRecognition) {

        let recognition = new webkitSpeechRecognition() || new SpeechRecognition();

        recognition.continuous = true
        recognition.interimResults = true

        startBtn.addEventListener('click', () => {
            startBtn.disabled = true
            stopBtn.disabled = false
            checkBtn.disabled = true
            recognition.start()
        })

        stopBtn.addEventListener('click', () => {
            startBtn.disabled = false
            stopBtn.disabled = true
            checkBtn.disabled = false
            recognition.stop()

            vectorLetters.push(output.innerText)
        })

        /*dowloadBtn.addEventListener('click', () => {
            let text = output.innerText
            let filename = 'sua_voz_em_texto.text'
            //download(text, filename)
        })*/

        checkBtn.addEventListener('click', () => {
            if (newString.innerText == vectorLetters[vectorLetters.length - 1]) {
                msgAlert('success', 'Você disse a palavra corretamente, aguarde para a próxima!')
                //randomString()
                setTimeout(() => {
                    window.location.reload(true);
                }, 2500)
            } else {
                msgAlert('erro', 'Você disse a palavra errada, continue ate conseguir!')
            }
        })

        recognition.addEventListener('audiostart', () => {
            //dessa maneira aparece letra por letra mas para isso funcionar -> .interimResults = true
            recognition.onresult = (event) => {
                transcript = ''

                for (let i = event.resultIndex; i < event.results.length; i++) {
                    transcript += event.results[i][0].transcript
                }

                output.innerHTML = transcript.toUpperCase()
            }
        })

        const download = (text, filename) => {
            console.log(text + filename)
        }

        const msgAlert = (alert, msg) => {
            response.innerHTML = `<div class="alert  alert-${alert}">${msg}</div>`
        }

        const randomString = () => {
            randomNumber = Math.floor(Math.random() * (vectorStrings.length - 1) + 1);
            newString.innerText = vectorStrings[randomNumber].toUpperCase()
        }

        recognition.onerror = (event) => {
            console.log('Error: ' + event.error)
        }

        window.addEventListener('load', randomString())
    }
    else {
        console.log('Infelizmente seu navegador não tem suporte :(')
    }
}
