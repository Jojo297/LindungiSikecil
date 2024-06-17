// berat badan
document.addEventListener("DOMContentLoaded", function() {
    const weightRanges = {
        0: { min: { male: 2.5, female: 2.4 }, max: { male: 3.9, female: 3.7 } },
        1: { min: { male: 3.4, female: 3.2 }, max: { male: 5.1, female: 4.8 } },
        2: { min: { male: 4.3, female: 3.9 }, max: { male: 6.3, female: 5.8 } },
        3: { min: { male: 5.0, female: 4.5 }, max: { male: 7.2, female: 6.6 } },
        4: { min: { male: 5.6, female: 5.0 }, max: { male: 7.8, female: 7.3 } },
        5: { min: { male: 6.0, female: 5.4 }, max: { male: 8.4, female: 7.8 } },
        6: { min: { male: 6.4, female: 5.7 }, max: { male: 8.8, female: 8.2 } },
        7: { min: { male: 6.7, female: 6.0 }, max: { male: 9.2, female: 8.6 } },
        8: { min: { male: 6.9, female: 6.3 }, max: { male: 9.6, female: 9.0 } },
        9: { min: { male: 7.1, female: 6.5 }, max: { male: 9.9, female: 9.3 } },
        10: { min: { male: 7.4, female: 6.7 }, max: { male: 10.2, female: 9.6 } },
        11: { min: { male: 7.6, female: 6.9 }, max: { male: 10.5, female: 9.9 } },
        12: { min: { male: 7.7, female: 7.0 }, max: { male: 10.8, female: 10.1 } },
        13: { min: { male: 7.9, female: 7.2 }, max: { male: 11.0, female: 10.4 } },
        14: { min: { male: 8.1, female: 7.4 }, max: { male: 11.3, female: 10.6 } },
        15: { min: { male: 8.3, female: 7.6 }, max: { male: 11.5, female: 10.9 } },
        16: { min: { male: 8.4, female: 7.7 }, max: { male: 11.7, female: 11.1 } },
        17: { min: { male: 8.6, female: 7.9 }, max: { male: 12.0, female: 11.4 } },
        18: { min: { male: 8.8, female: 8.1 }, max: { male: 12.2, female: 11.6 } },
        19: { min: { male: 8.9, female: 8.2 }, max: { male: 12.5, female: 11.8 } },
        20: { min: { male: 9.1, female: 8.4 }, max: { male: 12.7, female: 12.1 } },
        21: { min: { male: 9.2, female: 8.6 }, max: { male: 12.9, female: 12.3 } },
        22: { min: { male: 9.4, female: 8.7 }, max: { male: 13.2, female: 12.5 } },
        23: { min: { male: 9.5, female: 8.9 }, max: { male: 13.4, female: 12.8 } },
        24: { min: { male: 9.7, female: 9.0 }, max: { male: 13.6, female: 13.0 } },
        25: { min: { male: 9.8, female: 9.2 }, max: { male: 13.9, female: 13.3 } },
        26: { min: { male: 10.0, female: 9.4 }, max: { male: 14.1, female: 13.5 } },
        27: { min: { male: 10.1, female: 9.5 }, max: { male: 14.3, female: 13.7 } },
        28: { min: { male: 10.2, female: 9.7 }, max: { male: 14.5, female: 14.0 } },
        29: { min: { male: 10.4, female: 9.8 }, max: { male: 14.8, female: 14.2 } },
        30: { min: { male: 10.5, female: 10.0 }, max: { male: 15.0, female: 14.4 } },
        31: { min: { male: 10.7, female: 10.1 }, max: { male: 15.2, female: 14.7 } },
        32: { min: { male: 10.8, female: 10.3 }, max: { male: 15.4, female: 14.9 } },
        33: { min: { male: 10.9, female: 10.4 }, max: { male: 15.6, female: 15.1 } },
        34: { min: { male: 11.0, female: 10.5 }, max: { male: 15.8, female: 15.4 } },
        35: { min: { male: 11.2, female: 10.7 }, max: { male: 16.0, female: 15.6 } },
        36: { min: { male: 11.3, female: 10.8 }, max: { male: 16.2, female: 15.8 } },
        37: { min: { male: 11.4, female: 10.9 }, max: { male: 16.4, female: 16.0 } },
        38: { min: { male: 11.5, female: 11.1 }, max: { male: 16.6, female: 16.3 } },
        39: { min: { male: 11.6, female: 11.2 }, max: { male: 16.8, female: 16.5 } },
        40: { min: { male: 11.8, female: 11.3 }, max: { male: 17.0, female: 16.7 } },
        41: { min: { male: 11.9, female: 11.5 }, max: { male: 17.2, female: 16.9 } },
        42: { min: { male: 12.0, female: 11.6 }, max: { male: 17.4, female: 17.2 } },
        43: { min: { male: 12.1, female: 11.7 }, max: { male: 17.6, female: 17.4 } },
        44: { min: { male: 12.2, female: 11.8 }, max: { male: 17.8, female: 17.6 } },
        45: { min: { male: 12.4, female: 12.0 }, max: { male: 18.0, female: 17.8 } },
        46: { min: { male: 12.5, female: 12.1 }, max: { male: 18.2, female: 18.1 } },
        47: { min: { male: 12.6, female: 12.2 }, max: { male: 18.4, female: 18.3 } },
        48: { min: { male: 12.7, female: 12.3 }, max: { male: 18.6, female: 18.5 } },
        49: { min: { male: 12.8, female: 12.4 }, max: { male: 18.8, female: 18.8 } },
        50: { min: { male: 12.9, female: 12.6 }, max: { male: 19.0, female: 19.0 } },
        51: { min: { male: 13.1, female: 12.7 }, max: { male: 19.2, female: 19.2 } },
        52: { min: { male: 13.2, female: 12.8 }, max: { male: 19.4, female: 19.4 } },
        53: { min: { male: 13.3, female: 12.9 }, max: { male: 19.6, female: 19.7 } },
        54: { min: { male: 13.4, female: 13.0 }, max: { male: 19.8, female: 19.9 } },
        55: { min: { male: 13.5, female: 13.2 }, max: { male: 20.0, female: 20.1 } },
        56: { min: { male: 13.6, female: 13.3 }, max: { male: 20.2, female: 20.3 } },
        57: { min: { male: 13.7, female: 13.4 }, max: { male: 20.4, female: 20.6 } },
        58: { min: { male: 13.8, female: 13.5 }, max: { male: 20.6, female: 20.8 } },
        59: { min: { male: 14.0, female: 13.6 }, max: { male: 20.8, female: 21.0 } },
        60: { min: { male: 14.1, female: 13.7 }, max: { male: 21.0, female: 21.2 } }
    };

    const cards = document.querySelectorAll('.carousel-item');
    cards.forEach(card => {
        card.addEventListener('click', function() {
            const childId = this.querySelector('a').dataset.childId;
            const childDataDiv = document.getElementById(`child-data-${childId}`);
            const otherChildDataDivs = document.querySelectorAll(`[id^="child-data-"]`);
            otherChildDataDivs.forEach(div => {
                if (div.id !== childDataDiv.id) {
                    div.classList.add('hidden');
                }
            });
            childDataDiv.classList.toggle('hidden');

            fetch(`/user/chart/${childId}`)
                .then(response => response.json())
                .then(data => {
                    // Create the chart using the received data
                    const name = data.name;
                    const gender = data.gender; 
                    const ctx = document.getElementById(`myWeight-${childId}`).getContext('2d');

                    const labels = data.chartData.map(item => item.age);
                    const weights = data.chartData.map(item => item.weight);

                    // Calculate the max and min weight ranges based on gender
                    let maxWeights, minWeights;
                    if (gender === 'male') {
                        maxWeights = data.chartData.map(item => weightRanges[parseInt(item.age)].max.male);
                        minWeights = data.chartData.map(item => weightRanges[parseInt(item.age)].min.male);
                    } else {
                        maxWeights = data.chartData.map(item => weightRanges[parseInt(item.age)].max.female);
                        minWeights = data.chartData.map(item => weightRanges[parseInt(item.age)].min.female);
                    }
                    
                    const chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                    label: 'Berat badan ' + name,
                                    data: weights,
                                    borderColor: '#31C48D',
                                    fill: false,
                                    tension: 0.4, // Set the tension property
                                },
                                {
                                    label: 'Berat maksimal',
                                    data: maxWeights,
                                    borderColor: '#ff0000',
                                    fill: false,
                                    borderDash: [5, 5] // Dashed line for max weight
                                },
                                {
                                    label: 'Berat minimal',
                                    data: minWeights,
                                    borderColor: '#0000ff',
                                    fill: false,
                                    borderDash: [5, 5] // Dashed line for min weight
                                }
                            ],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Berat badan',
                                },
                            },
                            interaction: {
                                intersect: false,
                            },
                            scales: {
                                x: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: 'Umur',
                                    }
                                },
                                y: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: 'Berat badan (kg)',
                                    },
                                    suggestedMin: 0,
                                    suggestedMax: 15,
                                },
                            },
                        },
                    });
                    
                    // Get the last weight and age
                    const lastWeight = weights[weights.length - 1];
                    const lastAge = labels[labels.length - 1];
                    const idChild = data.id_child;
                    // Check if the last weight exceeds maximum or minimum limit
                    if (lastWeight > maxWeights[maxWeights.length - 1]) {
                        // Show error message
                        const alertDiv = document.getElementById('alert-weight-' + idChild);
                        alertDiv.classList.remove('hidden');
                        alertDiv.classList.add('flex');
                        // alertDiv.innerHTML = `Berat badan anak anda melebihi maksimal yang ditentukan pada umur ${lastAge} tahun, silahkan konfirmasi lebih lanjut dengan ahli gizi!`;
                        alertDiv.querySelector('#erorWeight').innerHTML = `Berat badan anak anda melebihi maksimal yang ditentukan pada umur ${lastAge}, silahkan konfirmasi lebih lanjut dengan ahli gizi!`;
                    } else if (lastWeight < minWeights[minWeights.length - 1]) {
                        // Show error message
                        const alertDiv = document.getElementById('alert-'+ idChild);
                        alertDiv.classList.remove('hidden');
                        alertDiv.classList.add('flex');
                        alertDiv.querySelector('#erorWeight').innerHTML = `Berat badan anak anda kurang dari minimal yang ditentukan pada umur ${lastAge}, silahkan konfirmasi lebih lanjut dengan ahli gizi!`;
                    }

                    // Add event listener to handle window resize
                    window.addEventListener('resize', function() {
                        chart.resize();
                    });
                });
        });
    });

  
  });



