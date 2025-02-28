// Função para iniciar a contagem do tempo
function start_time(duration) {
    let timer = duration, minutes, seconds;

    // Função de contagem regressiva
    let interval = setInterval(function() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        // Formata e exibe o tempo
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        $(".tempo").text(minutes + ":" + seconds);

        if (--timer < 0) {
            clearInterval(interval); // Para o intervalo quando o tempo acabar
            if (duration === 60) {
                // Habilita o botão ao fim da contagem inicial
                $("#btn2").attr("disabled", false);
            }
        }
    }, 1000);
}

$(document).ready(function() {
    // Contagem de 12 segundos quando a página carregar
    let durationInitial = 1 * 60; 
    $("#btn2").attr("disabled", true); // Desabilita o botão no início
    start_time(durationInitial); // Inicia a contagem ao carregar a página

    // Quando o botão é clicado
    $('#btn2').click(function(){         
        
        let dado = "email";    

        $.ajax({
        
            url:"enviando_codigo.php",    
            method:"POST",    
            dataType:"json",     
            data:{dado:dado}

        });        

        let totalSeconds = 60; // 2 minutos em segundos
        let timerInterval;
        let isButtonDisabled = true;

        // Função para formatar o tempo em minutos e segundos
        function formatTime(seconds) {
            var minutes = Math.floor(seconds / 60);
            var remainingSeconds = seconds % 60;
            return (minutes < 10 ? '0' : '') + minutes + ':' + (remainingSeconds < 10 ? '0' : '') + remainingSeconds;
        }

        // Desativa o botão e inicia o timer de 2 minutos
        $(this).prop('disabled', true);       
        $('.tempo').text(formatTime(totalSeconds));

        // Começa a contagem regressiva de 120 segundos (2 minutos)
        timerInterval = setInterval(function() {
            totalSeconds--;

            // Atualiza a exibição do tempo
            $('.tempo').text(formatTime(totalSeconds));

            // Quando o tempo acabar, habilita o botão
            if (totalSeconds <= 0) {
                clearInterval(timerInterval); // Para o timer
                $('#btn2').prop('disabled', false);   
                isButtonDisabled = false;
            }
        }, 1000);
    });
});



