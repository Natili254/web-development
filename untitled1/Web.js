const bar = document.getElementById('bar');
const close = document.getElementById('close')
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () =>);
    {
        nav.classList.add('active');
    }
}
if (close) {
    bar.addEventListener('click', () =>);
    {
        nav.classList.remove('active');
    }
}document.getElementById("mobile-menu").addEventListener("click", function() {
    document.getElementById("navbar").classList.toggle("active");
});

// JavaScript to highlight active link
document.addEventListener("DOMContentLoaded", function() {
    var links = document.querySelectorAll(".navbar__menu li a");
    var currentLocation = window.location.href;

    links.forEach(function(link) {
        if (link.href === currentLocation) {
            link.classList.add("active");
        }
    });
});
</script>