// berat badan selesai

// panjang badan
document.addEventListener("DOMContentLoaded", function() {
    const lengthRanges = {
        0: { min: { male: 46.1, female: 45.4 }, max: { male: 55.6, female: 54.7 } },
        1: { min: { male: 50.8, female: 49.8 }, max: { male: 60.6, female: 59.5 } },
        2: { min: { male: 54.4, female: 53.0 }, max: { male: 64.4, female: 63.2 } },
        3: { min: { male: 57.3, female: 55.6 }, max: { male: 67.6, female: 66.1 } },
        4: { min: { male: 59.7, female: 57.8 }, max: { male: 70.1, female: 68.6 } },
        5: { min: { male: 61.7, female: 59.6 }, max: { male: 72.2, female: 70.7 } },
        6: { min: { male: 63.6, female: 61.2 }, max: { male: 74.0, female: 72.5 } },
        7: { min: { male: 64.8, female: 62.7 }, max: { male: 75.5, female: 74.2 } },
        8: { min: { male: 66.2, female: 64.0 }, max: { male: 77.2, female: 75.8 } },
        9: { min: { male: 67.5, female: 65.3 }, max: { male: 78.7, female: 77.4 } },
        10: { min: { male: 68.7, female: 66.5 }, max: { male: 80.1, female: 78.9 } },
        11: { min: { male: 69.9, female: 67.7 }, max: { male: 81.5, female: 80.3 } },
        12: { min: { male: 71.0, female: 68.9 }, max: { male: 82.9, female: 81.7 } }
        // Lanjutkan data sesuai kebutuhan...
    };
    const cards = document.querySelectorAll('.carousel-item');
    cards.forEach(card => {
        card.addEventListener('click', function() {
            const childId = this.querySelector('a').dataset.childId;
            const childDataDiv = document.getElementById(`child-data-${childId}`);
            const otherChildDataDivs = document.querySelectorAll(`[id^="child-data-"]`);
            otherChildDataDivs.forEach(div => {
                if (div.id !== childDataDiv.id) {
                    div.classList.add('hidden');
                }
            });
            childDataDiv.classList.toggle('hidden');

            fetch(`/user/chart/${childId}`)
                .then(response => response.json())
                .then(data => {
                    // Create the chart using the received data
                    const name = data.name;
                    const gender = data.gender; 
                    const ctx = document.getElementById(`myHeight-${childId}`).getContext('2d');

                    const labels = data.chartData.map(item => item.age );
                    const bodyLengths = data.chartData.map(item => item.body_length);

                     // Calculate the max and min body length ranges based on gender
                    let maxBodyLengths, minBodyLengths;
                    if (gender === 'male') {
                    maxBodyLengths = data.chartData.map(item => lengthRanges[parseInt(item.age)].max.male);
                    minBodyLengths = data.chartData.map(item => lengthRanges[parseInt(item.age)].min.male);
                    } else {
                    maxBodyLengths = data.chartData.map(item => lengthRanges[parseInt(item.age)].max.female);
                    minBodyLengths = data.chartData.map(item => lengthRanges[parseInt(item.age)].min.female);
                    }

                    const chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                    label: 'Panjang/Tinggi badan ' + name,
                                    data: bodyLengths,
                                    borderColor: '#31C48D',
                                    fill: false,
                                    tension: 0.4,
                                },
                                {
                                    label: 'Maksimal Panjang/Tinggi Badan',
                                    data: maxBodyLengths,
                                    borderColor: '#ff0000',
                                    borderDash: [5, 5],
                                    fill: false,
                                    tension: 0.4,
                                },
                                {
                                    label: 'Minimal Panjang/Tinggi Badan',
                                    data: minBodyLengths,
                                    borderColor: '#0000ff',
                                    borderDash: [5, 5],
                                    fill: false,
                                    tension: 0.4,
                                }
                            ],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Panjang/Tinggi badan',
                                },
                            },
                            interaction: {
                                intersect: false,
                            },
                            scales: {
                                x: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: 'Umur',
                                    },
                                },
                                y: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: 'Panjang/Tinggi badan (cm)',
                                    },
                                    suggestedMin: 10,
                                    suggestedMax: 100,
                                },
                            },
                        },
                    });
         
                      // Get the last weight and age
                      const lastLength = bodyLengths[bodyLengths.length - 1];
                      const lastAge = labels[labels.length - 1];
                      const idChild = data.id_child;
                      // Check if the last weight exceeds maximum or minimum limit
                      if (lastLength > maxBodyLengths[maxBodyLengths.length - 1]) {
                          // Show error message
                          const alertDiv = document.getElementById('alert-length-' + idChild);
                          alertDiv.classList.remove('hidden');
                          alertDiv.classList.add('flex');
                          // alertDiv.innerHTML = `Berat badan anak anda melebihi maksimal yang ditentukan pada umur ${lastAge} tahun, silahkan konfirmasi lebih lanjut dengan ahli gizi!`;
                          alertDiv.querySelector('#erorLength').innerHTML = `Panjang/Tinggi badan anak anda melebihi maksimal yang ditentukan pada umur ${lastAge}, silahkan konfirmasi lebih lanjut dengan ahli gizi!`;
                      } else if (lastLength < minBodyLengths[minBodyLengths.length - 1]) {
                          // Show error message
                          const alertDiv = document.getElementById('alert-length-'+ idChild);
                          alertDiv.classList.remove('hidden');
                          alertDiv.classList.add('flex');
                          alertDiv.querySelector('#erorLength').innerHTML = `Panjang/Tinggi badan anak anda kurang dari minimal yang ditentukan pada umur ${lastAge}, silahkan konfirmasi lebih lanjut dengan ahli gizi!`;
                      }

                         // Add event listener to handle window resize
            window.addEventListener('resize', function() {
                myChart.resize();
            });

                  });
                });
        });
    });

