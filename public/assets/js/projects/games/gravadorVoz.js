window.addEventListener('load', event => {
    console.log(`DOCUMENTO: ${event.timeStamp.toFixed(0)} milissegundos para carregar...`);

    window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (window.SpeechRecognition) {
        // Cria uma instância do reconhecimento de fala
        const recognition = new window.SpeechRecognition();
        recognition.lang = 'pt-BR';
        recognition.interimResults = false;
        recognition.maxAlternatives = 0;
        recognition.continuous = true;

        // Referências aos elementos HTML
        const startRecordBtn = document.getElementById('start-record-btn');
        const stopRecordBtn = document.getElementById('stop-record-btn');
        const recordedText = document.getElementById('recorded-text');
        const saveTextBtn = document.getElementById('save-text-btn');
        let transcript = '';
        let isRecording = false;

        // Função para iniciar o reconhecimento de fala
        startRecordBtn.addEventListener('click', () => {
            if (!isRecording) {
                recognition.start();
                console.log('Gravação iniciada.');
                saveTextBtn.disabled = true;
                startRecordBtn.disabled = true;
                stopRecordBtn.disabled = false;
                transcript = ''; // Esvazia a variável de transcrição ao iniciar uma nova gravação
                isRecording = true;
            }
        });

        // Função para parar o reconhecimento de fala
        stopRecordBtn.addEventListener('click', () => {
            recognition.stop();
            console.log('Gravação parada.');
            startRecordBtn.disabled = false;
            stopRecordBtn.disabled = true;
            saveTextBtn.disabled = false;
            isRecording = false;
        });

        // Evento disparado quando a fala é reconhecida
        recognition.addEventListener('result', event => {
            let interimTranscript = '';
            for (let i = event.resultIndex; i < event.results.length; i++) {
                if (event.results[i].isFinal) {
                    transcript += `${event.results[i][0].transcript} `;
                } else {
                    interimTranscript += `${event.results[i][0].transcript} `;
                }
            }
            recordedText.textContent = transcript;
        });

        // Evento disparado quando a gravação é encerrada e assim ela reinicia novamente
        recognition.addEventListener('end', () => {
            console.log('Gravação encerrada. Reiniciando...');
            if (isRecording) {
                recognition.start();
            }
        });

        // Função para salvar o texto reconhecido em um arquivo
        saveTextBtn.addEventListener('click', () => {
            const blob = new Blob([transcript], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'voz_convertida_em_texto.txt';
            a.click();
            URL.revokeObjectURL(url);
        });

    } else {
        console.log('Seu navegador não suporta a API Web Speech.');
    }
});
