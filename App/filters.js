app.filter('capitalize', function() {//filtro pone en mayuscula cada primera letra de cada palabra del string que se le mande
    return function(str) {
      return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    }
})
.filter('rSpace', function() {//filtro pone en mayuscula cada primera letra de cada palabra del string que se le mande
    return function(str) {
      return str.replace(/ /g,'-');
    }
})
.filter('range', function() {
  return function(input, total) {
    total = parseInt(total);
    for (var i=0; i<total; i++)
      input.push(i);
    return input;
  };
})
