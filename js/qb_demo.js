
$(function() {

    // Initialize events for buttons
    $('#save-changes').click(submitForm);
    $('#cancel').click(resetForm);
    $('#add-choice').click(processNewChoice);

});

function submitForm() {

    // reset the errors on the form
    resetErrors();
    // validate form fields
    // Returns an object so we can check errors as well.
    var validation = validateFields();
    // if everything is ok, submit the form
    if (validation.status) {
        sendForm();
    } else {
    // else, repot the errors on the form.
        displayErrors(validation.errors);
    }

}

function processNewChoice() {

    if ($('#choices > option').length >= 50) {
        alert('Maximum number of choices = 50');
        return;
    }

    var newChoice = $('#choice-to-add').val();
    if (newChoice) {
        addChoice(newChoice);
        $('#choice-to-add').val('');
    }
    filterDuplicateChoices();
}

/**
 * Package a request to send to the server and send it off.
 */
function sendForm() {
    reconcileChoices();
    resetErrors();

    var choices = [];
    $('#choices > option').each(function() {
        choices.push($(this).val());
    });

    var data = {
		label:         $("#data-label").val(),
		selectionType: $("#selection-type").val(),
		valueRequired: $("#value-required").is(':checked') ? 1 : 0,
		defaultValue:  $("#default-value").val(),
        choices:       choices,
		sortOrder:     $("#sort-order").val()
    };

    $.ajax({
        type: "POST",
        url:  "process.php",
        data: data,
        success: function(data) {
            alert('processed');
            if (data.status == "1") {
                alert("Form submitted and validated successfully!");
            } else {
                displayErrors(data.errors);
            }
        },
        dataType: 'json'
    });

}

/**
 * If there are duplicate choices, remove them.
 * If the default value is not in the list of choices,
 *  add it.
 */
function reconcileChoices() {
    var defaultValue = $('#default-value').val();
    var choices = $('#choices > option');
    var present = false;
    $.each(choices, function(idx, choice) {
        if (choice.text == defaultValue) {
            present = true;
        }
    });
    if (!present) {
        addChoice(defaultValue);
    }
}

function validateFields() {
    var output = {
        status: true,
        errors: []
    };

    if (!$('#client-validate').is(':checked')) {
        return output;
    }

    // Label may not be blank
    if (!$('#data-label').val()) {
        output.status = false;
        output.errors.push({
            field: 'data-label',
            error: 'Label cannot be blank'
        });
    }

    // If a value is required, default value cannot be blank.
    if ($('#value-required').is(":checked")) {
        if (!$('#default-value').val()) {
            output.status = false;
            output.errors.push({
                field: "default-value",
                error: "Default value cannot be blank when a value is required."
            });
        }
    }

    filterDuplicateChoices();
    return output;
}

function filterDuplicateChoices() {
    // Duplicate choices are not allowed. Filter them out.
    var existing = {};
    $('#choices > option').each(function() {
        if (existing[this.text]) {
            $(this).remove();
        } else {
            existing[this.text] = this.value;
        }
    });
}

/**
 * Adds a choice to the select element
 * @param choice:string The choice to add (text and value are equal
 * in this demo)
 * NOTE: We're not worried about adding duplicates, here. since
 *       dupes will get filtered out during validation.
 */
function addChoice(choice) {
    $('#choices')
    .append($("<option></option>")
        .attr("value", choice)
        .text(choice));
}

function resetForm() {
    resetErrors();
    $('#data-label').val('');
    $('#data-type').val('multi-select');
    $('#value-required').prop('checked', true);
    $('#default-value').val('');
    $('#choices > option').remove();
}

function resetErrors() {
    // Remove all error display at the same time.
    $('.error-display').removeClass('in-error');
}

function displayErrors(errors) {
    $.each(errors, function(idx, error) {
        var field = '#' + error.field + '-error';
        $(field).addClass('in-error').text(error.error);
    });
}
