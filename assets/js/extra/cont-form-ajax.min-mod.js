"use strict";
$(document).ready(function () {
  $("form").submit(function (a) {
    $(".form-group .form-control").removeClass("border-danger"),
      $(".text-danger").remove();
    var s = {
      name: $("input[name=name]").val(),
      mob: $("input[name=mob]").val(),
      email: $("input[name=email]").val(),
      sub: $("input[name=sub]").val(),
      msg: $("textarea[name=msg]").val()
    };
    $.ajax({
      type: "POST",
      url: "validate.php",
      data: s,
      dataType: "json",
      encode: !0,
      beforeSend: () => {
      	e({ show: !0, msg: "Data validating..." });
      }
    })
      .done(function (a) {
        a.success
          ? (e({ show: !0, msg: "Data validated!" }),
            $.ajax({
              type: "POST",
              url: "send-mail.php",
              data: s,
              dataType: "json",
              encode: !0,
              beforeSend: () => {
                e({ show: !0, msg: "Mail sending..." });
              }
            }).done(function (a) {
              a.user.success
                ? (e({ show: !0, msg: "User mail sent!" }),
                  a.admin.success
                    ? (e({ show: !1 }),
                      alert("Process completed..."),
                      $("form")[0].reset())
                    : (e({ show: !1 }), alert(a.admin.message)))
                : (e({ show: !1 }), alert(a.user.message));
            }))
          : (e({ show: !1 }),
            a.errors.name &&
              ($("#name-group input").addClass("border-danger"),
              $("#name-group").append(
                '<div class="text-danger">' + a.errors.name + "</div>"
              )),
            a.errors.mob &&
              ($("#mob-group input").addClass("border-danger"),
              $("#mob-group").append(
                '<div class="text-danger">' + a.errors.mob + "</div>"
              )),
            a.errors.email &&
              ($("#email-group input").addClass("border-danger"),
              $("#email-group").append(
                '<div class="text-danger">' + a.errors.email + "</div>"
              )),
            a.errors.sub &&
              ($("#sub-group input").addClass("border-danger"),
              $("#sub-group").append(
                '<div class="text-danger">' + a.errors.sub + "</div>"
              )),
            a.errors.msg &&
              ($("#msg-group textarea").addClass("border-danger"),
              $("#msg-group").append(
                '<div class="text-danger">' + a.errors.msg + "</div>"
              )));
      })
      .fail(function (a) {
        alert("fail :\n\n" + JSON.stringify(a)),
          e({ show: !1 }),
          console.log(a);
      }),
      a.preventDefault();
  });
  var e = (e) => {
    e.show
      ? $(".process-msg").html(e.msg).parent().css("display", "flex")
      : $(".process-msg").html("").parent().css("display", "none");
  };
});
