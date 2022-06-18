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
        $('#category').html('<button type="submit" class="btn btn-danger w-100  rounded-3 border-2 fw-bolder  text-center " style="height: 89% ; margin-top : 1px ;">Rechercher</button>'); 
        }
        });
        });
    // loadState($(this).find(':selected').val())
});