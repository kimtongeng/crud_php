  
  const side_bar = document.getElementById('side-bar');
  
  function updateClock() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
  }

  // Initial call
  updateClock();
  // Update every second
  setInterval(updateClock, 1000);


  document.getElementById('menu').addEventListener("click",function(){
    side_bar.classList.toggle('show');
  });
  document.getElementById("close-menu").addEventListener("click",()=>{
    side_bar.classList.toggle('show');
  })