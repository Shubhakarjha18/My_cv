
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>

    //Ajax request for Signup
    $(document).ready(function() {
        $('#signupForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            
            // Clear previous error messages
            $('.alert').remove();
    
            // Serialize form data
            var formData = $(this).serialize();

            // Get the submit button
            var submitButton = $(this).find('button[type="submit"]');
            var originalButtonText = submitButton.text();
            
            // Change the button text and disable it
            submitButton.prop('disabled', true).text('Please Wait...');
    
            // AJAX request
            $.ajax({
                url: $(this).attr('action'), // Get the form action URL
                type: 'POST', // Specify the request method
                data: formData, // Send the serialized form data
                success: function(response) {
                    // Handle success response
                    if (response.success) {
                        // Redirect or show success message
                        window.location.href = response.redirect; // Redirect to the specified URL
                    } else {
                        // Re-enable the button and revert the text
                        submitButton.prop('disabled', false).text(originalButtonText);

                        // Show error messages
                        $.each(response.errors, function(key, value) {
                            var errorHtml = '<div class="mb-4 p-4 bg-red-500 text-white rounded-lg">' + value + '</div>';
                            $('.p-6').prepend(errorHtml); // Prepend error messages to the form
                        });
                    }
                },
                error: function(xhr) {
                    // Handle AJAX error
                    var errors = xhr.responseJSON.errors;
                    
                    // Re-enable the button and change the text to 'Not Logged in'
                    submitButton.prop('disabled', false).text('Not Logged in');

                    $.each(errors, function(key, value) {
                        var errorHtml = '<div class="mb-4 p-4 bg-red-500 text-white rounded-lg">' + value[0] + '</div>';
                        $('.p-6').prepend(errorHtml); // Prepend error messages to the form
                    });
                }
            });
        });
    });


//Ajax request for login
$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Clear previous error messages
        $('#loginErrors').empty();

        // Serialize the form data
        var formData = $(this).serialize();

        // Get the submit button and change its text to indicate progress
        var submitButton = $(this).find('button[type="submit"]');
        var originalButtonText = submitButton.text();
        submitButton.prop('disabled', true).text('Logging in...');

        // Make the AJAX request
        $.ajax({
            url: $(this).attr('action'), // Form action
            type: 'POST', // HTTP method
            data: formData, // Form data
            success: function(response) {
                // On success, check the response
                if (response.success) {
                    // Redirect if login is successful
                    window.location.href = response.redirect;
                } else {
                    // Re-enable the button and show errors
                    submitButton.prop('disabled', false).text('Not Logged In');

                    // Display the errors
                    $.each(response.errors, function(key, value) {
                        $('#loginErrors').append('<div class="mb-4 p-4 bg-red-500 text-white rounded-lg">' + value + '</div>');
                    });
                }
            },
            error: function(xhr) {
                // On error, show validation errors
                var errors = xhr.responseJSON.errors;
                submitButton.prop('disabled', false).text('Not Logged In');
                $.each(errors, function(key, value) {
                    $('#loginErrors').append('<div class="mb-4 p-4 bg-red-500 text-white rounded-lg">' + value[0] + '</div>');
                });
            }
        });
    });
});
    
</script>

</body>
</html>