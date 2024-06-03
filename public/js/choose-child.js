document.addEventListener("DOMContentLoaded", function() {
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
        });
    });
});