// panjang badan selesai

// lingkar kepala
document.addEventListener("DOMContentLoaded", function() {
    const headCircumferenceRanges = {
        0: { min: { male: 43.5, female: 34 }, max: { male: 46, female: 42 } },
        1: { min: { male: 43.5, female: 42 }, max: { male: 46, female: 45 } },
        2: { min: { male: 43.5, female: 45 }, max: { male: 46, female: 47.2 } },
        3: { min: { male: 43.5, female: 47.2 }, max: { male: 46, female: 48.5 } },
        4: { min: { male: 43.5, female: 48.5 }, max: { male: 46, female: 49.4 } },
        5: { min: { male: 43.5, female: 49.4 }, max: { male: 46, female: 50 } },
        6: { min: { male: 43.5, female: 50 }, max: { male: 46, female: 50.6 } },
        7: { min: { male: 43.5, female: 50.6 }, max: { male: 51.8, female: 51.2 } },
        8: { min: { male: 43.5, female: 51.2 }, max: { male: 52.3, female: 51.8 } },
        9: { min: { male: 43.5, female: 51.8 }, max: { male: 52.8, female: 52.4 } },
        10: { min: { male: 43.5, female: 52.4 }, max: { male: 53.3, female: 53 } },
        11: { min: { male: 43.5, female: 53 }, max: { male: 53.8, female: 53.6 } },
        12: { min: { male: 43.5, female: 53.6 }, max: { male: 54.3, female: 54.2 } },
        13: { min: { male: 54.3, female: 54.2 }, max: { male: 54.8, female: 54.8 } },
        14: { min: { male: 54.8, female: 54.8 }, max: { male: 55.3, female: 55.4 } },
        15: { min: { male: 55.3, female: 55.4 }, max: { male: 55.8, female: 56 } },
        16: { min: { male: 55.8, female: 56 }, max: { male: 56.3, female: 56.6 } },
        17: { min: { male: 56.3, female: 56.6 }, max: { male: 56.8, female: 57.2 } },
        18: { min: { male: 56.8, female: 57.2 }, max: { male: 57.3, female: 57.8 } },
        19: { min: { male: 57.3, female: 57.8 }, max: { male: 57.8, female: 58.4 } },
        20: { min: { male: 57.8, female: 58.4 }, max: { male: 58.3, female: 59 } },
        21: { min: { male: 58.3, female: 59 }, max: { male: 58.8, female: 59.6 } },
        22: { min: { male: 58.8, female: 59.6 }, max: { male: 59.3, female: 60.2 } },
        23: { min: { male: 59.3, female: 60.2 }, max: { male: 59.8, female: 60.8 } },
        24: { min: { male: 59.8, female: 60.8 }, max: { male: 60.3, female: 61.4 } },
        25: { min: { male: 60.3, female: 61.4 }, max: { male: 60.8, female: 62 } }, 
        26: { min: { male: 60.8, female: 62 }, max: { male: 61.3, female: 62.6 } }, 
        27: { min: { male: 61.3, female: 62.6 }, max: { male: 61.8, female: 63.2 } }, 
        28: { min: { male: 61.8, female: 63.2 }, max: { male: 62.3, female: 63.8 } }, 
        29: { min: { male: 62.3, female: 63.8 }, max: { male: 62.8, female: 64.4 } }, 
        30: { min: { male: 62.8, female: 64.4 }, max: { male: 63.3, female: 65 } }, 
        31: { min: { male: 63.3, female: 65 }, max: { male: 63.8, female: 65.6 } }, 
        32: { min: { male: 63.8, female: 65.6 }, max: { male: 64.3, female: 66.2 } }, 
        33: { min: { male: 64.3, female: 66.2 }, max: { male: 64.8, female: 66.8 } }, 
        34: { min: { male: 64.8, female: 66.8 }, max: { male: 65.3, female: 67.4 } }, 
        35: { min: { male: 65.3, female: 67.4 }, max: { male: 65.8, female: 68 } }, 
        36: { min: { male: 65.8, female: 68 }, max: { male: 66.3, female: 68.6 } }, 
        37: { min: { male: 66.3, female: 68.6 }, max: { male: 66.8, female: 69.2 } }, 
        38: { min: { male: 66.8, female: 69.2 }, max: { male: 67.3, female: 69.8 } }, 
        39: { min: { male: 67.3, female: 69.8 }, max: { male: 67.8, female: 70.4 } }, 
        40: { min: { male: 67.8, female: 70.4 }, max: { male: 68.3, female: 71 } }, 
        41: { min: { male: 68.3, female: 71 }, max: { male: 68.8, female: 71.6 } }, 
        42: { min: { male: 68.8, female: 71.6 }, max: { male: 69.3, female: 72.2 } }, 
        43: { min: { male: 69.3, female: 72.2 }, max: { male: 69.8, female: 72.8 } }, 
        44: { min: { male: 69.8, female: 72.8 }, max: { male: 70.3, female: 73.4 } }, 
        45: { min: { male: 70.3, female: 73.4 }, max: { male: 70.8, female: 74 } }, 
        46: { min: { male: 70.8, female: 74 }, max: { male: 71.3, female: 74.6 } }, 
        47: { min: { male: 71.3, female: 74.6 }, max: { male: 71.8, female: 75.2 } }, 
        48: { min: { male: 71.8, female: 75.2 }, max: { male: 72.3, female: 75.8 } }, 
        49: { min: { male: 72.3, female: 75.8 }, max: { male: 72.8, female: 76.4 } }, 
        50: { min: { male: 72.8, female: 76.4 }, max: { male: 73.3, female: 77 } },
    }
    const cards = document.querySelectorAll('.carousel-item');
    cards.forEach(card => {
        card.addEventListener('click', function() {
            const childId = this.querySelector('a').dataset.childId;
            const childDataDiv = document.getElementById(`child-data-${childId}`);
            const otherChildDataDivs = document.querySelectorAll(`[id^="child-data-"]`);
            otherChildDataDivs.forEach(div => {
                if (div.id !== childDataDiv.id) {
                    div.classList.add('hidden');
                }
            });
            childDataDiv.classList.toggle('hidden');

            fetch(`/user/chart/${childId}`)
                .then(response => response.json())
                .then(data => {
                    // Create the chart using the received data
                    const name = data.name;
                    const gender = data.gender; 
                    const ctx = document.getElementById(`myHead-${childId}`).getContext('2d');

                    const labels = data.chartData.map(item => item.age );
                    const headCircumference = data.chartData.map(item => item.head_circumference);

                              // Calculate the max and min head circumference ranges based on gender
                    let maxHeadCircumferences, minHeadCircumferences;
                    if (gender === 'male') {
                    maxHeadCircumferences = data.chartData.map(item => headCircumferenceRanges[parseInt(item.age)].max.male);
                    minHeadCircumferences = data.chartData.map(item => headCircumferenceRanges[parseInt(item.age)].min.male);
                    } else {
                    maxHeadCircumferences = data.chartData.map(item => headCircumferenceRanges[parseInt(item.age)].max.female);
                    minHeadCircumferences = data.chartData.map(item => headCircumferenceRanges[parseInt(item.age)].min.female);
                    }

                    const chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                    label: 'Lingkar kepala ' + name,
                                    data: headCircumference,
                                    borderColor: '#31C48D',
                                    fill: false,
                                    tension: 0.4, // Set the tension property
                                },
                                {
                                  label: 'Lingkar maksimal',
                                  data: maxHeadCircumferences,
                                  borderColor: '#ff0000',
                                  fill: false,
                                  borderDash: [5, 5] // Dashed line for max head circumference
                                },
                                {
                                  label: 'Lingkar minimal',
                                  data: minHeadCircumferences,
                                  borderColor: '#0000ff',
                                  fill: false,
                                  borderDash: [5, 5] // Dashed line for min head circumference
                                }
                            ],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Lingkar kepala',
                                },
                            },
                            interaction: {
                                intersect: false,
                            },
                            scales: {
                                x: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: 'Umur',
                                    }
                                },
                                y: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: 'Lingkar kepala (cm)',
                                    },
                                    suggestedMin: 10,
                                    suggestedMax: 100,
                                },
                            },
                        },
                    });

                     // Get the last weight and age
                     const lastHead = headCircumference[headCircumference.length - 1];
                     const lastAge = labels[labels.length - 1];
                     const idChild = data.id_child;
                     // Check if the last weight exceeds maximum or minimum limit
                     if (lastHead > maxHeadCircumferences[maxHeadCircumferences.length - 1]) {
                         // Show error message
                         const alertDiv = document.getElementById('alert-head-' + idChild);
                         alertDiv.classList.remove('hidden');
                         alertDiv.classList.add('flex');
                         // alertDiv.innerHTML = `Berat badan anak anda melebihi maksimal yang ditentukan pada umur ${lastAge} tahun, silahkan konfirmasi lebih lanjut dengan ahli gizi!`;
                         alertDiv.querySelector('#erorHead').innerHTML = `Lingkar kepala anak anda melebihi maksimal yang ditentukan pada umur ${lastAge}, silahkan konfirmasi lebih lanjut dengan ahli gizi!`;
                     } else if (lastHead < minHeadCircumferences[minHeadCircumferences.length - 1]) {
                         // Show error message
                         const alertDiv = document.getElementById('alert-head-'+ idChild);
                         alertDiv.classList.remove('hidden');
                         alertDiv.classList.add('flex');
                         alertDiv.querySelector('#erorHead').innerHTML = `Lingkar kepala anak anda kurang dari minimal yang ditentukan pada umur ${lastAge}, silahkan konfirmasi lebih lanjut dengan ahli gizi!`;
                     }

                     
                // Add event listener to handle window resize
                window.addEventListener('resize', function() {
                    myChart.resize();
                    });
    
                });
        })
    });
});
// lingkar kepala selesai
