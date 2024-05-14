// Set waktu mundur (dalam detik)
var countdown = 10; // 1 menit = 60 detik

// Update waktu mundur setiap detik
var countdownInterval = setInterval(function() {
    countdown--;

    // Ubah waktu mundur menjadi format menit:detik
    var minutes = Math.floor(countdown / 60);
    var seconds = countdown % 60;

    // Tambahkan nol di depan jika waktu mundur kurang dari 10 detik
    if (seconds < 10) {
        seconds = '0' + seconds;
    }

    // Tampilkan waktu mundur di elemen HTML dengan id "countdown"
    document.getElementById('countdown').innerHTML = minutes + ':' + seconds;

    // Jika waktu mundur habis, hapus interval
    if (countdown === 0) {
        clearInterval(countdownInterval);
        document.getElementById('resend-button').classList.remove('cursor-not-allowed');
        // document.getElementById('resend-button').classList.remove('bg-blue-400');
        document.getElementById('resend-button').classList.add('hover:bg-blue-500');
        document.getElementById('resend-button').removeAttribute('disabled');
        document.getElementById('resend-button').classList.add('cursor-pointer');
        document.getElementById('countdown').innerHTML = 'Waktu habis';
    }
}, 1000);