window.addEventListener('load', async event => {
    console.log(`DOCUMENTO: ${event.timeStamp.toFixed(0)} milissegundos para carregar...`);

    let mediaRecorder;
    let recordedChunks = [];
    let webcamStream;

    const videoElement = document.getElementById('video');
    const startRecordingBtn = document.getElementById('start-recording-btn');
    const pauseRecordingBtn = document.getElementById('pause-recording-btn');
    const stopRecordingBtn = document.getElementById('stop-recording-btn');
    const saveVideoBtn = document.getElementById('save-video-btn');

    // Função para iniciar a gravação de vídeo com áudio do microfone
    const startRecording = async () => {
        try {
            // Capturar vídeo da webcam
            webcamStream = await navigator.mediaDevices.getUserMedia({ video: true });

            // Adicionar áudio do microfone ao stream de vídeo da webcam
            const audioStream = await navigator.mediaDevices.getUserMedia({ audio: true });
            const audioTrack = audioStream.getAudioTracks()[0];
            webcamStream.addTrack(audioTrack);

            // Configurar o elemento de vídeo para exibir o stream da webcam
            videoElement.srcObject = webcamStream;

            // Iniciar a gravação
            mediaRecorder = new MediaRecorder(webcamStream);
            mediaRecorder.ondataavailable = handleDataAvailable;
            mediaRecorder.onstop = handleRecordingStopped;
            recordedChunks = [];
            mediaRecorder.start();
            startRecordingBtn.disabled = true;
            pauseRecordingBtn.disabled = false;
            stopRecordingBtn.disabled = false;
            saveVideoBtn.disabled = true;
        } catch (error) {
            console.error('Erro ao acessar a webcam ou microfone:', error);
        }
    };

    // Evento disparado ao clicar no botão de iniciar gravação
    startRecordingBtn.addEventListener('click', startRecording);

    // Evento disparado ao clicar no botão de pausar gravação
    pauseRecordingBtn.addEventListener('click', () => {
        if (mediaRecorder.state === 'recording') {
            mediaRecorder.pause();
            pauseRecordingBtn.textContent = 'Retomar Gravação';
        } else if (mediaRecorder.state === 'paused') {
            mediaRecorder.resume();
            pauseRecordingBtn.textContent = 'Pausar Gravação';
        }
    });

    // Evento disparado ao clicar no botão de parar gravação
    stopRecordingBtn.addEventListener('click', () => {
        mediaRecorder.stop();
        startRecordingBtn.disabled = false;
        pauseRecordingBtn.disabled = true;
        stopRecordingBtn.disabled = true;
        saveVideoBtn.disabled = false;
        pauseRecordingBtn.textContent = 'Pausar Gravação';
    });

    // Evento disparado ao clicar no botão de salvar vídeo
    saveVideoBtn.addEventListener('click', () => {
        const blob = new Blob(recordedChunks, { type: 'video/webm' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'video_gravado.webm';
        a.click();
        URL.revokeObjectURL(url);
    });

    // Função para lidar com os dados disponíveis durante a gravação
    const handleDataAvailable = event => {
        if (event.data.size > 0) {
            recordedChunks.push(event.data);
        }
    };

    // Função para lidar com o término da gravação
    const handleRecordingStopped = () => {
        startRecordingBtn.disabled = false;
        pauseRecordingBtn.disabled = true;
        stopRecordingBtn.disabled = true;
        saveVideoBtn.disabled = false;
    };
});
