window.addEventListener('load', event => {
    console.log(`DOCUMENTO: ${event.timeStamp.toFixed(0)} milissegundos para carregar...`);

    let mediaRecorder;
    let recordedChunks = [];
    let screenStream;
    let micStream;
    let isRecording = false;

    const videoElement = document.getElementById('video');
    const startRecordingBtn = document.getElementById('start-recording-btn');
    const stopRecordingBtn = document.getElementById('stop-recording-btn');
    const saveVideoBtn = document.getElementById('save-video-btn');

    // Função para capturar áudio e vídeo da tela e do microfone
    const ligarAudioVideo = async () => {
        try {
            // Capturar a tela com áudio do sistema
            screenStream = await navigator.mediaDevices.getDisplayMedia({
                video: { cursor: 'motion' },
                audio: {
                    echoCancellation: true,
                    noiseSuppression: true,
                    sampleRate: 44100
                }
            });

            // Capturar áudio do microfone
            micStream = await navigator.mediaDevices.getUserMedia({ audio: true });

            // Combinar os dois streams (tela e microfone)
            const combinedStream = new MediaStream([
                ...screenStream.getVideoTracks(),
                ...screenStream.getAudioTracks(),
                ...micStream.getAudioTracks()
            ]);

            videoElement.srcObject = combinedStream;
            videoElement.muted = true; // Silenciar o áudio para não sair pelos alto-falantes

            return combinedStream;
        } catch (error) {
            console.error('Erro ao acessar a tela ou microfone:', error);
            alert('Erro ao acessar a tela ou microfone. Verifique se as permissões foram concedidas.');
        }
    };

    // Função para iniciar a gravação
    const startRecording = async () => {
        if (!isRecording) {
            const stream = await ligarAudioVideo();
            if (!stream) return;

            isRecording = true; // Define a flag de gravação como verdadeira
            mediaRecorder = new MediaRecorder(stream, { mimeType: 'video/webm; codecs=vp9' });
            mediaRecorder.ondataavailable = handleDataAvailable;
            mediaRecorder.onstop = handleRecordingStopped;
            mediaRecorder.start();
            startRecordingBtn.disabled = true;
            stopRecordingBtn.disabled = false;
            saveVideoBtn.disabled = true;
        }
    };

    // Evento disparado ao clicar no botão de iniciar gravação
    startRecordingBtn.addEventListener('click', startRecording);

    // Evento disparado ao clicar no botão de parar gravação
    stopRecordingBtn.addEventListener('click', () => {
        if (isRecording) {
            mediaRecorder.stop();
            isRecording = false; // Define a flag de gravação como falsa
        }
    });

    // Evento disparado ao clicar no botão de salvar vídeo
    saveVideoBtn.addEventListener('click', () => {
        const blob = new Blob(recordedChunks, { type: 'video/webm' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'tela_gravada.webm';
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
        stopRecordingBtn.disabled = true;
        saveVideoBtn.disabled = false;
    };
});