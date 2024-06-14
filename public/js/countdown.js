// Set waktu mundur (dalam detik)
var countdown = 600; // 1 menit = 60 detik

   // Mencegah aksi klik saat tombol dinonaktifkan
   var resendButton = document.getElementById('resend-button');
   resendButton.addEventListener('click', function(event) {
       if (resendButton.hasAttribute('disabled')) {
           event.preventDefault();
       }
   });

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

    if (countdown === 0) {
        clearInterval(countdownInterval);
        document.getElementById('resend-button').classList.remove('bg-blue-400');
        document.getElementById('resend-button').classList.add('bg-blue-500');
        document.getElementById('resend-button').classList.remove('cursor-not-allowed');
        document.getElementById('resend-button').removeAttribute('disabled');
        document.getElementById('resend-button').classList.add('cursor-pointer');
        document.getElementById('countdown').innerHTML = 'Waktu habis';

        // Kirim permintaan AJAX untuk menghapus OTP
        // var xhr = new XMLHttpRequest();
        // xhr.open('POST', '/delete-otp', true);
        // xhr.setRequestHeader('Content-Type', 'application/json');
        // xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        // xhr.onreadystatechange = function () {
        //     if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        //         var response = JSON.parse(xhr.responseText);
        //         if (response.success) {
        //             console.log('OTP berhasil dihapus');
        //         } else {
        //             console.log('Gagal menghapus OTP');
        //         }
        //     }
        // };
        // xhr.send(JSON.stringify({}));
    }
}, 1000);