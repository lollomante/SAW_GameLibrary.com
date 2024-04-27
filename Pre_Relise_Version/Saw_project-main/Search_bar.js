function Search() {
    var searchInput=document.getElementById('search_box').value;

    //chiamata AJAX al server
    var Searchcall= new XMLHttpRequest();
    Searchcall.onreadystatechange=function() {
        if (this.readyState==4) {
            document.getElementById('Results').innerHTML=this.response;
        }

    };
    Searchcall.open("GET", "search.php?query=", true);
    Searchcall.send();
}