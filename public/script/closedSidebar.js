
function closeSidebar(){
    var sidebar = document.getElementById('sidebar');
    var buttonClose = document.getElementById('button-close-sidebar');
    
    sidebar.classList.toggle("closed");
    buttonClose.classList.toggle("Open")
    if(document.getElementByClassName('Open')){
        buttonClose.textContent = "X"
        alert("s")
    }
    else{
        buttonClose.textContent = "➞"

    }
}
