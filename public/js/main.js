console.log('hello');
$(document).ready(function() {
  $('#specialite').change(function() {
    var specialite_id = this.value;
    var specialite_name = $('#specialite option:selected').text();
    console.log(specialite_id);
    console.log(specialite_name);
    console.log('ok');
    $.ajax({
        url: "/modulesajax",
        type: "GET",
        data: {
            specialite_id: specialite_name
        },
        cache: false,
        success: function(result){
            console.log(result);
        $("#modules").html(result);
        $('#searchButton').html('<button type="submit" class="btn btn-danger w-100  rounded-3 border-2 fw-bolder  text-center " style="height: 89% ; margin-top : 1px ;">Rechercher</button>'); 
        }
        });
        });
    // loadState($(this).find(':selected').val())
});
const publierForm = document.getElementById("publierForm");
// const username = document.getElementById("username");
// const email = document.getElementById("email1");
// const password = document.getElementById("pas1");
// const password2 = document.getElementById("pas2");
let valid = true;
console.log(publierForm);
// console.log(email);

publierForm.addEventListener("submit", (e) => {
    var specialite = $("#specialite") ;
    if (specialite.val() != "") {
        specialite.css("border", "2px solid green");
        valid = true;      
    }
    var annees = $("#annees") ;
    
    console.log(annees.val());
    if (annees.val() != "") {
        console.log("ok annes");
        annees.css("border", "2px solid green");
        valid = true;      
    }
    var semestre = $("#semestre") ;
    
    if (semestre.val() != "") {
        semestre.css("border", "2px solid green");
        valid = true;
    }
    var category = $("#category") ;
    
    if (category.val() != "") {
        category.css("border", "2px solid green");
        valid = true;
    }
    var modules = $("#modules") ;
    
    if (modules.val() != "") {
        modules.css("border", "2px solid green");
        valid = true;
    }
    
    
    var prof = $('input[name="prof"]') ;
    // console.log(prof);
    if (prof.val() != "") {
        prof.css("border", "2px solid green");
        valid = true;
    }
    
    
    var title = $('input[name="title"]') ;
    // console.log(title);
    if (title.val() != "") {
        title.css("border", "2px solid green");
        valid = true;
    }
    
    
    var file = $('#file') ;
    // console.log(file);
    if (file.val() != "") {
        file.css("border", "2px solid green");
        valid = true;
    }
    
    
 var etablissement = $("#etablissement") ;
    if (etablissement.val() != "") {
        etablissement.css("border", "2px solid green");
        valid = true;
    }
    
    
    var ville = $("#ville") ;
    if (ville.val() != "") {
        ville.css("border", "2px solid green");
        valid = true;
    }
    
    if (specialite.val() == "") {
        specialite.css("border", "2px solid red");
        valid = false;      
    }
if (annees.val() == "") {
        annees.css("border", "2px solid red");
        valid = false;
    }
if (semestre.val() == "") {
        semestre.css("border", "2px solid red");
        valid = false;
    }
if (category.val() == "") {
        category.css("border", "2px solid red");
        valid = false;
    }
if (modules == "") {
        modules.css("border", "2px solid red");
        valid = false;
    }
if (prof.val() == "") {
        prof.css("border", "2px solid red");
        valid = false;
    }
if (title.val() == "") {
        title.css("border", "2px solid red");
        valid = false;
    }
if (file.val() == "") {
        file.css("border", "2px solid red");
        valid = false;
    }
if (etablissement.val() == "") {
        etablissement.css("border", "2px solid red");
        valid = false;
    }
if (ville.val() == "") {
        ville.css("border", "2px solid red");
        valid = false;
    }
    
    console.log("ok");
//   validateInputs();
  if (valid == false) {
    e.preventDefault();
  }
});
