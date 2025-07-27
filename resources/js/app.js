import './bootstrap';
// Sakura Falling Effect - by tqc241
document.addEventListener('DOMContentLoaded', function() {
    const sakuraColors = ['#fff3f8', '#ffd9ec', '#ffb7dd', '#ffc1e0', '#ffe4f2'];
    const container = document.createElement('div');
    container.id = 'sakura-container';
    Object.assign(container.style, {
        position: 'fixed',
        left: 0, top: 0, width: '100vw', height: '100vh',
        pointerEvents: 'none', zIndex: 50,
        overflow: 'hidden'
    });
    document.body.appendChild(container);

    function random(min, max) { return Math.random() * (max - min) + min; }

    function createPetal() {
        const petal = document.createElement('div');
        const size = random(9, 19);
        const color = sakuraColors[Math.floor(Math.random()*sakuraColors.length)];
        Object.assign(petal.style, {
            position: 'absolute',
            left: random(0, window.innerWidth) + 'px',
            top: '-30px',
            width: size + 'px',
            height: size * 0.75 + 'px',
            opacity: random(0.7, 1),
            pointerEvents: 'none',
            zIndex: 100,
            borderRadius: '70% 100% 60% 100% / 100% 70% 100% 60%',
            background: color,
            boxShadow: `0 0 8px 0 #fff5, 2px 2px 8px 0 #faa3`,
            transform: `rotate(${random(-15, 25)}deg)`,
        });

        // Animation variables
        const fallTime = random(8, 16); // seconds
        const startLeft = parseFloat(petal.style.left);
        const sway = random(30, 80);
        let frame = 0;

        function animate() {
            frame++;
            const progress = frame / (fallTime * 60);
            petal.style.top = `${progress * (window.innerHeight + 40)}px`;
            // Sway left-right as it falls
            petal.style.left = `${startLeft + Math.sin(progress * Math.PI * 2) * sway}px`;
            petal.style.transform = `rotate(${(progress*180 + random(-20,20))}deg) scale(${1 - progress * 0.3})`;
            if (progress < 1 && petal.parentNode) {
                requestAnimationFrame(animate);
            } else if (petal.parentNode) {
                petal.parentNode.removeChild(petal);
            }
        }
        requestAnimationFrame(animate);
        container.appendChild(petal);
    }

    // Create new petals at intervals
    setInterval(() => {
        for (let i = 0; i < random(1,2); i++) createPetal();
    }, 350);
});
