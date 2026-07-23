
<footer>
    <p>© 2026 Bloomore </p>
</footer>
</body>
</html>
<script>
window.onscroll = function() {
    
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
        document.querySelector('footer').style.opacity = "1";
        document.querySelector('footer').style.visibility = "visible";
    } else {
        document.querySelector('footer').style.opacity = "0";
        document.querySelector('footer').style.visibility = "hidden";
    }
};
</script>