(function () {
  window.onload = function ()
  {
    var may = document.getElementsByClassName("mayusculas");
    for (var i = 0; i < may.length; i++)
    {
      may[i].innerHTML = may[i].innerHTML.toUpperCase();
    }
  }
})();