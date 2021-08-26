let validator;

validator = $('#login').validate({
    ignore: [],
    errorElement: 'span',
    errorClass: 'validation-error text-danger',
    rules: {
        user_id: {
            required: true,
            not_empty: true,
        },
        email: {
            required: true,
            not_empty: true,
        },
        password: {
            required: true,
            not_empty: true,
        }
    },
    messages: {
        user_id: {
            required: "Please select user",
        },
        email: {
            required: "Please enter email",
        },
        password: {
            required: "Please enter password",
        }
    }
});

validator = $('#add_university').validate({
    ignore: [],
    errorElement: 'span',
    errorClass: 'validation-error text-danger',
    rules: {
        university_name: {
            required: true,
            maxlength: 50,
            not_empty: true,
        },
        university_code: {
            required: true,
            maxlength: 10,
            not_empty: true,
        },
        university_contact: {
            required: true,
            alpha_numeric: true,
            maxlength: 13,
            not_empty: true,
        },
        university_email: {
            required: true,
            maxlength: 50,
            not_empty: true,
        },
        university_address: {
            required: true,
            maxlength: 500,
            not_empty: true,
        }
    },
    submitHandler: function (form) {
        $(form).find(':input[type=submit]').prop('disabled', true)
        form.submit();
    },
    messages: {
        university_name: {
            required: "Please enter university name",
            maxlength: "Please enter maximum 50 characters.",
        },
        university_code: {
            required: "Please enter university code",
            maxlength: "Please enter maximum 10 characters.",
        },
        university_contact: {
            required: "Please enter university contact",
            maxlength: "Please enter maximum 13 characters.",
        },
        university_email: {
            required: "Please enter university email",
            maxlength: "Please enter maximum 50 characters.",
        },
        university_address: {
            required: "Please enter university address",
            digits: "Please enter only numbers",
            maxlength: "Please enter maximum 500 characters.",
        }
    }
});

validator = $('#add_college').validate({
    ignore: [],
    errorElement: 'span',
    errorClass: 'validation-error text-danger',
    rules: {
        college_name: {
            required: true,
            maxlength: 50,
            not_empty: true,
        },
        college_code: {
            required: true,
            maxlength: 10,
            not_empty: true,
        },
        uni: {
            required: true,
            not_empty: true,
        },
        college_contact: {
            required: true,
            alpha_numeric: true,
            maxlength: 13,
            not_empty: true,
        },
        college_email: {
            required: true,
            maxlength: 50,
            not_empty: true,
        },
        college_address: {
            required: true,
            maxlength: 500,
            not_empty: true,
        }
    },
    submitHandler: function (form) {
        $(form).find(':input[type=submit]').prop('disabled', true)
        form.submit();
    },
    messages: {
        college_name: {
            required: "Please enter college name",
            maxlength: "Please enter maximum 50 characters.",
        },
        college_code: {
            required: "Please enter college code",
            maxlength: "Please enter maximum 10 characters.",
        },
        uni: {
            required: "Please select university",
        },
        college_contact: {
            required: "Please enter college contact",
            maxlength: "Please enter maximum 13 characters.",
        },
        college_email: {
            required: "Please enter college email",
            maxlength: "Please enter maximum 50 characters.",
        },
        college_address: {
            required: "Please enter college address",
            digits: "Please enter only numbers",
            maxlength: "Please enter maximum 500 characters.",
        }
    }
});

