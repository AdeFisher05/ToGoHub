// Mobile nav
 
    function myFunction() {
  const nav = document.getElementById("topnav");
  nav.classList.toggle("responsive");
}


    // Tabs
    const tabs = document.querySelectorAll('.tab-btn');
    const panels = document.querySelectorAll('.tab-panel');
    tabs.forEach(tab=>{
      tab.addEventListener('click', ()=>{
        tabs.forEach(t=>t.setAttribute('aria-selected','false'));
        panels.forEach(p=>p.classList.remove('active'));
        tab.setAttribute('aria-selected','true');
        document.getElementById(tab.getAttribute('aria-controls')).classList.add('active');
      });
    });

    // Stats counter
    const metrics = document.querySelectorAll('.metric');
    const observer = new IntersectionObserver((entries,obs)=>{
      entries.forEach(entry=>{
        if(entry.isIntersecting){
          const el = entry.target;
          const target = +el.dataset.count;
          const dur = 1200;
          const start = performance.now();
          const step = (now)=>{
            const p = Math.min(1,(now-start)/dur);
            el.textContent = Math.floor(target * (0.2 + 0.8*p)).toLocaleString();
            if(p<1) requestAnimationFrame(step);
          };
          requestAnimationFrame(step);
          obs.unobserve(el);
        }
      });
    },{threshold:0.3});
    metrics.forEach(m=>observer.observe(m));

    // Fare total (simple demo calc)
    const from = document.getElementById('from');
    const to = document.getElementById('to');
    const fareType = document.getElementById('fareType');
    const payTotal = document.getElementById('payTotal');
    function recalc(){
      if(!from.value || !to.value) return;
      const base = 500; // demo base fare
      const distanceFactor = (from.value.length + to.value.length) % 10; // placeholder
      let total = base + distanceFactor*50;
      if(fareType.value === 'Midway Trip Fare') total = Math.max(200, Math.floor(total*0.6));
      payTotal.textContent = 'Total: ₦' + total.toLocaleString();
    }
    [from,to,fareType].forEach(el=>el.addEventListener('input',recalc));

    // QR modal (camera preview only; add decoder library in prod)
    const scanBtn = document.getElementById('scanBtn');
    const qrModal = document.getElementById('qrModal');
    const qrClose = document.getElementById('qrClose');
    const qrVideo = document.getElementById('qrVideo');
    let stream;
    scanBtn.addEventListener('click', async ()=>{
      if(typeof qrModal.showModal === 'function'){ qrModal.showModal(); } else { qrModal.removeAttribute('open'); }
      try{
        stream = await navigator.mediaDevices.getUserMedia({video:{facingMode:'environment'}});
        qrVideo.srcObject = stream;
      }catch(e){
        alert('Camera access denied. You can paste QR data instead.');
      }
    });
    qrClose.addEventListener('click', ()=>{
      if(stream){ stream.getTracks().forEach(t=>t.stop()); }
      qrModal.close();
    });

    // Year
    document.getElementById('year').textContent = new Date().getFullYear();

    // Form submit demo
    document.getElementById('fareForm').addEventListener('submit',(e)=>{
      e.preventDefault();
      alert('Payment processing demo — connect to your payment gateway here.');
    });