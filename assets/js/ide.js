let editor;

window.onload = function () {
  ace.require("ace/ext/language_tools");
  editor = ace.edit("editor");
  editor.setTheme("ace/theme/monokai");
  editor.session.setMode("ace/mode/c_cpp");
  editor.setOptions({
    enableBasicAutocompletion: true,
    enableSnippets: true,
    enableLiveAutocompletion: false,
  });
};

function changeLanguage() {
  let language = $("#languages").val();

  if (language == "c" || language == "cpp") {
    editor.session.setMode("ace/mode/c_cpp");
  } else if (language == "php") {
    editor.session.setMode("ace/mode/php");
  } else if (language == "py") {
    editor.session.setMode("ace/mode/python");
  } else if (language == "js") {
    editor.session.setMode("ace/mode/javascript");
  }
}

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

function submitAssignment() {
  $.ajax({
    url: "../inc/assignment_handler.php",
    method: "POST",
    data: {
      assignment_name : $("#assignment_name").val(),
      lang: $("#formlang").val(),
      scode: editor.getSession().getValue(),
      filename: $("#filename").val(),
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
