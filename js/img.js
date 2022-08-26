document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });

  var instance = M.Materialbox.getInstance(elem);

    $('.materialboxed').materialbox('methodName');
    $('.materialboxed').materialbox('methodName', paramName);
  
       