// Realtime menggunakan polling (tanpa framework)
setInterval(() => {
if (window.loadBarang) loadBarang();
if (window.loadDashboard) loadDashboard();
}, 3000); // 3 detik