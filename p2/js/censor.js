function censor(el) {
  const bad_word = ["puto", "puta", "mierda", "hostia", "joder", "coño"];
  var uncensored = el.value;
  var beeped = false;

  for (let i = 0; i < bad_word.length && !beeped; i++) {
    var censored = el.value.replace(bad_word[i], "*****");
    if(uncensored != censored){
      el.value = censored;
      beeped = true;
    }
  censored = "";
  uncensored = "";
  beeped = false;
  }
}
