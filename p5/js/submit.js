function showInput() {
  var d = new Date,
      dformat = [d.getMonth()+1,
                 d.getDate(),
                 d.getFullYear()].join('/')+', '+
                [d.getHours(),
                 d.getMinutes()].join(':');
  var name = document.getElementById("name").value;
  var comm = document.getElementById("comm").value;
  var mail = document.getElementById("mail").value;

  var mail_regex = /^[^\s@]+@[^\s@]+$/;

      if(name != ""  && comm != "" && mail != ""){
        if(mail_regex.test(mail)){
          document.getElementById("fecha_submit").innerHTML = dformat;
          document.getElementById("nombre_submit").innerHTML = name;
          document.getElementById("comment_submit").innerHTML = comm;
        } else{
          alert("E-Mail inválido");
        }
      } else{
          alert("Por favor, rellene todos los campos");
      }
    }
