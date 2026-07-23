<!DOCTYPE html>
<html lang="en">
<head>
   <title> Bloomore </title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css?v=2">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <header>
        <div class="logo-container">
    <a href="index.php">
        <img src="images/bloomore-logo.jpg" alt="Bloomora Logo" class="logo-img">
    </a>
</div>
    </header>
    <!-- رابط السلة -->
   <a href="#" class="search-icon" onclick="toggleSearch()">
    <i class="fas fa-search"></i>
</a>

<div id="searchOverlay">
 <div class="search-box-wrapper">
    <span class="close-search" onclick="toggleSearch()">&times</span>
    <form action="search.php" method="GET" class="overlay-search-form">
        <input type="text" name="search" placeholder="What are you looking for?"
        autocomplete="off" onkeyup="filterSuggestions(this.value)">
        <div id="live-search-results" class="dropdown-results"></div>
        <button type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>

    <div id="suggestions" class="search-suggestions">
 <a href="search.php?search=Jasmine" data-name="jasmine">Jasmine</a>
 <a href="search.php?search=Rose" data-name="rose">Rose</a>
 <a href="search.php?search=Seed" data-name="seed">Seed</a>
 <a href="search.php?search=Sweet Pea" data-name="sweet Pea">Sweet Pea</a>  
 <a href="search.php?search=Gypsophila" data-name="gypsophila">Gypsophila</a> 
 <a href="search.php?search=Carnations" data-name="carnations">Carnations</a>
<a href="search.php?search=Asters" data-name="asters">Asters</a>
<a href="search.php?search=Black Orchid" data-name="black orchid">Black Orchid</a>
<a href="search.php?search=Zinnias" data-name="zinnias">Zinnias</a>
<a href="search.php?search=Delphiniums" data-name="delphiniums">Delphiniums</a>
<a href="search.php?search=Orchids" data-name="orchids">Orchids</a>
<a href="search.php?search=Canna Lily" data-name="canna lily">Canna Lily</a>
<a href="search.php?search=Aster" data-name="aster">Aster</a>
<a href="search.php?search=Roses seed" data-name="roses seed">Roses seed</a>
<a href="search.php?search=Jasmine seed" data-name="jasmine seed">Jasmine seed</a>
<a href="search.php?search=Orchids seed" data-name="orchids seed">Orchids seed</a>
<a href="search.php?search=Carnations seed" data-name="carnations seed">Carnations seed</a>
    </div>
</div>

</div>
 <a href="cart.php" class="cart-icon">
    <i class="fas fa-shopping-cart"></i>
</a>

<script>
function toggleMenu() {
    var x = document.getElementById("navLinks");
    if (x.style.display === "flex") {
        x.style.display = "none";
    } else {
        x.style.display = "flex";
    }
}
function toggleSearch() {

    var box = document.getElementById("searchOverlay");

    if(box.style.display === "flex"){
        box.style.display = "none";
    }else{
        box.style.display = "flex";
    }

}
</script>

<script>
function filterSuggestions(value){

    let suggestions = document.getElementById("suggestions");
    let links = suggestions.getElementsByTagName("a");

    if(value.trim() === ""){
        suggestions.style.display = "none";
        return;
    }

    suggestions.style.display = "block";

    let found = false;

    for(let link of links){

        let name = link.getAttribute("data-name");

        if(name.includes(value.toLowerCase())){
            link.style.display = "block";
            found = true;
        } else {
            link.style.display = "none";
        }
    }

    if(found){
        suggestions.style.display = "block";
    } else {
        suggestions.style.display = "none";
    }
}
</script>



</body>