function saveCode() {
  $.ajax({
    url: "../inc/code_handler.php",
    method: "POST",
    data: {
      lang: $("#formlang").val(),
      scode: editor.getSession().getValue(),
      filename: $("#filename").val(),
    },
    success: function (response) {
      $(".output").html(response);
    },
  });
}

function saveCodeTeach() {
  $.ajax({
    url: "../inc/teach_code_handler.php",
    method: "POST",
    data: {
      lang: $("#formlang").val(),
      scode: editor.getSession().getValue(),
      filename: $("#filename").val(),
    },
    success: function (response) {
      $(".output").html(response);
    },
  });
}


function submitAssignment() {
  $.ajax({
    url: "../inc/assignment_handler.php",
    method: "POST",
    data: {
      assignment_name : $("#assignment_name").val(),
      lang: $("#formlang").val(),
      scode: editor.getSession().getValue(),
      filename: $("#filename_assign").val(),
    },
    success: function (response) {
      $(".output").html(response);
    },
  });
}


function executeCode() {
  $.ajax({
      url:"../inc/compiler.php",
      method:"POST",
      data:{
          lang:$("#languages").val(),
          scode:editor.getSession().getValue(),
          stdin:$('#textip').val()
      },
      success:function(response)
      {
          $(".output").html(response)
      }
  })

//   let token;
//   let options = {
//     method: "POST",
//     headers: {
//       "content-type": "application/json",
//       "Content-Type": "application/json",
//     },
//     body: '{"language_id":52,"source_code":"I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbih2b2lkKSB7CiAgY2hhciBuYW1lWzEwXTsKICBzY2FuZigiJXMiLCBuYW1lKTsKICBwcmludGYoImhlbGxvLCAlc1xuIiwgbmFtZSk7CiAgcmV0dXJuIDA7Cn0=","stdin":"SnVkZ2Uw"}',
//   };

//   fetch(
//     "http://192.168.29.114:2358/submissions?base64_encoded=true&fields=*",
//     options
//   )
//     .then((response) => response.json())
//     .then((response) => {
//       token = response["token"];
//       console.log(response["token"]);

        

//       options = {
//         method: "GET",
//         headers: {
//             "content-type": "application/json",
//             "Content-Type": "application/json",
//           },
//       };
    
//       fetch(
//         "http://192.168.29.114:2358/submissions/"+token+"?base64_encoded=true&fields=*",
//         options
//       )
//         .then((response) => response.json())
//         .then((response) => console.log(response))
//         .catch((err) => console.error(err));

//     })
//     .catch((err) => console.error(err));

  
}
