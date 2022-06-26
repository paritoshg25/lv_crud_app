$(document).ready(function () {
    $("#name_error_message").hide();
    $("#email_error_message").hide();
    $("#phone_error_message").hide();
    $("#address_error_message").hide();
    $("#gender_error_message").hide();
    $("#hobby_error_message").hide();
    $("#country_error_message").hide();

    var error_name = false;
    var error_email = false;
    var error_phone = false;
    var error_address = false;
    var error_gender = false;
    var error_country = false;
    var error_hobby = false;

    $('#name').keyup(function () {
        check_name();
    });
    $('#email').keyup(function () {
        check_email();
    });
    $('#phone').keyup(function () {
        check_phone();
    });
    $('#address').keyup(function () {
        check_address();
    });
    $('#gender').focusout(function () {
        check_gender();
    });
    $('#country').keyup(function () {
        check_country();
    });
    $('#hobby').keyup(function () {
        check_hobby();
    });



    function check_name() {
        var pattern = /^[a-zA-Z ]*$/;
        var name = $("#name").val();
        if (pattern.test(name) && name !== '') {
            $("#name_error_message").hide();
        } else {
            if (name == '') {
                $("#name_error_message").html("*First Name is Required");
            }
            else if (!pattern.test(name)) {
                $("#name_error_message").html("*Invalid First Name");

            }
            $("#name_error_message").show();
            error_name = true;
        }
    }

    function check_email() {
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $("#email").val();
        if (pattern.test(email) && email !== '') {
            $("#email_error_message").hide();
        } else {
            if (email == '') {
                $("#email_error_message").html("*Email is Required");
            }

            else if (!pattern.test(email)) {
                $("#email_error_message").html("*Invalid Email");
            }
            $("#email_error_message").show();
            error_email = true;
        }
    }

    function check_phone() {
        var pattern = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
        var phone = $("#phone").val();
        if (pattern.test(phone) && phone !== '') {
            $("#phone_error_message").hide();
        } else {
            if (phone == '') {
                $("#phone_error_message").html("*Phone Number is Required");
            }
            else if (!pattern.test(phone)) {
                $("#phone_error_message").html("*Invalid Phone Number");
            }
            $("#phone_error_message").show();
            error_phone = true;
        }
    }


    function check_address() {
        // var pattern = /^[0-9a-zA-Z]+$/;
        var pattern = /^[\w .,!?()]+$/;
        var address = $("#address").val();
        if (pattern.test(address) && address !== '') {
            $("#address_error_message").hide();;
        } else {
            $("#address_error_message").show();
            if (address == '') {
                $("#address_error_message").html("*Address is Required");
            }
            else if (!pattern.test(address)) {
                $("#address_error_message").html("*Invalid Address");
            }
            $("#address_error_message").show();
            error_address = true;
        }
    }


    function check_gender() {
        var gender = $("#gender").val();
        if ($('input[type=radio][name=gender]:checked').length != 0) {
            $("#gender_error_message").hide();
        } else {
            $("#gender_error_message").html("*Select any one");
            $("#gender_error_message").show();
            error_gender = true;
        }
    }


    function check_country() {
        var country = $("#country").val();
        if ($("select[name=country]").val() != 0 && $("select[name=country]").val() != "") {
            $("#country_error_message").hide();
        } else {
            $("#country_error_message").html("*Choose your country");
            $("#country_error_message").show();
            error_country = true;
        }
    }

    function check_hobby() {
        var hobby = $("#hobby").val();
        if ($('input[type=checkbox]:checked').length != 0 && $('input[type=checkbox]:checked').length != '') {
            $("#hobby_error_message").hide();
        } else {
            $("#hobby_error_message").html("*Select at least one hobby");
            $("#hobby_error_message").show();
            error_hobby = true;
        }
    }


    $("#form").submit(function () {
        error_name = false;
        error_email = false;
        error_phone = false;
        error_address = false;
        error_gender = false;
        error_country = false;
        error_hobby = false;


        check_name();
        check_email();
        check_phone()
        check_address();
        check_gender();
        check_hobby();
        check_country();

        if (error_name === false && error_email === false && error_phone === false && error_address === false && error_gender === false && error_hobby === false && error_country === false) {
            // alert("helo");
            // return true;
            // $("#form").submit();
        } else {
            // alert("Please Fill the form Correctly");
            var alerted = localStorage.getItem('alerted') || '';
            if (alerted != 'yes') {
                alert("Please Fill the form Correctly.");
                localStorage.setItem('alerted', 'yes');
            }
            return false;
        }


    });
});