validator = $('#add_school').validate({
    ignore: [],
    errorElement: 'span',
    errorClass: 'validation-error text-danger',
    rules: {
        school_name: {
            required: true,
            maxlength: 50,
            not_empty: true,
        },
        school_code: {
            required: true,
            maxlength: 10,
            not_empty: true,
        },
        school_contact: {
            required: true,
            alpha_numeric: true,
            maxlength: 13,
            not_empty: true,
        },
        school_email: {
            required: true,
            maxlength: 50,
            not_empty: true,
        },
        school_address: {
            required: true,
            maxlength: 500,
            not_empty: true,
        }
    },
    submitHandler: function (form) {
        $(form).find(':input[type=submit]').prop('disabled', true)
        form.submit();
    },
    messages: {
        school_name: {
            required: "Please enter school name",
            maxlength: "Please enter maximum 50 characters.",
        },
        school_code: {
            required: "Please enter school code",
            maxlength: "Please enter maximum 10 characters.",
        },
        school_contact: {
            required: "Please enter school contact",
            maxlength: "Please enter maximum 13 characters.",
        },
        school_email: {
            required: "Please enter school email",
            maxlength: "Please enter maximum 50 characters.",
        },
        school_address: {
            required: "Please enter school address",
            digits: "Please enter only numbers",
            maxlength: "Please enter maximum 500 characters.",
        }
    }
});

validator = $('#add_student').validate({
    ignore: [],
    errorElement: 'span',
    errorClass: 'validation-error text-danger',
    rules: {
        student_name: {
            required: true,
            maxlength: 50,
            not_empty: true,
        },
        student_stream: {
            required: true,
            not_empty: true,
        },
        student_dob: {
            required: true,
            not_empty: true,
        },
        gender: {
            required: true,
            not_empty: true,
        },
        student_clg: {
            required: true,
            not_empty: true,
        },
        student_contact: {
            required: true,
            alpha_numeric: true,
            maxlength: 13,
            not_empty: true,
        },
        student_email: {
            required: true,
            maxlength: 50,
            not_empty: true,
        },
        student_address: {
            required: true,
            maxlength: 500,
            not_empty: true,
        }
    },
    submitHandler: function (form) {
        $(form).find(':input[type=submit]').prop('disabled', true)
        form.submit();
    },
    messages: {
        student_name: {
            required: "Please enter student name",
            maxlength: "Please enter maximum 50 characters.",
        },
        student_stream: {
            required: "Please enter student stream",
        },
        student_dob: {
            required: "Please enter student date of birth",
        },
        gender: {
            required: "Please select student gender",
        },
        student_clg: {
            required: "Please select student college",
        },
        student_contact: {
            required: "Please enter student contact",
            maxlength: "Please enter maximum 13 characters.",
        },
        student_email: {
            required: "Please enter student email",
            maxlength: "Please enter maximum 50 characters.",
        },
        student_address: {
            required: "Please enter student address",
            digits: "Please enter only numbers",
            maxlength: "Please enter maximum 500 characters.",
        }
    }
});

validator = $('#add_certificate').validate({
    ignore: [],
    errorElement: 'span',
    errorClass: 'validation-error text-danger',
    rules: {
        student: {
            required: true,
            not_empty: true,
        },
        student_clg: {
            required: true,
            not_empty: true,
        },
        certificate_name: {
            required: true,
            maxlength: 50,
            not_empty: true,
        },
        issue_dob: {
            required: true,
            not_empty: true,
        },
        student_stream: {
            required: true,
            not_empty: true,
        },
        language: {
            required: true,
            not_empty: true,
        },
        passing_year: {
            required: true,
            not_empty: true,
        },
        grade: {
            required: true,
            not_empty: true,
        }
    },
    submitHandler: function (form) {
        $(form).find(':input[type=submit]').prop('disabled', true)
        form.submit();
    },
    messages: {
        student: {
            required: "Please select student name",
        },
        student_clg: {
            required: "Please select student college",
        },
        certificate_name: {
            required: "Please enter certificate name",
            maxlength: "Please enter maximum 50 characters.",
        },
        issue_dob: {
            required: "Please enter issue date",
        },
        student_stream: {
            required: "Please select student stream",
        },
        language: {
            required: "Please select language",
        },
        passing_year: {
            required: "Please enter passing year",
        },
        grade: {
            required: "Please select grade",
        },
    }
});


