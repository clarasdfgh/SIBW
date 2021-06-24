function censor(el, bad_word) {

  var uncensored = el.value;
  var beeped = false;

  var badwordsjs = [];

  Object.keys(bad_word).forEach(function(key) {
    //console.log('Key : ' + key + ', Value : ' + bad_word[key])
    badwordsjs.push(bad_word[key]);
  })

  for (let i = 0; i < badwordsjs.length && !beeped; i++) {
    var censored = el.value.replace(badwordsjs[i], "*****");
    if(uncensored != censored){
      el.value = censored;
      beeped = true;
    }
  censored = "";
  uncensored = "";
  beeped = false;
  }

}
