// Doughnut chart - Semua Pengguna
const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
const doughnutChart = new Chart(doughnutCtx, {
    type: 'doughnut',
    data: {
        labels: ['Admin', 'Pengguna', 'Tamu'],
        datasets: [{
            data: [35, 45, 20],
            backgroundColor: ['#4caf50', '#2196F3', '#f44336']
        }]
    },
    options: {
        cutout: '70%',
        plugins: {
            legend: {
                position: 'bottom',
                labels: {padding: 15, boxWidth: 15}
            }
        }
    }
});

// Pie chart - Jumlah Permohonan
const pieCtx = document.getElementById('pieChart').getContext('2d');
const pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: ['Disetujui', 'Diproses', 'Ditolak'],
        datasets: [{
            data: [25, 35, 40],
            backgroundColor: ['#002366', '#ffc107', '#c0c0c0']
        }]
    },
    options: {
        plugins: {
            legend: {
                position: 'bottom',
                labels: {padding: 15, boxWidth: 15}
            }
        }
    }
});
