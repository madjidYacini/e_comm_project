 $(function(){
      $("#nom-error").hide();
      $("#prenom-error").hide();
      $("#login-error").hide();
      $("#role-error").hide();
      $("#password-error").hide();
      $("#vpassword-error").hide();


      var error_nom =false;
      var error_prenom =false;
      var error_login =false;
      var error_role =false;
      var error_password =false;
      var error_vpasssword =false;

      $("#nom").focusout(function(){
           verifNom();
      });
      $("#qte").focusout(function(){
           verifPrenom();
      });
      /*$("#login").focusout(function(){
           verifLogin();
      });*/
      $("#categorie").focusout(function(){

           verifRole();
      });
      $("#prix").focusout(function(){
           verifPassword();
      });
      $("#vpassword").focusout(function(){
           verifVpassword();
      });

      function verifNom() {
            var nom_longeur= $("#nom").val().length;
            if (nom_longeur==0) {
                  $("#nom-error").html("vous devez rensiegner ce champs ");
                  $("#nom-error").show();
                  $("#nom").css('border-color','#ff0000');
                  error_nom=true;
            }else{
                  $("#nom-error").hide();
                  $("#nom").css('border-color',"#3bff00");
            }
      }
         function verifPrenom() {
            var nom_longeur= $("#qte").val().length;
            if (nom_longeur<5 || nom_longeur>20) {
                  $("#prenom-error").html("should be betwwen 5 20 char");
                  $("#prenom-error").show();
                  $("#prenom").css('border-color','#ff0000');
                  error_prenom=true;
            }else{
                  $("#prenom-error").hide();
                  $("#prenom").css('border-color',"#3bff00");
            }
      }


         /*function verifLogin() {
            var login_longeur = $("#login").val().length;
            if (login_longeur<10|| login_longeur>30) {
                  $("#login-error").html("il doit comporter votre adresse Email valide");
                  $("#login-error").show();
                  $("#login").css('border-color',"#ff0000");
                  error_login=true;
            }else{
                  $("#login-error").hide();
                  $("#login").css("#3bff00")
            }
      }
          /*  var nom_longeur= $("#nom").val().length;
            if (nom_longeur<5 || nom_longeur>20) {
                  $("#login-error").html("should be betwwen 5 20 char");
                  $("#login-error").show();
                  $("#login").css('border-color','#ff0000');
                  error_nom=true;
            }else{
                  $("#login-error").hide();
                  $("#login").css('border-color',"#1a8c97");
            }*/
      
          function verifPassword() {
            var pass_longeur= $("#mdp").val().length;
            if (pass_longeur<10) {
                  $("#password-error").html("au moins 10 caracteres ");
                  $("#password-error").show();
                  $("#password").css('border-color','#ff0000');
                  error_nom=true;
            }else{
                  $("#password-error").hide();
                  $("#mdp").css('border-color',"#3bff00");
            }
      }
          function verifVpassword() {
            var mdp1= $("#mdp").val();
            var mdp2 = $("#mdp2").val();

            if (mdp1 != mdp2) {
                  $("#vpassword-error").html("don't match");
                  $("#vpassword-error").show();
                  $("#vpassword").css('border-color','#ff0000');
                  error_nom=true;
            }else{
                  $("#vpassword-error").hide();
                  $("#vpassword").css('border-color',"#3bff00");
            }
      }
      

           /* function verifLogin(){
                  var pattern = new RegExp('/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+/.[a-zA-Z]{2,4}$',#login);
                  if(pattern.test($("#login").val())){
                        $("login-error").hide();
                  }else{
                        $("login-error").html("adresse invalide");
                        $("login-error").show();
                        error_login=true;
                  }
            }*/
      });