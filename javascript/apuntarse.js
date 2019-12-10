function inicio(){
  
  $("#desapuntarse").attr("disabled", true);
}

function apuntarse(ocio,param) {
 $.ajax({
      url: 'codesincss/procesarApuntarse.php',
      type: 'post',
      data: {'idOcio':ocio,'idUser':param},
      success: function(data, status) {
        /*if(data == "ok") {
          document.getElementById("output").innerHTML = "Data sent";
        }*/
           $("#apuntarse").attr("disabled", true);
            $("#desapuntarse").attr("disabled", false);
           alert("Te has apuntado al evento! Consulta todos los eventos a los que asistirás en tu perfil");
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
}

function desapuntarse(ocio,param) {
 $.ajax({
      url: 'codesincss/procesarDesapuntarse.php',
      type: 'post',
      data: {'idOcio':ocio,'idUser':param},
      success: function(data, status) {
        /*if(data == "ok") {
          document.getElementById("output").innerHTML = "Data sent";
        }*/
        alert("Te has desapuntado del evento :( ");
        $("#desapuntarse").attr("disabled", true);
         $("#apuntarse").attr("disabled", false);
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
}
      