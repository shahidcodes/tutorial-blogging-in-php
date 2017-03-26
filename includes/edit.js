var date = new Date().toISOString().slice(0, 19).replace('T', ' ');
document.getElementById('date').value = date;